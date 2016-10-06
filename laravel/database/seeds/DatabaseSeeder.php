<?php
use Illuminate\Database\Seeder;
use App\Comment;
use App\Discipline;
use App\Event;
use App\License;
use App\Permission;
use App\Photo;
use App\PhotoUserTag;
use App\Role;
use App\User;
use App\Vote;
use App\Watermark;

class DatabaseSeeder extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    // Preparing preferences
    $prefs=[];
    $site_p=config('site.default_prefs');
    foreach($site_p as $k=>$v){
      $prefs[$k]=$v['default'];
    }

    // Roles
    $r_admin = new Role();
    $r_admin->name = 'admin';
    $r_admin->display_name = 'Administrator';
    $r_admin->created_at = \Carbon\Carbon::now();
    $r_admin->updated_at = \Carbon\Carbon::now();
    $r_admin->save();

    $r_member = new Role();
    $r_member->name = 'member';
    $r_member->display_name = 'Regular member';
    $r_member->created_at = \Carbon\Carbon::now();
    $r_member->updated_at = \Carbon\Carbon::now();
    $r_member->save();

    $r_photo = new Role();
    $r_photo->name = 'photograph';
    $r_photo->display_name = 'Photograph';
    $r_photo->created_at = \Carbon\Carbon::now();
    $r_photo->updated_at = \Carbon\Carbon::now();
    $r_photo->save();

    // Users : admin
    $u_admin = new User();
    $u_admin->first_name = 'Administrator';
    $u_admin->last_name = 'of the website';
    $u_admin->pseudo = 'admin';
    $u_admin->email = 'admin@example.com';
    $u_admin->password = bcrypt('password');
    $u_admin->preferences=json_encode($prefs);
    $u_admin->save();
    // link user/role
    $u_admin->attachRole($r_admin);
    $u_admin->attachRole($r_member);

    // Users : user
    $u_member = new User();
    $u_member->first_name = 'Member';
    $u_member->last_name = 'of the website';
    $u_member->pseudo = 'member';
    $u_member->email = 'member@example.com';
    $u_member->password = bcrypt('password');
    $u_member->preferences=json_encode($prefs);
    $u_member->save();
    // link user/role
    $u_member->attachRole($r_member);

    // Users : photograph
    $u_photo = new User();
    $u_photo->first_name = 'Photograph';
    $u_photo->last_name = 'of the website';
    $u_photo->pseudo = 'photograph';
    $u_photo->email = 'photo@example.com';
    $u_photo->password = bcrypt('password');
    $u_photo->preferences=json_encode($prefs);
    $u_photo->save();
    // link user/role
    $u_photo->attachRole($r_photo);
    $u_photo->attachRole($r_member);

    /* ---------------------------------------------------------------------
     * Creating base CRUD permissions
     * ---------------------------------------------------------------------
     * Small hack created with arrays and loops
     *
     * Different actions and their respective descriptions
     */
    $crudActions = [
    // CRUD
        'index' => ['display_name' => 'Display %ss', 'description' => 'Display the different %ss.'],
        'create' => ['display_name' => 'Display %s creation form', 'description' => 'Displays a form to create a new %s.'],
        'store' => ['display_name' => 'Save new %s', 'description' => 'Saves the new %s in the database.'],
        'show' => ['display_name' => 'Display %s', 'description' => 'Displays a given %s.'],
        'edit' => ['display_name' => 'Display %ss update form', 'description' => 'Display a form to update a given %s.'],
        'update' => ['display_name' => 'Update existing %s', 'description' => 'Saves a given %s in the database.'],
        'destroy' => ['display_name' => 'Destroy %s', 'description' => 'Destroys a given %s in DB.'],
        // Other more specific actions
        'dashboard' => ['display_name' => 'General information display for %s', 'description' => 'Displays general information for %ss'],
        'personnal_infos' => ['display_name' => 'User form', 'description' => 'User form to edit his infos'],
        'personnal_infos.update' => ['display_name' => 'Update in DB', 'description' => 'Update user\'s infos in DB'],
        'preferences' => ['display_name' => 'User preferences form', 'description' => 'Displays user preferences form'],
        'preferences.update' => ['display_name' => 'Update in DB', 'description' => 'Update user\'s preferences in DB'],
        'update_passwd' => ['display_name' => 'Update pass in DB', 'description' => 'Update user\'s password in DB'],
        'close_account' => ['display_name' => 'Closes account in DB', 'description' => 'Closes user\'s account in DB'],
    ];

    /*
     * Role:Controller:Action
     */
    $permissions = [
        'admin' => [
            'comment' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'discipline' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'event' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'license' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'photo' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'photo_user_tag' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'role' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'user' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'watermark' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
        ],
        'member' => [
            'comment' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'tag' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'user' => ['dashboard', 'personnal_infos', 'personnal_infos.update', 'preferences', 'preferences.update', 'update_passwd', 'close_account'],
            'vote' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
        ],
        'photograph' => [
            'comment' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'discipline' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'event' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'photo' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'tag' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'user' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
        ]
    ];

    foreach ($permissions as $role => $controllers) {
      foreach ($controllers as $name => $actions) {
        foreach ($actions as $action) {
          $permission = new Permission();
          $permission->name = sprintf('%s.%s.%s', $role, $name, $action);
          $permission->display_name = sprintf($crudActions[$action]['display_name'], $name);
          $permission->description = sprintf($crudActions[$action]['description'], $name);
          $permission->save();

          // Attaching permissions to roles
          switch ($role) {
            case 'admin':
              $r_admin->attachPermission($permission);
              break;
            case 'photograph':
              $r_photo->attachPermission($permission);
              break;
            case 'user':
              $r_member->attachPermission($permission);
              break;
          }
        }
      }
    }

    /* ---------------------------------------------------------------------
     * Other specific permissions
    \* -------------------------------------------------------------------*/

  }
}
