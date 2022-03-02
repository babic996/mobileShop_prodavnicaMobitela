<x-admin-master>
    @section('content')
        <div class="card mt-5">
            <h5 class="card-header">Dodaj novu kategoriju</h5>
            <div class="card-body">
                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="category_name" class="form-control"
                               name="category_name" required
                               autocomplete="category_name" autofocus/>
                        <label class="form-label mt-2" for="category_name">Naziv</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Potvrdi</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
