@extends('layouts.app')
@section('headers')

    <title>Gestionnaire Register</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>Gestionnaire Register</h4>
                <hr>
                <form method="POST" action="{{ route('gestionnaire.create') }}" autocomplete="off">
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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom" placeholder="Enter your prenom"
                            value="{{ old('prenom') }}">
                        <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username"
                            value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="region">region</label>
                        <input type="text" class="form-control" name="region" placeholder="Enter your region"
                            value="{{ old('region') }}">
                        <span class="text-danger">@error('region'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="numero_de_telephone">numero_de_telephone</label>
                        <input type="text" class="form-control" name="numero_de_telephone"
                            placeholder="Enter your numero_de_telephone" value="{{ old('numero_de_telephone') }}">
                        <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="adresse">adresse</label>
                        <input type="text" class="form-control" name="adresse"
                            placeholder="Enter your adresse" value="{{ old('adresse') }}">
                        <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address"
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password"
                            value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="password-confirm"
                            placeholder="Enter confirm password" value="{{ old('password-confirm') }}">
                        <span class="text-danger">@error('password-confirm'){{ $message }} @enderror</span>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Register</button>
                    </div>
                    <br>
                    <a href="{{ route('gestionnaire.login') }} " class="link-secondary">J'ai déja un compte</a>

                </form>
            </div>
        </div>
    </div>
@endsection
