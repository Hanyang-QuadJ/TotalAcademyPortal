<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
