@extends('layouts.app')

@section('headers')
    <title>A propos</title>
    <link rel="stylesheet" href="{{ asset('css/apropos.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="wrap">
            <div class="row">
                <div class="w60 textbox-1">
                    <div class="inner">
                        <p id="titre"><strong>Notre activité: </strong></p>
                        <p id="activité">SunTech est une entreprise de conception et réalisation de sites web pour tous
                            domaines confondus.Elle a été créée en 2021 et offre ses services à la demande de ses clients
                        </p>

                    </div>
                </div>
                <div class="w30 object-fit"><a href="#"><img src="{{ asset('photo/SunTech.png') }}" alt="pic1" width="640"
                            height="478" style="fit:cover"> </a></div>
            </div>

            <div class="container">
                <div class="wrap">
                    <div class="row">
                        <div class="w60 textbox-1">
                            <div class="inner">
                                <p id="titre"><strong>A propos de Qatra:</strong></p>
                                <div class="w50 textbox-1">

                                    <p id="activité">Qatra est l'un des sites web réalisés par l'entreprise.La raison pour
                                        laquelle nous avous
                                        songé a créer ce site web est de pouvoir rendre le don du sang plus rapide et
                                        intuitif ce qui sauvera la
                                        vie de millions de personnes.</p>
                                    <br><br>
                                </div>
                            </div>
                            <div class="w30 object-fit"><a href="#"><img src="{{ asset('photo/Qatra-noir.ico') }}"
                                        alt="pic1" width="640" height="478"> </a></div>
                        </div>

                        <div class="container">
                            <div class="wrap">
                                <div class="row">
                                    <div class="w60 textbox-1">
                                        <div class="inner">

                                            <p id="titre"><strong>Comment fonctionne le site web:</strong></p>
                                            <p>La première chose a faire est de vous connecter.Vous allez avoir par la suite
                                                deux choix,
                                                cela dépendra de si vous etes un hopital ou un donneur. </p>
                                            <ul>
                                                <li>Si vous etes un hopital:</li>
                                                <p>Vous devez remplir un formulaire et nous le faire parvenir, aprés l'étude
                                                    de vos informations
                                                    nous vous soumettrons notre réponse (ce systeme a été mis en place pour
                                                    éviter les malentendus)
                                                    <li>Si vous etes un donneur:</li>
                                                <p>Vous devez remplir vos informations, cela vous permettra de vous inscrire
                                                    sur notre base de
                                                    données. Ensuite vous allez etre notifié à chaque fois que quelqu'un
                                                    aura besoin de votre sang,
                                                    nous vous présenterons tout les hopitaux à proximités pour que vous
                                                    puissiez y faire don de
                                                    votre sang. </p>
                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endsection
