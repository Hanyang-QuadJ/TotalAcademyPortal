<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Semester;
use App\Teacher;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $semesters = Semester::all();
        return view('pages.courses.course',compact('courses','semesters'));
    }

    public function create()
    {
        $semesters = Semester::all();
        $teachers = Teacher::all();
        return view('pages.courses.create',compact('semesters','teachers'));
    }

    public function store(Request $request)
    {
        //
        $course = new Course($request->all());
        $course->save();
        return redirect('/course');
    }

    public function show($id)
    {
        //
        $course = Course::findOrFail($id);
        return view('pages.courses.show',compact('course'));
    }

    public function edit($id)
    {
        //
        $course = Course::findOrFail($id);
        return view('pages.courses.edit',compact('course'));
    }

    public function update(Request $request, $id)
    {
        //
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect('/course');
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('/course');
    }
}
