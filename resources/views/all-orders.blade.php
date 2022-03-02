<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-md-12 mt-3 text-center text-uppercase">
                <h2>Sve narudžbe</h2>
            </div>
        </div>
        <main class="row mx-auto">
            <div class="col-12 bg-white py-5 mb-5">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mx-auto table-responsive">
                        <div class="col-12">
                            @foreach($orders as $order)
                                <table class="table table-striped table-hover table-sm mb-5">
                                    <thead>
                                    <tr>
                                        <th style="width: 15%">Količina</th>
                                        <th style="width: 55%">Naziv</th>
                                        <th style="width: 15%">Cijena</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->cart->items as $item)
                                        <tr>
                                            <td>
                                                {{$item['qty']}}
                                            </td>
                                            <td>
                                                {{$item['item']['name']}}
                                            </td>
                                            <td>
                                                {{$item['price']}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-right">Ukupno</th>
                                        <th>{{$order->cart->totalPrice}} KM</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{$orders->links()}}
                </ul>
            </nav>
        </div>
    @endsection
</x-admin-master>
