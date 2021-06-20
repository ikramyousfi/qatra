<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('photo/blood-donation.png') }}">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>

<body>


    <div id="mySidenav" class="sidenav">

        <a><img class="Qatra-img" src="{{ asset('photo/logo.ico') }}" alt="img" width="170" height="170"></a>
        <a href="/">Accueil</a>
        <a href="{{ route('admin.home') }}">Profile</a>
        <a href="{{ route('admin.userlist') }}">liste des donneurs</a>
        <a href="{{ route('admin.gslist') }}">Liste des Gestionnaires </a>
        </form>
        <a href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">
            @csrf
        </form>
    </div>

    <br><br>
    <h3 style="margin-left:55%;">La liste des Gestionnaires</h3>
    <hr>
    <br><br>


    <table class="table table-responsive-md" style="text-align:center; width: 655px; margin-left:43%;">
        <thead>
            @if (Session::get('message'))
                <div class="alert alert-success" style="margin-right:80%; left:57%;  ">
                    {{ Session::get('message') }}
                </div>
            @endif
            <tr>
                <th style="width: 1% !important;">Id</th>
                <th style="width: 1% !important;">Username</th>
                <th style="width: 1% !important;">Email</th>
                <th style="width: 1% !important;">Région</th>
                <th style="width: 1% !important;">Hopital</th>
                <th style="width: 1% !important;">Status</th>
                <th style="width: 5% !important;">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cle as $gs)
                <td>{{ $gs->id }}</td> <br>
                <td>{{ $gs->username }}</td> <br>
                <td>{{ $gs->email }}</td> <br>
                <td>{{ $gs->region }}</td>
                <td>{{ $gs->adresse }}</td>
                <td>
                    @if ($gs->IsBan == '0')
                        <label class="py-2 px-3">Active</label>
                    @elseif($gs->IsBan=='1')
                        <label class="py-2 px-3  ">Banned</label>
                    @endif
                </td>
                <td style="width:100px">
                    {{-- <a href="{{route('admin.deletegs',$gs->id)}}"><button class="btn btn-danger">Delete</button></a> --}}
                    <form action="gs/role-delete/{{ $gs->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td style="width:100px">

                    @if ($gs->IsBan == '0')
                        <a href="{{ route('admin.changestatusgs', $gs->id) }}"><button
                                class="btn btn-warning">Ban</button></a>
                    @elseif($gs->IsBan=='1')
                        <a href="{{ route('admin.changestatusgs', $gs->id) }}"><button
                                class="btn btn-success">Unban</button></a>
                    @endif

                </td>

                </tr>
            @endforeach
            </tr>

        </tbody>
    </table>
</body>

</html>
