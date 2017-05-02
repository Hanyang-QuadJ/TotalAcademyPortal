@extends('layouts.app')

@section('content')
<div id="campus-select">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">학원선택</div>

                    <div class="panel-body">
                        학원을 선택해주세요
                        <br>
                        <br>
                        <!-- Split button -->
                      <div class="btn-group">
                        <button id="selected" type="button" class="btn">수미사 대치동지점</button>
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li class="selection"><a href="#">수미사 대치동지점</a></li>
                          <li class="selection"><a href="#">수미사 해운대지점</a></li>
                          <li class="selection"><a href="#">수미사 청주지점</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
