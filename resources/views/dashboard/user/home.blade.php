@extends('layouts.app')


@section('headers')
    <title>User | Profile</title>
    <link href="{{ asset('css/pp.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('content')

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ Auth::user()->username }}
                        </h5>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab"
                                    aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="profile-edit-btn">

                        <a href="{{ route('user.edit') }}" class="profile-edit-btn">Edit </a>
                    </button>
                </div>
                {{-- <div class="form-group">
                        <button type="submit" class="btn btn2 btn-secondary">Connexion</button>
                        <a href="{{ route('gestionnaire.update') }}"></a>
                    </div> --}}
            </div>
            <div class="row ">

                <div class="col-md-12 ">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-4">
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Prénom</label>
                                </div>
                                <div class="col-md-4">
                                    <p>{{ Auth::user()->prenom }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Groupe sanguin</label>
                                </div>
                                <div class="col-md-4">
                                    <p>{{ Auth::user()->groupe_sanguin }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-4">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Region</label>
                                </div>
                                <div class="col-md-4">
                                    <p>{{ Auth::user()->region }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Adresse</label>
                                </div>
                                <div class="col-md-4">
                                    <p>{{ Auth::user()->adresse }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
