<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('photo/blood-donation.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>User Dashboard | Home</title>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 45px">
            <h4>user Dashboard</h4><hr>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ Auth::guard('web')->user()->name }}</td>
                    <td>{{ Auth::guard('web')->user()->email }}</td>
                    <td>
                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="{{route('user.update')}}" method="post" style="margin-left:37%">
    @csrf
    @method('PUT')
    <div class="form-group col-4" >
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="name" id="name" style="width: 400px; height:50px" value="{{ Auth::guard('web')->user()->name }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" style="width: 400px; height:50px" value="{{ Auth::guard('web')->user()->email }}">
    </div>

    <br><br>
    <button type="submit" class="btn btn-success" style="margin-left:15%;background-color: #404040">Update</button>

</form>
</body>
</html>
