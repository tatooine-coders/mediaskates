<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends \App\Http\Controllers\Member\MemberController
{

  /**
   * Displays an user profile.
   *
   * @return Illuminate\Http\Response
   */
  public function show()
  {
	// We should fetch id from Auth
	//$user = User::findOrFail(Auth()->user()->getAuthIdentifier());

	return view('member/users/show', [
		'pageTitle' => 'Dashboard'
		//'user' => $user
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
	  $user = User::findOrFail(Auth()->user()->id);
	  $roles = \App\Role::pluck('name', 'id');

	  return view('member/users/edit', [
	  	'pageTitle' => 'Informations personnelles',
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
	return \Redirect::to('member/' . $id);
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
