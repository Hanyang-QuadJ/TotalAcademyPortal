@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$student->name}} 상세정보</h2>
            <hr>
            <h3>등록강좌</h3>
            @foreach($student->courses as $course)
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading"><a
                                    href="/semester/{{$course->semester->id}}">{{$course->semester->name}}</a></div>
                        <div class="panel-body">
                            <a href="/course/{{$course->id}}">{{$course->name}}</a>
                        </div>
                        <div class="panel-footer pull-right">
                            <a href="/teacher/{{$course->teacher->id}}">{{$course->teacher->name}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="student/course/create"><button class="btn btn-success">추가</button></a>

            <div class="col-md-12">
                <hr>
                <h3>시험성적</h3>
                @foreach($student->exams->sortBy('name') as $exam)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"><a href="/exam/{{$exam->id}}">{{$exam->name}}</a></div>
                            <div class="panel-body">
                                {{$exam->pivot->score}}점
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
