@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>학생정보수정</h1>
                    <hr>
                    <form method="post" action="/student/{{$student->id}}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" value="{{$student->name}}" class="form-control"
                                       placeholder="name"/>
                            </div>
                        </div>
                        <select name="courses[]" class="form-control" id="student-course-select" multiple="multiple">
                            @foreach($semesters as $semester)
                                <optgroup label="{{$semester->name}}">
                                    @foreach($semester->courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">수정</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#student-course-select').select2();
            $('#student-course-select').select2().maximizeSelect2Height();
            $('#student-course-select').select2().val({!! json_encode($student->courses()->allRelatedIds()) !!}).trigger('change');
        });
    </script>
@endsection