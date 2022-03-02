<x-admin-master>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Kupci
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Broj telefona</th>
                        <th>Grad</th>
                        <th>Poštanski broj</th>
                        <th>Adresa</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Broj telefona</th>
                        <th>Grad</th>
                        <th>Poštanski broj</th>
                        <th>Adresa</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->city}}</td>
                            <td>{{$user->zip_code}}</td>
                            <td>{{$user->address . $user->address_number}}</td>
                            <td>
                                <form method="post" action="{{route('user.role.attach',$user)}}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button type="submit" class="btn btn-warning">Dodaj rolu</button>
                                </form>
                            <td>
                                <form method="POST" action="{{route('user.destroy',$user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Izbrisi</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    @endsection
</x-admin-master>
