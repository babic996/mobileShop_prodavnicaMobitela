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
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->first_name}}</td>
                            <td>{{$admin->last_name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->phone_number}}</td>
                            <td>{{$admin->city}}</td>
                            <td>{{$admin->zip_code}}</td>
                            <td>{{$admin->address . $admin->address_number}}</td>
                            <td>
                                <form method="post" action="{{route('user.role.detach',$admin)}}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button type="submit" class="btn btn-warning">Ukloni rolu</button>
                                </form>
                            <td>
                                <form method="POST" action="{{route('user.destroy',$admin->id)}}">
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
