@extends('layouts.app')

@section('headers')
    <title>Profil | Message</title>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="justify-content-center col-md-8 mt-4">
                <h2 style="text-align: center">Mes messages:</h2>
                @if (Session::get('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if (Session::get('mes'))
                    <div class="alert alert-success">
                        {{ Session::get('mes') }}
                    </div>
                @endif
                <div class=" mt-5 list-group">
                    @foreach ($data as $v)

                        <a href="./inbox/{{ $v->id }}" class="list-group-item list-group-item-action "
                            aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">From: {{ $v->name }}</h5>
                                <small>
                                    <form action="deleteMessage/{{ $v->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </small>
                            </div>
                            <p class="mb-1">{{ $v->email }}</p>
                        </a>

                        <script>
                            document.getElementsByClassName("list-group-item").forEach(e => {
                                e.classList.add("read");
                                alert("test");
                            });
                        </script>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
