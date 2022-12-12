<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function show(Request $request){
        return view('welcome');
    }

    public function submit(Request $request){
        ContactRequest::create([
            'message'=>$request->message,
            'subject'=>$request->subject,
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        Session::flash('Success',__('content.sentSuccessfully'));
        return redirect('/#contact_us');
    }
}
