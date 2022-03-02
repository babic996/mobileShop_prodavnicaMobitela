<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category-create');
    }

    public function store()
    {
        request()->validate([
           'category_name'=>'required',
        ]);

        $slug=Str::lower(request()->category_name);

        Category::create([
            'name'=>request()->category_name,
            'slug'=>$slug
        ]);

        session()->flash('categroy-created-message','Uspjesno ste dodali novu kategoriju');
        return redirect('admin/category');
    }
    public function index()
    {
        $categories=Category::all();
        return view('category-admin-index',['categories'=>$categories]);
    }

    public function edit(Category $category)
    {
        return view('category-edit',['category'=>$category]);
    }
    public function update(Category $category)
    {
        request()->validate([
           'category_name'=>'required'
        ]);

        $category->name=request()->category_name;
        $category->update();

        session()->flash('category-updated-message','Uspjesno ste izmijenili podatke o kategoriji');
        return redirect('admin/category');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        request()->session()->flash('category-deleted','Uspjesno ste izbrisali kategoriju');
        return back();
    }
}
