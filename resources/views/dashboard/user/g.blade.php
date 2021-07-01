@extends('layouts.app')

@section('headers')
    <title>Donneur | Profil</title>
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.3/css/all.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container pt-3">
        <div class="card" style="width: unset;">
            <div class="card-body">
                <div style="float: right; text-align: center; ">
                    <img src="{{ asset('photo/placeholder.png') }}" alt="...">
                </div>
                <h4 class="card-title">Nom: {{ $data[0]->username }}</h4>
                <a class="card-subtitle mt-4 text-muted link" href="{{ $data[0]->link }}">Adresse:
                    {{ $data[0]->adresse }}</a>
                <br>
                <i class="fas fa-at"><small>&nbsp;{{ $data[0]->email }}</small></i>
                <br>
                <i class="fas fa-mobile-alt"><small>&nbsp;{{ $data[0]->numero_de_telephone }}</small></i>

                <a href="#/.." class="card-link">retour</a>
                {{-- <a href="#" class="card-link">Previousk</a> --}}
            </div>
        </div>
        <iframe
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urlencode($data[0]->adresse); ?>(<?php echo urlencode($data[0]->username); ?>)&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            width="100%" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen=""
            loading="lazy"></iframe>
    </div>

@endsection
