<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tablet;
use Illuminate\Http\Request;

class TabletController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        return view('tablet-create',['categories'=>$categories]);
    }

    public function store()
    {

        request()->validate([
            'name'=>'required',
            'price'=>'required|between:1,10000',
            'quantity'=>'required',
            'tablet_image'=>'required',
            'description'=>'required',
            'colors'=>'required',
            'category_id'=>'required',
        ]);



        request()->tablet_image->move('storage/images',request('tablet_image')->getClientOriginalName());

        Tablet::create([
            'name'=>request('name'),
            'price'=>request('price'),
            'quantity'=>request('quantity'),
            'image_name'=>request('tablet_image')->getClientOriginalName(),
            'description'=>request('description'),
            'colors'=>request('colors'),
            'category_id'=>request('category_id')
        ]);

        session()->flash('tablet-created-message','Uspjesno ste dodali novi tablet');
        return redirect('admin/tablet');
    }

    public function index()
    {
        $tablets=Tablet::all();
        return view('tablet-admin-index',['tablets'=>$tablets]);
    }

    public function edit(Tablet $tablet)
    {
        $categories=Category::all();
        return view('tablet-edit',['tablet'=>$tablet,'categories'=>$categories]);
    }
    public function update(Tablet $tablet)
    {
        request()->validate([
            'name'=>'required',
            'price'=>'required|between:1,10000',
            'quantity'=>'required',
            'description'=>'required',
            'colors'=>'required',
            'category_id'=>'required',
        ]);



        if(request('tablet_image')) {
            request()->tablet_image->move('storage/images', request('tablet_image')->getClientOriginalName());
            $tablet->image_name=request('tablet_image')->getClientOriginalName();
        }


        $tablet->name=request('name');
        $tablet->price=request('price');
        $tablet->quantity=request('quantity');
        $tablet->description=request('description');
        $tablet->colors=request('colors');
        $tablet->category_id=request('category_id');

        $tablet->update();
        session()->flash('tablet-updated-message','Uspjesno ste izmijenili podatke o tabletu');
        return redirect('admin/tablet');
    }

    public function destroy(Tablet $tablet, Request $request)
    {
        $tablet->delete();
        $request->session()->flash('tablet-deleted','Uspjesno ste izbrisali tablet');
        return back();
    }

}
