<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Size=Size::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Sizes' , 'Size' => $Size];
        return view('Admin.Size.index' ,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=['page_title' => 'Add Size'];
        return view('Admin.Size.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Size=Size::create($request->all());
        return redirect(url('admin/size'))->with('success' , 'Size Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $Size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Size $Size)
    {
        $Size=Size::find($id);
        $data=['page_title' => 'Edit Size' , 'Size' => $Size];
        return view('Admin.size.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Size $Size)
    {
        $Size=Size::find($id);
        $Size->update($request->all());
        return redirect(url('admin/size'))->with('success' , 'Size Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $Size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Size $Size)
    {
        $Size=Size::find($id);
        $Size->delete();
        return redirect(url('admin/size'))->with('success' , 'Size delete Successfully');
    }
}
