<?php
namespace App\Http\Controllers\Admin;

class DashboardController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard/index', [
            'pageTitle' => 'Dashboard'
        ]);
    }
}
