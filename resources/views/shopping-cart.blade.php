<x-home-master>
    @section('content')
        <!-- Main Content -->
        @if(\Illuminate\Support\Facades\Session::has('cart'))
            <div class="row">
                <div class="col-md-12 mt-3 text-center text-uppercase">
                    <h2>Vaša korpa</h2>
                </div>
            </div>

            <main class="row mx-auto">
                <div class="col-12 bg-white py-5 mb-5">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-10 mx-auto table-responsive">
                                <div class="col-12">
                                    <table class="table table-striped table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th>Količina</th>
                                            <th>Naziv</th>
                                            <th>Cijena</th>
                                            <th style="width: 20%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                {{$product['qty']}}
                                            </td>
                                            <td>
                                                {{$product['item']['name']}}
                                            </td>
                                            <td>
                                                {{$product['price']}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Promijeni količinu
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="{{route('add.one.article',['id'=>$product['no']])}}">Dodaj jedan</a></li>
                                                        <li><a class="dropdown-item" href="{{route('reduce.one.article',['id'=>$product['no']])}}">Oduzmi jednu</a></li>
                                                        <li><a class="dropdown-item" href="{{route('remove.article',['id'=>$product['no']])}}">Izbriši artikal</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Ukupno</th>
                                            <th>{{$totalPrice}}KM</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-12 text-right py-5">
                                    <a href="{{route('checkout')}}" class="btn btn-outline-success">Potvrdi kupovinu</a>
                                    <div class="float-end">
                                        <a href="{{route('home')}}" class="btn btn-outline-primary">Povratak</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Main Content -->
            @else
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Vaša korpa</h2>
                    </div>
                </div>

                <main class="row">
                    <div class="col-12 bg-white py-3 mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto text-center">
                                <h1>Nema artikala u korpi!</h1>
                            </div>
                        </div>
                    </div>
                </main>
        @endif
    @endsection
</x-home-master>
