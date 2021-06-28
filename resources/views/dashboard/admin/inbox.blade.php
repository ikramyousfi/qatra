
@extends('layouts.app')

@section('headers')
    <title>Home</title>
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container p-5">
        <div class="card" style="width: unset;">
            <div class="card-body">
                <h5 class="card-title">From: {{$data[0]->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$data[0]->email}}</h6>
                <p class="card-text">{{$data[0]->message}}</p>
                {{-- <a href="#" class="card-link">Next</a>
                <a href="#" class="card-link">Previousk</a> --}}
            </div>
        </div>
    </div>

@endsection

