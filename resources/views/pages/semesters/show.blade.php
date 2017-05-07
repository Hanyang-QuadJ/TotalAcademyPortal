@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$semester->name}} 상세정보</h2>

            <hr>
            <h3>강좌목록</h3>
            <div class="row">
                <div class="col-lg-12">
                    <table id="semester-showtable" class="table table-striped table-bordered" cellspacing="0">
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
                        @foreach($semester->courses as $course)
                            <tr>

                                <td>{{$course->name}}</td>
                                <td>
                                    {{$course->created_at}}

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

@section('script')
    <script>
        $(document).ready(function() {
            $('#semester-showtable').DataTable();
        } );
    </script>
    @endsection
