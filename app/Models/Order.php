<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'orders';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'order_status_id',
        'customer_id',
        'driver_id',
        'address',
        'delivery_price',
        'total',
        'code',
        'discount',
        'name',
        'card_number',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::updated(function ($Order) {
            $mailData = [
                'Customer'=>$Order->customer->email,
                'Order_number'=>$Order->id,
                'Invoice_date'=>date('d-m-Y', strtotime($Order->created_at)),
                'Payment_method'=>'Cash',
                'Currency'=>'SR',
                'Shipping_address'=>$Order->address . ($Order->name==''?'':'<p> Customer Name: '.$Order->name.'</p>') . ($Order->card_number==''?'':'<p>Customer Card Number: '.$Order->card_number.'</p>'),
                'Order'=>$Order,
            ];
            if($Order->order_status_id == 6 || $Order->order_status_id == 4 || $Order->order_status_id == 3 || $Order->order_status_id == 2){
                $FacadesMail = Mail::to($Order->customer->email)->send(new SendMail($mailData, 'emails.order', env('APP_NAME').' - Track your order'));
            }
        });
    }
}
