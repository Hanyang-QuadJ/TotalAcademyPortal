@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>강좌등록</h2>
            <form action="/student/course/{{$student->id}}" method="post">
                {{ csrf_field() }}
                <select name="course" class="form-control" id="student-courseCreate">
                    @foreach($semesters as $semester)
                        <optgroup label="{{$semester->name}}">
                            @foreach($semester->courses as $course)
                                @if($student->courses->contains($course))
                                @else()
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <label>수강료</label>

                <input class="form-control" id="fee" name="fee" type="text">
                <button class="btn btn-primary" type="submit">제출</button>
            </form>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#student-courseCreate').select2();
            $('#student-courseCreate').select2().maximizeSelect2Height();
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
                        console.log('Error:', response);
                    }
                });
            });
        });
    </script>
@endsection
