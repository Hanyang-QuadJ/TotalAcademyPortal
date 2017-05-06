<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

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
        return view('pages.students.edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('/student');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/student');
    }
}
