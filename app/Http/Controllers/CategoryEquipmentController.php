<?php

namespace App\Http\Controllers;

use App\Models\CategoryEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryEquipmentController extends Controller
{
    public function create()
    {
        return view('category-equipment-create');
    }

    public function store()
    {
        request()->validate([
            'category_name'=>'required',
        ]);

        $slug=Str::lower(request()->category_name);

        CategoryEquipment::create([
            'name'=>request()->category_name,
            'slug'=>$slug
        ]);

        session()->flash('categroy-equipment-created-message','Uspjesno ste dodali novu kategoriju za opremu');
        return redirect('admin/category/equipment');
    }
    public function index()
    {
        $categories=CategoryEquipment::all();
        return view('category-equipment-admin-index',['categories'=>$categories]);
    }

    public function edit(CategoryEquipment $categoryEquipment)
    {
        return view('category-equipment-edit',['category'=>$categoryEquipment]);
    }
    public function update(CategoryEquipment $categoryEquipment)
    {
        request()->validate([
            'category_name'=>'required'
        ]);

        $categoryEquipment->name=request()->category_name;
        $categoryEquipment->update();

        session()->flash('category-equipment-updated-message','Uspjesno ste izmijenili podatke o kategoriji');
        return redirect('admin/category/equipment');
    }
    public function destroy(CategoryEquipment $categoryEquipment)
    {
        $categoryEquipment->delete();
        request()->session()->flash('category-equipment-deleted','Uspjesno ste izbrisali kategoriju za opremu');
        return back();
    }
}
