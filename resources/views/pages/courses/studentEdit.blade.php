@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>수강료 수정</h2>



                <label>수강료</label>
            <form method="post" action="/course/student/{{$course->id}}/{{$student->id}}">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <input class="form-control" name="fee" value="{{$fee}}" type="text" placeholder="수강료">
                <button class="btn btn-primary" type="submit">제출</button>


</form>
        </div>
    </div>
@endsection
