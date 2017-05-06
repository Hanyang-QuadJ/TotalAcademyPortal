@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" class="" style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
                <div class="col-lg-12">
                    <a href="/student/create"><button class="btn btn-primary btn-block">학생등록</button></a>
                </div>
                <hr>


                
            </div>
        </div>
    </div>
</div>
@endsection
