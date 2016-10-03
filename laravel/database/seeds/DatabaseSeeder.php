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
        // Roles
        $r_admin=new Role();
        $r_admin->name = 'admin';
        $r_admin->display_name = 'Administrator';
        $r_admin->created_at = \Carbon\Carbon::now();
        $r_admin->updated_at = \Carbon\Carbon::now();
        $r_admin->save();

        $r_user=new Role();
        $r_user->name = 'user';
        $r_user->display_name = 'Regular user';
        $r_user->created_at = \Carbon\Carbon::now();
        $r_user->updated_at = \Carbon\Carbon::now();
        $r_user->save();

        $r_photo=new Role();
        $r_photo->name = 'photograph';
        $r_photo->display_name= 'Photograph';
        $r_photo->created_at= \Carbon\Carbon::now();
        $r_photo->updated_at= \Carbon\Carbon::now();
        $r_photo->save();

        // Users : admin
        $u_admin=new User();
        $u_admin->first_name = 'Administrator';
        $u_admin->last_name='of the website';
        $u_admin->pseudo='admin';
        $u_admin->email='admin@example.com';
        $u_admin->password=bcrypt('password');
        $u_admin->save();
        // link user/%s
        $u_admin->attachRole($r_admin);

        // Users : user
        $u_user=new User();
        $u_user->first_name = 'User';
        $u_user->last_name='of the website';
        $u_user->pseudo='user';
        $u_user->email='user@example.com';
        $u_user->password=bcrypt('password');
        $u_user->save();
        // link user/%s
        $u_user->attachRole($r_user);

        // Users : photograph
        $u_photo=new User();
        $u_photo->first_name = 'Photograph';
        $u_photo->last_name='of the website';
        $u_photo->pseudo='photograph';
        $u_photo->email='photo@example.com';
        $u_photo->password=bcrypt('password');
        $u_photo->save();
        // link user/%s
        $u_photo->attachRole($r_photo);

        /*
         * Permissions
         */
        $crudActions=[
          'index'=>['display_name' => 'Display %ss', 'description' => 'Display the different %ss.'],
          'create'=>['display_name' => 'Display %s creation form', 'description' => 'Displays a form to create a new %s.'],
          'store'=>['display_name' => 'Save new %s', 'description' => 'Saves the new %s in the database.'],
          'show'=>['display_name' => 'Display %s', 'description' => 'Displays a given %s.'],
          'edit'=>['display_name' => 'Display %ss update form', 'description' => 'Display a form to update a given %s.'],
          'update'=>['display_name' => 'Update existing %s', 'description' => 'Saves a given %s in the database.'],
          'destroy'=>['display_name' => 'Destroy %s', 'description' => 'Destroys a given %s in DB.'],
        ];

        $permissions=[
          'admin'=>[
            'comment'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'discipline'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'event'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'license'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'photo'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'photo_user_tag'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'role'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'user'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'watermark'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
          ],
          'user'=>[
            'comment'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'tag'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'user'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
          ],
          'photograph'=>[
            'comment'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'discipline'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'event'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'photo'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'tag'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'user'=>['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
          ]
        ];

        foreach($permissions as $role=>$controllers){
          foreach($controllers as $name=>$actions){
            foreach($actions as $action){
              $permission=[
                  'name' => $role.'.'.$name.'.'.$action,
                  'display_name' => printf($crudActions[$action]['display_name'], $name),
                  'description' => printf($crudActions[$action]['description'], $name),
              ];
              Permission::create($permission);
            }
          }
        }
    }
}
