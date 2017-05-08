@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" class="content-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <h1>수업등록</h1>
                <hr>
                <form action="/course" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
                        </div>
                    </div>
                    <select name="semester_id" class="form-control" id="course-semester-create-select">
                        @foreach($semesters as $semester)
                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                        @endforeach
                    </select>
                    <select name="teacher_id" class="form-control" id="course-teacher-select">
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
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
            $('#course-semester-create-select').select2();
            $('#course-semester-create-select').select2().maximizeSelect2Height();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#course-teacher-select').select2();
            $('#course-teacher-select').select2().maximizeSelect2Height();
        });
    </script>
@endsection
