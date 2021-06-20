<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="icon" href=" {{ asset('photo/blood-donation.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
    <title>Inscription</title>


</head>
<body>
<nav class="navbar navbar-expand-lg ">
    <nav class="navbar">
        <div class="container">
            <a class=" navbar-brand" href="#">
                <img class="Qatra-img" src="{{ asset('photo/logo.ico') }}" alt="img" width="150" height="150">
            </a>
        </div>
    </nav>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-togler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class=" nav-link"  href="../HTML/Page d'accueil.html">Acceuil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../HTML/A propos.html">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contactez-nous</a>
            </li>
        </ul>
        <div class="bouton">
            <button type="button" class="btn btn-outline-light"><a href="/choix">S'inscrire</a></button>
            <button type="button" class="btn btn-outline-light">Connexion</button>
        </div>
    </div>
    </div>
</nav>

<div class="content">
    <h2>Inscrivez-vous</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>User Register</h4><hr>
{{--                <form action="{{ route('create') }}" method="post" autocomplete="off">--}}
{{--                    @if (Session::get('success'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{ Session::get('success') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if (Session::get('fail'))--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            {{ Session::get('fail') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    @csrf--}}
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter full username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary"><a href="{{ route('choice') }}">Continue</a></button>
                    </div>
                    <br>
                    <a href="{{ route('login') }}">I already have an account</a>
{{--                </form>--}}
            </div>
        </div>
    </div>



</div>

</body>
</html>
