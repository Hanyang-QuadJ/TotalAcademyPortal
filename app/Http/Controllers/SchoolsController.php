<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\History;
use Illuminate\Support\Facades\Auth;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools = School::all();
        $histories = History::all();
        return view('pages.schools.school',compact('schools','histories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $school = new School($request->all());
        $school->save();
        $history = new History();
        $history->type = "학교등록";
        $history->subject = Auth::user()->name;
        $history->object_type = "school";
        $history->object_id = $school->id;
        $history->object_name = $school->name;

        $history->save();
        $num = History::all()->count();
        if ($num > 10)
        {
            History::all()->first()
                ->delete();
        }
        return redirect('/school');
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
        $school = School::findOrFail($id);
        $histories = History::all();
        return view('pages.schools.show',compact('school','histories'));
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
        $school = School::findOrFail($id);
        $histories = History::all();
        return view('pages.schools.edit',compact('school','histories'));
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
        $school = School::findOrFail($id);
        $school->update($request->all());
        return redirect('/school');
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
        School::destroy($id);
        return redirect('/school');
    }
}
