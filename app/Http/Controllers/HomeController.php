<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Phone;
use App\Models\Tablet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $phones=Phone::distinct()->get('category_id');
        $tablets=Tablet::distinct()->get('category_id');
        $equipment=Equipment::distinct()->get('category_equipment_id');

        $new_phones=Phone::latest('id')->limit(4)->get();
        $new_tablets=Tablet::latest('id')->limit(4)->get();

        return view('home',['phones'=>$phones,'tablets'=>$tablets,'equipment'=>$equipment,'new_phones'=>$new_phones,'new_tablets'=>$new_tablets]);
    }
    public function profil()
    {
        return view('profil');
    }
    public function profiledit(User $user)
    {
        return view('profil-edit',['user'=>$user]);
    }
    public function profilupdate(User $user)
    {
        $user->first_name=request('first_name');
        $user->last_name=request('last_name');
        $user->email=request('email');
        $user->phone_number=request('phone_number');
        $user->zip_code=request('zip_code');
        $user->address=request('address');
        $user->address_number=request('address_number');

        $user->update();
        session()->flash('profil-updated-message','Uspjesno ste izmijenili svoje podatke!');
        return redirect('/');
    }
    public function orders()
    {
        $orders=Auth::user()->orders;
        $orders->transform(function ($order,$key) {
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view('myorders',['orders'=>$orders]);
    }
    public function getReduceByOne($id)
    {
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart',$cart);
        }
        return back();
    }
    public function getRemoveItem($id)
    {
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart',$cart);
        }

        return back();
    }
    public function getAddOne($id)
    {
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->addOne($id);

        Session::put('cart',$cart);

        return back();
    }



}
