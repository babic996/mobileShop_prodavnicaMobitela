<x-admin-master>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Telefoni
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Cijena(KM)</th>
                        <th>Kolicina</th>
                        <th>Kategorija</th>
                        <th>Boja</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Naziv</th>
                        <th>Cijena(KM)</th>
                        <th>Kolicina</th>
                        <th>Kategorija</th>
                        <th>Boja</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($phones as $phone)
                    <tr>
                        <td>{{$phone->name}}</td>
                        <td>{{$phone->price}}</td>
                        <td>{{$phone->quantity}}</td>
                        <td>{{$phone->category->name}}</td>
                        <td>{{$phone->colors}}</td>
                        <td><a class="btn btn-warning" href="{{route('phone.edit',$phone->id)}}">Izmijeni</a>
                        <td>
                            <form method="POST" action="{{route('phone.destroy',$phone->id)}}" enctype="multipart/form-data">
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
