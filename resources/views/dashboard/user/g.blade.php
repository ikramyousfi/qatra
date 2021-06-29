@extends('layouts.app')

@section('headers')
    <title>Home</title>
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container pt-3">
        <div class="card" style="width: unset;">
            <div class="card-body">
                <div style="float: right; text-align: center; ">
                    <h5>Capacite: </h5>
                    <h3 class="pt-3"> {{ $data[1]->max }}</h3>
                </div>
                <h4 class="card-title">Nom: {{ $data[0]->username }}</h4>
                <a class="card-subtitle mt-4 text-muted link" href="{{ $data[0]->link }}">Adresse:
                    {{ $data[0]->adresse }}</a>
                <p class="card-text mt-2">Email: {{ $data[0]->email }} / Phone: {{ $data[0]->numero_de_telephone }}</p>
                {{-- <a href="#" class="card-link">Next</a>
                <a href="#" class="card-link">Previousk</a> --}}
            </div>
        </div>
        <iframe
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urlencode($data[0]->adresse); ?>(<?php echo urlencode($data[0]->username); ?>)&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            width="100%" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen=""
            loading="lazy"></iframe>
    </div>

@endsection
