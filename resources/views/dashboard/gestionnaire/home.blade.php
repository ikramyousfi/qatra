@extends('layouts.app')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('headers')
    <title>Gestionnaire | Profil</title>
    <link href="{{ asset('css/pp.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <!--image-->
                <div class="col-md-4">
                    <div class="profile-img pb-3">
                        <img src="/storage/{{ Auth::user()->image }}" class="rounded-circle"
                            style="height:15rem;width:15rem; c" alt="profile picture" />
                    </div>
                    <br>
                    <h5 style="text-align: center"> {{ Auth::user()->username }} </h5>
                </div>
                <!--end image-->

                <!--profile-->
                <div class="col-md-8">
                    <div class="profile-head">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Profil</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ ucwords(Auth::user()->name) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prénom</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ ucwords(Auth::user()->prenom) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Région</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->region }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Adresse</label>
                                </div>
                                <div class="col-md-6">
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
