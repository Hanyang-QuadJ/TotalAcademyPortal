<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\History;
class CourseStudentController extends Controller
{
    //
    public function create($id){
        $histories = History::all();
        $course = Course::findOrFail($id);
        $students = Student::all();
        return view('pages.courses.studentCreate',compact('course','students','histories'));

    }
    public function store(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->students()->attach($request->student, ['fee' => $request->fee]);
        return redirect("/course/$course->id");
    }
    public function edit($courseId, $studentId)
    {
        $student = Student::findOrFail($studentId);
        $course = Course::findOrFail($courseId);
        $histories = History::all();

        $fee = $course->students->where('id', $studentId)->first()->pivot->fee;


        return view('pages.courses.studentEdit', compact('student','course','fee', 'histories'));
    }
    public function update(Request $request, $courseId, $studentId)
    {
        $course = Course::findOrFail($courseId);
        $course->students()->updateExistingPivot($studentId, array('fee' => $request->fee));
        return redirect("/course/$course->id");
    }
    public function destroy($courseId, $studentId)
    {
        $course = Course::findOrFail($courseId);
        $course->students()->detach($studentId);
        return redirect("/course/$course->id");
    }



}
