
<table class="table" border="1">

    @if (Session::get('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

            @foreach($cle as $gs)
                <tr>
                    <td>{{ $gs->id}}</td> <br>
                    <td>{{ $gs->name}}</td> <br>
                    <td>{{ $gs->email}}</td> <br>
                    <td>
                        @if( $gs->IsBan=='0')
                            <label class="py-2 px-3 btn btn-primary">Active</label>
                        @elseif($gs->IsBan=='1')
                            <label class="py-2 px-3 btn btn-danger">Banned</label>
                        @endif
                    </td>
               <td>
                <form action="/gs/role-delete/{{$gs->id}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>

                @if( $gs->IsBan=='0')
                    <a href="{{route('changestatusgs',$gs->id)}}" class="py-2 px-3 btn btn-warning">Ban</a>
                @elseif($gs->IsBan=='1')
                    <a href="{{route('changestatusgs',$gs->id)}}" class="py-2 px-3 btn btn-danger">Unban</a>
                @endif
            </td>
        </tr>
    @endforeach

</table>


