@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$teacher->name}} 상세정보</h2>
            <hr>
            <div class="row">
                <label>H.P</label><br>
                <span>{{$teacher->teacherPhone}}</span><br>
                <label>생년월일</label><br>
                <span>{{$teacher->dob}}</span><br>
                <label>주소</label><br>
                <span>{{$teacher->address}}</span><br>
                <label>특이사항</label><br>
                <span>{{$teacher->memo}}</span><br>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">{{$teacher->name}} 담당강좌</h4></div>
                    <!-- Table -->
                    <table class="table">
                        <tr>
                            <th>학기</th>
                            <th>강좌</th>
                        </tr>
                        @foreach($teacher->courses->sortBy('name') as $course)
                            <tr>
                                <td><a href="/semester/{{$course->semester->id}}">{{$course->semester->name}}</a></td>
                                <td><a href="/course/{{$course->id}}">{{$course->name}}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
        </div>

    </div>
@endsection
