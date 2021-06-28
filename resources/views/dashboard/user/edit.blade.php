@extends('layouts.app')
@section('headers')
    <title>Edit</title>
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="update" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PATCH')
            <div>
                <h1>Edit profile</h1>
            </div>
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name"
                    value="{{ old('name') ?? Auth::user()->name }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom :</label>
                <input type="text" class="form-control" name="prenom" placeholder="Enter your prenom"
                    value="{{ old('prenom') ?? Auth::user()->prenom }}">
                <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="region">Region :</label>
                <input type="text" class="form-control" name="region" placeholder="Enter your region"
                    value="{{ old('region') ?? Auth::user()->region }}">
                <span class="text-danger">@error('region'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="numero_de_telephone">Numero de telephone :</label>
                <input type="text" class="form-control" name="numero_de_telephone"
                    placeholder="Enter your numero_de_telephone"
                    value="{{ old('numero_de_telephone') ?? Auth::user()->numero_de_telephone }}">
                <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="name">Adresse :</label>
                <input type="text" class="form-control" name="adresse" placeholder="Entre votre adresse"
                    value="{{ old('adresse') ?? Auth::user()->adresse }}">
                <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="prenom">Allergies :</label>
                <input type="text" class="form-control" name="allergies" placeholder="Entrer vos allergies"
                    value="{{ old('allergies') ?? Auth::user()->allergies }}">
                <span class="text-danger">@error('allergies'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="region">Date de naissance :</label>
                <input type="text" class="form-control" name="birthdate" placeholder="Entrer votre date de naissance"
                    value="{{ old('birthdate') ?? Auth::user()->birthdate }}">
                <span class="text-danger">@error('birthdate'){{ $message }} @enderror</span>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save edit</button>
            </div>
            <br>

        </form>
    </div>
@endsection
