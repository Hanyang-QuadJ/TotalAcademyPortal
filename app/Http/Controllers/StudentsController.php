<?php

namespace App\Http\Controllers;
use App\Semester;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\History;
use Illuminate\Support\Facades\Auth;

//use phpDocumentor\Reflection\Types\String_;

class StudentsController extends Controller
{
    public function index()
    {
        //
        $histories = History::all();
        $students = Student::all();
        return view('pages.students.student',compact('students','histories'));
    }

    public function create()
    {
        //
        $semesters = Semester::all();
        $courses = Course::all();
        $student = Student::all();
        $histories = History::all();
        return view('pages.students.create',compact('semesters','courses','student','histories'));
    }

    public function store(Request $request)
    {
        //
        $student = new Student($request->all());
        $student->save();
        $history = new History();
        $history->type = "등록";
        $history->subject = Auth::user()->name;
        $history->object_type = "student";
        $history->object_id = $student->id;
        $history->object_name = $student->name;

        $history->save();
        $student->courses()->attach($request->course, ['fee' => $request->fee]);
        return redirect('/student');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $histories = History::all();
        return view('pages.students.show',compact('student','histories'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $semesters = Semester::all();
        $histories = History::all();
        $courses = Course::all();
        return view('pages.students.edit',compact('courses','semesters','student','histories'));
    }

    public function update(Request $request, $id)
    {
        //
        $student = Student::findOrFail($id);
        $history = new History();
        $history->object_desc = $student->name;
        $student->update($request->all());
        $history->type = "수정";
        $history->subject = Auth::user()->name;
        $history->object_type = "student";
        $history->object_id = $student->id;
        $history->object_name = $student->name;

        $history->save();
        return redirect('/student');
    }




    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $history = new History();
        $history->type = "퇴원처리";
        $history->subject = Auth::user()->name;
        $history->object_type = "student";
        $history->object_id = $student->id;
        $history->object_name = $student->name;
        $history->save();
        Student::destroy($id);
        return redirect('/student');
    }
}

