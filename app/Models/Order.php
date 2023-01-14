<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail as FacadesMail;

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
            if($Order->order_status_id == 2){
                $testMailData = [
                    'title' => 'Test Email From AllPHPTricks.com',
                    'body' => 'This is the body of test email.'
                ];
                $FacadesMail = FacadesMail::to('adam31999@gmail.com')->send(new SendMail($testMailData));
                Log::debug(json_encode($FacadesMail));
            }
            if($Order->order_status_id == 3){

            }
            if($Order->order_status_id == 4){

            }
            if($Order->order_status_id == 6){

            }
        });
    }
}
