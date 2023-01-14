<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function checkDiscount(Request $request){
        if($request->discount=='' || $request->discount==null){
            Session::flash('error',__('content.DiscountCodeIsNull'));
            return redirect('/cart#discount');
        }
        Session::put('discount',$request->discount);
        Session::put('name',$request->name);
        Session::put('card_number',$request->card_number);
        $Discount = Discount::where('code',$request->discount)->where('active',1)->count();
        if($Discount==0){
            Session::flash('error',__('content.DiscountCodeIsNotCorrect'));
            return redirect('/cart#discount');
        }else{
            $OrderItems = OrderItem::where('customer_id',$request->customer_id)->whereNull('order_id')->get();
            foreach($OrderItems as $OrderItem){
                $Discount = Discount::where('category_id',$OrderItem->product->category_id)->where('code',$request->discount)->where('active',1)->first();
                if(($Discount)){
                    $OrderItem->update([
                        'code'=>$Discount->code,
                        'discount_value'=>$Discount->discount_value,
                        'category_id'=>$Discount->category_id,
                    ]);
                }else{
                    $OrderItem->update([
                        'code'=>null,
                        'discount_value'=>null,
                        'category_id'=>null,
                    ]);
                }
            }
        }
        return redirect('/cart#discount');
    }
}
