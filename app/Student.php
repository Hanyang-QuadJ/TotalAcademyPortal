<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name','reason','class','parentPhone','studentPhone','school_id',
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
    public function school()
    {
        return $this
            ->belongsTo('App\School');
    }
}
