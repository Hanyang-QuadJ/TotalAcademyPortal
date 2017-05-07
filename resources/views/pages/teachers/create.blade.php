@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" class="content-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <h1>강사등록</h1>
                <hr>
                <form action="/teacher" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" name="name" class="form-control" placeholder="이름을 입력하세요">
                        </div>
                    </div>
                    <button type="submit" class="btn new-btn">등록</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
