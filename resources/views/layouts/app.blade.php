<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('css')
    @yield('js')
    <style>
    .navbar-dark-custom{
        background-color:#202C93 !important;}
    .navbar-toggler:focus{outline:none;}
    .bg-dark{background:#FFFFFF}
    nav a {font-size:18px;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md {{ 'navbar-dark-custom bg-dark' }} shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/fintek.jpg') }}" width="110" alt="fintek" />
                </a>
                <button class="navbar-toggler rounded-0 pr-0" type="button" data-toggle="collapse" data-target="#nav">
                    <i class="fas fa-bars text-muted"></i>
                </button>
                <div class="collapse navbar-collapse" id="nav">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav ml-auto">
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
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                        <img src="{{ asset('img/users/'.(Auth::user()->photo == '' ? 'noimage.jpg' : Auth::user()->photo)) }}" width="35" alt="{{ Auth::user()->name }}" class="rounded-circle"> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">{{ __('Update Profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">{{ __('Show Profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 h-100">
            @yield('content')
        </main>
        <footer class="text-center text-muted">
            Fintek© <?php echo date("Y"); ?> Copyright.
        </footer>
    </div>
    @yield('jsfooter')
</body>
</html>