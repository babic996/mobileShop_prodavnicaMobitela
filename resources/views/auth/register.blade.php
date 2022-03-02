<x-home-master>
    @section('content')
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registracija</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="first_name" class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                                   name="first_name" value="{{ old('first_name') }}" required
                                                   autocomplete="first_name" autofocus/>
                                            <label class="first_name" for="first_name">Ime</label>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="last_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                                   name="last_name" value="{{ old('last_name') }}" required
                                                   autocomplete="last_name" autofocus/>
                                            <label class="form-label" for="lastName">Prezime</label>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email" autofocus/>
                                            <label class="form-label" for="email">Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="phone_number" class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                                   name="phone_number" value="{{ old('phone_number') }}" required
                                                   autocomplete="phone_number" autofocus/>
                                            <label class="form-label" for="phone_number">Broj telefona</label>
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="city" class="form-control form-control-lg @error('city') is-invalid @enderror"
                                                   name="city" value="{{ old('city') }}" required
                                                   autocomplete="city" autofocus/>
                                            <label class="form-label" for="city">Grad</label>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="zip_code" class="form-control form-control-lg @error('zip_code') is-invalid @enderror"
                                                   name="zip_code" value="{{ old('zip_code') }}" required
                                                   autocomplete="zip_code" autofocus/>
                                            <label class="form-label" for="zip_code">Poštanski broj</label>
                                            @error('zip_code')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="address" class="form-control form-control-lg @error('address') is-invalid @enderror"
                                                   name="address" value="{{ old('address') }}" required
                                                   autocomplete="address" autofocus/>
                                            <label class="form-label" for="address">Adresa</label>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="address_number" class="form-control form-control-lg @error('address_number') is-invalid @enderror"
                                                   name="address_number" value="{{ old('address_number') }}" required
                                                   autocomplete="address_number" autofocus/>
                                            <label class="form-label" for="address_number">Broj ulice</label>
                                            @error('address_number')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                   name="password" value="{{ old('password') }}" required
                                                   autocomplete="new-password" autofocus/>
                                            <label class="form-label" for="password">Lozinka</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="password" id="password-confirm" class="form-control form-control-lg"
                                                   name="password_confirmation" required
                                                   autocomplete="new-password" autofocus/>
                                            <label class="form-label" for="password-confirm">Ponovi lozinku</label>
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
