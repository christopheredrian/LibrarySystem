<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CVCITC Library Attendance</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('css')
    <style>
        body {
            padding-top: 15vh;
        }

        nav.navbar.navbar-default.navbar-fixed-top {
            background-color: #2c8d01 !important;
        }

        .navbar-default .navbar-nav > li > a, .navbar-default .navbar-text {
            color: white;
        }

        .navbar-default .navbar-brand {
            color: white !important;
        }

        .panel-default > .panel-heading {
            color: white;
            background-color: #4F463B;
            border-color: #d3e0e9;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: white;
        }

        button.navbar-toggle.collapsed:hover {
            background-color: #4F463B;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    CVCITC Library Attendance
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
                        {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout ({{ \Illuminate\Support\Facades\Auth::user()->username }})
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                        {{--aria-expanded="false">--}}
                        {{--{{ Auth::user()->username }} <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li>--}}
                        {{--<a href="{{ route('logout') }}"--}}
                        {{--onclick="event.preventDefault();--}}
                        {{--document.getElementById('logout-form').submit();">--}}
                        {{--Logout--}}
                        {{--</a>--}}

                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                        {{--style="display: none;">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--</form>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('js')


</body>
</html>
