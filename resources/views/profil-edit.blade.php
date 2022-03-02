<x-home-master>
    @section('content')
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Izmijeni podatke</h3>
                            <form method="POST" action="{{route('profilupdate',auth()->user()->id)}}">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="first_name" class="form-control form-control-lg"
                                                   name="first_name" required
                                                   value="{{auth()->user()->first_name}}"
                                                   autocomplete="first_name" autofocus/>
                                            <label class="first_name" for="first_name">Ime</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="last_name" class="form-control form-control-lg"
                                                   name="last_name" required
                                                   value="{{auth()->user()->last_name}}"
                                                   autocomplete="last_name" autofocus/>
                                            <label class="form-label" for="lastName">Prezime</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                   name="email" required
                                                   value="{{auth()->user()->email}}"
                                                   autocomplete="email" autofocus/>
                                            <label class="form-label" for="email">Email</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="phone_number" class="form-control form-control-lg"
                                                   name="phone_number" required
                                                   value="{{auth()->user()->phone_number}}"
                                                   autocomplete="phone_number" autofocus/>
                                            <label class="form-label" for="phone_number">Broj telefona</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="city" class="form-control form-control-lg"
                                                   name="city" required
                                                   value="{{auth()->user()->city}}"
                                                   autocomplete="city" autofocus/>
                                            <label class="form-label" for="city">Grad</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="zip_code" class="form-control form-control-lg"
                                                   name="zip_code" required
                                                   value="{{auth()->user()->zip_code}}"
                                                   autocomplete="zip_code" autofocus/>
                                            <label class="form-label" for="zip_code">Poštanski broj</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="address" class="form-control form-control-lg "
                                                   name="address" required
                                                   value="{{auth()->user()->address}}"
                                                   autocomplete="address" autofocus/>
                                            <label class="form-label" for="address">Adresa</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="address_number" class="form-control form-control-lg "
                                                   name="address_number" required
                                                   value="{{auth()->user()->address_number}}"
                                                   autocomplete="address_number" autofocus/>
                                            <label class="form-label" for="address_number">Broj ulice</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Izmijeni" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-home-master>
