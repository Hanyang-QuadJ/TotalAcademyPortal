@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" class="content-margin">
    <div class="container-fluid">
          <div class="submit-btn">
              <a href="/student/create"><button class="btn btn-default btn-block">학생등록</button></a>
          </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="student-table" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                    <tr>
                        <th>이름</th>
                        <th>등록날짜</th>
                        <th>최종수정일</th>
                        <th>관리</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>이름</th>
                        <th>등록날짜</th>
                        <th>최종수정일</th>
                        <th>관리</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($students as $student)
                        <tr>

                            <td>{{$student->name}}</td>
                            <td>
                                {{$student->created_at->format('Y-m-d')}}

                            </td>
                            <td>
                                {{$student->updated_at->format('Y-m-d')}}

                            </td>
                            <td>
                                <a href="/student/{{$student->id}}"><button class="btn btn-success">자세히</button></a>
                                <a href="/student/{{$student->id}}/edit"><button class="btn btn-default">수정</button></a>
                                <button class="btn btn-danger">퇴원</button>
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
