<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category=Category::orderBy('id' , 'desc')->get();
       return view('Admin.category.index' , ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->hasfile('category_image')){
        
        $file=$request->category_image;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('Category/images/') , $filename);

       }
       $category = Category::create([
         
         'name' => $request->name,
         'category_image' => $filename,
         'is_home' => 1,
         'status' => 1
 
       ]);
       return redirect(url('admin/category'))->with('success' , 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
       $category=Category::find($id);
       return view('Admin.Category.edit' , ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request, Category $category)
    {
        $category=Category::find($id);
        if($request->hasfile('category_image')){
        
        $file=$request->category_image;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('Category/images/') , $filename);

       }
        $category->name=$request->name;
        $category->category_image=$filename;
        $category->save();

        return redirect(url('admin/category'))->with('success' , 'Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Category $category)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect(url('admin/category'))->with('success' , 'Category' .$category->name. ' Delete Successfully');
    }

    public function showhomebystatus($id)
    {
        $category = Category::find($id);

        $result = 0;

        if($category->is_home > 0){

            $category->update(['is_home' => 0]);
            return response()->json(['result' => 1 , 'msg' => 'Category Hide Successfully On Home Page']);
           
        }
        else{

            $category->update(['is_home' => 1]);
            return response()->json(['result' => 0 , 'msg' => 'Category Show Successfully On Home Page']);
           
        }

    }
}
