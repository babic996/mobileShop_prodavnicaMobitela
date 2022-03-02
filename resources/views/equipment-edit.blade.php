<x-admin-master>
    @section('content')
        <div class="card mt-5">
            <h5 class="card-header">Izmjeni telefon {{$equipment->name}}</h5>
            <div class="card-body">
                <form method="POST" action="{{route('equipment.update',$equipment->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <input type="text" id="name" class="form-control"
                               name="name"
                               value="{{$equipment->name}}"
                               autocomplete="name" autofocus/>
                        <label class="form-label mt-2" for="name">Naziv</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="price" class="form-control"
                               name="price"
                               value="{{$equipment->price}}"
                               autocomplete="price" autofocus/>
                        <label class="form-label mt-2" for="price">Cijena</label>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="quantity" class="form-control"
                               name="quantity"
                               value="{{$equipment->quantity}}"
                               autocomplete="quantity" autofocus/>
                        <label class="form-label mt-2" for="quantity">Kolicina</label>
                    </div>
                    <div class="mb-5 mt-5">
                        <img src="{{URL('storage/images/'.$equipment->image_name)}}" style="height: 300px" alt="">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" id="image_name" name="image_name">
                        <label class="form-label mt-2" for="image_name">Dodaj sliku</label>
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control" name="description" placeholder="{{$equipment->description}}" id="description" rows="5">{{$equipment->description}}</textarea>
                        <label class="form-label mt-2" for="description">Opis</label>
                    </div>
                    <div class="mb-3">
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2" for="category_id">Kategorija</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Potvrdi</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
