<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this
            ->belongsToMany('App\Student')
            ->withPivot('score')
            ->withTimestamps();
    }
}
