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


    public function edit($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $course = Course::findOrFail($courseId);
        $fee = $student->courses->find($courseId)->pivot->fee;
        return view('pages.students.courseEdit', compact('student', 'course', 'fee'));
    }

    public function update(Request $request, $studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $student->courses()->updateExistingPivot($courseId, array('fee' => $request->fee));
        return redirect("/student/$student->id");
    }




    public function destroy($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $student->courses()->detach($courseId);
        return redirect("/student/$student->id");
    }

}
