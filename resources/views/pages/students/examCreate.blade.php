@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>{{$student->name}}의 새로운 시험등록</h2>
            <form action="/student/exam/{{$student->id}}" method="post">
                {{ csrf_field() }}
                <select name="exam" class="form-control" id="student-examCreate">


                            @foreach($exams as $exam)
                                @if($student->exams->contains($exam))
                                @else()
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endif
                            @endforeach


                </select>
                <label>점수</label>

                <input class="form-control" name="score" type="text">
                <button class="btn btn-primary" type="submit">제출</button>
            </form>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#student-examCreate').select2();
            $('#student-examCreate').select2().maximizeSelect2Height();
        });
    </script>
@endsection
