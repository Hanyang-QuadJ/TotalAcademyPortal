<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Semester;
use App\Course;

class DatabaseController extends Controller
{
    public function courseFee($id){
        $course = Course::findOrFail($id);

        return $course->toJson();
    }

    public function courseBySemester($id){
        $semester = Semester::findOrFail($id);
        $courses = $semester->courses;

        return $courses->toJson();
    }
}
