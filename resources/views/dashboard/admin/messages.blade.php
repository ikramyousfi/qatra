@extends('layouts.app')

@section('headers')
    <title>Profile | Home</title>
@endsection

@section('content')

{{-- <div id="mySidenav" class="sidenav">

    <a><img class="Qatra-img" src="{{ asset('photo/logo.ico') }}" alt="img" width="170" height="170"></a>
    <a href="/">Accueil</a>
    <a href="{{ route('admin.home') }}">Profile</a>        
    <a href="{{ route('admin.messages') }}">Mes messages </a>
    <a href="{{ route('admin.userlist') }}">liste des donneurs</a>
    <a href="{{ route('admin.gslist') }}">Liste des Gestionnaires </a>
    </form>
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">
        @csrf
    </form>
</div> --}}
    <div class="container" style="right: 400px">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                @if (Session::get('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="list-group mt-5">
                    {{-- {{dd($data)}} --}}
                    @foreach ($data as $v)

                        <a href="./inbox/{{$v->id}}" class="list-group-item list-group-item-action " aria-current="true" style="left: 200px;">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">From: {{ $v->name }}</h5>
                                <small>
                                    <form action="deleteMessage/{{ $v->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </small>
                            </div>
                            <p class="mb-1">{{ $v->email }}</p>
                            {{-- <small>{{ $v->created_at }}</small> --}}
                        </a>

                        <script>
                            // document.getElementsByClassName("list-group-item")[0].classList.add("read");

                            // if (!{{ $v->isRead }}) {
                            //     data = document.getElementsByClassName("list-group-item")
                                
                            // }
                            // alert('test');
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
