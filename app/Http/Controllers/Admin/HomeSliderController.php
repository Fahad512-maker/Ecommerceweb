<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $HomeSlider=HomeSlider::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Home Slider' , 'HomeSlider' => $HomeSlider];
        return view('Admin.homeslider.index' ,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=['page_title' => 'Add Home Slider'];
        return view('Admin.homeslider.create' ,$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->hasFile('image')){
        $file=$request->image;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('HomeSlider/images/'), $filename);

       }

       $banner=HomeSlider::create([
        'title' => $request->title,
        'image' => $filename,
        'button_txt' => $request->button_txt,
        'button_link' => $request->button_link,
        'status' => 1

       ]);

       return redirect(url('admin/home_slider'))->with('success' , 'Slider Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($id, HomeSlider $homeSlider)
    {
        $slider=HomeSlider::find($id);
        $data=['page_title' => 'Edit Slider' , 'slider' => $slider];
        return view('Admin.homeslider.edit' ,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update($id ,Request $request, HomeSlider $homeSlider)
    {
        $slider=HomeSlider::find($id);
        if($request->hasFile('image')){
        $image=public_path('HomeSlider/images/'.$slider->image);
        
        if(file_exists($image)){
        
        unlink($image);  

        }

        $file=$request->image;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('HomeSlider/images/'), $filename);
        
        $slider->title=$request->title;
        $slider->image=$filename;
        $slider->button_txt=$request->button_txt;
        $slider->button_link=$request->button_link;
        $slider->save();
         }
        return redirect(url('admin/home_slider'))->with('success' , 'Slider Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,HomeSlider $homeSlider)
    {
       $slider=HomeSlider::find($id);
       $slider->delete();
       return redirect(url('admin/home_slider'))->with('success' ,'Slider Delete Successfully');
    }

    public function changestatus($id)
    {
        $slider=Homeslider::find($id);

        if($slider->status > 0){

            $slider->update(['status' => 0]);
            return response()->json(['result' => 1 , 'msg' => 'Slider Image Hide on Home Page']);
        }

        else{

            $slider->update(['status' => 1]);
            return response()->json(['result' => 0 , 'msg' => 'Slider Image Show on Home Page']);
        }
    }
}
