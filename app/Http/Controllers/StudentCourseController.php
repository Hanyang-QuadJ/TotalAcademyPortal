<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Semester;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    //
    public function create($id)
    {
        $courses = Course::all();
        $student = Student::findOrFail($id);
        $semesters = Semester::all();
        $histories = History::all();
        return view('pages.students.courseCreate', compact('courses', 'student', 'semesters','histories'));

    }

    public function store(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->courses()->attach($request->course, ['fee' => $request->fee]);
        $course = Course::findOrFail($request->course);

        $history = new History();
        $history->type ="강좌 등록";
        $history->subject = Auth::user()->name;
        $history->object_type = "student";
        $history->object_type2 ="course";
        $history->object_id = $student->id;
        $history->object_id2 = $course->id;
        $history->object_name = $student->name;
        $history->object_desc = $course->name;
        $history->save();
        return redirect("/student/$student->id");
    }


    public function edit($studentId, $courseId)
    {
        $histories = History::all();
        $student = Student::findOrFail($studentId);
        $course = Course::findOrFail($courseId);
        $fee = $student->courses->find($courseId)->pivot->fee;
        return view('pages.students.courseEdit', compact('student', 'course', 'fee','histories'));
    }

    public function update(Request $request, $studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $student->courses()->updateExistingPivot($courseId, array('fee' => $request->fee));
        $course = Course::findOrFail($courseId);
        $history = new History();
        $history->type = "수강료 수정";
        $history->subject =Auth::user()->name;
        $history->object_type = "student";
        $history->object_type2 = "course";
        $history->object_id = $student->id;
        $history->object_id2 = $course->id;
        $history->object_name = $student->name;
        $history->object_desc = $course->name;
        $history->save();

        return redirect("/student/$student->id");
    }




    public function destroy($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $student->courses()->detach($courseId);
        $course = Course::findOrFail($courseId);
        $history = new History();
        $history->type= "수강 취소";
        $history->subject = Auth::user()->name;
        $history->object_type = "student";
        $history->object_id = $student->id;
        $history->object_id2 = $course->id;
        $history->object_name = $student->name;
        $history->object_desc = $course->name;
        $history->save();
        return redirect("/student/$student->id");
    }

}
