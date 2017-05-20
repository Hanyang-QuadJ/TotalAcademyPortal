@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$school->name}} 상세정보</h2>

            <hr>
            <h3>강좌목록</h3>
            <div class="row">
                <div class="col-lg-12">
                    <table id="school-showtable" class="table table-striped table-bordered" cellspacing="0">
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
                        @foreach($school->students as $student)
                            <tr>

                                <td>{{$student->name}}</td>
                                <td>
                                    {{$student->created_at}}

                                </td>
                                <td>
                                    <a href="/student/{{$student->id}}"><button class="btn btn-success">자세히</button></a>
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
            $('#school-showtable').DataTable();
        } );
    </script>
@endsection
