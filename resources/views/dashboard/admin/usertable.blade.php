
    <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('photo/blood-donation.png') }}">
    <title>Liste des donneurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>
<body>

<div id="mySidenav" class="sidenav">

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
</div>

<br> <br>
<h3 style="margin-left:55%; ">La liste des donneurs</h3> <hr>
<br><br>
@if (Session::get('message'))
    <div class="alert alert-success" style="margin-left: 50%;margin-right: 25%">
        {{ Session::get('message') }}
    </div>
@endif

<table class="table table-responsive-md" style="text-align:center; width: 655px; margin-left:43%;">

    <thead>

    <tr>
        <th style="width: 1% !important;" >Nom</th>
        <th style="width: 1% !important;">Prénom</th>
        <th style="width: 1% !important;">Email</th>
        <th style="width: 1% !important;">Région</th>
        <th style="width: 1% !important;">Groupe sanguin</th>
        <th style="width: 1% !important;">Status</th>
        <th style="width: 5% !important;">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach( $key as $user)
        <th>{{ $user->name}}</th>
        <td>{{ $user->prenom}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->region}}</td>
        <td>{{ $user->groupe_sanguin}}</td>
        <td>
            @if( $user->IsBan=='0')
                <label class="py-2 px-3">Active</label>
            @elseif($user->IsBan=='1')
                <label class="py-2 px-3  ">Banned</label>
            @endif
        </td>
        <td style="width:100px">
            <form action="user/role-delete/{{$user->id}}" method="post">
                {{ csrf_field() }}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        <td style="width:100px">
            {{-- </form> --}}
            @if( $user->IsBan=='0')
                <a href="{{route('admin.changestatus',$user->id)}}"><button class="btn btn-warning">Ban</button></a>
            @elseif($user->IsBan=='1')
                <a href="{{route('admin.changestatus',$user->id)}}"><button class="btn btn-success">Unban</button></a>
            @endif
        </td>

        </tr>
        @endforeach
        </tr>

    </tbody>
</table>
</body>
</html>
