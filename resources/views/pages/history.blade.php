@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h3>히스토리</h3>
        </div>
        @foreach($histories as $history)
            @if($history->type =="삭제")
                {{$history->subject}}님이
                {{$history->object_name}}
                학생을 {{$history->type}}했습니다.<br/>

                @elseif($history->type =="강좌 등록")
                {{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                학생을 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌에 등록했습니다.<br/>

                @elseif($history->type =="수강료 수정")
                {{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                학생의 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌 수강료를 수정했습니다.<br/>

                @elseif($history->type =="수강 취소")
                {{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                학생을 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌에서 수강 취소시켰습니다.<br/>

                @elseif($history->type =="전반")
                {{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                학생을 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌에서 <a href="/{{$history->object_type2}}/{{$history->object_id3}}">{{$history->object_desc2}}</a>으로 전반처리 하였습니다.
            @else
                {{$history->subject}}님이
                <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                학생을 {{$history->type}}했습니다.<br/>



            @endif
        @endforeach

    </div>
@endsection
