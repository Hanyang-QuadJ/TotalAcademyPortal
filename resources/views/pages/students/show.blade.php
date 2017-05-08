@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>{{$student->name}} 상세정보</h2>
            <hr>
            <h3></h3>
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>{{$student->name}} 등록강좌</h4>
                </div>
                  <!-- Table -->
                  <table class="table">
                    <tr>
                      <th>학기</th>
                      <th>강좌</th>
                      <th>강사</th>
                      <th>수강료</th>
                    </tr>
                    @foreach($student->courses as $course)
                      <tr>
                        <td><a href="/semester/{{$course->semester->id}}">{{$course->semester->name}}</a></td>
                        <td><a href="/course/{{$course->id}}">{{$course->name}}</a></td>
                        <td><a href="/teacher/{{$course->teacher->id}}">{{$course->teacher->name}}</a></td>
                        <td>{{$course->pivot->fee}}원</td>
                      </tr>
                    @endforeach
                  </table>
                  <div class="panel-footer pull-right">
                      <a href="/student/course/create/{{$student->id}}">강좌추가하기</a>
                  </div>
                </div>

              </div>
            </div>

          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading"><h4>{{$student->name}} 성적</h4></div>
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
