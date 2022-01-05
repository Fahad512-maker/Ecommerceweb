<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon=Coupon::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Coupons' , 'coupon' => $coupon];
        return view('Admin.coupon.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=['page_title' => 'Add Coupon'];
        return view('Admin.coupon.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon=Coupon::create($request->all());

        if($coupon){

            return redirect(url('admin/coupons'))->with('success' , 'Coupon Added Successfully');
        }
        else{

            return back()->with('error' , 'Coupon Again Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Coupon $coupon)
    {
        $coupon=Coupon::find($id);
        $data=['page_title' => 'Edit Coupon' , 'coupon' => $coupon];
        return view('Admin.coupon.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Coupon $coupon)
    {
        $coupon=Coupon::find($id);
        $coupon->update($request->all());
        return redirect(url('admin/coupons'))->with('success' , 'Coupon Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Coupon $coupon)
    {
        $coupon=Coupon::find($id);
        $coupon->delete();
        return redirect(url('/admin/coupons'))->with('success' , 'Coupon Delete Successfully');
    }

    public function statuschangebylink($id , Request $request)
    {
        $coupon=Coupon::findorFail($id);
        $result = 0;
        if ($coupon->status > 0) {
            
           $coupon->update(['status' => 0]);
           return $result=0;
 
        } else {
            
            $coupon->update(['status' => 1]);
           $request->session()->flash('success' , 'Status Updated Successfully');
           return $result=1;
        }

        return $result; 
        
    }
}
