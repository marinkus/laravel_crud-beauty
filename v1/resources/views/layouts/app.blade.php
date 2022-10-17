<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MAC - Hair Stylist</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navi">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{URL::asset('assets/logo.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if (Auth::user()->role >= 7)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Admin panel
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('post_index') }}"> List of
                                            posts</a>
                                        <a class="dropdown-item" href="{{ route('post_create') }}"> Create post
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @if ($errors->any())

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 m-4">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        @endif

        @if(Session::has('msg'))

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 m-4">
                    <div class="alert alert-success">
                        {{ Session::get('msg')}}
                    </div>

                </div>
            </div>
        </div>

        @endif
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <div class="footer">
        <div class="footer-blocks">
            <img class="footer-element"
                src="{{ URL::asset('assets/cocochoco_BLACK_new_logo_PNG_10.21_f527e903-1206-438e-80cb-96c7613e523b_2752x.webp') }}"
                alt="">
            <img class="footer-element" src="{{ URL::asset('assets/olaplex-vector-logo.png') }}" alt="">
        </div>
        <div class="footer-blocks">
            <a class="footer-element" href="https://ms-my.facebook.com/Viktorija.Macikiene/" target="_blank"><img
                    src="{{ URL::asset('assets/298-2983746_facebook-svg-png-icon-free-download-276959-onlinewebfonts-logo-facebook-cdr.png') }}"
                    alt="Facebook"></a>
            <a class="footer-element" href="https://www.instagram.com/plauku_stiliste_mac/" target="_blank"><img
                    src="{{ URL::asset('assets/169-1696957_instagram-icon-instagram-icon-svg-white.png') }}"
                    alt="Instagram"></a>
        </div>
    </div>
</footer>

</html>
