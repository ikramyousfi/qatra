@extends('layouts.app')

@section('headers')
    <title>A propos</title>
    <link rel="stylesheet" href="{{ asset('css/apropos.css') }}">
@endsection


@section('content')
    <div class="container">
        <img class="blood-im" src="{{ asset('photo/B.png') }}" alt="">
        <div class="txt">
            <p id="titre"><strong>Notre activité: </strong></p>
            <p id="activité">Blood Bank est une entreprise de conception et réalisation de sites web pour les hopitaux. Elle
                a été créée en 2021 dans le but de sauver des vies plus rapidement et de manière plus efficace. </p>
        </div>

        <div>
            <img class="Qatra-noir" src="{{ asset('photo/Qatra-noir.ico') }}" alt="">
            <div class=" txt2">
                <p id="titre"><strong>A propos de Qatra:</strong></p>
                <p id="activité">Qatra est l'un des sites web réalisés par l'entreprise.La raison pour laquelle nous avous
                    songé a créer ce site web est de pouvoir rendre le don du sang plus rapide et intuitif ce qui sauvera la
                    vie de millions de personnes.</p>
            </div>
            <div>
                <div class=" txt3">
                    <p id="titre"><strong>Comment fonctionne le site web:</strong></p>
                    <p class="ccm">La première chose a faire est de vous connecter.Vous allez avoir par la suite deux choix,
                        cela dépendra de si vous etes un hopital ou un donneur. </p>
                    <ul class="ccm">
                        <li>Si vous etes un hopital:</li>
                        <p>Vous devez remplir un formulaire et nous le faire parvenir, aprés l'étude de vos informations
                            nous vous soumettrons notre réponse (ce systeme a été mis en place pour éviter les malentendus)
                            <li>Si vous etes un donneur:</li>
                        <p>Vous devez remplir vos informations, cela vous permettra de vous inscrire sur notre base de
                            données. Ensuite vous allez etre notifié à chaque fois que quelqu'un aura besoin de votre sang,
                            nous vous présenterons tout les hopitaux à proximités pour que vous puissiez y faire don de
                            votre sang. </p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
