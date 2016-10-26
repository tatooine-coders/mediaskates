<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $fillable = ['user_id', 'photo_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
