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
<<<<<<< .merge_file_a11796
<<<<<<< .merge_file_a10672
                    
=======
>>>>>>> .merge_file_a06240
=======
>>>>>>> .merge_file_a04780
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
<<<<<<< .merge_file_a11796
<<<<<<< .merge_file_a10672
                            <li><a href="{{ route('login') }}">Вхід</a></li>
                            {{-- <li><a href="{{ route('register') }}">Реєстрація</a></li> --}}
                        @else
                            @if ( Auth::user()->is_admin )
                                <li><a href="{{ route('admin') }}" >Адмінка</a></li>
                            @endif
=======
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
>>>>>>> .merge_file_a06240
=======
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
>>>>>>> .merge_file_a04780
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
<<<<<<< .merge_file_a11796
<<<<<<< .merge_file_a10672
                                            Вихід
                                        </a>                                        
=======
                                            Logout
                                        </a>
>>>>>>> .merge_file_a06240
=======
                                            Logout
                                        </a>
>>>>>>> .merge_file_a04780

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
<<<<<<< .merge_file_a11796
<<<<<<< .merge_file_a10672
        
=======
>>>>>>> .merge_file_a06240
=======
>>>>>>> .merge_file_a04780
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<<<<<<< .merge_file_a11796
<<<<<<< .merge_file_a10672
    <script  src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script defer src="{{ asset('js/font-awesome.js') }}"></script>

    @yield('scripts')

=======
>>>>>>> .merge_file_a06240
=======
>>>>>>> .merge_file_a04780
</body>
</html>
