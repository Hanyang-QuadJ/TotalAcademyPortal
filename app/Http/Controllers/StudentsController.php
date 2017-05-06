<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;

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
        return view('pages.students.create');
    }

    public function store(Request $request)
    {
        //
        $student = new Student($request->all());
        $student->save();
        return redirect('/student');
    }

    public function show($id)
    {
        //
        $student = Student::findOrFail($id);
        return view('pages.students.show',compact('student'));
    }

    public function edit($id)
    {
        //
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('pages.students.edit',compact('student','courses'));
    }

    public function update(Request $request, $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->update($request->all());
        $student->courses()->sync($request->courses);
        return redirect('/student');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/student');
    }
}
