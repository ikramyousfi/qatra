@extends('layouts.app')

@section('headers')
    
<title>User Register</title>
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
            <h4 >Entrer vos informations</h4><hr>
               <form  method="POST" action="{{ route('user.create') }}" autocomplete="off">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control " name="name" placeholder="Entrez votre nom" value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                   <div class="form-group">
                       <label for="prenom">Prénom</label>
                       <input type="text" class="form-control " name="prenom" placeholder="Entrez votre prénom" value="{{ old('prenom') }}">
                       <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
                   </div>
                   <div class="form-group">
                       <label for="region">Région</label>
                       <input type="text" class="form-control " name="region" placeholder="Entrez votre prénom" value="{{ old('region') }}">
                       <span class="text-danger">@error('region'){{ $message }} @enderror</span>
                   </div>
                   <div class="form-group">
                       <label for="username">Nom d'utilisateur</label>
                       <input type="text" class="form-control " name="username" placeholder="Entrez votre nom d'utilisateur" value="{{ old('username') }}">
                       <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                   </div>
                   <div class="form-group">
                       <label for="numero_de_telephone">Numero de téléphone</label>
                       <input type="text" class="form-control " name="numero_de_telephone" placeholder="Entrez votre numero de téléphone" value="{{ old('numero_de_telephone') }}">
                       <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
                   </div>

                   <div class="form-group">
                   <label for="groupe_sanguin">Genre</label>
                   <select id="sexe" class="form-select" class="input" name="sexe" required>
                        <option value="">Genre</option>
                        <option value="Femme">Femme</option>
                        <option value="Homme">Homme</option>
                   </select>
                   </div>

                   <div class="form-group">
                        <label for="groupe_sanguin">Groupe sanguin</label>
                        <select id="genre" class="form-select input " name="groupe_sanguin" required>
                            <option value="">Groupe sanguin</option>
                            <option value="Ap">A+</option>
                            <option value="An">A-</option>
                            <option value="Bp">B+</option>
                            <option value="Bn">B-</option>
                            <option value="Op">O+</option>
                            <option value="On">O-</option>
                            <option value="ABp">AB+</option>
                            <option value="ABn">AB-</option>
                        </select>
                     <!--   <span class="text-danger">@error('groupe_sanguin'){{ $message }} @enderror</span> -->
                    </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Entrez votre email" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control " name="password" placeholder="Entrez un mot de passe" value="{{ old('password') }}">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirmer la mot de passe</label>
                    <input type="password" class="form-control" name="password-confirm" placeholder="Comfirmez le mot de passe" value="{{ old('password-confirm') }}">
                    <span class="text-danger">@error('password-confirm'){{ $message }} @enderror</span>
                </div>

            <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary">S'inscrire</button>
                </div>
                    <br>
                    <a href="{{ route('user.login') }} "class="link-secondary">J'ai déja un compte</a>
            </form>
        </div>
    </div>
</div>
@endsection
