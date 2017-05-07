<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'semester_id',
        'teacher_id',
    ];

    public function students()
    {
        return $this
            ->belongsToMany('App\Student','course_student')
            ->withTimestamps();
    }
    public function semester()
    {
        return $this
            ->belongsTo('App\Semester');
    }
    public function teacher()
    {
        return $this
            ->belongsTo('App\Teacher');
    }

}
