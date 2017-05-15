@extends('layouts.app')
@section('content')
    <div id="page-content-wrapper" class="" style="margin-top: 50px;">
        <div class="container-fluid">
            <h3>히스토리</h3>
        </div>
        @foreach($histories as $history)
            <span>{{$history->name}}</span><p>{{$history->created_at}}</p><br>
            @endforeach

    </div>
@endsection
