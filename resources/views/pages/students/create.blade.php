@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h1>학생등록</h1>
                    <hr>
                    <form action="/student" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
                            </div>
                        </div>


                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                            <input type="text" name="school" class="form-control" placeholder="학교를 입력하세요">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-cubes"></i></div>
                            <input type="text" name="class" class="form-control" placeholder="게열을 입력하세요">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-question-circle-o"></i></div>
                            <input type="text" name="reason" class="form-control" placeholder="입학동기를 입력하세요">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                            <input type="text" name="parentPhone" class="form-control" placeholder="부모님 휴대폰 번호를 입력하세요">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                            <input type="text" name="studentPhone" class="form-control" placeholder="학생 휴대폰 번호를 입력하세요">
                        </div>
                        <select name="course" class="form-control" id="student-courseCreate">
                            @foreach($semesters as $semester)
                                <optgroup label="{{$semester->name}}">
                                    @foreach($semester->courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <label>수강료</label>


                        <input class="form-control" id="fee" name="fee" type="text">
                        <button type="submit" class="btn new-btn">등록</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#student-courseCreate').select2();
            $('#student-courseCreate').select2().maximizeSelect2Height();
            $('#student-courseCreate').select2({
                placeholder: "반을 등록하세요.", allowClear: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            var url = "/data/course/fee";

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                data: {_token: CSRF_TOKEN},
                type: "POST",
                dataType: 'JSON',
                url: url+"/"+$("#student-courseCreate").val(),
                success: function (response) {
                    $("#fee").val(response.fee);
                },
                error: function (response) {
                    console.log('Error:', response);
                }
            });
            //display modal form for task editing
            $('#student-courseCreate').change(function () {
                $.ajax({
                    data: {_token: CSRF_TOKEN},
                    type: "POST",
                    dataType: 'JSON',
                    url: url+"/"+$(this).val(),
                    success: function (response) {
                        $("#fee").val(response.fee);
                    },
                    error: function (response) {
                        $("#fee").val(0);
                    }
                });
            });
        });
    </script>
@endsection
