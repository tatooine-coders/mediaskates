<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Displays the list of users
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->get();

        return view('users/index', [
            'pageTitle' => 'Liste des utilisateurs',
            'users' => $users
        ]);
    }

    /**
     * Displays an user profile.
     *
     * @param int $id User id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users/show', [
            'pageTitle' => 'Utilisateur : ' . $user->pseudo,
            'user' => $user
        ]);
    }
}
