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

	  return view('member/users/edit', [
	  	'pageTitle' => 'Informations personnelles',
	  	'user' => $user,
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
  	$user = User::findOrFail(Auth()->user()->id);

  	$this->validate($request, [
  		'first_name' => 'required',
  		'last_name' => 'required',
  	]);

  	$data = $request->all();

    // Validating email in a second time.
    if($data['email'] != Auth()->user()->email){
      $this->validate($request, ['email' => 'required|email|unique:users']);
    }

  	$user->fill($data)->save();

  	// Redirection et message
  	\Session::flash('message', 'Votre profil a été mis à jour !');
  	return \Redirect::to(route('user.personnal_infos'));
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

    $validatorMessages=[
        'password_actual.password_hash_check' => 'Votre ancien mot de passe est invalide.',
    ];

    $this->validate($request, [
        'password_actual' => sprintf('password_hash_check:%s|required', Auth()->user()->password),
        'password' => 'required|min:6|confirmed',
    ], $validatorMessages);

    $data=$request->all();

    // Get user infos
    $user=User::query()->findOrFail(Auth()->user()->id);
    // Update password
    $user->password=bcrypt($data['password']);
    $user->save();

    // Redirection et message
  	\Session::flash('message', 'Votre mot de passe a été mis à jour !');
  	return \Redirect::to(route('user.personnal_infos'));
  }
}
