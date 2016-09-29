<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'pseudo',
        'email',
        'password',
        'profile_pic',
        'site_web',
        'facebook',
        'google',
        'twitter',
        'biography',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function photo()
    {
        return $this->hasMany('App\Photo');
    }

    public function tag()
    {
        return $this->hasManyThrough('App\Photo', 'App\PḧotoUserTag');
    }

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function vote()
    {
        return $this->hasManyThrough('App\Photo', '\App\Vote');
    }

    public function event()
    {
        return $this->hasMany('App\Event');
    }
}
