@extends('layouts.app')

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/choix.css') }}">
    <title>Choix</title>
@endsection

@section('content')


    <div class="content">
        <br> 
        <h1>Vous êtes</h1>
       <a href="{{ route('user.register') }}"> 
         <div class="left">
            <img src="{{ asset('photo/user.jpg') }}" alt="donneur"
                    class="image">
             <p class="link"> Un donneur</p>
          </div>
        </a> 
        <a href="{{ route('gestionnaire.register') }}">
        <div class="right">
           <img src="{{ asset('photo/GS.jpg') }}" alt="hopital"
                    class="image">
            <p class="link" >Un hopital</p>
        </div>
        </a>
    </div>
@endsection
