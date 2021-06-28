@extends('layouts.app')

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/choix.css') }}">
    <title>Choix</title>
@endsection

@section('content')


    <div class="content">
        <br> 
        <h1>Vous êtes</h1>
       <a href="{{ route('user.register') }}" class="link"> 
         <div class="left d-flex-block align-elements-center">
            <img src="{{ asset('photo/user.jpg') }}" alt="donneur"
                    class="image">
             <p>Un donneur</p>
          </div>
        </a> 
        <a href="{{ route('gestionnaire.register') }}" class="link">
        <div class="right d-flex-block align-elements-center">
           <img src="{{ asset('photo/GS.jpg') }}" alt="hopital"
                    class="image">
            <p>Un hopital</p>
        </div>
        </a>
    </div>
@endsection
