<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Boolpress
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- <li><a class="nav-link" href="{{ route('admin.posts.index')}}">Admin Area</a></li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item mx-5">
                                <form class="" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                     <input type="submit" class="btn btn-primary" value="Logout">
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container py-5">
            <div class="row">
                <div class="col-2">
                        <div class="row">
                                <div class="col">
                                    <a href="{{ route('admin.posts.create') }}" class="link-primary mb-5">Aggiungi Post</a>
                                </div>
                        </div>
                            <nav id="sidebarMenu" class="d-md-block bg-light sidebar collapse">
                                    <div class="position-sticky pt-3">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ route('admin.posts.index')}}">
                                                    <i class="bi bi-house mx-2"></i>Dashboard
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.posts.index')}}">
                                                    <i class="bi bi-files mx-2"></i>All Posts
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.posts.user')}}">
                                                    <i class="bi bi-files mx-2"></i>My Posts
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="bi bi-folder-symlink mx-2"></i>Categories
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                </div>
                <div class="col-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
