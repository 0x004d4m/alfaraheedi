<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show(Request $request, $id){
        $Product = Product::select('id','name_'.Session::get('locale').' as name', 'price', 'stock', 'image1')->with(['authour:name_'.Session::get('locale').' as name'])->where('id',$id)->first();
        return view('website.product', [
            'Product'=>$Product
        ]);
    }
}
