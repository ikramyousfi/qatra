@extends('layouts.app')

@section('headers')
    <title>admin login | Home</title>
    <link href="{{ asset('css/loginAdmin.css') }}" rel="stylesheet">
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="image" style="width:fit-content">
                <img src="{{ asset('photo/loginPage.png') }}" alt="login" width="450px">
            </div>
            <div class="col-md-4 offset-md-3 login" style="margin-top: 80px;">
                <h3 style="color: #495057  ">Se connecter</h3>
                <hr>
                <form action="{{ route('admin.check') }}" method="post" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Entrez votre Email"
                            value="{{ old('email') }}">
                        <span class="text-danger"> @error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe"
                                value="{{ old('password') }}">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <br>

                            <div class="form-group">
                                <button type="submit" class="btn btn2 btn-secondary">Connexion</button>
                            </div>
                            <br>

                        </form>
                    </div>
                </div>
            </div>

        @endsection
