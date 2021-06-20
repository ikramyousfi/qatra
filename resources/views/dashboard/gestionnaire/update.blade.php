@extends('layouts.app')

@section('headers')
    <title>Gestionnaire Dashboard | Home</title>
@endsection

@section('content')
    <h3 style="margin-left: 40%">Modifier vos informations</h3>
    <br>
    @if (Session::get('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <form action="{{route('gestionnaire.update')}}" method="post" style="margin-left:37%">
        @csrf
        @method('PUT')
        <div class="form-group col-4" >
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->name }}">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->prenom }}">
        </div>
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="username" id="username" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->username }}">
        </div>
        <div class="form-group">
            <label for="region">Région</label>
            <input type="text" class="form-control" name="region" id="region" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->region }}">
        </div>
        <div class="form-group">
            <label for="numero_de_telephone">Numéro de téléphone</label>
            <input type="text" class="form-control" name="numero_de_telephone" id="numero_de_telephone" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->numero_de_telephone }}">
        </div>

        <div class="form-group">
            <label for="numero_de_hopital">Numéro de l'hopital</label>
            <input type="text" class="form-control" name="numero_de_hopital" id="numero_de_hopital" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->numero_de_hopital }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" style="width: 400px; height:35px" value="{{ Auth::guard('doctor')->user()->email }}">
        </div>

        <br><br>
        <button type="submit" class="btn btn-success" style="margin-left:17%;background-color: #404040">Update</button>
    </form>


@endsection
