@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$course->name}} 상세정보</h2>
            <h4>{{$course->semester->name}}</h4>
            <hr>
            <a href="/course/{{$course->id}}/edit">
                <button class="btn btn-default">수정</button>
            </a>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>수강생 목록</h4>
                        </div>
                        <!-- Table -->
                        <table class="table">
                            <tr>
                                <th>학생</th>
                                <th>수강료</th>
                            </tr>
                            @foreach($course->students->sortBy('name') as $student)
                                <tr>
                                    <td><a href="/student/{{$student->id}}">{{$student->name}}</a></td>
                                    <td>{{$student->pivot->fee}}원</td>
                                    <td>
                                        <a href="/course/student/edit/{{$course->id}}/{{$student->id}}"><button class="btn btn-default">수강료수정</button></a>
                                        <form class="form-inline"
                                              action="/course/student/{{$course->id}}/{{$student->id}}" method="post">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">수강 취소</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="panel-footer pull-right">
                            <a href="/course/student/create/{{$course->id}}">학생추가</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
