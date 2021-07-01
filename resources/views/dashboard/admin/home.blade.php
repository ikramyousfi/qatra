@extends('layouts.app')

@section('headers')
    <title>Admin| Acceuil</title>
     <link href="{{ asset('css/adminprf.css') }}" rel="stylesheet">
@endsection

@section('content')
    <br><br>
    <div class="div">
    <h3 style="margin-left:7vw;" >Admin | Profil</h3>

<br>
        @if (Session::get('message'))
            <span class="alert alert-success" style="padding-left:10%; padding-right:0%">
                {{ Session::get('message') }}
            </span>
            <br>
        @endif
        <br>
    <form action="{{ route('admin.update') }}" method="post">


        @csrf
        @method('PUT')
        <div class="form-group col-4 mt-3" >
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" style="width: 400px; height:50px"
                value="{{ Auth::guard('admin')->user()->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" style="width: 400px; height:50px"
                value="{{ Auth::guard('admin')->user()->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" class="form-control" name="phone" id="phone" style="width: 400px; height:50px"
                value="{{ Auth::guard('admin')->user()->phone }}">
        </div>
        <br><br>
        <button type="submit" class="btn btn-success" style="margin-left:35%;background-color: #404040">Mettre à jour</button>

    </form>
</div>

    @endsection
