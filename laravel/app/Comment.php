<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public $fillable = ['text', 'user_id', 'photo_id', 'comment_id'];

    public function answers()
    {
        return $this->hasMany('App\Comment', 'comment_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Comment', 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
