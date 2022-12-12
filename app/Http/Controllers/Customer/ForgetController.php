<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetController extends Controller
{
    public function show(Request $request){
        return view('website.login');
    }

    public function submit(Request $request){
        return view('website.login');
    }
}
