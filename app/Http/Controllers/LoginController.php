<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
class LoginController extends Controller
{
    public function login_form(Request $request)
    {
        if(is_numeric($request->email)){

            $msg = 'Invalide mobil number or password';
        }
        elseif (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            
           $msg = 'Invalide email or password';
        }
        else{
            $msg = 'Invalide username or password';
        }
         $customer=DB::table('customers')->where('email', '=', $request->email)
            ->OrWhere('name', '=', $request->email)
            ->OrWhere('mobile_number', '=', $request->email)
            ->first();
         
         if(!empty($customer)){
           
          if($request->has('remember_me')){
            
            $token = Carbon::now();
            $token= Hash::make($token);
            Cache::forever('remember_token' , $token);
            $customer=Customer::find($customer->id);
            $customer->remember_token = $token;
            $customer->save();

          }

          if($customer->email_verified_at != null){

         if(Hash::check($request->password , $customer->password)){
          
          $request->session()->put('customer_login' , true);
          $request->session()->put('customer_data' , $customer);
          $request->session()->put('customer_id' , $customer->id);
          $request->session()->put('customer_name' , $customer->name);
          $request->session()->put('status' , 1);

          $getempdata=TempUser();

          DB::table('carts')
              ->where('user_id' , $getempdata)
              ->where('user_type' , 'Unregistered')
              ->update(['user_id' => $customer->id , 'user_type' => 'Registered']);

          return response()->json(['status' => true , 'msg' => 'Login Successfully']);

        }
    }
    else{
           
         $customer=Customer::find($customer->id);
         $customer->expire_link=date('Y-m-d h:i:s' , strtotime('+ 60 minutes'));
         $customer->save();
         $mail = Mail::send(new EmailVerification($request));  
        return response()->json(['status' => false , 'msg' => 'Your Email is not verified! Please check your mail for email verification']);
    }
}
    else{

        return response()->json(['status' => false , 'msg' => $msg]);
    }   

    }

    public function verify_email($email)
    {
        $customer = Customer::where('email' , $email)->first();
    
        if($customer->expire_link >= date('Y-m-d h:i:s')){
           
           $customer->email_verified_at = date('Y-m-d h:i:s');
           $customer->save();
           return redirect(url('/'));

        }
    }
}
