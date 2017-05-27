<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Semester;
use App\Teacher;
use App\History;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index()
    {

        $histories = History::all();
        $courses = Course::all();
        $teachers = Teacher::all();
        $semesters = Semester::all();
        return view('pages.courses.course',compact('courses','semesters','histories','teachers'));
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
        $history = new History();
        $history->subject = Auth::user()->name;
        $history->type = "강좌등록";
        $history->object_type = "course";
        $history->object_id = $course->id;
        $history->object_name = $course->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }
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
        $histories = History::all();
        $course = Course::findOrFail($id);
        return view('pages.courses.edit',compact('course','histories'));
    }

    public function update(Request $request, $id)
    {
        //
        $course = Course::findOrFail($id);
        $history = new History();
        $history->object_desc = $course->name;
        $course->update($request->all());
        $history->subject = Auth::user()->name;
        $history->type = "강좌수정";
        $history->object_type = "course";
        $history->object_id = $course->id;
        $history->object_name = $course->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }
        return redirect('/course');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $history = new History();
        $history->subject = Auth::user()->name;
        $history->type = "강좌삭제";
        $history->object_type = "course";
        $history->object_id = $course->id;
        $history->object_name = $course->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }
        Course::destroy($id);
        return redirect('/course');
    }
}
