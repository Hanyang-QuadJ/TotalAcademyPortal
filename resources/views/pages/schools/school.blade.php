@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" style="margin-top: 50px;">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1>학교등록</h1>
                    <hr>
                    <form action="/school" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" placeholder="학교를 입력하세요">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">등록</button>
                    </form>
                    <br>
                    <table id="school-table" class="table table-striped table-bordered" cellspacing="0">
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
                        @foreach($schools as $school)
                            <tr>

                                <td>{{$school->name}}</td>
                                <td>
                                    {{$school->created_at->format('Y-m-d')}}

                                </td>
                                <td>
                                    <a href="/school/{{$school->id}}"><button class="btn btn-success">자세히</button></a>
                                    <a href="/school/{{$school->id}}/edit">
                                        <button class="btn btn-default">수정</button>
                                    </a>
                                    <form class="form-inline" action="/school/{{$school->id}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">삭제</button>
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
