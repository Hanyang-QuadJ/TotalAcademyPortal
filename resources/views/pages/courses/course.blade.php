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
                <div class="col-lg-4">
                    <h1>학기등록</h1>
                    <hr>
                    <form action="/semester" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">등록</button>
                    </form>
                </div>

            </div>
            <div class="submit-btn">
                <a href="/course/create">
                    <button class="btn btn-default btn-block">강좌등록</button>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <table id="semester-table" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                        <tr>
                            <th>이름</th>
                            <th>등록날짜</th>
                            <th>관리</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>이름</th>
                            <th>등록날짜</th>
                            <th>관리</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($semesters as $semester)
                            <tr class="semester_row" id="{{$semester->id}}">

                                <td>{{$semester->name}}</td>
                                <td>
                                    {{$semester->created_at->format('Y-m-d')}}

                                </td>
                                <td>

                                    <a href="/semester/{{$semester->id}}/edit">
                                        <button class="btn btn-default">수정</button>
                                    </a>
                                    <form class="form-inline" action="/semester/{{$semester->id}}" method="post">
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
                <div class="col-lg-7">
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
                        <tbody id="course-table-tbody">
                        @foreach($courses as $course)
                            <tr>

                                <td>{{$course->name}}</td>
                                <td>{{$course->fee}}</td>
                                <td>
                                    {{$course->created_at->format('Y-m-d')}}

                                </td>
                                <td>
                                    <a href="/course/{{$course->id}}">
                                        <button class="btn btn-success">자세히</button>
                                    </a>

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
    <script>
        $(document).ready(function () {
            $( ".semester_row" ).click(function(event) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var semester = event.target.parentNode;
                $("tr").css('backgroundColor','');
                semester.style.backgroundColor = 'green';
                $.ajax({
                    data: {_token: CSRF_TOKEN},
                    type: "POST",
                    dataType: 'JSON',
                    url: "/data/course/bysemester/"+semester.id,
                    success: function (response) {
                        var courses = response;
                        $("#course-table-tbody").empty();
                        for(var i=0;i<courses.length;i++)
                        {
                            var name = $("<td></td>").append(response[i].name);
                            var fee = $("<td></td>").text(response[i].fee);
                            var created_at = $("<td></td>").text(response[i].created_at);
                            var row = $("<tr></tr>");
                            var detail_a = $("<a></a>").attr({href:"/course/"+response[i].id});
                            var detail_btn = $("<button></button>").text("자세히");
//                            var delete_form = $("<form></form>").text("\{\!\!method_field('DELETE')\!\!\}");
//                            var delete_submit = $("<button></button>").text("삭제");
                            var manage = $("<td></td>").append(detail_a.append(detail_btn));
                            detail_btn.attr({class:"btn btn-success"});
                            row.append(name, fee, created_at,manage);
                            $("#course-table-tbody").append(row);
                            $('#course-table').DataTable();
                        }

                    },
                    error: function (response) {
                        console.log('Error:', response);
                    }
                });

            });
        });
    </script>
@endsection
