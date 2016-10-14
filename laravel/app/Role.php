<?php
namespace App;

//use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public $fillable = ['name', 'display_name', 'description'];

//    public function user()
//    {
//        return $this->hasManyThrough('App\User', 'App\RoleUser');
//    }
}
