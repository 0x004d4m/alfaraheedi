<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerEmailVerification extends Model
{
    use HasFactory, CrudTrait, Notifiable, HasApiTokens;
    protected $fillable = [
        'token',
        'customer_id',
    ];
}
