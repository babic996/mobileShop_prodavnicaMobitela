<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Phone;
use App\Models\Tablet;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $input=$request['search'];
        $phones_nav=Phone::distinct()->get('category_id');
        $tablets_nav=Tablet::distinct()->get('category_id');
        $equipment_nav=Equipment::distinct()->get('category_equipment_id');


        $results=Search::add(Tablet::class,'name','id')
            ->add(Phone::class,'name','id')
            ->add(Equipment::class,'name','id')
            ->paginate(3)
            ->search($input);
        return view('search-products',['results'=>$results,'phones_nav'=>$phones_nav,'tablets_nav'=>$tablets_nav,'equipment_nav'=>$equipment_nav,'input'=>$input]);
    }
    public function filter(Request $request,$input)
    {
        $phones_nav=Phone::distinct()->get('category_id');
        $tablets_nav=Tablet::distinct()->get('category_id');
        $equipment_nav=Equipment::distinct()->get('category_equipment_id');

        if($request['filter']=="1")
        {
            $results=Search::add(Tablet::class,'name','id')
                ->add(Phone::class,'name','id')
                ->add(Equipment::class,'name','id')
                ->orderByAsc()
                ->paginate(3)
                ->search($input);
        }
        elseif($request['filter']=="2")
        {
            $results=Search::add(Tablet::class,'name','id')
                ->add(Phone::class,'name','id')
                ->add(Equipment::class,'name','id')
                ->orderByDesc()
                ->paginate(3)
                ->search($input);
        }
        elseif($request['filter']=="3")
        {
            $results=Search::add(Tablet::class,'name','price')
                ->add(Phone::class,'name','price')
                ->add(Equipment::class,'name','price')
                ->orderByDesc()
                ->paginate(3)
                ->search($input);
        }
        elseif($request['filter']=="4")
        {
            $results=Search::add(Tablet::class,'name','price')
                ->add(Phone::class,'name','price')
                ->add(Equipment::class,'name','price')
                ->orderByAsc()
                ->paginate(3)
                ->search($input);
        }
        return view('search-products',['results'=>$results,'phones_nav'=>$phones_nav,'tablets_nav'=>$tablets_nav,'equipment_nav'=>$equipment_nav,'input'=>$input]);
    }
}
