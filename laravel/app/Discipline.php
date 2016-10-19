<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{

    protected $fillable = [
        'name', 'logo',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
