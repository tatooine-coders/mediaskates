<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Displays the list of users
     *
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filters
        $order = 'pseudo';
        $direction = 'asc';
        if ($request->has('order') &&
            in_array($request->get('order'), ['pseudo', 'last_name', 'ask_photograph', 'created_at', 'updated_at'])
        ) {
            $order = $request->get('order');
        }
        if ($request->has('direction') &&
            in_array($request->get('direction'), ['asc', 'desc'])
        ) {
            $direction = $request->get('direction');
        }

        $users = User::query()
            ->orderBy($order, $direction)
            ->get();

        return view('admin/users/index', [
            'pageTitle' => 'Liste des utilisateurs',
            'users' => $users,
            'direction' => $direction,
            'order' => $order,
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

        return view('admin/users/show', [
            'pageTitle' => 'Utilisateur : ' . $user->pseudo,
            'user' => $user
        ]);
    }

    /**
     * Closes an account.
     * @todo Implement admin.user.destroy
     * @param int $id User id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        return view('admin/users/create', [
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
            'password' => 'required|min:6|confirmed',
            'profile_pic' => ALLOWED_MIMES,
        ]);
        $data = $request->all();


        if (!empty($request->file())) {
            $upImage = $request->file('profile_pic');
            $filename = time() . '.' . $upImage->getClientOriginalExtension();
            $image = new \App\Libraries\SimpleImage();
            $image->load($upImage->getPathname());
            $image->centerCropFull(150, 150);
            if (!$image->save(PROFILE_PICS_FOLDER . $filename)) {
                Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
                unset($data['profile_pic']);
            } else {
                $data['profile_pic'] = $filename;
            }
        }


        $user = new User($data);
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
        $user->roles()->sync($data['roles']);

        // Redirection et message
        Session::flash('message', 'Nouvel utilisateur créé');
        return redirect()->to(route('admin.user.index'));
    }

    /**
     * Displays the edit form
     *
     * @param int $id User id
     *
     * @return Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = \App\Role::pluck('name', 'id');

        return view('admin/users/edit', [
            'pageTitle' => 'Edition d\'un utilisateur',
            'user' => $user,
            'roles' => $roles,
            'user_roles' => $user->roles->pluck('id')->toArray(),
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
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'profile_pic' => ALLOWED_MIMES,
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
                Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
                unset($data['profile_pic']);
            } else {
                $data['profile_pic'] = $filename;
            }
        }

        $user->fill($data)->save();

        $user->roles()->sync($data['roles']);

        // Redirection et message
        Session::flash('message', 'Utilisateur mis à jour !');
        return redirect()->to(route('admin.user.show', $id));
    }
}
