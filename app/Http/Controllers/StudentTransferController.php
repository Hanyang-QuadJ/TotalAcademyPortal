<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Semester;
use App\History;

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
        $student->courses()->detach($courseId);
        $course = Course::findOrFail($courseId);
        $student->courses()->attach($request->course, ['fee' => $request->fee]);
        $newcourse = Course::findOrFail($request->course);
        $history = new History();
        $history->name = $student->name." 학생을 ".$course->name." 강좌에서 ".$newcourse->name." 강좌로 전반처리하였습니다";
        $history->save();
        return redirect("/student/$student->id");

    }
}
