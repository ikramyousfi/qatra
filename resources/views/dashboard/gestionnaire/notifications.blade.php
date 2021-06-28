@extends('layouts.app')

@section('headers')
    <title>Home</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-2"> 
            <h2 style="text-align: center"> Mes notifications:  </h2>
            <div class="col-md-8">
                @if (Session::get('message'))
                    <div class="alert alert-success" >
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="list-group mt-5">
                    @foreach ($data[0] as $v)

                        <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $v->groupe_sanguin }}</h5>
                                <small>
                                    <form action="deleteNotif/{{ $v->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </small>
                            </div>
                            <p class="mb-1">{{ $v->adresse }}</p>
                            <small>{{ $v->created_at }}</small>
                        </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
