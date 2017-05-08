@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$course->name}} 상세정보</h2>
            <h4>{{$course->semester->name}}</h4>
            <hr>
            <h3>학생목록</h3>
            @foreach($course->students->sortBy('name') as $student)
                <div class="col-md-4">
                    <div class="panel panel-success">

                        <div class="panel-body">
                            <a href="/student/{{$student->id}}">{{$student->name}}</a><br>
                            <span>{{$student->pivot->fee}}원</span>
                            <a href=""><button class="btn btn-primary">수강료수정</button></a>

                        </div>

                    </div>
                </div>
            @endforeach
            <div class="col-md-12">

                <a href="/course/student/create/{{$course->id}}"><button href="" class="btn btn-warning">학생추가</button></a>

            </div>



        </div>
    </div>
@endsection
