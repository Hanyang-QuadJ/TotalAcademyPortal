@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>해당강좌학생등록</h2>
            <form action="/course/student/{{$course->id}}" method="post">
                {{ csrf_field() }}
                <select name="student" class="form-control" id="course-studentCreate">


                            @foreach($students as $student)
                                @if($course->students->contains($student))
                                @else()
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endif
                            @endforeach

                </select>
                <label>수강료</label>

                <input class="form-control" name="fee" type="text">
                <button class="btn btn-primary" type="submit">제출</button>
            </form>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#course-studentCreate').select2();
            $('#course-studentCreate').select2().maximizeSelect2Height();
        });
    </script>
@endsection
