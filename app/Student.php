<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name','school','reason','class','parentPhone','studentPhone',
    ];

    public function courses()
    {
        return $this
            ->belongsToMany('App\Course','course_student')
            ->withPivot('fee')
            ->withTimestamps();
    }

    public function exams()
    {
        return $this
            ->belongsToMany('App\Exam','exam_student')
            ->withPivot('score')
            ->withTimestamps();
    }
}
