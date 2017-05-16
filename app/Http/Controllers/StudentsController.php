<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\History;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\String_;

class StudentsController extends Controller
{
    public function index()
    {
        //
        $students = Student::all();
        return view('pages.students.student',compact('students'));
    }

    public function create()
    {
        //
        $semesters = Semester::all();
        $courses = Course::all();
        $student = Student::all();
        return view('pages.students.create',compact('semesters','courses','student'));
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
        return view('pages.students.show',compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $semesters = Semester::all();
        $courses = Course::all();
        return view('pages.students.edit',compact('courses','semesters','student'));
    }

    public function update(Request $request, $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->update($request->all());
        $history = new History();
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
        $history->type = "삭제";
        $history->subject = Auth::user()->name;
        $history->object_type = "student";
        $history->object_id = $student->id;
        $history->object_name = $student->name;
        $history->save();
        Student::destroy($id);
        return redirect('/student');
    }
}

