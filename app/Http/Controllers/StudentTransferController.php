<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Semester;
use App\History;
use Illuminate\Support\Facades\Auth;

class StudentTransferController extends Controller
{
    //
    public function transfer($studentId,$courseId){
        $student = Student::findOrFail($studentId);
        $courses = Course::all();
        $course = Course::findOrFail($courseId);
        $semesters = Semester::all();
        $histories = History::all();
        return view('pages.students.transfer',compact('student','semesters','courses','course','histories'));

    }

    public function transferUpdate(Request $request, $studentId, $courseId){
        $student = Student::findOrFail($studentId);
        $student->courses()->detach($courseId);
        $course = Course::findOrFail($courseId);
        $student->courses()->attach($request->course, ['fee' => $request->fee]);
        $newcourse = Course::findOrFail($request->course);
        $history = new History();
        $history->type = "전반";
        $history->subject =Auth::user()->name;
        $history->object_type = "student";
        $history->object_type2 = "course";
        $history->object_id = $student->id;
        $history->object_id2 = $course->id;
        $history->object_id3 = $newcourse->id;
        $history->object_name = $student->name;
        $history->object_desc = $course->name;
        $history->object_desc2 = $newcourse->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }




        return redirect("/student/$student->id");

    }
}
