@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>{{$teacher->name}} 상세정보</h2>
            <hr>
            <h3>담당강좌</h3>
            @foreach($teacher->courses as $course)
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">{{$course->semester->name}}</div>
                        <div class="panel-body">
                            {{$course->name}}
                        </div>

                    </div>
                </div>
            @endforeach



        </div>
    </div>
@endsection
