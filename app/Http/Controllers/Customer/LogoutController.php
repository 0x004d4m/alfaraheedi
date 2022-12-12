<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function submit(Request $request){
        Session::forget('CustomerToken');
        CustomerToken::where('customer_id', $request->customer_id)->delete();
        return redirect('/');
    }
}
