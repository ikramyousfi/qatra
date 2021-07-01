@extends('layouts.app')

@section('headers')
    <title>Admin | Gestionnaire tableau</title>
@endsection

@section('content')

    <div class="container">
        <br>
        <h3 style="text-align:center;">La liste des Gestionnaires</h3>
        <br><br>
        @if (Session::get('message'))
            <div class="alert alert-success" style="text-align: center">
                {{ Session::get('message') }}
            </div>
        @endif

        <table class="table table-responsive-md" style="text-align:center">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th>Région</th>
                    <th>Adresse</th>
                    <th>Supprimer</th>
                    <th>Banner</th>
                </tr>
            </thead>
            <tbody>
                <div hidden>{{ $i = 1 }}</div>
                @foreach ($cle as $gs)
                    <td>{{ $i++ }}</td>
                    <td>{{ $gs->username }}</td>
                    <td>{{ $gs->email }}</td>
                    <td>{{ $gs->region }}</td>
                    <td>{{ $gs->adresse }}</td>




                    <td>
                        <form action="gs/role-delete/{{ $gs->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>

                    <td>

                        @if ($gs->IsBan == '0')
                            <a href="{{ route('admin.changestatusgs', $gs->id) }}"><button
                                    class="btn btn-warning">Banner</button></a>
                        @elseif($gs->IsBan=='1')
                            <a href="{{ route('admin.changestatusgs', $gs->id) }}"><button
                                    class="btn btn-success">Débanner</button></a>
                        @endif

                    </td>

                    </tr>
                @endforeach
                </tr>

            </tbody>
        </table>
    </div>
@endsection
