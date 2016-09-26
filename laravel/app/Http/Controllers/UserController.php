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

  /**
   * Closes an account.
   *
   * @param int $id User id
   * 
   * @return Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
	
  }

  /**
   * Displays the form to add an user. (Admin mode)
   *
   * @return Illuminate\Http\Response
   */
  public function create()
  {
	// Fetch the roles (for the select element)
	$roles = \App\Role::query()->pluck('name', 'id');

	return view('users/create', [
		'pageTitle' => 'Ajouter un utilisateur',
		'roles' => $roles,
	]);
  }

  /**
   * Saves a new user in DB (Admin mode !)
   *
   * @return Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	// Data validation (https://laravel.com/docs/5.3/validation)
	$this->validate($request, [
		'first_name' => 'required',
		'last_name' => 'required',
		'pseudo' => 'bail|required|unique:users',
		'email' => 'bail|required|email|unique:users',
		'password' => 'required',
		'password2' => 'required',
	]);

	$data = $request->all();

	$user = User::create($data);

	// Redirection et message
	\Session::flash('message', 'Nouvel utilisateur créé');
	return Redirect::to('users/index');
  }

  /**
   * Displays the edit form
   *
   * @param int $id User id
   *
   * @return Illuminate\Http\Response
   */
  public function edit(int $id)
  {
	$user = User::findOrFail($id);
	$roles = \App\Role::pluck('name', 'id');

	return view('users/edit', [
		'pageTitle' => 'Edition d\'un utilisateur',
		'user' => $user,
		'roles' => $roles,
	]);
  }

  /**
   * Saves the new values in DB
   *
   * @param int $id Id to be modified
   * @param Request $request Request data
   * 
   * @return Illuminate\Http\Response
   */
  public function update(int $id, Request $request)
  {
	$user = User::findOrFail($id);
	
	$this->validate($request, [
		'first_name' => 'required',
		'last_name' => 'required',
	]);

	$data = $request->all();

	$user->fill($data)->save();

	// Redirection et message
	\Session::flash('message', 'Utilisateur mis à jour !');
	return \Redirect::to('user/' . $id);
  }
}
