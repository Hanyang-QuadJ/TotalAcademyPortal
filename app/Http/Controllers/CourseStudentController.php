<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;

class CourseStudentController extends Controller
{
    //
    public function create($id){
        $course = Course::findOrFail($id);
        $students = Student::all();
        return view('pages.courses.studentCreate',compact('course','students'));

    }
    public function store(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->students()->attach($request->student, ['fee' => $request->fee]);
        return redirect("/course/$course->id");
    }

    
}
