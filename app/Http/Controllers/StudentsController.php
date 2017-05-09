<?php

namespace App\Http\Controllers;

use App\Semester;
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
        $student->courses()->sync($request->courses);
        return redirect('/student');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/student');
    }
}
