<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }


}
