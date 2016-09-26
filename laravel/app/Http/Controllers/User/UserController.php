<?php

namespace App\Http\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{

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
   * Logs an user out
   *
   * @return Illuminate\Http\Response
   */
  public function logout()
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

  /**
   * Form to edit user preferences
   * @todo Merge with edit ?
   * 
   * @return Illuminate\Http\Response
   */
  public function edit_prefs()
  {
	
  }

  /**
   * Saves the preferences in DB
   * 
   * @param Request $request
   * 
   * @return Illuminate\Http\Response
   */
  public function update_prefs(Request $request)
  {
	
  }

  /**
   * Updates password in db
   * 
   * @param Request $request
   * 
   * @return Illuminate\Http\Response
   */
  public function update_passwd(Request $request)
  {
	
  }
}
