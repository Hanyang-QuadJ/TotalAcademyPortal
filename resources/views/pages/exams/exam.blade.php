@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="my_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>학기페이지입니다.</h1>
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
                                    {{$exam->created_at}}

                                </td>
                                <td>
                                    <button class="btn btn-success">자세히</button>
                                    <a href="/exam/{{$exam->id}}/edit">
                                        <button class="btn btn-warning">수정</button>
                                    </a>
                                    <form action="/exam/{{$exam->id}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">삭제</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <a href="/exam/create">
                            <button class="btn btn-primary btn-block">시험등록</button>
                        </a>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection