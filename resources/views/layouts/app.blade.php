<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('headers')
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="icon" href="{{ asset('photo/blood-donation.png') }}">
    <title>Qatra</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark  sticky-top">
            <div class="container-fluid bg-dark">
                <a class="navbar-brand" href="/">
                    <img class="Qatra-img" src="{{ asset('photo/logo.ico') }}" alt="logo.ico" width="150"
                        height="150" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse  p-2 bg-dark" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apropos') }}">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contactez nous</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::guard('doctor')->check())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    data-bs-toggle="dropdown">
                                    {{ Auth::guard('doctor')->user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"
                                    style="left:-75px ">

                                    <li><a width="20px" class="dropdown-item p-1"
                                            href="{{ route('gestionnaire.home') }}" position="sticky">
                                            Profile
                                        </a></li>

                                    <li><a width="20px" class="dropdown-item p-1"
                                            href="{{ route('gestionnaire.stock') }}" position="sticky">
                                            Stock
                                        </a></li>

                                    <li><a width="20px" class="dropdown-item p-1"
                                            href="{{ route('gestionnaire.update') }}" position="sticky">
                                            Update Profile
                                        </a></li>

                                    <li><a width="20px" class="dropdown-item p-1"
                                            href="{{ route('gestionnaire.notifications') }}" position="sticky">
                                            Notifications
                                        </a></li>

                                    <li><a width="20px" class="dropdown-item p-1"
                                            href="/gestionnaire/full-calendar" position="sticky">
                                            Calendar
                                        </a></li>

                                    <li>
                                    <li><a width="20px" class="dropdown-item p-1"
                                            href="{{ route('gestionnaire.logout') }}" position="sticky" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                            </li>
                    </ul>
                    </li>
                @elseif (Auth::guard('web')->check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                            data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right hamburger" aria-labelledby="navbarDropdownMenuLink"
                            style="left: -80px">
                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('user.home') }}"
                                    position="sticky">
                                    Profile
                                </a></li>

                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('user.notifications') }}"
                                    position="sticky">
                                    Mes Notifications
                                </a></li>

                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('user.calendar') }}"
                                    position="sticky">
                                    Calendar
                                </a></li>

                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('user.edit') }}"
                                    position="sticky">
                                    Edit profile
                                </a></li>

                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('logout') }}"
                                    position="sticky" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>

                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::guard('admin')->check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                            data-bs-toggle="dropdown">
                            {{ Auth::guard('admin')->user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"
                            style="left:-55px ">

                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('admin.home') }}"
                                    position="sticky">
                                    Profile
                                </a></li>
                            <li><a width="20px" class="dropdown-item p-1" href="{{ route('admin.logout') }}"
                                    position="sticky" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>

                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                @else

                    <li class="wow nav-item pt-1 pb-1">
                        <a href="{{ route('choice') }}" class="m-1"><button type="button"
                                class="btn btn-outline-light ">S'inscrire</button></a>
                    </li>

                    <li class="wow nav-item pt-1 pb-1">
                        <a href="{{ route('user.login') }}" class="m-1"><button type="button"
                                class="btn btn-outline-light  ">Connexion</button></a>
                    </li>
                    @endif
                    </ul>
                </div>
            </div>


        </nav>
        <main class="main mb-2">
            @yield('content')
        </main>
    </div>
</body>

</html>
