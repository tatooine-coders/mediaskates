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
            'profile_pic' => 'mimes:png,jpeg,gif',
        ]);
        $data = $request->all();
        /**
         * @todo Delete the old pic if it exists
         */
        // Try to create the thumb and save it
        if (!empty($request->file())) {
            $upImage = $request->file('profile_pic');
            $filename = time() . '.' . $upImage->getClientOriginalExtension();
            $image = new \App\Libraries\SimpleImage();
            $image->load($upImage->getPathname());
            $image->centerCropFull(150, 150);
            if (!$image->save(PROFILE_PICS_FOLDER . $filename)) {
                \Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
                unset($data['profile_pic']);
            } else {
                $data['profile_pic'] = $filename;
            }
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
    public function editPrefs()
    {
        // Merge users's prefs and default ones.
        $prefs = config('site.default_prefs');

        // Mixing defaults and users
        $users = json_decode(Auth()->user()->preferences);
        foreach ($prefs as $key => $conf) {
            if (!key_exists($key, $users)) {
                $users[$key] = $conf['default'];
            }
        }

        return view('member/users/preferences', [
            'pageTitle' => 'Préférences',
            'preferences' => json_decode(Auth()->user()->preferences, true),
            'defaults' => $prefs
        ]);
    }

    /**
     * Saves the preferences in DB
     *
     * @param Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function updatePrefs(Request $request)
    {
        // Get user infos
        $user = User::query()->findOrFail(Auth()->user()->id);
        $data = $request->preferences;
        $defaults = config('site.default_prefs');

        // Compare with defaults and remove extra configuration
        foreach ($data as $k => $v) {
            if (!key_exists($k, $defaults)) {
                unset($data[$k]);
            }
        }

        // Compare defaults and add missing keys
        foreach ($defaults as $k => $c) {
            if (!key_exists($k, $data)) {
                $data[$k] = $c['default'];
            } else {
                // Converting true/false
                if ($c['type'] === 'checkbox') {
                    if ($data[$k] === '1') {
                        $data[$k] = true;
                    } else {
                        $data[$k] = false;
                    }
                }
            }
        }

        // Update password
        $user->preferences = json_encode($data);
        $user->save();

        // Redirection et message
        \Session::flash('message', 'Vos préférences ont été mises à jour !');
        return \Redirect::to(route('user.preferences'));
    }

    /**
     * Updates password in db
     *
     * @param Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function updatePasswd(Request $request)
    {
        $validatorMessages = [
            'password_actual.password_hash_check' => 'Votre ancien mot de passe est invalide.',
        ];

        $this->validate($request, [
            'password_actual' => sprintf('password_hash_check:%s|required', Auth()->user()->password),
            'password' => 'required|min:6|confirmed',
            ], $validatorMessages);

        $data = $request->all();

        // Get user infos
        $user = User::query()->findOrFail(Auth()->user()->id);
        // Update password
        $user->password = bcrypt($data['password']);
        $user->save();

        // Redirection et message
        \Session::flash('message', 'Votre mot de passe a été mis à jour !');
        return \Redirect::to(route('user.personnal_infos'));
    }

    public function ask_photograph()
    {
        $user = User::query()->findOrFail(Auth()->user()->id);
        if ($user->ask_photograph == 1) {
            // Redirection et message
            \Session::flash('message', 'Votre demamnde a déjà été prise en compte!');
            return \Redirect::to(route('user.personnal_infos'));
        } else {
            $user->ask_photograph = 1;
            $user->save();

            // Redirection et message
            \Session::flash('message', 'Votre demamnde a bien été prise en compte!');
            return \Redirect::to(route('user.personnal_infos'));
        }
    }
}
