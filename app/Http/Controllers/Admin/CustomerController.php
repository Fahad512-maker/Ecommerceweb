<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Customers' , 'customer' => $customer];
        return view('Admin.customer.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data=['page_title' => 'Add Customer'];
        // return view('Admin.customer.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $valid_name =DB::table('customers')->where('name' , $request->name)->first();
         $valid_email=DB::table('customers')->where('email' , $request->email)->first();
         $valid_phone_number=DB::table('customers')->where('mobile_number' , $request->mobile_number)->first();
        if($request->confirm_password == $request->password){
          
          if(!empty($valid_name)){
          
           return response()->json(['status' => false , 'msg' => 'The name is already registered']);

          }elseif (!empty($valid_email)) {
            
            return response()->json(['status' => false , 'msg' => 'The email is already registered']);
          }elseif (!empty($valid_phone_number) ) {

              return response()->json(['status' => false , 'msg' => 'This mobile number is already registered']);
          }
          else{

        $customer= [

          'name' => $request->name,
          'email'=> $request->email,
          'password' => Hash::make($request->password),
          'expire_link' => date('Y-m-d h:i:s',  strtotime("+ 60 minutes")),
          'mobile_number' => $request->mobile_number,
          'company' => $request->company,
          'address' => $request->address,
          'country_id' => $request->country_id,
          'state_id' => $request->state_id,
          'city_id' => $request->city_id,
          'zip_code' => $request->zip_code,
          'status' => 1


        ];

         $user=DB::table('customers')->insert($customer);

         if($user){

          $mail = Mail::send(new EmailVerification($request));
         return response()->json(['status' => true , 'msg' => ucfirst($request->name). '! Your Email Verification link has been send at your email']);
         }

          else
          {
            return response()->json(['status' => false , 'msg' => 'Customer Does not Added! Please Try Again']);
          }
      }
        
        }
        else{

            return response()->json(['status' => false , 'msg' => 'Password does not match to confirm Password']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id, Customer $customer)
    {
        $customer=Customer::find($id);
        return view('Admin.customer.customerdetail' , ['customer' => $customer])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function changestatus($id)
    {
        $customer=Customer::find($id);
        
         $result=0;
        if($customer->status > 0){

          $customer->update(['status' => 0]);
          return $result=0;  

        }

        else{

            $customer->update(['status' => 1]);
            return $result=1;
        }
    }
}
