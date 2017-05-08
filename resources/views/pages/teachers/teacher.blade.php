@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" class="content-margin">
    <div class="container-fluid">
      <div class="submit-btn">
          <a href="/teacher/create"><button class="btn btn-default btn-block">강사등록</button></a>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="teacher-table" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                    <tr>
                        <th>이름</th>
                        <th>등록일</th>
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
                    @foreach($teachers as $teacher)
                        <tr>

                            <td>{{$teacher->name}}</td>
                            <td>
                                {{$teacher->created_at->format('Y-m-d')}}

                            </td>
                            <td>
                                {{$teacher->updated_at->format('Y-m-d')}}

                            </td>
                            <td>
                                <a href="/teacher/{{$teacher->id}}"><button class="btn btn-success">자세히</button>
                                <a href="/teacher/{{$teacher->id}}/edit"><button class="btn btn-default">수정</button></a>

                                <form class="form-inline" action="/teacher/{{$teacher->id}}" method="post">
                                    {{method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger">퇴사</button>
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
