<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request){
        $Orders = Order::with([
            'orderStatus:id,name_'.Session::get('locale').' as name',
        ])->where('customer_id', $request->customer_id)->orderBy('id','desc')->paginate();

        return view('customer.orders',[
            "Orders"=>$Orders,
            "Setting"=>Setting::first(),
        ]);
    }

    public function store(Request $request){
        $Setting = Setting::first();

        $sum=0;
        $discount=0;
        foreach(OrderItem::where('customer_id',$request->customer_id)->whereNull('order_id')->get() as $OrderItem){
            $Product = Product::where('id', $OrderItem->product_id)->first();
            $stock = $Product->stock - $OrderItem->quantity;
            $Product->update([
                'stock'=>($stock<0)?0:$stock
            ]);

            $price = ($OrderItem->quantity * $OrderItem->price + ( $OrderItem->quantity * ($OrderItem->price * $OrderItem->tax/100)));
            $price2 = ($OrderItem->quantity * ($OrderItem->price * $OrderItem->discount_value/100));
            $sum+=$price;
            $discount+=$price2;
        }
        $payment_id=null;
        $hyperpay=null;
        if($request->payment_method==2){
            $hyperpay = createPayment($sum);
            $hyperpay_decoded = json_decode($hyperpay);
            if($hyperpay_decoded->result->code == '000.200.100'){
                $payment_id= $hyperpay_decoded->id;
            }else{
                Session::flash('Error',__('content.retryPayment'));
                return redirect('/cart');
            }
        }

        $Order = Order::create([
            'order_status_id'=>1,
            'customer_id'=>$request->customer_id,
            'driver_id'=>null,
            'address'=>$request->address,
            'name'=>$request->name,
            'card_number'=>$request->card_number,
            'code'=>$request->discount,
            'delivery_price'=>0,
            'total'=>0,
            'payment_method'=>$request->payment_method,
            'paymnet_id'=>$payment_id,
            'prepare_checkout_result'=>$hyperpay,
        ]);
        foreach(OrderItem::where('customer_id',$request->customer_id)->whereNull('order_id')->get() as $OrderItem){
            $OrderItem->update([
                'order_id'=>$Order->id
            ]);
        }

        $Order->update([
            'discount'=>$discount,
            'delivery_price'=>$Setting->delivery_price,
            'total'=>(($sum + $Setting->delivery_price)-$discount),
        ]);
        Session::forget('discount');
        Session::forget('name');
        Session::forget('card_number');

        if($request->payment_method==2){
            return redirect("order/$Order->id/pay");
        }
        return redirect('/order');
    }

    public function pay(Request $request, $id){
        $Order = Order::where('id', $id)->first();
        return view('customer.pay',[
            "Order"=>$Order,
        ]);
    }

    public function pay2(Request $request, $id){
        $Order = Order::where('id', $id)->first();
        if($Order->status==0 && $Order->check_payment_result == null){
            $hyperpay_decoded = json_decode($Order->prepare_checkout_result);

            $checkpayment =  checkPayment($hyperpay_decoded->id);
            $checkpayment_decoded =  json_decode($checkpayment);

            if(
                $checkpayment_decoded->result->code == '000.100.110'
                &&
                $hyperpay_decoded->id == $request->id
            ){
                $Order->update([
                    'check_payment_result' => $checkpayment
                ]);
                return redirect('/order');
            }else{
                return back();
            }
        }else{
            return redirect('/order');
        }
        return redirect('/order');
    }

    public function update(Request $request, $id){
        $Order = Order::where('id', $id)->first();
        $Order->update([
            'order_status_id'=>5,
        ]);
        return redirect('/order');
    }

    public function show(Request $request, $id){
        $Order = Order::with([
            'orderStatus:id,name_'.Session::get('locale').' as name',
            'orderItems:id,price,tax,quantity,order_id,product_id',
            'orderItems.product:id,price,tax,image1,name_'.Session::get('locale').' as name'
        ])->where('id', $id)->first();
        return view('customer.order',[
            "Order"=>$Order,
        ]);
    }
}
