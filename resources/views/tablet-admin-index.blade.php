<x-admin-master>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tableti
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
                    @foreach($tablets as $tablet)
                        <tr>
                            <td>{{$tablet->name}}</td>
                            <td>{{$tablet->price}}</td>
                            <td>{{$tablet->quantity}}</td>
                            <td>{{$tablet->category->name}}</td>
                            <td>{{$tablet->colors}}</td>
                            <td><a class="btn btn-warning" href="{{route('tablet.edit',$tablet->id)}}">Izmijeni</a></td>
                            <td>
                                <form method="POST" action="{{route('tablet.destroy',$tablet->id)}}" enctype="multipart/form-data">
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
