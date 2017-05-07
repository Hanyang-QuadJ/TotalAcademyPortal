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
                    <div class="panel-heading">{{$course->semester->name}}</div>
                        <div class="panel-body">
                            {{$course->name}}
                        </div>
                    <div class="panel-footer pull-right">
                        {{$course->teacher->name}}
                    </div>
                </div>
            </div>
                @endforeach

            <div class="col-md-12">
                <hr>
                <h3>시험성적</h3>
                @foreach($student->exams as $exam)
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">{{$exam->name}}</div>
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
