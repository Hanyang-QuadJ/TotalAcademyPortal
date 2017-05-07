@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <div class="submit-btn">
                <a href="/course/create">
                    <button class="btn btn-default btn-block">수업등록</button>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                                    {{$course->created_at->format('Y-m-d')}}

                                </td>
                                <td>
                                    <a href="/course/{{$course->id}}"><button class="btn btn-success">자세히</button></a>
                                    <a href="/course/{{$course->id}}/edit">
                                        <button class="btn btn-default">수정</button>
                                    </a>
                                    <form class="form-inline" action="/course/{{$course->id}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">퇴원</button>
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
