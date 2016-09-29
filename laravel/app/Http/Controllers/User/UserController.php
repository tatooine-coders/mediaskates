<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends \App\Http\Controllers\User\UsersController
{

  /**
   * Displays an user profile.
   *
   * @return Illuminate\Http\Response
   */
  public function show()
  {
	// We should fetch id from Auth
	$id=Auth()->user()->getAuthIdentifier();
	$user = User::findOrFail($id);

	return view('user/users/show', [
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
  public function destroy()
  {

  }

  /**
   * Displays the edit form
   *
   * @return Illuminate\Http\Response
   */
  public function edit()
  {
	// Must get Id from session
	$id=0;

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
   * @param Request $request Request data
   *
   * @return Illuminate\Http\Response
   */
  public function update(Request $request)
  {
	//Must find id from session
	$id=0;

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
