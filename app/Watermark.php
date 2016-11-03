<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Watermark extends Model
{
    public $fillable = ['name', 'description', 'position', 'margin', 'file'];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
