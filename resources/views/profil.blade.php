<x-home-master>
    @section('content')
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Početna stranica</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nalog</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{URL('storage/images/profil.png')}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h5>
                                <p class="text-muted mb-4">{{auth()->user()->city}}, {{auth()->user()->address}} {{auth()->user()->address_number}}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a class="btn btn-outline-primary" href="{{route('profiledit',auth()->user()->id)}}">Uredi profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Ime</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->first_name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Prezime</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->last_name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telefon</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->phone_number}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Grad</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->city}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Poštanski broj</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->zip_code}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Adresa</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->address}} {{auth()->user()->address_number}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-home-master>
