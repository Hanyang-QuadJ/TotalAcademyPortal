<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Semester;

class ExamsController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $semesters = Semester::all();
        return view('pages.exams.exam',compact('exams','semesters'));
    }

    public function create()
    {
        $semesters = Semester::all();
        return view('pages.exams.create',compact('semesters'));
    }

    public function store(Request $request)
    {
        //
        $exam = new Exam($request->all());
        $exam->save();
        return redirect('/exam');
    }

    public function show($id)
    {
        //
        $exam = Exam::findOrFail($id);
        return view('pages.exams.show',compact('exam'));
    }

    public function edit($id)
    {
        //
        $exam = Exam::findOrFail($id);
        return view('pages.exams.edit',compact('exam'));
    }

    public function update(Request $request, $id)
    {
        //
        $exam = Exam::findOrFail($id);
        $exam->update($request->all());
        return redirect('/exam');
    }

    public function destroy($id)
    {
        Exam::destroy($id);
        return redirect('/exam');
    }
}
