<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permission;
use Illuminate\Support\Facades\Route;

class PermissionController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Creates a list of missing routes in permissions, and missing permissions for rotues
     * @return array
     */
    protected function fetchMissingRoutes()
    {
        // Find all the routes
        $routes = Route::getRoutes();
        // Find all the permissions
        $permissions = Permission::query()->get();

        $issues = [];
        // Searching permissions not in routes
        foreach ($permissions as $p) {
            $found = false;
            // Check only for named routes
            foreach ($routes as $r) {
                $action = $r->getAction();
                if (isset($action['as'])) {
                    if ($action['as'] === $p->name) {
                        $found = true;
                    }
                }
            }
            if (!$found) {
                $issues['PnR'][$p->id] = $p->toArray();
            }
        }

        // Searching routes not in permissions
        foreach ($routes as $r) {
            $action = $r->getAction();
            // Check only named routes
            if (isset($action['as'])) {
                $found = false;
                foreach ($permissions as $p) {
                    if ($action['as'] == $p->name) {
                        $found = true;
                    }
                }
                if (!$found) {
                    $issues['RnP'][] = $action;
                }
            }
        }

        return $issues;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = $this->fetchMissingRoutes();
        $perms = Permission::query()->get();

        return view('admin/permissions/index', [
            'pageTitle' => 'Liste des permissions',
            'perms' => $perms,
            'issues' => $issues
        ]);
    }
}
