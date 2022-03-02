<x-home-master>
@section('products')
    <!-- Main Content -->
        <main class="row">
            <div class="col-12 bg-white py-3 my-3 mx-3">
                <div class="row">

                    <!-- Product Images -->
                    <div class="col-lg-6 col-md-12 mb-3 text-center">
                        <div class="col-6 mb-3">
                            <div class="col-12 mb-3">
                                <img class="img img-fluid" src="{{URL('storage/images/'.$tablet->image_name)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Product Images -->

                    <!-- Product Info -->
                    <div class="col-lg-6 col-md-9">
                        <div class="col-12 product-name large">
                            {{$tablet->name}}
                            <small>By {{$tablet->category->name}}</small>
                        </div>
                        <div class="col-12 px-0">
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="col-12">
                                        <span class="detail-price">
                                            {{$tablet->price}} KM
                                        </span>
                            </div>
                            <form method="get" action="{{route('tablet.addToCart',$tablet->id)}}">
                            <div class="mb-3 col-md-1">
                                <label for="qty">Količina</label>
                                <input type="number" name="kolicina" id="qty" min="1" value="1" class="form-control" required>
                            </div>
                            <div class="col-6 mt-3">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-cart-plus me-2"></i>Dodaj u korpu</button>
                            </div>
                            </form>
                        </div>
                        <!-- Product Info -->
                    </div>
                </div>

                <div class="col-12 mb-3 py-3 bg-white text-justify">
                    <div class="row">

                        <!-- Details -->
                        <div class="col-md-12">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 mb-2 text-uppercase">
                                        <h2><u>Opis</u></h2>
                                    </div>
                                    <div class="col-md-6" id="details">
                                        <p>{{$tablet->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Nazad</a>
                            </div>
                        </div>
                        <!-- Details -->
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content -->
    @endsection
</x-home-master>
