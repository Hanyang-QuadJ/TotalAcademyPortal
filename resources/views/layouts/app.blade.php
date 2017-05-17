<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>종합학원포털::TAP</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/1ea6704a44.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>
     google.charts.load('current', {'packages': ['geochart']});
     google.charts.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['City',   'Population', 'Area'],
        ['Busan',      2761477,    1285.31],
        ['Seoul', 2761477, 1234.2]
      ]);

      var options = {
        region: 'KR',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
</head>
<body>
    <header class="header">
      <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#menu-toggle" class="navbar-brand" id="menu-toggle">
                      <img src="{{ asset('image/logo.png') }}" alt="Total Academy Portal" height="50px;" width="auto;">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    @forelse($histories as $history)
                                        @if($history->type =="삭제")
                                            <span class="history-block">{{$history->subject}}님이
                                            {{$history->object_name}}
                                            학생을 {{$history->type}}했습니다.</span class="history-block">
                                        @elseif($history->type =="강좌 등록")
                                            <span class="history-block">{{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                                            학생을 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌에 등록했습니다.</span class="history-block">
                                        @elseif($history->type =="수강료 수정")
                                            <span class="history-block">{{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                                            학생의 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌 수강료를 수정했습니다.</span class="history-block">
                                        @elseif($history->type =="수강 취소")
                                            <span class="history-block">{{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                                            학생을 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌에서 수강 취소시켰습니다.</span class="history-block">
                                        @elseif($history->type =="전반")
                                            <span class="history-block">{{$history->subject}}님이 <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                                            학생을 <a href="/{{$history->object_type2}}/{{$history->object_id2}}">{{$history->object_desc}}</a> 강좌에서 <a href="/{{$history->object_type2}}/{{$history->object_id3}}">{{$history->object_desc2}}</a>강좌로 전반처리 하였습니다.</span class="history-block">
                                        @else
                                            <span class="history-block">{{$history->subject}}님이
                                            <a href="/{{$history->object_type}}/{{$history->object_id}}">{{$history->object_name}}</a>
                                            학생을 {{$history->type}}했습니다.</span class="history-block">
                                        @endif
                                    @empty 
                                        <span>기록된 히스토리가 없습니다</span>
                                    @endforelse
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
      </header>
      <section class="main">
        @if (Auth::check())
          <div id="wrapper" class="toggled">
            @include('layouts.sidebar')
            @yield('content')
          </div>
        @else
          <div id="wrapper">
            @include('layouts.sidebar')
            @yield('content')
          </div>
        @endif
      </section>
    </div>

    @include('layouts.commonScript')
    @yield('script')
</body>
</html>
