<x-home-master>
    @section('content')
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Narudžba</h3>
                            <h4 class="mb-4 pb-2 pb-md-0 mb-md-5">Ukupno za platiti: {{$total}} KM</h4>
                            <form method="POST" action="{{ route('checkout') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="firstname" class="form-control form-control-lg"
                                                   name="firstname"  required
                                                   autocomplete="firstname" autofocus/>
                                            <label class="first_name" for="firstname">Ime</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="lastname" class="form-control form-control-lg"
                                                   name="lastname" required
                                                   autocomplete="lastname" autofocus/>
                                            <label class="form-label" for="lastname">Prezime</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="city" class="form-control form-control-lg"
                                                   name="city" required
                                                   autocomplete="city" autofocus/>
                                            <label class="form-label" for="city">Grad</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="zipcode" class="form-control form-control-lg"
                                                   name="zipcode"  required
                                                   autocomplete="zipcode" autofocus/>
                                            <label class="form-label" for="zipcode">Poštanski broj</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="address" class="form-control form-control-lg"
                                                   name="address" required
                                                   autocomplete="address" autofocus/>
                                            <label class="form-label" for="address">Adresa</label>
                                        </div>

                                    </div>
                                    <div class="col-md-4 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="addressnumber" class="form-control form-control-lg "
                                                   name="addressnumber" required
                                                   autocomplete="addressnumber" autofocus/>
                                            <label class="form-label" for="addressnumber">Broj ulice</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="phonenumber" class="form-control form-control-lg"
                                               name="phonenumber" required
                                               autocomplete="phonenumber" autofocus/>
                                            <label class="form-label" for="phonenumber">Broj telefona</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Potvrdi" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-home-master>
