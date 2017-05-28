<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'name','teacherPhone','memo','dob','address',
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }


}
