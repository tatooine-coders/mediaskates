<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function tag(){
        return $this->hasManyThrough('App\User', 'App\PhotoUserTag');
    }

    public function watermark()
    {
        return $this->hasOne('App\Watermark');
    }
}
