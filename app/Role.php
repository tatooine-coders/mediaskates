<?php
namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    public $fillable = ['name', 'display_name', 'description'];

    public function user(){

        return $this->hasManyThrough('App\User');
    }
}
