<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Semester;
use App\Teacher;
use App\History;

class CoursesController extends Controller
{
    public function index()
    {

        $histories = History::all();
        $courses = Course::all();
        $semesters = Semester::all();
        return view('pages.courses.course',compact('courses','semesters','histories'));
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
        $history = new History();
        $history->name = $request->name." 강좌를 등록하였습니다";
        $course->save();
        $history->save();
        return redirect('/course');
    }

    public function show($id)
    {
        //
        $histories = History::all();
        $course = Course::findOrFail($id);
        return view('pages.courses.show',compact('course','histories'));
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
