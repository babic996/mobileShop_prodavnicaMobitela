<x-home-master>
@section('navbar')
    <!-- Nav -->
        <div class="row">
            <nav class="navbar navbar-expand-md navbar-light col-12" style="background-color: #1b9ce5;">
                <button class="navbar-toggler d-lg-none border-0 " type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Početna stranica <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="electronics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mobilni telefoni</a>
                            <div class="dropdown-menu" aria-labelledby="electronics">
                                @foreach($phones_nav as $phone_nav)
                                    <a class="dropdown-item" href="{{route('phone.index.all',$phone_nav->category_id)}}">{{$phone_nav->category->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="fashion" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tableti</a>
                            <div class="dropdown-menu" aria-labelledby="fashion">
                                @foreach($tablets_nav as $tablet_nav)
                                    <a class="dropdown-item" href="{{route('tablet.index.all',$tablet_nav->category_id)}}">{{$tablet_nav->category->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="books" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Oprema za telefone/tablete</a>
                            <div class="dropdown-menu" aria-labelledby="books">
                                @foreach($equipment_nav as $equipment_nav)
                                    <a class="dropdown-item" href="{{route('equipment.index.all',$equipment_nav->category_equipment_id)}}">{{$equipment_nav->categoryEquipment->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Nav -->
    @endsection
    @section('products')
        <div class="col-md-4 mt-3">
            <form method="get" action="{{route('filter',$input)}}">
                <select class="form-select" name="filter" id="filter" onchange="this.form.submit()">
                    <option value="">Izaberite neku od opcija filtriranja</option>
                    <option value="1">Relevantnost</option>
                    <option value="2">Poredaj od zadnjeg</option>
                    <option value="3">Razvrstaj po cijeni: veće do manje</option>
                    <option value="4">Razvrstaj po cijeni: manje do veće</option>
                </select>
            </form>
        </div>
        <div class="col-12">
            <!-- Main Content -->
            <main class="row">

                <!-- Category Products -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 py-3">
                            <div class="row">
                                <div class="col-12 text-center text-uppercase">
                                    <h2></h2>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($results as $result)
                                    <div class="col-md-8 col-lg-6 col-xl-4">
                                        <div class="card text-black">
                                            <img
                                                src="{{URL('storage/images/'.$result->image_name)}}"
                                                class="img img-small p-5"
                                                alt="Slika"
                                            />
                                            <div class="card-body">
                                                <div class="text-center" style="height: 60px">
                                                    @if(class_basename($result)=="Phone")
                                                        <h5 class="card-title"><a href="{{route('phone.index.show',$result->id)}}" class="product-name">{{$result->name}}</a></h5>
                                                    @elseif(class_basename($result)=="Tablet")
                                                        <h5 class="card-title"><a href="{{route('tablet.index.show',$result->id)}}" class="product-name">{{$result->name}}</a></h5>
                                                    @elseif(class_basename($result)=="Equipment")
                                                        <h5 class="card-title"><a href="{{route('equipment.index.show',$result->id)}}" class="product-name">{{$result->name}}</a></h5>
                                                        @endif
                                                </div>
                                                <div>
                                                    <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                                        <h5>Cijena</h5><h5>{{$result->price}}KM</h5>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <span class="product-price mt-5">
                                                            @if(class_basename($result)=="Phone")
                                                                <a class="btn btn-outline-primary" href="{{route('phone.addToCart',$result->id)}}"><i class="fas fa-cart-plus me-2"></i>Dodaj u korpu</a>
                                                            @elseif(class_basename($result)=="Tablet")
                                                                <a class="btn btn-outline-primary" href="{{route('tablet.addToCart',$result->id)}}"><i class="fas fa-cart-plus me-2"></i>Dodaj u korpu</a>
                                                            @elseif(class_basename($result)=="Equipment")
                                                                <a class="btn btn-outline-primary" href="{{route('equipment.addToCart',$result->id)}}"><i class="fas fa-cart-plus me-2"></i>Dodaj u korpu</a>
                                                                @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <!-- Product -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Category Products -->

                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{$results->withQueryString()->links()}}
                        </ul>
                    </nav>
                </div>

            </main>
            <!-- Main Content -->
        </div>
    @endsection
</x-home-master>
