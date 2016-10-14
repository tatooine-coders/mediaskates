<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'name', 'logo',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function event()
    {
        return $this->hasMany('App\Event');
    }

    public function user()
    {
        return $this->hasManyThrough('App\User', 'App\UserDiscipline');
    }
}
