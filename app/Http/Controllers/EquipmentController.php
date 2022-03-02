<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryEquipment;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function create()
    {
        $categoryEquipments=CategoryEquipment::all();
        return view('equipment-create',['categoryEquipments'=>$categoryEquipments]);
    }

    public function store()
    {
        request()->validate([
            'name'=>'required',
            'price'=>'required|between:1,10000',
            'quantity'=>'required',
            'image_name'=>'required',
            'description'=>'required',
            'category_equipment_id'=>'required',
        ]);

        request()->image_name->move('storage/images',request('image_name')->getClientOriginalName());

        Equipment::create([
            'name'=>request('name'),
            'price'=>request('price'),
            'quantity'=>request('quantity'),
            'image_name'=>request('image_name')->getClientOriginalName(),
            'description'=>request('description'),
            'category_equipment_id'=>request('category_equipment_id')
        ]);

        session()->flash('equipment-created-message','Uspjesno ste dodali novi opremu');
        return back();

    }

    public function index()
    {
        $equipments=Equipment::all();
        return view('equipment-admin-index',['equipments'=>$equipments]);
    }
    public function edit(Equipment $equipment)
    {
        $categories=CategoryEquipment::all();
        return view('equipment-edit',['equipment'=>$equipment,'categories'=>$categories]);
    }
    public function update(Equipment $equipment)
    {
        request()->validate([
            'name'=>'required',
            'price'=>'required|between:1,10000',
            'quantity'=>'required',
            'description'=>'required',
            'category_id'=>'required',
        ]);



        if(request('image_name')) {
            request()->image_name->move('storage/images', request('image_name')->getClientOriginalName());
            $equipment->image_name=request('image_name')->getClientOriginalName();
        }


        $equipment->name=request('name');
        $equipment->price=request('price');
        $equipment->quantity=request('quantity');
        $equipment->description=request('description');
        $equipment->category_equipment_id=request('category_id');

        $equipment->update();
        session()->flash('equipment-updated-message','Uspjesno ste izmijenili podatke o opremi');
        return redirect('admin/equipment');
    }
    public function destroy(Equipment $equipment, Request $request)
    {
        $equipment->delete();
        $request->session()->flash('equipment-deleted','Uspjesno ste izbrisali opremu');
        return back();
    }
}
