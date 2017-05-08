@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>{{$student->name}} 상세정보</h2>
            <hr>
            <h3>등록강좌</h3>
            <div class="row">
            @foreach($student->courses as $course)
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading"><a
                                    href="/semester/{{$course->semester->id}}">{{$course->semester->name}}</a></div>
                        <div class="panel-body">
                            <a href="/course/{{$course->id}}">{{$course->name}}</a><br>
                            {{$course->pivot->fee}}원
                        </div>
                        <div class="panel-footer pull-right">
                            <a href="/teacher/{{$course->teacher->id}}">{{$course->teacher->name}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <a href="/student/course/create/{{$student->id}}"><button class="btn btn-success">추가</button></a>

          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">{{$student->name}}</div>
                <!-- Table -->
                <table class="table">
                  <tr>
                    <th>시험</th>
                    <th>성적</th>
                  </tr>
                  @foreach($student->exams->sortBy('name') as $exam)
                    <tr>
                    <td><a href="/exam/{{$exam->id}}">{{$exam->name}}</a></td>
                    <td>{{$exam->pivot->score}}점</td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
            </div>


        </div>
    </div>
@endsection
