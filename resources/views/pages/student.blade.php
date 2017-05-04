@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" class="" style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>학생페이지입니다.</h1>
                <table id="student-table" class="table table-striped table-bordered" cellspacing="0">
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
                    @foreach($students as $student)
                        <tr>

                            <td>{{$student->name}}</td>
                            <td>
                                {{$student->created_at}}

                            </td>
                            <td>
                                <button class="btn btn-success">자세히</button>
                                <button class="btn btn-default">수정</button>
                                <button class="btn btn-danger">퇴원</button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <h2>학생등록</h2>
                <div class="col-md-12">

                    <form action="/student" method="post">
                        {{csrf_field()}}

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="name" class="form-control" id="" placeholder="이름을 입력하세요">
                                </div>
                            </div>

                        <button class="btn btn-block" type="submit">등록</button>

                    </form>
                </div>

                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
    </div>
</div>
@endsection
