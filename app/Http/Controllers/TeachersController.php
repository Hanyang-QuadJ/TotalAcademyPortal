<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\History;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $histories = History::all();
        $teachers = Teacher::all();
        return view('pages.teachers.teacher',compact('teachers','histories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $histories = History::all();
        return view('pages.teachers.create', compact('histories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $teacher = new Teacher($request->all());
        $teacher->save();
        $history = new History();
        $history->type = "강사등록";
        $history->subject = Auth::user()->name;
        $history->object_type = "teacher";
        $history->object_id = $teacher->id;
        $history->object_name = $teacher->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }

        return redirect('/teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $histories = History::all();
        $teacher = Teacher::findOrFail($id);
        return view('pages.teachers.show',compact('teacher','histories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $teacher = Teacher::findOrFail($id);
        $histories = History::all();
        return view('pages.teachers.edit',compact('teacher', 'histories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $teacher = Teacher::findOrFail($id);
        $history = new History();
        $history->object_desc = $teacher->name;
        $teacher->update($request->all());
        $history->type = "강사수정";
        $history->subject = Auth::user()->name;
        $history->object_type = "teacher";
        $history->object_id = $teacher->id;
        $history->object_name = $teacher->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }
        return redirect('/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $teacher = Teacher::findOrFail($id);
        $history = new History();
        $history->type = "강사등록";
        $history->subject = Auth::user()->name;
        $history->object_type = "teacher";
        $history->object_id = $teacher->id;
        $history->object_name = $teacher->name;
        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }
        Teacher::destroy($id);
        return redirect('/teacher');
    }
}
