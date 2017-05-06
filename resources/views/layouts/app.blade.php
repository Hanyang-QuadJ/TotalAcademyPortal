<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>수미사학원관리앱</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    <script src="https://use.fontawesome.com/1ea6704a44.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(".selection").click(function (e) {
      var selected = this.innerText;
      $("#selected").html(selected);
    });
    </script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/maximize-select2-height.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#student-table').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#teacher-table').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#course-table').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#semester-table').DataTable();
        } );
    </script>
    @yield('script')
</body>
</html>
