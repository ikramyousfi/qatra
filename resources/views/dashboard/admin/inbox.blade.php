{{-- <!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('photo/blood-donation.png') }}">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>

<body> --}}
@extends('layouts.app')

@section('headers')
    <title>Home</title>
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
@endsection

@section('content')


    {{-- <div id="mySidenav" class="sidenav">

        <a><img class="Qatra-img" src="{{ asset('photo/logo.ico') }}" alt="img" width="170" height="170"></a>
        <a href="/">Accueil</a>
        <a href="{{ route('admin.home') }}">Profile</a>
        <a href="{{ route('admin.messages') }}">Mes messages </a>
        <a href="{{ route('admin.userlist') }}">liste des donneurs</a>
        <a href="{{ route('admin.gslist') }}">Liste des Gestionnaires </a>
        </form>
        <a href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">
            @csrf
        </form>
    </div> --}}
    <div class="container p-5">
        <div class="card" style="width: unset;">
            <div class="card-body">
                <h5 class="card-title">From: {{$data[0]->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$data[0]->email}}</h6>
                <p class="card-text">{{$data[0]->message}}</p>
                {{-- <a href="#" class="card-link">Next</a>
                <a href="#" class="card-link">Previousk</a> --}}
            </div>
        </div>
    </div>

@endsection
{{-- </body>

</html> --}}
