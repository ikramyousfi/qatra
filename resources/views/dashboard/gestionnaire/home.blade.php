{{-- @extends('layouts.app')

@section('headers')
    <title>Home</title>


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

           





<iframe id="mappp"
                    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urlencode(Auth::user()->adresse); ?>(<?php echo urlencode(Auth::user()->username); ?>)&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                    width="100%" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>

{{-- </div>

    </div> --}}
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
{{-- </div>
@endsection --}}

@extends('layouts.app')

@section('headers')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Gestionnaire | Profile</title>
    <link href="{{ asset('css/pp.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab"
                                    aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="profile-edit-btn">

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
                                    <label>Capacite</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->stock->max ?? 100 }}</p>
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
        {{-- <div class="row">
            <iframe
                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo urlencode(Auth::user()->adresse); ?>(<?php echo urlencode(Auth::user()->username); ?>)&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                width="100%" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen=""
                loading="lazy"></iframe>
        </div> --}}
    </div>
    </div>
@endsection
