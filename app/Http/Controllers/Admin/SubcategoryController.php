<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory=Subcategory::orderBy('id' , 'desc')->get();
        return view('Admin.subcategory.index' , ['subcategory' => $subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('Admin.subcategory.create' , ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory=Subcategory::create($request->all());
        if($subcategory){

            return redirect(url('admin/subcategory'))->with('success' , 'Subcategory Created Successfully');
        }
        else
        {
         return back()->with(['error' , 'Subcategory Not Added']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Subcategory $subcategory)
    {
        $category=Category::get();
        $subcategory=Subcategory::find($id);
        return view('Admin.subcategory.edit', ['category' => $category , 'subcategory' => $subcategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Subcategory $subcategory)
    {
        $subcategory=Subcategory::find($id);
        $subcategory->update($request->all());
        return redirect(url('admin/subcategory'))->with('success' , 'Subcategory update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Subcategory $subcategory)
    {
        $subcategory=Subcategory::find($id);
        $subcategory->delete();
        return redirect(url('admin/subcategory'))->with('success' , 'Subcategory delete Successfully');

    }
}
