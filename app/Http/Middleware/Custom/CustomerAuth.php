<?php

namespace App\Http\Middleware\Custom;

use App\Models\Client;
use App\Models\ClientToken;
use App\Models\CustomerToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('CustomerToken')){
            $CustomerToken = CustomerToken::where('token', Session::get('CustomerToken'))->first();

            $request->merge(['customer_id' => $CustomerToken->customer_id]);

            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
