<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
