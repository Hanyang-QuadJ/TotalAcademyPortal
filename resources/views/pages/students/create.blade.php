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
                        <select name="course" class="form-control" id="student-course-select2" data-placeholder="반을 선택하세요">
                            @foreach($semesters as $semester)
                                <optgroup label="{{$semester->name}}">
                                    @foreach($semester->courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" name="fee" class="form-control" placeholder="수강료를 입력하세요">
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
            $('#student-course-select2').select2();
            $('#student-course-select2').select2().maximizeSelect2Height();
        });
    </script>
@endsection
