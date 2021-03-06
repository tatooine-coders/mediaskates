<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public $fillable = ['name', 'url'];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
