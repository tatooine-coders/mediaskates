<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Watermark extends Model
{
    public $fillable = ['name', 'type', 'description'];

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
