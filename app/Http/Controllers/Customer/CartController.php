<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request){
        $Customer = Customer::where('id',$request->customer_id)->first();
        $Setting = Setting::first();
        $OrderItems = OrderItem::with([
            'product:id,price,tax,image1,name_'.Session::get('locale').' as name'
        ])->where('customer_id',$request->customer_id)->whereNull('order_id')->get();
        return view('customer.cart', [
            "OrderItems" => $OrderItems,
            "Address" => $Customer->address,
            "Setting" => $Setting,
        ]);
    }

    public function store(Request $request){
        $Product = Product::where('id',$request->product_id)->first();
        $OrderItems = OrderItem::where('product_id',$request->product_id)->where('customer_id',$request->customer_id)->whereNull('order_id')->get();
        if(count($OrderItems)>0){
            Session::flash('Error',__('content.alreadyInCart'));
        }else{
            $OrderItem = OrderItem::create([
                'product_id'=>$request->product_id,
                'customer_id'=>$request->customer_id,
                'quantity'=>$request->quantity,
                'price'=>$Product->price,
                'tax'=>$Product->tax,
            ]);
            Session::flash('Success',__('content.addedSuccessfully'));
        }
        return redirect('/Product/'.$request->product_id);
    }

    public function destroy(Request $request, $id){
        OrderItem::where('id', $id)->delete();
        return redirect('/cart');
    }
}
