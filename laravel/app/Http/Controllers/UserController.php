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
	
  }

  /**
   * Displays an user profile.
   *
   * @param int $id User id
   *
   * @return Illuminate\Http\Response
   */
  public function view(int $id)
  {
	
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
	
	$data=$request->all();

	$user=User::create($data);

	// Redirection et message
	\Session::flash('message', 'Successfully created nerd!');
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
	
  }

  /**
   * Saves the new values in DB
   *
   * @param int $id User id
   *
   * @return Illuminate\Http\Response
   */
  public function update(int $id)
  {
	
  }
}
