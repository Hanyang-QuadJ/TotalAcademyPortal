<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamStudent extends Model
{
    protected $fillable = [
        'score',
    ];
    protected $table = 'exam_student';
}
