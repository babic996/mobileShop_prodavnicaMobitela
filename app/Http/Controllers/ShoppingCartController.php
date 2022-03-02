<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $total=$cart->totalPrice;
        return view('shop-checkout',['total'=>$total]);
    }
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);

        $order=new Order();
        $order->cart=serialize($cart);
        $order->firstname=$request->input('firstname');
        $order->lastname=$request->input('lastname');
        $order->city=$request->input('city');
        $order->zip_code=$request->input('zipcode');
        $order->address=$request->input('address');
        $order->address_number=$request->input('addressnumber');
        $order->phone_number=$request->input('phonenumber');

        if(auth()->user())
        {
            Auth::user()->orders()->save($order);
            Session::forget('cart');
            session()->flash('successful-order','Uspjesno ste izvrsili narudzbu.');
            return redirect('/');
        }
        else
        {
            session()->flash('unsuccessful-order','Morate se prijaviti ili registrovati za potvrdu narudzbe');
            return redirect('/');
        }
    }
}
