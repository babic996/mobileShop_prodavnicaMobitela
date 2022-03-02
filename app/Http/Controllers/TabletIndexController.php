<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Cart;
use App\Models\Phone;
use App\Models\Tablet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class TabletIndexController extends Controller
{
    public function index($id)
    {

        $tablets=Tablet::where('category_id',$id)->paginate(3);
        $phones_nav=Phone::distinct()->get('category_id');
        $tablets_nav=Tablet::distinct()->get('category_id');
        $equipment_nav=Equipment::distinct()->get('category_equipment_id');


        return view('tablet-list',['tablets'=>$tablets,'phones_nav'=>$phones_nav,'tablets_nav'=>$tablets_nav,'equipment_nav'=>$equipment_nav,'id'=>$id]);
    }
    public function show(Tablet $tablet)
    {
        $tablet->all();
        return view('tablet-info',['tablet'=>$tablet]);
    }
    public function getAddToCart(Request $request,$id)
    {
        $tablet=Tablet::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($tablet,$request['kolicina']);

        $request->session()->put('cart',$cart);
        return back();
    }
    public function filter(Request $request, $id)
    {
        $phones_nav=Phone::distinct()->get('category_id');
        $tablets_nav=Tablet::distinct()->get('category_id');
        $equipment_nav=Equipment::distinct()->get('category_equipment_id');

        if($request['filter']=="1")
        {
            $tablets=Search::add(Tablet::class,'category_id','id')
                ->orderByAsc()
                ->paginate(3)
                ->search($id);
        }
        elseif($request['filter']=="2")
        {
            $tablets=Search::add(Tablet::class,'category_id','id')
                ->orderByDesc()
                ->paginate(3)
                ->search($id);
        }
        elseif($request['filter']=="3")
        {
            $tablets=Search::add(Tablet::class,'category_id','price')
                ->orderByDesc()
                ->paginate(3)
                ->search($id);
        }
        elseif($request['filter']=="4")
        {
            $tablets=Search::add(Tablet::class,'category_id','price')
                ->orderByAsc()
                ->paginate(3)
                ->search($id);
        }
        return view('tablet-list',['tablets'=>$tablets,'phones_nav'=>$phones_nav,'tablets_nav'=>$tablets_nav,'equipment_nav'=>$equipment_nav,'id'=>$id]);
    }

}
