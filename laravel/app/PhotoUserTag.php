<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoUserTag extends Model
{

//    public $fillable=['user_id', 'photo_id'];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
