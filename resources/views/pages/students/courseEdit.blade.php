@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>수강료 수정</h1>
                    <hr>
                    <form method="post" action="/student/course/{{$student->id}}/{{$course->id}}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="fee" value="{{$course->fee}}" class="form-control"
                                       placeholder="수강료"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">수정</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
