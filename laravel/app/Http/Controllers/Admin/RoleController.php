<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role;

class RoleController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::query()->get();

        return view('admin/roles/index', [
            'pageTitle' => 'Liste des rôles',
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::query()->pluck('pseudo', 'id');
        $permissions = \App\Permission::query()->pluck('name', 'id');

        return view('admin/roles/create', [
            'pageTitle' => 'Nouveau rôle',
            'users' => $users,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation (https://laravel.com/docs/5.3/validation)
        $this->validate($request, [
            'name' => 'required|string',
            'display_name' => 'required|string',
        ]);
        $data = $request->all();

        $role = Role::create($data);
        $role->users()->sync($data['users']);
        $role->permissions()->sync($data['permissions']);

        // Redirection et message
        \Session::flash('message', 'Nouveau rôle créé');
        return redirect()->to(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin/roles/show', [
            'pageTitle' => $role->name,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $users = \App\User::query()->pluck('pseudo', 'id');
        $permissions = \App\Permission::query()->pluck('name', 'id');

        return view('admin/roles/edit', [
            'pageTitle' => 'Mise à jour du rôle',
            'role' => $role,
            'users' => $users,
            'permissions' => $permissions,
            'role_users' => $role->users->pluck('id')->toArray(),
            'role_permissions' => $role->permissions->pluck('id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
        ]);

        $data = $request->all();

        $role->fill($data)->save();

        $role->users()->sync($data['users']);
        $role->permissions()->sync($data['permissions']);

        // Redirection et message
        \Session::flash('message', 'Rôle mis à jour !');
        return redirect()->to(route('admin.role.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
