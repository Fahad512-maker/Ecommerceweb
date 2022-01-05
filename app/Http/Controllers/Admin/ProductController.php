<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Color;
use App\Models\Admin\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::orderBy('id' , 'desc')->get();
        $data=['page_title' => 'Products' , 'product' => $product];
        return view('Admin.product.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $color=Color::latest()->get();
        $size=Size::latest()->get();
        $data=['page_title' => 'Add Products' , 'category' => $category , 'color' => $color , 'size' => $size];
        return view('Admin.product.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=Product::create([
         
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'title' => $request->title,
         'brand' => $request->brand,
         'model' => $request->model,
         'short_description' => $request->short_description,
         'description' => $request->description,
         'Tags' => $request->Tags,
         'technical_specification' => $request->technical_specification,
         'uses' => $request->uses,
         'warranty' => $request->warranty,
         'lead_time' => $request->lead_time,
         'tax' => $request->tax,
         'tax_type' => $request->tax_type,
         'is_promo' => $request->is_promo,
         'is_featured' => $request->is_featured,
         'is_discounted' => $request->is_discounted,
         'is_trending' => $request->is_trending,
         'status' => 1

        ]);


         
          $data=[];

            if($request->hasfile('product_images')){
            foreach ($request->product_images as $key => $value) {
                
            $filename=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('products/images'), $filename);
            $data[]=['product_images' => $filename , 'product_id' => $product->id];
            }
        }
            

          DB::table('product_images')->insert($data);
          

          $attributes=[];
          if($request->hasfile('attr_images')){
          foreach ($request->attr_images as $key => $value) {
                            
            $fileName=time().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('products/images'), $fileName);

              $attributes[]=[

               'sku' => $request->sku[$key],
               'mrp' => $request->mrp[$key],
               'color_id' => $request->color_id[$key],
               'size_id' => $request->size_id[$key],
               'price' => $request->price[$key],
               'qty' => $request->qty[$key],
               'product_id' => $product->id,
                'attr_images' => $fileName
              ];

          }
      }

           DB::table('product_attributes')->insert($attributes);

          return redirect(url('admin/products'))->with('success' , 'Product Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Product $product)
    {
        $product=Product::find($id);
        $product->productimage()->delete();
        $product->delete();

        return redirect(url('admin/products'))->with('success' , 'Product Delete Successfully');
    }

        public function getsubcategorybycatid($id)
    {
        
        $subcategory=DB::table('subcategories')->where('category_id' , $id)->get();
        
        $output = '<option selected="" value="">-- Select Subcategory --</option>';
        
        foreach ($subcategory as $value) {
            
            $output .= '<option value='.$value->id.'>'.$value->subcat_name.'</option>';

        }
        return $output;
    }


    public function changestatusafterpublish($id)
    {
        $product=Product::find($id);
        $result=0;
        if($product->status > 0){

            $product->update(['status' => 0]);
            $result=1;
        }
        else{

            $product->update(['status' => 1]);
            $result=0;
        }

        echo $result;
    }
}
