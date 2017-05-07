@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" style="margin-top: 50px;">
        <div class="container-fluid">
            <div class="submit-btn">
                <a href="/semester/create">
                    <button class="btn btn-default btn-block">학기등록</button>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                            <tr>

                                <td>{{$semester->name}}</td>
                                <td>
                                    {{$semester->created_at}}

                                </td>
                                <td>
                                    <button class="btn btn-success">자세히</button>
                                    <a href="/semester/{{$semester->id}}/edit">
                                        <button class="btn btn-default">수정</button>
                                    </a>
                                    <form class="form-inline" action="/semester/{{$semester->id}}" method="post">
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
