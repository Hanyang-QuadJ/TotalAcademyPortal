<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Exam;
use App\History;
class ExamStudentController extends Controller
{
    //
    public function create($id){
        $exam = Exam::findOrFail($id);
        $students = Student::all();
        $histories = History::all();
        return view('pages.exams.studentCreate',compact('exam','students','histories'));

    }
    public function store(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->students()->attach($request->student, ['score' => $request->score]);
        return redirect("/exam/$exam->id");
    }
    public function edit($examId, $studentId)
    {
        $student = Student::findOrFail($studentId);
        $exam = Exam::findOrFail($examId);

        $score = $exam->students->where('id', $studentId)->first()->pivot->score;


        return view('pages.exams.studentEdit', compact('student','exam','score'));
    }
    public function update(Request $request, $courseId, $studentId)
    {
        $exam = Exam::findOrFail($courseId);
        $exam->students()->updateExistingPivot($studentId, array('score' => $request->score));
        return redirect("/exam/$exam->id");
    }
    public function destroy($examId, $studentId)
    {
        $exam = Exam::findOrFail($examId);
        $exam->students()->detach($studentId);
        return redirect("/exam/$exam->id");
    }
}
