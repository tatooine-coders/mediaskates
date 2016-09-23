<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDiscipline extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }
}
