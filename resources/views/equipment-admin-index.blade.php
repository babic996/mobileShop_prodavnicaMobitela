<x-admin-master>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Oprema za telefone/tablete
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Cijena(KM)</th>
                        <th>Kolicina</th>
                        <th>Kategorija</th>
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
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($equipments as $equipment)
                        <tr>
                            <td>{{$equipment->name}}</td>
                            <td>{{$equipment->price}}</td>
                            <td>{{$equipment->quantity}}</td>
                            <td>{{$equipment->categoryEquipment->name}}</td>
                            <td><a type="submit" class="btn btn-warning" href="{{route('equipment.edit',$equipment)}}">Izmijeni</a></td>
                            <td>
                                <form method="POST" action="{{route('equipment.destroy',$equipment->id)}}" enctype="multipart/form-data">
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
