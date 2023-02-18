<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Customer;
use App\Models\CustomerResetPassword;
use App\Models\CustomerToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ForgetController extends Controller
{
    public function show(Request $request){
        return view('customer.forget');
    }

    public function submit(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required',
        ]);

        if ($validator->fails()) {
            return view('customer.forget')->with( "Error", json_decode( $validator->errors() ) )->with( "Request", $request->all() );
        }

        $Customer = Customer::select('*')->where('email', $request->username)->first();
        if(!$Customer){
            $Customer = Customer::select('*')->where('phone', $request->username)->first();
            if(!$Customer){
                Session::put("Error", __('auth.failed'));
                return view('customer.forget')->with( "Request", $request->all() );
            }
        }

        $CustomerToken = CustomerToken::create([
            'customer_id'=>$Customer->id
        ]);

        $CustomerToken->update([
            'token'=> md5($CustomerToken->createToken('CustomerAuth')->plainTextToken),
        ]);
        $CustomerResetPassword = CustomerResetPassword::create([
            'customer_id'=>$Customer->id
        ]);

        $CustomerResetPassword->update([
            'token'=> md5($CustomerToken->createToken('CustomerResetPassword')->plainTextToken),
        ]);

        $mailData = [
            'customer_id' => $Customer->id,
            'customer_name' => $Customer->first_name.' '.$Customer->last_name,
            'token' => $CustomerResetPassword->token,
        ];
        $FacadesMail = Mail::to($Customer->email)->send(new SendMail($mailData, 'emails.forget', env('APP_NAME').' - Reset Password'));
        return view('customer.forget')->with( "OK", 'Check Email' );
    }

    public function verifyView(Request $request, $token){
        return view('customer.forget2');
    }

    public function verifyPassword(Request $request, $token){
        $CustomerResetPassword = CustomerResetPassword::where('token', $token)->first();
        if($CustomerResetPassword){
            $Customer = Customer::where('id',$CustomerResetPassword->customer_id);
            $Customer->update(['password'=>Hash::make($request->password)]);
            $CustomerResetPassword->delete();
            return redirect('/login');
        }
        return redirect('/login');
    }
}
