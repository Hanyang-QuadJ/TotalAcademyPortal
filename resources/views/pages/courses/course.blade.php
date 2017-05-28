@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h1>수업등록</h1>
                    <hr>
                    <form action="/course" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
                            </div>
                        </div>
                        <select name="semester_id" class="form-control" id="course-semester-create-select">
                            @foreach($semesters as $semester)
                                <option value="{{$semester->id}}">{{$semester->name}}</option>
                            @endforeach
                        </select>
                        <select name="teacher_id" class="form-control" id="course-teacher-select">
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="fee" class="form-control" placeholder="수강료 입력하세요">
                            </div>
                        </div>
                        <button type="submit" class="btn new-btn">등록</button>
                    </form>
                </div>
            </div>
            <div class="submit-btn">
                <a href="/course/create">
                    <button class="btn btn-default btn-block">강좌등록</button>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="course-table" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                        <tr>
                            <th>이름</th>
                            <th>수강료</th>
                            <th>등록날짜</th>
                            <th>관리</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>이름</th>
                            <th>수강료</th>
                            <th>등록날짜</th>
                            <th>관리</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>

                                <td>{{$course->name}}</td>
                                <td>{{$course->fee}}</td>
                                <td>
                                    {{$course->created_at->format('Y-m-d')}}

                                </td>
                                <td>
                                    <a href="/course/{{$course->id}}"><button class="btn btn-success">자세히</button></a>

                                    <form class="form-inline" action="/course/{{$course->id}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">삭제</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#course-semester-create-select').select2();
            $('#course-semester-create-select').select2().maximizeSelect2Height();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#course-teacher-select').select2();
            $('#course-teacher-select').select2().maximizeSelect2Height();
        });
    </script>
@endsection
