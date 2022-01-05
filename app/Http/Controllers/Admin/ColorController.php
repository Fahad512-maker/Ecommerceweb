<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color=Color::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Colors' , 'color' => $color];
        return view('Admin.color.index' ,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=['page_title' => 'Add Color'];
        return view('Admin.color.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color=Color::create($request->all());
        return redirect(url('admin/color'))->with('success' , 'Color Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Color $color)
    {
        $color=Color::find($id);
        $data=['page_title' => 'Edit Color' , 'color' => $color];
        return view('Admin.color.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Color $color)
    {
        $color=Color::find($id);
        $color->update($request->all());
        return redirect(url('admin/color'))->with('success' , 'Color Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Color $color)
    {
        $color=Color::find($id);
        $color->delete();
        return redirect(url('admin/color'))->with('success' , 'Color delete Successfully');
    }
}
