@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>학생정보수정</h1>
                    <hr>
                    <form method="post" action="/student/{{$student->id}}">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" value="{{$student->name}}" class="form-control" placeholder="name"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">수정</button>
                    </form>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div>
            </div>
        </div>
    </div>

    @endsection