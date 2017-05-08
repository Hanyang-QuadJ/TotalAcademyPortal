<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Semester;

class StudentCourseController extends Controller
{
    //
    public function create($id)
    {
        $courses = Course::all();
        $student = Student::findOrFail($id);
        $semesters = Semester::all();
        return view('pages.students.courseCreate', compact('courses', 'student', 'semesters'));

    }

    public function store(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->courses()->attach($request->course, ['fee' => $request->fee]);
        return redirect("/student/$student->id");
    }
}
