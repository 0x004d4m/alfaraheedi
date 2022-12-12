<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Authour;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public function show(Request $request){
        $Categories = Category::select('id', 'name_'.Session::get('locale').' as name', 'image')->get();
        $Authours = Authour::select('id', 'name_'.Session::get('locale').' as name')->get();
        $Products = Product::filter($request)->select('id','name_'.Session::get('locale').' as name', 'price', 'stock', 'image1')->with(['authour:name_'.Session::get('locale').' as name'])->paginate(20);

        return view('store',[
            "Categories" => $Categories,
            "Authours" => $Authours,
            "Products" => $Products,
        ]);
    }
}
