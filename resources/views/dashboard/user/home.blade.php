@extends('layouts.app')

@section('headers')
    <title>Home</title>
@endsection

@section('content')

<div class="container pt-3">
    
    <div class="row">
        <div class="col-4">
        <div>
            <img src="{{ asset('photo/profilepicture.png') }}" style="border-radius: 50%; width:15rem; height:15rem; object-fit:cover;">
        </div>
        <div class="pt-3">
            <div><h3><strong>{{ Auth::user()->username }}</strong></h3></div>
        </div>
        <div>
                <a href="/user/notifications" style="color: red;text-decoration:none"><h3>Notifications</h3></a>
            </div>
        </div>
        <div class="col-8" style="border-radius: 15px 50px;">
    <table class="table table-responsive-md table-borderless" style="text-align:left; width: 655px; margin-left:0%; top:5px">
    <thead>

    <tr>
        <th style="width: 1% !important;" >Prenom</th>
        <th style="width: 1% !important;">Nom</th>
        <th style="width: 1% !important;">Région</th>
        <th style="width: 1% !important;">Groupe sanguin</th>
        <th style="width: 1% !important;">Adresse</th>
    </tr>

    </thead>

    <tbody>

        <td>{{ ucwords(Auth::user()->prenom) }}</td> <br>
        <td>{{ ucwords(Auth::user()->name) }}</td> <br>
        <td>{{ ucwords(Auth::user()->region) }}</td> <br>
        <td>{{ ucwords(Auth::user()->groupe_sanguin) }}</td>
        <td>{{ ucwords(Auth::user()->adresse) }}</td>

        </tr>

    </tr>

    </tbody>
</table>

    <table class="table table-responsive-md table-borderless" style="text-align:left; width: 655px; margin-left:0%; top:5px">
    <thead>

    <tr>
        <th style="width: 1% !important;" >Allergies</th>
        <th style="width: 1% !important;">Date de naissance</th>
        <th style="width: 1% !important;">Numéro de telephone</th>
    </tr>

    </thead>

    <tbody>

        <td>{{ ucwords(Auth::user()->allergies) ?? 'non mentionné' }}</td> <br>
        <td>{{ ucwords(Auth::user()->birthdate) ?? 'non mentionné'}}</td> <br>
        <td>{{ ucwords(Auth::user()->numero_de_telephone) ?? 'non mentionné'}}</td> <br>
        </tr>

    </tr>

    </tbody>
</table>
        </div>    
    </div>

</div>
@endsection
