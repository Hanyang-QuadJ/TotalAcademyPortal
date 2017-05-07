@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" style="margin-top: 50px;">
        <div class="container-fluid">
            <div class="submit-btn">
                <a href="/exam/create">
                    <button class="btn btn-default btn-block">시험등록</button>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="exam-table" class="table table-striped table-bordered" cellspacing="0">
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
                        @foreach($exams as $exam)
                            <tr>

                                <td>{{$exam->name}}</td>
                                <td>
                                    {{$exam->created_at->format('Y-m-d')}}

                                </td>
                                <td>
                                    <a href="/exam/{{$exam->id}}"><button class="btn btn-success">자세히</button></a>
                                    <a href="/exam/{{$exam->id}}/edit">
                                        <button class="btn btn-default">수정</button>
                                    </a>
                                    <form class="form-inline" action="/exam/{{$exam->id}}" method="post">
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
