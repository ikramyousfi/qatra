@extends('layouts.app')
@section('headers')
    <title>Notifications</title>
@endsection
@section('content')
    <h1> Mes notifications</h1>
    <br>
    @foreach ($data[0] as $v)
                        @if ($v->region == Auth::guard('web')->user()->region)

                        <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $v->region }}</h5>
                                <small>{{ $v->adresse }}</small>
                            </div>
                            <p class="mb-1">{{ $v->groupe_sanguin }}</p>
                            <div class="d-flex w-100 justify-content-between">
                            <small>{{ $v->numero_de_telephone }}</small>
                            <img src="{{ asset('photo/delete.png') }}" alt="delete" width="20" height="20">

                            </div>
                        </a>
                        @endif

            @endforeach
    @foreach ($data[0] as $v)
                        @if ($v->region != Auth::guard('web')->user()->region)

                        <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $v->region }}</h5>
                                <small>{{ $v->adresse }}</small>
                            </div>
                            <p class="mb-1">{{ $v->groupe_sanguin }}</p>
                            <div class="d-flex w-100 justify-content-between">
                            <small>{{ $v->numero_de_telephone }}</small>
                            <img src="{{ asset('photo/delete.png') }}" alt="delete" width="20" height="20">

                            </div>
                        </a>
                        @endif

            @endforeach
@endsection 