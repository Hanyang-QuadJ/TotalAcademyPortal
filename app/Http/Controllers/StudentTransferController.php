<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Semester;

class StudentTransferController extends Controller
{
    //
    public function transfer($studentId,$courseId){
        $student = Student::findOrFail($studentId);
        $courses = Course::all();
        $course = Course::findOrFail($courseId);
        $semesters = Semester::all();
        return view('pages.students.transfer',compact('student','semesters','courses','course'));

    }

    public function transferUpdate(Request $request, $studentId, $courseId){
        $student = Student::findOrFail($studentId);
        $dcourse = $student
        $student->courses()->detach($courseId);
        $student->courses()->attach($request->courses, ['fee' => $request->fee]);

        return redirect("/student/$student->id");

    }
}
