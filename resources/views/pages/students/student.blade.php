@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <div class="submit-btn">
                <a href="/student/create">
                    <button class="btn btn-default btn-block">학생등록</button>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="student-table" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                        <tr>
                            <th>이름</th>
                            <th>학교</th>
                            <th>계열</th>

                            <th>부모HP</th>
                            <th>학생HP</th>

                            <th>관리</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>이름</th>
                            <th>학교</th>
                            <th>계열</th>

                            <th>부모HP</th>
                            <th>학생HP</th>

                            <th>관리</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($students as $student)
                            <tr>

                                <td>{{$student->name}}</td>
                                <th>{{$student->school}}</th>
                                <th>{{$student->class}}</th>

                                <th>{{$student->parentPhone}}</th>
                                <th>{{$student->studentPhone}}</th>

                                <td>
                                    <a href="/student/{{$student->id}}">
                                        <button class="btn btn-success">자세히</button>
                                    </a>

                                    <form class="form-inline" action="/student/{{$student->id}}" method="post">
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
