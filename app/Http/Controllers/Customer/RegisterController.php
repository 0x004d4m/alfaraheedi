<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Customer;
use App\Models\CustomerEmailVerification;
use App\Models\CustomerToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show(Request $request){
        if(Session::has('CustomerToken')){
            return redirect('/store');
        }else{
            return view('customer.register');
        }
    }

    public function verifyEmail(Request $request, $token){
        $CustomerEmailVerification = CustomerEmailVerification::where('token', $token)->first();
        if($CustomerEmailVerification){
            $CustomerEmailVerification->update([
                'is_verified'=>1
            ]);
            return view('emails.verified');
        }
        return view('emails.notVerified');
    }

    public function submit(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'address'=>'required',
            'image'=>'nullable',
            'phone'=>['required','unique:customers,phone'],
            'password'=>['required','confirmed','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/i']
        ]);

        if ($validator->fails()) {
            Log::debug("Error" .  $validator->errors() );
            return view('customer.register')->with( "Error", json_decode( $validator->errors() ) )->with( "Request", $request->all() );
        }

        $image=null;
        if($request->image){
            $uploadedFile = $request->file('image');
            $fileLocation = 'customer/';
            $fileName= time().'.'.$uploadedFile->extension();
            $uploadedFile->storeAs('public/'.$fileLocation, $fileName);
            $image='storage/'.$fileLocation.$fileName;
        }else{
            $image='/template/assets/img/default.png';
        }

        $Customer = Customer::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'image'=> $image,
            'password'=> $request->password
        ]);

        $CustomerToken = CustomerToken::create([
            'customer_id'=>$Customer->id
        ]);

        $CustomerToken->update([
            'token'=> md5($CustomerToken->createToken('CustomerAuth')->plainTextToken),
        ]);

        $CustomerEmailVerification = CustomerEmailVerification::create([
            'customer_id'=>$Customer->id
        ]);

        $CustomerEmailVerification->update([
            'token'=> md5($CustomerToken->createToken('CustomerEmailVerification')->plainTextToken),
        ]);

        $mailData = [
            'customer_id' => $Customer->id,
            'customer_id' => $CustomerEmailVerification->token,
        ];
        $FacadesMail = Mail::to($Customer->email)->send(new SendMail($mailData, 'emails.register', 'Email Confirmation - Smartcore-KSA'));

        Session::put('CustomerToken', $CustomerToken->token);
        return redirect('/store');
    }
}
