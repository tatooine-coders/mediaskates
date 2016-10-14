<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public $fillable = ['name', 'url'];

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
