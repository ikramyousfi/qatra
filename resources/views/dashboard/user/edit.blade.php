@extends('layouts.app')
@section('headers')
    <title>Profil du donneur | Modifier</title>
@endsection

@section('content')
    <div class="pt-2">

        <h3 style="text-align: center">Modifier vos informations</h3>
        <br>
        @if (Session::get('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <form method="POST" action="update" enctype="multipart/form-data" style="margin-left:37%" autocomplete="off">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nom </label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name"
                    style="width: 400px; height:35px" value="{{ old('name') ?? Auth::user()->name }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom </label>
                <input type="text" class="form-control" name="prenom" placeholder="Enter your prenom"
                    style="width: 400px; height:35px" value="{{ old('prenom') ?? Auth::user()->prenom }}">
                <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username"
                    style="width: 400px; height:35px" value="{{ old('username') ?? Auth::user()->username }}">
                <span class="text-danger">@error('username'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="region">Région </label>
                <input type="text" class="form-control" name="region" placeholder="Enter your region"
                    style="width: 400px; height:35px" value="{{ old('region') ?? Auth::user()->region }}">
                <span class="text-danger">@error('region'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="region">Groupe sanguin </label>
                <input type="text" class="form-control" name="groupe_sanguin" placeholder="Enter your groupe_sanguin"
                    style="width: 400px; height:35px" value="{{ old('groupe_sanguin') ?? Auth::user()->groupe_sanguin }}">
                <span class="text-danger">@error('groupe_sanguin'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="numero_de_telephone">Numéro de téléphone </label>
                <input type="text" class="form-control" name="numero_de_telephone" style="width: 400px; height:35px"
                    placeholder="Enter your numero_de_telephone"
                    value="{{ old('numero_de_telephone') ?? Auth::user()->numero_de_telephone }}">
                <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="name">Adresse </label>
                <input type="text" class="form-control" name="adresse" placeholder="Entre votre adresse"
                    style="width: 400px; height:35px" value="{{ old('adresse') ?? Auth::user()->adresse }}">
                <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
            </div>

            <div class="form-group">
                <label for="image">Photo de profil: </label>
                <input type="file" class="form-control form-control-file" style="width: 400px" id="image" name="image">
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="margin-left:17%;background-color: #404040">Mettre à
                jour</button>
        </form>
    </div>
@endsection
