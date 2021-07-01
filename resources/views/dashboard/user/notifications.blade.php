@extends('layouts.app')
@section('headers')
    <title>Donneur | Notifications</title>
    <link href="{{ asset('css/notifs.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.15.3/css/all.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <h3 style="text-align: center; " class="pt-2yahayaha"> Mes notifications: </h3>
        <div class="list-group">
            @foreach ($notifs as $notif)
                @if (Auth::user()->region == $notif['region'])

                    <br>
                    <a href="g/{{ $notif['ges_id'] }}" class="notif list-group-item list-group-item-action ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5>{{ $notif['username'] }}</h5>
                            <p id="grp" style="font-size: xx-large">{{ $notif['grp'] }}</p>
                        </div>
                        <p class="mb-1 txt">{{ $notif['adresse'] }}</p>
                        <i class="fas fa-at"><small>&nbsp;{{ $notif['email'] }}</small></i>
                        <br>
                        <i class="fas fa-mobile-alt"><small>&nbsp;{{ $notif['telephone'] }}</small></i>
                    </a>
                @endif
            @endforeach
            @foreach ($notifs as $notif)
                @if (Auth::user()->region != $notif['region'])

                    <br>
                    <a href="g/{{ $notif['ges_id'] }}" class="notif list-group-item list-group-item-action ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5>{{ $notif['username'] }}</h5>
                            <h2 id="grp">{{ $notif['grp'] }}</h2>
                        </div>
                        <p class="mb-1 txt">{{ $notif['adresse'] }}</p>
                        <i class="fas fa-at"><small>&nbsp;{{ $notif['email'] }}</small></i>
                        <br>
                        <i class="fas fa-mobile-alt"><small>&nbsp;{{ $notif['telephone'] }}</small></i>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
