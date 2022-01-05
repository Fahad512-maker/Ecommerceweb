<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=Brand::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Brands' , 'brand' => $brand];
        return view('Admin.brand.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=['page_title' => 'Add Brand'];
        return view('Admin.brand.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasfile('image')){
             
            $file=$request->image;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('Brand/images/'), $filename);
        }

        $brand=Brand::create([
         
         'title' => $request->title,
         'image' => $filename


        ]);

        return redirect(url('admin/brand'))->with('success' , 'Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Brand $brand)
    {
        $brand=Brand::find($id);
        $data=['page_title' => 'Edit brand' , 'brand' => $brand];
        return view('Admin.brand.edit' ,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Brand $brand)
    {
        $brand=Brand::find($id);
        if($request->hasfile('image')){

            $file=$request->image;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('Brand/images/'), $filename);
        }

        $brand->title=$request->title;
        $brand->image=$filename;
        $brand->save();

        return redirect(url('admin/brand'))->with('success' , 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Brand $brand)
    {
        $brand=Brand::find($id);
        $brand->delete();
        return redirect(url('admin/brand'))->with('success' , 'Brand Delete Successfully');
    }
}
