@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>강좌 이동</h2>
            <form action="/student/course/transferUpdate/{{$student->id}}/{{$course->id}}" method="post">
                {{method_field('PUT')}}
                {{ csrf_field() }}

                <select name="course" class="form-control" id="student-courseCreate1">
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

                <input class="form-control" name="fee" type="text">
                <button class="btn btn-primary" type="submit">제출</button>
            </form>


        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#student-courseCreate1').select2();
            $('#student-courseCreate1').select2().maximizeSelect2Height();
        });
    </script>
@endsection
