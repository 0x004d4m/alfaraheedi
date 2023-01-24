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
                'order_id' => $Order->id,
            ];
            if($Order->order_status_id == 2){
                $FacadesMail = Mail::to($Order->customer->email)->send(new SendMail($mailData, 'emails.order.in_progress', 'Smartcore-KSA - Order Status'));
            }
            if($Order->order_status_id == 3){
                $FacadesMail = Mail::to($Order->customer->email)->send(new SendMail($mailData, 'emails.order.shipping', 'Smartcore-KSA - Order Status'));
            }
            if($Order->order_status_id == 4){
                $FacadesMail = Mail::to($Order->customer->email)->send(new SendMail($mailData, 'emails.order.delivered', 'Smartcore-KSA - Order Status'));
            }
            if($Order->order_status_id == 6){
                $FacadesMail = Mail::to($Order->customer->email)->send(new SendMail($mailData, 'emails.order.rejected', 'Smartcore-KSA - Order Status'));
            }
        });
    }
}
