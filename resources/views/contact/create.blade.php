@extends('layouts.app')

@section('headers')

@section('content')
<div class="container" style="max-width:1500px">
    <div class="row">
        <h1 style="text-align: center; margin-top:20px">Contactez-nous</h1>

        <img src="{{ asset('photo/mail.jpg') }}" alt="message"  style="height:500px; width:700px">
       
        <div class="col-md-4 offset-md-1 mt-5" >

        <form action="/contact" method="POST" autocomplete="off" id="form">
            @if (Session::get('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

                @csrf
            <div class="form-group pb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                <span class="text-danger"> @error('name'){{ $message }}@enderror</span>
            </div>

            <div class="form-group pb-2">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                <span class="text-danger"> @error('email'){{ $message }}@enderror</span>
            </div>

            <div class="form-group pb-2">
                <label for="message">Message</label>
                <br>
                <textarea name="message" id="message" form="form" cols="1" rows="8" style="width: 424px;"
                           value="{{ old('message') }}" required></textarea>
                <span class="text-danger"> @error('message'){{ $message }}@enderror</span>
            </div>

            <button type="submit" class="btn btn-secondary">Envoyer</button>
        </form>
</div>
</div>
</div>


@endsection
