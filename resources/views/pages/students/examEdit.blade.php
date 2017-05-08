@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>점수 수정</h1>
                    <hr>
                    <form method="post" action="/student/exam/{{$student->id}}/{{$exam->id}}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="score" value="{{$score}}" class="form-control"
                                       placeholder="점수"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">수정</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
