@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$course->name}} 상세정보</h2>
            <h4>{{$course->semester->name}}</h4>
            <hr>
            <h3>학생목록</h3>
            @foreach($course->students as $student)
                <div class="col-md-4">
                    <div class="panel panel-success">

                        <div class="panel-body">
                            <a href="/student/{{$student->id}}">{{$student->name}}</a>
                        </div>

                    </div>
                </div>
            @endforeach



        </div>
    </div>
@endsection
