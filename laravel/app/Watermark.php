<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Watermark extends Model
{
    public $fillable = ['name', 'type', 'description'];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
