@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$exam->name}} 상세정보</h2>

            <hr>
            <h3>학생목록</h3>
            <div class="row">
                <div class="col-lg-12">
                    <a href="/exam/student/create/{{$exam->id}}"><button class="btn btn-block btn-primary">학생추가</button></a><br>
                    <table id="exam-showtable" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                        <tr>
                            <th>이름</th>
                            <th>점수</th>
                            <th>점수관리</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>이름</th>
                            <th>점수</th>
                            <th>점수관리</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($exam->students as $student)
                            <tr>

                                <td>{{$student->name}} <a href="/student/{{$student->id}}"><button class="btn btn-success pull-right">자세히</button></a></td>
                                <td>
                                    {{$student->pivot->score}}점

                                </td>
                                <td>
                                    <a href="/exam/student/edit/{{$exam->id}}/{{$student->id}}"><button class="btn btn-warning">점수수정</button></a>
                                    <form class="form-inline"
                                          action="/exam/student/{{$exam->id}}/{{$student->id}}" method="post">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">시험삭제</i>
                                        </button>
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
            $('#exam-showtable').DataTable();
        } );
    </script>

    @endsection

