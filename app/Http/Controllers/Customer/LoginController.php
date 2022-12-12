<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function show(Request $request){
        if(Session::has('CustomerToken')){
            return redirect('/store');
        }else{
            return view('customer.login');
        }
    }

    public function submit(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required'
        ]);

        if ($validator->fails()) {
            return view('customer.login')->with( "Error", json_decode( $validator->errors() ) )->with( "Request", $request->all() );
        }

        $Customer = Customer::select('*')->where('email', $request->username)->first();
        if(!$Customer){
            $Customer = Customer::select('*')->where('phone', $request->username)->first();
            if(!$Customer){
                Session::put("Error", __('auth.failed'));
                return view('customer.login')->with( "Request", $request->all() );
            }
        }

        if(!Hash::check($request->password, $Customer->password)){
            Session::put("Error", __('auth.password'));
            return view('customer.login')->with( "Request", $request->all() );
        }

        $CustomerTokens = CustomerToken::where('customer_id', $Customer->id)->get();
        foreach ($CustomerTokens as $CustomerToken) {
            $CustomerToken->delete();
        }

        $CustomerToken = CustomerToken::create([
            'customer_id'=>$Customer->id
        ]);

        $CustomerToken->update([
            'token'=> md5($CustomerToken->createToken('clientAuth')->plainTextToken),
        ]);

        Session::put('CustomerToken', $CustomerToken->token);
        return redirect('/store');
    }
}
