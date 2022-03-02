<x-admin-master>
    @section('content')
        <div class="card mt-5">
            <h5 class="card-header">Dodaj novu opremu</h5>
            <div class="card-body">
                <form method="POST" action="{{route('equipment.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="name" class="form-control"
                               name="name" required
                               autocomplete="name" autofocus/>
                        <label class="form-label mt-2" for="name">Naziv</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="price" class="form-control"
                               name="price" required
                               autocomplete="price" autofocus/>
                        <label class="form-label mt-2" for="price">Cijena</label>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="quantity" class="form-control"
                               name="quantity" required
                               autocomplete="quantity" autofocus/>
                        <label class="form-label mt-2" for="quantity">Kolicina</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" id="image_name" name="image_name">
                        <label class="form-label mt-2" for="image_name">Dodaj sliku</label>
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control" name="description" id="description" rows="5"></textarea>
                        <label class="form-label mt-2" for="description">Opis</label>
                    </div>
                    <div class="mb-3">
                        <select name="category_equipment_id" id="category_equipment_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($categoryEquipments as $categoryEquipment)
                                <option value="{{$categoryEquipment->id}}">{{$categoryEquipment->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2" for="category_equipment_id">Kategorija</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Potvrdi</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
