<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $fillable = ['name', 'address', 'date_event', 'city', 'zip', 'user_id', 'discipline_id'];

    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
