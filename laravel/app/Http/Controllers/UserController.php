<?php
/**
 * User Controller
 * 
 * Maintainer: mtancoigne
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

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
  public function show(int $id)
  {
	$user = User::findOrFail($id);

	return view('users/show', [
		'pageTitle' => 'Utilisateur : ' . $user->pseudo,
		'user' => $user
	]);
  }

  /**
   * Creates a new user in the DB
   * 
   * @param Request $request
   *
   * @return Illuminate\Http\Response
   */
  public function register(Request $request)
  {
	
  }

  /**
   * Logs an user in the system
   *
   * @param Request $request
   * 
   * @return Illuminate\Http\Response
   */
  public function login(Request $request)
  {
	
  }

  /**
   * Displays to form to login/register
   *
   * @return Illuminate\Http\Response
   */
  public function login_register()
  {
	
  }
}
