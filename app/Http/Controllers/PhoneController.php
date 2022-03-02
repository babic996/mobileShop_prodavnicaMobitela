<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryEquipment;
use App\Models\Phone;
use App\Models\Tablet;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    //

    public function create()
    {
        $categories=Category::all();
        return view('phone-create',['categories'=>$categories]);
    }

    public function store()
    {
        request()->validate([
            'phone_name'=>'required',
            'price'=>'required|between:1,10000',
            'quantity'=>'required',
            'image_name'=>'required',
            'description'=>'required',
            'colors'=>'required',
            'category_id'=>'required',
        ]);

        request()->image_name->move('storage/images',request('image_name')->getClientOriginalName());

        Phone::create([
            'name'=>request('phone_name'),
            'price'=>request('price'),
            'quantity'=>request('quantity'),
            'image_name'=>request('image_name')->getClientOriginalName(),
            'description'=>request('description'),
            'colors'=>request('colors'),
            'category_id'=>request('category_id')
        ]);

        session()->flash('phone-created-message','Uspjesno ste dodali novi telefon');
        return redirect('admin/phone');
    }

    public function index()
    {
        $phones=Phone::all();
        return view('phone-admin-index',['phones'=>$phones]);
    }

    public function edit(Phone $phone)
    {
        $categories=Category::all();
        return view('phone-edit',['phone'=>$phone,'categories'=>$categories]);
    }

    public function update(Phone $phone)
    {
        request()->validate([
            'phone_name'=>'required',
            'price'=>'required|between:1,10000',
            'quantity'=>'required',
            'description'=>'required',
            'colors'=>'required',
            'category_id'=>'required',
        ]);



        if(request('image_name')) {
            request()->image_name->move('storage/images', request('image_name')->getClientOriginalName());
            $phone->image_name=request('image_name')->getClientOriginalName();
        }


        $phone->name=request('phone_name');
        $phone->price=request('price');
        $phone->quantity=request('quantity');
        $phone->description=request('description');
        $phone->colors=request('colors');
        $phone->category_id=request('category_id');

        $phone->update();
        session()->flash('phone-updated-message','Uspjesno ste izmijenili podatke o telefonu');
        return redirect('admin/phone');
    }
    public function destroy(Phone $phone, Request $request)
    {
        $phone->delete();
        $request->session()->flash('phone-deleted','Uspjesno ste izbrisali telefon');
        return back();
    }

}
