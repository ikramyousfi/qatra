{{-- @extends('layouts.app')

@section('headers')
    <title>Home</title>
@endsection

@section('content')

<div class="container pt-3">
    
    <div class="row">
        <div class="col-4">
        <div>
            <img src="{{ asset('photo/profilepicture.png') }}" class="rounded-circle">
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

        <td>{{ ucwords(Auth::user()->allergies) }}</td> <br>
        <td>{{ ucwords(Auth::user()->birthdate) }}</td> <br>
        <td>{{ ucwords(Auth::user()->numero_de_telephone)   }}</td> <br>
        </tr>

    </tr>

    </tbody>
</table>
        </div>    
    </div>

</div>
@endsection --}}
@extends('layouts.app')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('headers')
    <title>User | Profile</title>
    <link href="{{ asset('css/pp.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{ Auth::user()->username }}
                                    </h5>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-md-2">
                         <button class="profile-edit-btn" >
                        
                        <a href="{{ route('user.edit') }}" class="profile-edit-btn">Edit </a>
                    </button>
                    </div> 
                    {{-- <div class="form-group">
                        <button type="submit" class="btn btn2 btn-secondary">Connexion</button>
                        <a href="{{ route('gestionnaire.update') }}"></a>
                    </div> --}}
                    </div>
                <div class="row d-flex justify-content-center">
     
                    <div class="col-md-4 ">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Prénom</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{ Auth::user()->prenom }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Groupe sanguin</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{ Auth::user()->groupe_sanguin }}</p> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Region</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{ Auth::user()->region }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{ Auth::user()->adresse }}</p> 
                                            </div>
                                        </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        @endsection