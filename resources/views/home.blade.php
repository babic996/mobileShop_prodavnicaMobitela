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
                                    @foreach($phones as $phone)
                                        <a class="dropdown-item" href="{{route('phone.index.all',$phone->category_id)}}">{{$phone->category->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="fashion" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tableti</a>
                                <div class="dropdown-menu" aria-labelledby="fashion">
                                    @foreach($tablets as $tablet)
                                        <a class="dropdown-item" href="{{route('tablet.index.all',$tablet->category_id)}}">{{$tablet->category->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="books" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Oprema za telefone/tablete</a>
                                <div class="dropdown-menu" aria-labelledby="books">
                                    @foreach($equipment as $equipment)
                                        <a class="dropdown-item" href="{{route('equipment.index.all',$equipment->category_equipment_id)}}">{{$equipment->categoryEquipment->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Nav -->
    @endsection
        @section('slider')
            <!-- Slider -->
                <div class="col-md-12 px-0">
                    <div id="slider" class="carousel slide w-100" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                            <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox" style="max-height: 495px;">
                            <div class="carousel-item active">
                                <img src="{{URL('storage/images/carousel1.jpg')}}" class="slider-img">
                            </div>
                            <div class="carousel-item">
                                <img src="{{URL('storage/images/carousel2.jpg')}}" class="slider-img">
                            </div>
                            <div class="carousel-item">
                                <img src="{{URL('storage/images/carousel3.jpg')}}" class="slider-img">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Slider -->
        @endsection
    @section('products')
        <!-- Latest Product -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Najnoviji mobiteli</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($new_phones as $phone)
                            <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">Novi</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-5 mb-3">
                                            <img src="{{URL('storage/images/'.$phone->image_name)}}" height="300" class="img img-small p-5">
                                        </div>
                                        <div class="col-12 mb-3" style="height: 50px">
                                            <h5 class="product-name"><a href="{{route('phone.index.show',$phone->id)}}" class="product-name">{{$phone->name}}</a></h5>
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
            <!-- Latest Products -->

        <div class="col-12">
            <hr>
        </div>

        <!-- Latest Product -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Najnoviji tableti</h2>
                        </div>
                    </div>
                    <div class="row">

                        @foreach($new_tablets as $tablet)
                        <!-- Product -->
                            <div class="col-lg-3 col-sm-6 my-3">
                                <div class="col-12 bg-white text-center h-100 product-item">
                                    <span class="new">Novi</span>
                                    <div class="row h-100">
                                        <div class="col-12 p-5 mb-3">
                                            <img src="{{URL('storage/images/'.$tablet->image_name)}}" height="300" class="img img-small p-5">
                                        </div>
                                        <div class="col-12 mb-3" style="height: 50px">
                                            <h5 class="product-name"><a href="{{route('tablet.index.show',$tablet->id)}}" class="product-name">{{$tablet->name}}</a></h5>
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
        <!-- Latest Products -->

        <div class="col-12">
            <hr>
        </div>

    @endsection
</x-home-master>
