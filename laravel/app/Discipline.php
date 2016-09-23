<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function event()
    {
        return $this->hasMany('App\Event');
    }

    public function user()
    {
        return $this->hasManyThrough('App\UserDiscipline');
    }
}