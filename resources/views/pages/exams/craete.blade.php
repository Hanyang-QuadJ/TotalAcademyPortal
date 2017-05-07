@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper" class="my_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>시험등록</h1>
                    <hr>
                    <form action="/exam" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">등록</button>
                    </form>

                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
