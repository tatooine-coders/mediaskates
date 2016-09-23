<?php

use Illuminate\Database\Seeder;

class default_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert(['name' => 'admin']);
         DB::table('roles')->insert(['name' => 'user']);
         DB::table('roles')->insert(['name' => 'photograph']);
    }
}
