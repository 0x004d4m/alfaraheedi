<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request){
        $Orders = Order::with([
            'orderStatus:id,name_'.Session::get('locale').' as name',
            'orderItems:id,price,quantity,order_id,product_id',
        ])->paginate();
        return view('customer.orders',[
            "Orders"=>$Orders,
        ]);
    }

    public function store(Request $request){
        $Customer = Customer::where('id', $request->customer_id)->first();
        $Order = Order::create([
            'order_status_id'=>1,
            'customer_id'=>$request->customer_id,
            'driver_id'=>null,
            'address'=>$Customer->address,
        ]);

        $OrderItems = OrderItem::where('customer_id',$request->customer_id)->whereNull('order_id')->get();

        foreach($OrderItems as $OrderItem){
            $OrderItem->update([
                'order_id'=>$Order->id
            ]);
            $Product = Product::where('id', $OrderItem->product_id)->first();
            $stock = $Product->stock - $OrderItem->quantity;
            $Product->update([
                'stock'=>($stock<0)?0:$stock
            ]);
        }
        return redirect('/orders');
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
            'orderItems:id,price,quantity,order_id,product_id',
            'orderItems.product:id,price,image1,name_'.Session::get('locale').' as name'
        ])->where('id', $id)->first();
        return view('customer.order',[
            "Order"=>$Order,
        ]);
    }
}
