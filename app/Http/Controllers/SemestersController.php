<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\History;
class SemestersController extends Controller
{
    public function index()
    {
        $histories = History::all();
        $semesters = Semester::all();
        return view('pages.semesters.semester',compact('semesters','histories'));
    }

    public function create()
    {
        //
        return view('pages.semesters.create');
    }

    public function store(Request $request)
    {
        //
        $semester = new Semester($request->all());
        $semester->save();
        return redirect('/semester');
    }

    public function show($id)
    {
        //
        $histories = History::all();
        $semester = Semester::findOrFail($id);
        return view('pages.semesters.show',compact('semester','histories'));
    }

    public function edit($id)
    {
        //
        $semester = Semester::findOrFail($id);
        return view('pages.semesters.edit',compact('semester'));
    }

    public function update(Request $request, $id)
    {
        //
        $semester = Semester::findOrFail($id);
        $semester->update($request->all());
        return redirect('/semester');
    }

    public function destroy($id)
    {
        Semester::destroy($id);
        return redirect('/semester');
    }
}
