<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * --------------------------------------------------------------------------
 * Register Controller
 * --------------------------------------------------------------------------
 *
 * This controller handles the registration of new users as well as their
 * validation and creation. By default this controller uses a trait to
 * provide this functionality without requiring any additional code.
 *
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/member/me';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'first_name' => 'required',
                'last_name' => 'required',
                'pseudo' => 'bail|required|unique:users',
                'email' => 'bail|required|email|unique:users',
                'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new \App\User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->pseudo = $data['pseudo'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        // Preparing preferences
        $prefs = [];
        $site_p = config('site.default_prefs');
        foreach ($site_p as $k => $v) {
            $prefs[$k] = $v['default'];
        }
        $user->preferences = json_encode($prefs);
        $user->save();
        // Adding User role
        $user->attachRole(ROLE_MEMBER);

        return $user;
    }
}
