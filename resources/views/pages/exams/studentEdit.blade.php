@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="content-margin">
        <div class="container-fluid">
            <h2>{{$exam->name}} 에서 {{$student->name}} 점수수정</h2>



            <label>수강료</label>
            <form method="post" action="/exam/student/{{$exam->id}}/{{$student->id}}">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <input class="form-control" name="score" value="{{$score}}" type="text" placeholder="점수">
                <button class="btn btn-primary" type="submit">제출</button>


            </form>
        </div>
    </div>
@endsection


