<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< HEAD
=======
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

    @yield('style')
    
>>>>>>> v1.0
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
<<<<<<< HEAD
=======

>>>>>>> v1.0
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
<<<<<<< HEAD
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
=======

                            <li><a href="{{ route('login') }}">Вхід</a></li>
                            {{-- <li><a href="{{ route('register') }}">Реєстрація</a></li> --}}
                        @else
                            @if ( Auth::user()->is_admin )
                                <li><a href="{{ route('admin') }}" >Адмінка</a></li>
                            @endif

>>>>>>> v1.0
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
<<<<<<< HEAD
                                            Logout
                                        </a>
=======

                                            Вихід
                                        </a>                                        

>>>>>>> v1.0

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
<<<<<<< HEAD
=======

>>>>>>> v1.0
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<<<<<<< HEAD
=======

    <script  src="{{ asset('js/jquery-1.12.4.js') }}"></script>
    <script  src="{{ asset('js/jquery-ui.js') }}"></script>
    <script defer src="{{ asset('js/font-awesome.js') }}"></script>

    @yield('scripts')

>>>>>>> v1.0
</body>
</html>
