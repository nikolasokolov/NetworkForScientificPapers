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
<body style="background-color: rgba(232,232,232,0.46)">
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
                    <a class="navbar-brand"href="{{ url('/categories') }}">Network For Scientific Papers</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="font-size: 15px;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}" style="margin-right: 20px;"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                     Login</a></li>
                            <li><a href="{{ route('register') }}" style="margin-right: 20px;"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                     Register</a></li>
                        @else
                            <li><a href="{{ route('categories.index') }}" style="margin-right: 20px;"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li><a href="{{ route('users.index') }}" style="margin-right: 20px;"><i class="fa fa-bars" aria-hidden="true"></i> My Articles</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" style="margin-right: 20px;" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <form action="/search/user" class="navbar-form" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" placeholder="Search users">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                @include('partials.success')
                @include('partials.errors')
                @yield('content')
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
