@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h3>히스토리</h3>
        </div>
        @foreach($histories as $history)
            @if($history->type =="삭제")
                {{$history->subject}}가
                {{$history->object_name}}
                을 {{$history->type}}했습니다.<br/>
            @else
                {{$history->subject}}가
                <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                을 {{$history->type}}했습니다.<br/>
            @endif
        @endforeach

    </div>
@endsection
