<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\History;
class ExamsController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $histories = History::all();
        return view('pages.exams.exam',compact('exams','histories'));
    }

    public function create()
    {
        return view('pages.exams.create');
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
        $histories = History::all();
        $exam = Exam::findOrFail($id);
        return view('pages.exams.show',compact('exam','histories'));
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
