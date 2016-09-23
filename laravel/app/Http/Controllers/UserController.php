<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{

    public function index()
    {

    }

    public function view($id)
    {

    }

    public function register()
    {

    }

    public function login()
    {

    }

    public function close_account()
    {

    }

    public function add_form()
    {
        $roles = \App\Role::query()->pluck('name', 'id');
        $user = \App\User::all();

        return view('users/add', [
            'pageTitle' => 'Ajouter un utilisateur',
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function add()
    {
        
    }
}
