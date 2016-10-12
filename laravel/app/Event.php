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

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
