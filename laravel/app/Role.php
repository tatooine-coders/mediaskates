<?php
namespace App;

//use Illuminate\Database\Eloquent\Model;
use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{

    public $fillable = ['name', 'display_name', 'description'];

}
