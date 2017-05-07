@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="my_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
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
                        <select name="courses[]" class="form-control" id="student-course-select2" data-placeholder="반을 선택하세요" multiple="multiple">
                            @foreach($semesters as $semester)
                                <optgroup label="{{$semester->name}}">
                                    @foreach($semester->courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>


                        <button type="submit" class="btn btn-primary">등록</button>
                    </form>

                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
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
