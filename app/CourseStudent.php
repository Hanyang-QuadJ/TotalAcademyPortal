<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $fillable = [
        'fee',
    ];
    protected $table = 'course_student';
}
