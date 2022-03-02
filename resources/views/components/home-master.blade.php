<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobile Shop</title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

    <link rel="stylesheet" href={{asset("css/bootstrap.css")}}>
    <link rel="stylesheet" href={{asset("css/all.min.css")}}>
    <link rel="stylesheet" href={{asset("css/style.css")}}>
</head>
<body>
<div class="container-fluid">
    @if(session('successful-order'))
        <p class="alert alert-success">{{session('successful-order')}}</p>
        @elseif(session('unsuccessful-order'))
        <p class="alert alert-danger">{{session('unsuccessful-order')}}</p>
    @elseif(session('profil-updated-message'))
        <p class="alert alert-success">{{session('profil-updated-message')}}</p>
    @endif
    <div class="row min-vh-100">
        <div class="col-12">
            <header class="row">
                <!-- Top Nav -->
                <nav class="navbar navbar-expand-sm" id="main-nav" style="background-color: #3ac962;">
                    <div class="container">
                        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav ms-auto">
                                @guest
                                    @if(Route::has('login'))
                                <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#loginModal">Prijavi se</a>
                                 </li>
                                    @endif

                                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link text-white">Registruj se</a>
                                </li>
                                        @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Nalog
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('profil')}}">Profil</a></li>
                                        <li><a class="dropdown-item" href="{{route('myorders')}}">Moje narudžbe</a></li>
                                        @if(\Illuminate\Support\Facades\Auth::user()->userHasRole('Admin'))
                                        <li><a class="dropdown-item" href="{{route('admin.index')}}">Admin</a></li>
                                        @endif
                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form method="POST" action="{{route('logout')}}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Odjavi se</button>
                                            </form>
                                        </li>
                                     </ul>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Navbar -->

                <!-- Header -->
                <div class="col-12 pt-4" style="background-color: #0074e1;">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="site-logo text-center text-lg-left">
                                <a href="{{route('home')}}">Mobile Shop</a>
                            </div>
                        </div>
                        <div class="col-lg-5 mx-auto mt-4 mt-lg-0 mb-4">
                            <form method="get" action="{{route('search')}}">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="search" name="search" class="form-control border-2 border-dark" placeholder="Pretraga..." required>
                                        <button type="submit" class="btn btn-outline-dark border-2"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-auto text-center text-lg-left header-item-holder">
                            <a href="{{route('shopping.cart')}}" class="header-item">
                                <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">{{\Illuminate\Support\Facades\Session::has('cart')?\Illuminate\Support\Facades\Session::get('cart')->totalQty:''}}</span>
                            </a>
                        </div>
                    </div>
                @yield('navbar')
                </div>
                <!-- Header -->
            </header>
        </div>

        <div class="col-12">
            <!-- Main Content -->
            <main class="row">

                <!-- Slider -->
                @yield('slider')
                <!-- Slider -->

                <!--Login Modal-->

                <div class="modal fade" tabindex="-1" id="loginModal">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header text-white" style="background-color: #6cdaee;">
                                <h5 class="modal-title">Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('login') }}" id="form">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="E-mail">E-mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                               id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                               id="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn text-white" style="background-color: #3ac962;">Potvrdi</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izadji</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Login Modal-->

                @yield('content')

                @yield('products')

                <div class="col-12 py-3 bg-light d-sm-block d-none">
                    <div class="row">
                        <div class="col-lg-3 col ms-auto large-holder">
                            <div class="row">
                                <div class="col-auto ms-auto large-icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="col-auto me-auto large-text">
                                    Najbolja cijena
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col large-holder">
                            <div class="row">
                                <div class="col-auto ms-auto large-icon">
                                    <i class="fas fa-truck-moving"></i>
                                </div>
                                <div class="col-auto me-auto large-text">
                                    Brza dostava
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col me-auto large-holder">
                            <div class="row">
                                <div class="col-auto ms-auto large-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="col-auto me-auto large-text">
                                    Kvalitet
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Main Content -->
        </div>

            <footer class="text-white text-center text-lg-start" style="background-color: #3ac962;">
                    <!-- Grid container -->
                    <div class="container p-4">
                        <!--Grid row-->
                        <div class="row mt-4">
                            <!--Grid column-->
                            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                                <h5 class="text-uppercase mb-4">ZAPRATITE NAS</h5>

                                <div class="mt-4">
                                    <!-- Facebook -->
                                    <a type="button" class="btn btn-floating btn-light btn-lg text-center" style="width: 50px"><i class="fab fa-facebook-f"></i></a>
                                    <!-- Twitter -->
                                    <a type="button" class="btn btn-floating btn-light btn-lg" style="width: 50px"><i class="fab fa-twitter"></i></a>
                                    <!-- Instagram -->
                                    <a type="button" class="btn btn-floating btn-light btn-lg" style="width: 50px"><i class="fab fa-instagram"></i></a>
                                    <!-- Google + -->
                                    <a type="button" class="btn btn-floating btn-light btn-lg" style="width: 50px"><i class="fab fa-google-plus-g"></i></a>
                                    <!-- Linkedin -->
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase mb-4 pb-1">Kontakt</h5>

                                <ul class="fa-ul" style="margin-left: 1.65em;">
                                    <li class="mb-3">
                                        <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Istočno Sarajevo 71123, BiH</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">mshop@mail.com</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+38765291794</span>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase mb-4">Radno vrijeme</h5>

                                <table class="table text-center text-white">
                                    <tbody class="font-weight-normal">
                                    <tr>
                                        <td>Pon - Pet:</td>
                                        <td>08:00 - 22:00</td>
                                    </tr>
                                    <tr>
                                        <td>Subota:</td>
                                        <td>08:00 - 16:00</td>
                                    </tr>
                                    <tr>
                                        <td>Nedelja:</td>
                                        <td>Ne radimo</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2022 Copyright: Mobile Shop
                    </div>
                    <!-- Copyright -->
                </footer>
            <!-- End of .container -->
            <!-- Footer -->
    </div>
</div>



<script type="text/javascript" src={{asset("js/jquery.js")}}></script>
<script type="text/javascript" src={{asset("js/bootstrap.js")}}></script>
<script type="text/javascript" src={{asset("js/script.js")}}></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
