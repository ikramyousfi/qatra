{{-- @extends('layouts.app')

@section('headers')
<<<<<<< HEAD
    <title>Home</title>


=======
    <title>Gestionnaire | Profile</title>
>>>>>>> commit
@endsection

@section('content')

    <div class="container pt-3 ">

        <div class="row">
            <div class="col-4">
                <img src="{{ asset('photo/profilepicture.png') }}"
                    style="border-radius: 50%; width:15rem; height:15rem; object-fit:cover;">

                <h3 class="pt-4">{{ Auth::user()->username }}</h3>
            </div>
            <div class="col-8">
                <table class="table table-responsive-md table-borderless"
                    style="text-align:left; width: 655px; margin-left:0%; top:5px">
                    <thead>

                        <tr>
                            <th style="width: 1% !important;">Nom</th>
                            <th style="width: 1% !important;">Prenom</th>
                            <th style="width: 1% !important;">email</th>
                            <th style="width: 1% !important;">Numero de Telephone</th>
                            <th style="width: 1% !important;">Nom d'utilisateur</th>
                        </tr>

                    </thead>

                    <tbody>

                        <td>{{ ucwords(Auth::user()->name) ?? 'N/A' }}</td> <br>
                        <td>{{ ucwords(Auth::user()->prenom) ?? 'N/A' }}</td> <br>
                        <td>{{ ucwords(Auth::user()->email) ?? 'N/A' }}</td> <br>
                        <td>{{ ucwords(Auth::user()->numero_de_telephone) ?? 'N/A' }}</td>
                        <td>{{ ucwords(Auth::user()->username) ?? 'N/A' }}</td>

                        </tr>

                        </tr>

                    </tbody>
                </table>

                <table class="table table-responsive-md table-borderless"
                    style="text-align:left; width: 655px; margin-left:0%; top:5px">
                    <thead>

                        <tr>
                            <th style="width: 1% !important;">Region</th>
                            <th style="width: 1% !important;">Adresse</th>
                        </tr>

                    </thead>

                    <tbody>

                        <td>{{ ucwords(Auth::user()->region) ?? 'N/A' }}</td> <br>
                        <td><a
                                href={{ strtolower(Auth::user()->link) ?? 'N/A' }}>{{ ucwords(Auth::user()->adresse) ?? 'N/A' }}</a>
                        </td> <br>
                        </tr>

                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- @if (str_starts_with(Auth::user()->link, 'https://google.com/maps'))
                {{$link = Auth::user()->link}}
            @else
                {{ $link = "https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=".urlencode(Auth::user()->adresse)."+(".urlencode(Auth::user()->username).")+(test)&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" }}
            @endif --}}

<<<<<<< HEAD
            {{-- <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/draw-radius-circle-map/">Easy radius map</a></div> --}}

            {{-- <div style="width: 100%">
                <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                </iframe>
            </div> 
            

https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1522.0626076075125!2d-0.633145350699716!3d35.2092131828542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7f00290df8ed91%3A0x91bd238762e84ce4!2s%C3%89cole%20sup%C3%A9rieure%20en%20informatique%20de%20Sidi%20Bel%20Abb%C3%A8s!5e0!3m2!1sen!2sdz!4v1624902098317!5m2!1sen!2sdz --}}


            <div style="width: 100%">
                {{-- <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src={{ Auth::user()->link }}></iframe> --}}
                <iframe id="mappp"
                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urlencode(Auth::user()->adresse); ?>(<?php echo urlencode(Auth::user()->username); ?>)&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                    width="100%" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>

    </div>
    {{-- <script>
        /* 
                          - Code to execute when only the HTML document is loaded.
                          - This doesn't wait for stylesheets, 
                            images, and subframes to finish loading. 
                        */
        var userLink = "<?php echo Auth::user()->link; ?>";
        if ((userLink.startsWith("https://maps.google.com")) || (
                userLink.startsWith("https://www.maps.google.com")) || (
                userLink.startsWith("https://www.maps.google.com")) || (
                userLink.startsWith("https://google.com/maps"))) {
            var link = userLink;
        } else {
            var link =
                "https://maps.google.com/maps?q=<?php echo urlencode(Auth::user()->adresse); ?>&amp;output=embed";
        };
        console.log(link)

        document.getElementById("mappp").src = link;

    </script> --}}
=======
</div>
@endsection --}}

@extends('layouts.app')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('headers')
    <title>Gestionnaire | Profile</title>
    <link href="{{ asset('css/pp.css') }}" rel="stylesheet">
>>>>>>> commit
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
                        
                        <a href="{{ route('gestionnaire.update') }}" class="profile-edit-btn">Edit </a>
                    </button>
                    </div> 
                    {{-- <div class="form-group">
                        <button type="submit" class="btn btn2 btn-secondary">Connexion</button>
                        <a href="{{ route('gestionnaire.update') }}"></a>
                    </div> --}}

                </div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prénom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->prenom }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Region</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->region }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
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