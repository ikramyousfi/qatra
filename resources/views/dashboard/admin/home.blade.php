@extends('layouts.app')

@section('headers')
    <title>Profile | Home</title>
@endsection

@section('content')
{{-- 
    <div id="mySidenav" class="sidenav">

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

    <br><br>
    <h4 style="margin-left:55%;">Admin Dashboard</h4>
    <hr>

    <form action="{{ route('admin.update') }}" method="post" style="margin-left:50%">

        @if (Session::get('message'))
            <span class="alert alert-success">
                {{ Session::get('message') }}
            </span>
            <br>
        @endif

        @csrf
        @method('PUT')
        <div class="form-group col-4 mt-3">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" style="width: 400px; height:50px"
                value="{{ Auth::guard('admin')->user()->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" style="width: 400px; height:50px"
                value="{{ Auth::guard('admin')->user()->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" class="form-control" name="phone" id="phone" style="width: 400px; height:50px"
                value="{{ Auth::guard('admin')->user()->phone }}">
        </div>
        <br><br>
        <button type="submit" class="btn btn-success" style="margin-left:15%;background-color: #404040">Update</button>

    </form>

    @endsection
