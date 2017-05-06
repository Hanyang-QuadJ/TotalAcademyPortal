@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="my_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>수업페이지입니다.</h1>
                    <table id="course-table" class="table table-striped table-bordered" cellspacing="0">
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
                        @foreach($courses as $course)
                            <tr>

                                <td>{{$course->name}}</td>
                                <td>
                                    {{$course->created_at}}

                                </td>
                                <td>
                                    <button class="btn btn-success">자세히</button>
                                    <a href="/course/{{$course->id}}/edit"><button class="btn btn-warning">수정</button></a>
                                    <form action="/course/{{$course->id}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">퇴원</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <a href="/course/create"><button class="btn btn-primary btn-block">수업등록</button></a>
                    </div>
                    <hr>


                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
