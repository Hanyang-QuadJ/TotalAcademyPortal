<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Student;

class StudentExamController extends Controller
{
    //
    public function create($id)
    {
        $exams = Exam::all();
        $student = Student::findOrFail($id);
        return view('pages.students.examCreate', compact('exams', 'student'));

    }

    public function store(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->exams()->attach($request->exam, ['score' => $request->score]);
        return redirect("/student/$student->id");
    }


    public function edit($studentId, $examId)
    {
        $student = Student::findOrFail($studentId);
        $exam = Exam::findOrFail($examId);
        $score = $student->exams->find($examId)->pivot->score;
        return view('pages.students.examEdit', compact('student', 'exam', 'score'));
    }

    public function update(Request $request, $studentId, $examId)
    {
        $student = Student::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId, array('score' => $request->score));
        return redirect("/student/$student->id");
    }

    public function destroy($studentId, $examId)
    {
        $student = Student::findOrFail($studentId);
        $student->exams()->detach($examId);
        return redirect("/student/$student->id");
    }
}
