@extends('layouts.app')
@section('headers')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>Welcome</title>

@endsection

@section('content')


    <div class="contain">



        <video class="video" autoplay muted loop>
            <source src="{{ asset('photo/Qatra-video.mp4') }}" type="video/mp4" id="myVideo">
        </video>


        <div class="slogan-image">


            <img src="{{ asset('photo/Qatra-noir.ico') }}" id="Qatra-image" alt="">
            <div class="Qatra-slogan">
                <p><strong>Votre sang peut sauver des vies. Chaque goute compte! </strong></p>
            </div>
        </div>


    </div>
    <div>


        <img class="Qatra-apr1" src="{{ asset('photo/Apropos1.png') }}" alt="">
        <div class="text">
            <p id="qst"><strong>Qui sommes nous ? </strong></p>
            <p id="apr">L'entreprise Blood Bank a pour but de simplifier le don de sang à travers le site web qui permet de
                regrouper le maximum de donneurs de sang dans une région et faciliter les dons en cas d'urgences. </p>
        </div>
    </div>
    <div>


        <img class="Qatra-ccm" src="{{ asset('photo//Apropos2.png') }}" alt="">
        <div class="text2">
            <p id="qst2"><strong>Comment ça marche ? </strong></p>
            <p id="ccm">Le principe est simple.Tout ce que vous aurez à faire sera de vous inscrire sur notre site web et
                vous serez notifié à chaque fois que quelqu'un dans votre région aura besoin de sang. </p>
        </div>
    </div>

    
<div class="et" style="text-align:center">


<img class="carre1" src=" {{ asset('photo//etape1.jpg') }}" alt="img" >
<img class="carre2" src=" {{ asset('photo//etape2.jpg') }}" alt="img" >
<img class="carre3" src="{{ asset('photo//etape3.jpg') }}" alt="img" >


</div>

@endsection
