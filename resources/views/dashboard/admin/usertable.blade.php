@extends('layouts.app')

@section('headers')
    <title>Admin | Donneurs tableau</title>
@endsection

@section('content')

    <br> <br>
    <div class="container">
        <h3 style="text-align: center">La liste des donneurs</h3>
        <br><br>
        @if (Session::get('message'))
            <div class="alert alert-success" style="text-align: center">
                {{ Session::get('message') }}
            </div>
        @endif

        <table class="table table-responsive-md" style="text-align:center;">

            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Région</th>
                    <th>Groupe sanguin</th>
                    <th>Supprimer</th>
                    <th>Banner</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($key as $user)
                    <th>{{ $user->name }}</th>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->region }}</td>
                    <td>{{ $user->groupe_sanguin }}</td>

                    <td>
                        <form action="user/role-delete/{{ $user->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>

                    {{-- </form> --}}
                    @if ($user->IsBan == '0')
                        <td><a href="{{ route('admin.changestatus', $user->id) }}"><button
                                    class="btn btn-warning">Banner</button></a></td>
                    @elseif($user->IsBan=='1')
                        <td><a href="{{ route('admin.changestatus', $user->id) }}"><button
                                    class="btn btn-success">Débanner</button></a></td>
                    @endif


                    </tr>
                @endforeach
                </tr>

            </tbody>
        </table>

    </div>
@endsection
