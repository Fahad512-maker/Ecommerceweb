<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Helpers\helper;
use App\Models\Admin\Product_attribute;
use App\Models\Admin\Product;
use App\Models\Admin\Color;
use App\Models\Admin\Brand;
use App\Models\Customer;
use App\Models\Admin\HomeSlider;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\Orderemail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment_method;
use Session;
use Stripe;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {

        $category=Category::where('is_home' , 1)->get();
        $slider=HomeSlider::where('status' , 1)->get();
        foreach ($category as $key  => $value) {
         
         $category[$key]->product=Product::where('status' , 1)
                                  ->where('products.category_id' , $value->id)
                                  ->get();
          
         
         $category[$key]->featured=Product::where('is_featured' , 1)
                                           ->where('status' , 1)
                                           ->get();


          $category[$key]->trending=Product::where('is_trending' , 1)
                                             ->where('status' , 1)
                                           ->get();
          

          $category[$key]->discounted=Product::where('is_discounted' , 1)
                                               ->where('status' , 1)
                                               ->get();
           
          $category[$key]->promo=Product::where('is_promo' , 1)
                                          ->where('status' , 1)
                                           ->get();
                                   
         foreach ($category[$key]->product as $key => $value) {
           
             $category[$key]->product_img=DB::table('product_images')
                                          ->where('product_images.product_id' , $value->id)
                                          ->get();

             $category[$key]->product_attr=DB::table('product_attributes')
                                           ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                                           ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                                           ->where('product_attributes.product_id' , $value->id)
                                           ->get();
         }

        }

        $brand=Brand::orderBy('id' , 'desc')->get();


        // echo "<pre>";
        // print_r($category);
        // die();

        $data=['page_title' => "Let's Shop | Home" , 'category' => $category , 'brand' => $brand , 'slider' => $slider];
        return view('letsShop.main_page.home' ,$data);
    }

    public function account_page()
    {
        $country=Country::orderBy('id' , 'desc')->get();
        $data=['page_title' => "Let's Shop | Account Page" , 'country' => $country];
        return view('letsShop.account_page' , $data);
    }

    public function getStateByCountryId($country_id)
    {
       $state =State::where('country_id' , $country_id)->get();
        
       $result = '<option value="0">-- Select State -</option>';

       foreach ($state as $value) {
           
           $result .= '<option value='.$value->id.'>'.$value->name.'</option>';
       }

       return $result;
    }

    public function getCityByStateId($state_id)
    {
        $city=City::where('state_id' , $state_id)->get();
         
        $result = '<option value="0">-- Select City --</option>';

        foreach ($city as $val) {
            
             $result .= '<option value='.$val->id.'>'.$val->name.'</option>';
        }

        return $result;
    }

    public function showallproducts()
    {
      $colors=Color::orderBy('id' , 'desc')->get();  
      $category=Category::where('is_home' , 1)->get();
             
             $products=Product::where('status' , 1)
                             ->distinct()->paginate(2);
           // $products=DB::table('products')
           //               ->leftJoin('product_images' , 'product_images.product_id' , '=' , 'products.id' )
           //               ->leftJoin('product_attributes' , 'product_attributes.product_id' , '=' , 'products.id')
           //               ->select('products.*' , 'product_images.product_images' , 'product_attributes.price' , 'product_attributes.mrp')
           //               ->distinct()->paginate(5);             
         

      $data=['page_title' => "Let's Shop | Products" , 'category' => $category , 'products' => $products , 'color' => $colors];  
      return view('letsShop.products.allproducts' , $data);
    }

    public function showproductsbycategory($id)
    {
        $products=Product::where('status' , 1)
                           ->where('products.category_id' , $id)
                             ->distinct()->paginate(2);

                // foreach ($products as $key => $value) {
                                
                //  $products[$key]->product_attr=DB::table('product_attributes')
                //                                    ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                //                                    ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                //                                    ->where('product_attributes.product_id' , $value->id)
                //                                    ->get();
              
                //         }  
  

        return view('letsShop.products.showproductsbycategory' , ['products' => $products])->render();          
    }

    public function sortproductsbyvalue($sort_value)
    {
        $category=DB::table('categories')->get();
        if($sort_value === 'default'){
          

            $products=Product::where('status' , 1)
                             ->distinct()->paginate(5);


        }

        elseif($sort_value === 'name'){
            
            $products=Product::orderBy('title' , 'asc')
                             ->where('status' , 1)
                             ->distinct()->paginate(5);

                // foreach ($products as $key => $value) {
                                
                //  $products[$key]->product_attr=DB::table('product_attributes')
                //                                    ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                //                                    ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                //                                    ->where('product_attributes.product_id' , $value->id)
                //                                    ->get();
              
                        // } 
            // $products = Product::orderBy('title' , 'asc')
            //                      ->leftJoin('product_attributes' , 'product_attributes.product_id' , '=' , 'products.id') 
            //                     ->get();

        }

        // elseif($sort_value === 'price'){

        //     $products = DB::table('products')
        //           ->leftJoin('product_images' , 'products.id' , '=' , 'product_images.product_id') 
        //           ->get();

        //     foreach ($products as $key => $value) {
                
        //         $products[$key]->product_attr=DB::table('product_attributes')
        //                                    ->
        //                                    ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
        //                                    ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
        //                                    ->where('product_attributes.product_id' , $value->id)
        //                                    ->get();

        //     }

              
        // }

        elseif($sort_value === 'date'){
            

            $products=Product::where('status' , 1)
                              ->where('products.created_at' , '<=' , date('Y-m-d')) 
                             ->distinct()->paginate(5);

            //     foreach ($products as $key => $value) {
                                
            //      $products[$key]->product_attr=DB::table('product_attributes')
            //                                        ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
            //                                        ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
            //                                        ->where('product_attributes.product_id' , $value->id)
            //                                        ->get();
              
            //             } 
            // $products = DB::table('products')
            //       ->leftJoin('product_images' , 'products.id' , '=' , 'product_images.product_id')
            //       ->leftJoin('product_attributes' , 'product_attributes.product_id' , '=' , 'products.id')
            //       ->select('products.*' , 'product_images.product_images' , 'product_attributes.price' , 'product_attributes.mrp')
            //       ->where('products.created_at' , '<=' , date('Y-m-d')) 
            //       ->get();

              
        }

        return view('letsShop.products.showproductsbycategory' , ['products' => $products])->render();
    }

    public function searchproductbycolor($id)
    {
        
        $products=Product::where('status' , 1)
                           ->distinct()->paginate(5);

            foreach ($products as $key => $value) {
                       
                        $products[$key]->product_attr=Product_attribute::where('product_attributes.color_id' , $id)
                                                   ->where('product_attributes.product_id' , $value->id)
                                                   ->get();
                   }

        return view('letsShop.products.showproductsbycategory' , ['products' => $products])->render(); 
    }

    public function searchproductbyinput(Request $request)
    {
       
       $products=Product::where('products.title', 'LIKE', '%'.$request->search.'%')
                          ->where('status' , 1)
                          ->distinct()->paginate(5);
        // $products=DB::table('products')
        //           ->leftJoin('product_images' , 'products.id' , '=' , 'product_images.product_id')
        //           ->leftJoin('product_attributes' , 'products.id' , '=' , 'product_attributes.product_id')
        //           ->select('products.*' , 'product_images.product_images' , 'product_attributes.price' ,'product_attributes.mrp')
        //           ->where('products.title', 'LIKE', '%'.$request->search.'%')->distinct()->paginate(3);

        return view('letsShop.products.showproductsbycategory' , ['products' => $products])->render();
    }

    public function getproductbytitle($name)
    {
        $products=Product::where('title' , $name)
                  ->get();
                  
           foreach ($products as $key => $value) {

            $products[$key]->product_img=DB::table('product_images')
                                         ->where('product_images.product_id', $value->id)
                                         ->get();

            $products[$key]->related_products=Product::where('category_id' , $value->category_id)
                                    ->where('title' ,'!=' , $name)
                                    ->get();
               
           }
          

          // foreach ($related_products as $key => $value) {
                      
          //          $related_products[$key]->related_product_attr=DB::table('product_attributes')
          //                                     ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
          //                                     ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
          //                                     ->where('product_attributes.product_id' , $value->id)
          //                                     ->get();  
          //         }        

         // echo "<pre>";
         // print_r($related_products);
         // die();

         $data=['page_title' => "Product Detail | let'sShop" , 'products' => $products ];           
        return view('letsShop.products.productdetail' , $data);
    }

    public function getproductbypage(Request $request)
    {
        if($request->ajax()){

         $products=Product::where('status' , 1)
                             ->distinct()->paginate(2);

         return view('letsShop.products.showproductsbycategory' , ['products' => $products])->render();                   

        }
    }

    public function getcolorbysize($size)
    {
         $color=DB::table('product_attributes')
                    ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                    ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                    ->select('colors.name')
                    ->where('sizes.sizes' , $size)
                    ->first();

       return $color;
    }

    public function add_to_cart(Request $request)
    {

      if($request->session()->has('customer_login')){

        $userid=$request->session()->get('customer_id');
        $usertype="Registered";
      }
      else{

        $userid=TempUser();
        $usertype="Unregistered";
      }

      $product_attr=DB::table('product_attributes')
                    ->select('product_attributes.id')
                    ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                    ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                    ->where('colors.name' , $request->color_id)
                    ->where('sizes.sizes' , $request->size_id)
                    ->where('product_attributes.product_id' , $request->product_id)
                    ->get();

        $product_cart=DB::table('carts')
                            ->where(['user_id' => $userid])
                            ->where(['user_type' => $usertype])
                            ->where(['product_id' => $request->product_id])
                            ->where(['product_attr_id' => $product_attr[0]->id])
                            ->get();
        $getavailableqty=getAvailableQty($request->product_id,$product_attr[0]->id);
        $finalproquantity=$getavailableqty[0]->pro_qty - $getavailableqty[0]->qty;
        $cart_quantity=$request->qty;

        if($cart_quantity > $finalproquantity){
         
         return response()->json(['status' => 'error' , 'msg' => 'Out Of Stock']);

        }
        else{


         if(isset($product_cart[0])){
            $update_id=$product_cart[0]->id;

            if($request->qty == 0){
              
             $cart=Cart::findorFail($update_id);
             $cart->delete();
        
           $msg = 'removed'; 

            }
            else{
            // echo "hello";
            $cart=Cart::findorFail($update_id);
            $cart->update(['qty' => $request->qty]);
        
            $msg = 'updated';
         }
     }
         else
         {   
           // echo "hi";
        Cart::create([
       'user_id' => $userid,
       'user_type' => $usertype,
       'qty' => $request->qty,
       'product_id' => $request->product_id,
       'product_attr_id' => $product_attr[0]->id,
       'added_on' => date('y-m-d h:i:s')

      ]);

       $msg = 'added on';
    }

    $cart=Cart::leftJoin('products' , 'products.id' , '=' , 'carts.product_id')
                ->leftJoin('product_images' , 'product_images.product_id' , '=' , 'carts.product_id')
                ->leftJoin('product_attributes' , 'product_attributes.id' , '=' , 'carts.product_attr_id')
                ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                ->where(['user_id' => $userid])
                ->where(['user_type' => $usertype])
                ->select('carts.qty' , 'products.title' , 'product_images.product_images' , 'product_attributes.price' , 'sizes.sizes' , 'colors.name' , 'products.id as pro_id' , 'product_attributes.id as attr_id')
                ->distinct()
                ->get();
        return response()->json(['msg' => $msg , 'cart' => $cart , 'totalitem' => count($cart)]);        
}

}

public function my_cart(Request $request)
{

    if($request->session()->has('customer_login')){

        $userid=$request->session()->get('customer_id');
        $usertype="Registered";
      }
    else{

        $userid=TempUser();
        $usertype="Unregistered";
      }

    $cart=Cart::leftJoin('products' , 'products.id' , '=' , 'carts.product_id')
                ->leftJoin('product_images' , 'product_images.product_id' , '=' , 'carts.product_id')
                ->leftJoin('product_attributes' , 'product_attributes.id' , '=' , 'carts.product_attr_id')
                ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                ->where(['user_id' => $userid])
                ->where(['user_type' => $usertype])
                ->select('carts.qty' , 'products.title' , 'product_images.product_images' , 'product_attributes.price' , 'sizes.sizes' , 'colors.name' , 'products.id as pro_id' , 'product_attributes.id as attr_id')
                ->distinct()
                ->get();
  $data=['page_title' => "My Cart | let'sShop" , 'cart' => $cart];
  return view('letsShop.cart.cart' ,$data);    
}

public function checkout(Request $request)
{
    $getproductitem=getProductItem();
    
    if(isset($getproductitem[0])){
      
     if($request->session()->has('customer_login')){
        $getproductitem=getProductItem();
        $userid=$request->session()->get('customer_id');

        $getproductitem->customer_info=Customer::where('id' , $userid)
                                 ->get();
                               

      }
    else{
         $getproductitem->customer_info=null;
      }
       $country=Country::get();  
        $data=['page_title' => 'Checkout' , 'cart_data' => $getproductitem , 'country' => $country];
        return view('letsShop.cart.checkout' ,$data);
     

    }
    else{
 
       return redirect(url('/'));

    }
    $data=['page_title' => 'Checkout'];
    return view('letsShop.cart.checkout' ,$data);
}


public function coupon_code(Request $request)
{

  $couponcode=Couponcode($request->copoun_code); 
  $couponcode=json_decode($couponcode , true);

 return response()->json(['coupon_value' => $couponcode['coupon_value'], 'type' => $couponcode['type'] ,'status' => $couponcode['status'] , 'msg' => $couponcode['msg'] , 'total' => $couponcode['total']]);        
}

public function place_order(Request $request)
{
     $payment_url='';
      $getproductitem=getProductItem();
    
    if(isset($getproductitem[0])){

     if($request->session()->has('customer_login')){
          $couponvalue=0;
          $total=0;
        
        $userid=$request->session()->get('customer_id');
        $usertype="Registered";

            if($request->copoun_code != ''){

            $couponcode=Couponcode($request->copoun_code); 
            $couponcode=json_decode($couponcode , true);

            if($couponcode['status'] == 'success'){
               
              if($couponcode['type'] == 'percentage'){

               $couponvalue=$couponcode['coupon_value'].'%';    
              }
              else{

               $couponvalue='Rs.'.$couponcode['coupon_value']; 
              }  
              
              $total=$couponcode['total'];
              
            }
            else{
                return response()->json(['status' => 'failed' , 'msg' => $couponcode['msg']]);
            }
        }
        else{

        
        foreach ($getproductitem as $value) {
        $total=$total+($value->qty*$value->price);

        }
        }

        

        $order=Order::create([
       'customer_id' => $userid, 
       'name' => $request->name,
       'email' => $request->email,
       'mobile_number' => $request->mobile_number,
       'address' => $request->address,
       'country' => $request->country_id,
       'state' => $request->state_id,
       'city' => $request->city_id,
       'zipcode' => $request->zipcode,
       'coupon_code' => $request->copoun_code,
       'coupon_value' => $couponvalue,
       'total_amt' => $total

    ]);
        if($order->id > 0){

        $order_detail=[];
        foreach ($getproductitem as $value) {

         $order_detail=[
        'order_id' => $order->id,
        'product_id' => $value->pro_id,
        'prodcut_attr_id' => $value->attr_id,
        'price' => $value->price,
        'qty' => $value->qty
 

       ];

        DB::table('order_details')->insert($order_detail);
        
        }
        

         $status = 'success';
          
         $msg= 'Congratulation! Your Order is placed';


        }else{
          
          $status = 'failed';
          $msg = 'Oops! Please try again to place order';
        }
    

      }
    else{

         $status = 'failed';
         $msg = 'Please First login to place order';
     }

 }
    else{

        return redirect(url('/'));
    }

     return response()->json(['status' => $status , 'msg' => $msg , 'payment_type' => $request->payment_type]);
    
}

 public function stripe_payment(Request $request)
 {
      $getproductitem=getProductItem();
    
    if(isset($getproductitem[0])){

     if($request->session()->has('customer_login')){
          $couponvalue=0;
          $total=0;
        
        $userid=$request->session()->get('customer_id');
        $usertype="Registered";

                  if($request->copoun_code != ''){

            $couponcode=Couponcode($request->copoun_code); 
            $couponcode=json_decode($couponcode , true);

            if($couponcode['status'] == 'success'){
               
              if($couponcode['type'] == 'percentage'){

               $couponvalue=$couponcode['coupon_value'].'%';    
              }
              else{

               $couponvalue='Rs.'.$couponcode['coupon_value']; 
              }  
              
              $total=$couponcode['total'];
              
            }
            else{
                return response()->json(['status' => 'failed' , 'msg' => $couponcode['msg']]);
            }
        }
        else{

        $getproductitem=getProductItem();

        
        foreach ($getproductitem as $value) {
        $total=$total+($value->qty*$value->price);

        }
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe=Stripe\Charge::create ([
                "amount" => $request->payment_amount,
                "currency" => 'USD',
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose let'sShop.com"
        ]);

         $payment=Payment_method::create([

        'customer_id' => $userid,
        'order_id' => $request->order_id,
        'payment_amount' => $request->payment_amount,
        'order_status' => 1,
        'payment_status' => 'Pending',
        'payment_id' => $stripe->id,
        'payment_type' => 'payment Gateway'
    ]);
         $mail = Mail::send(new Orderemail($request)); 
        DB::table('carts')
            ->where(['user_id' => $userid , 'user_type' => 'Registered'])
            ->delete();


         $request->session()->put('Order_Id');
        return redirect(url('/thank_you'));
 }
 
  else{
      
       return redirect(url('/'));

  }

}

   else{

     return redirect(url('/'));
   }
}

 public function payment_method(Request $request)
 { 
        $getproductitem=getProductItem();
    
    if(isset($getproductitem[0])){
        $order=Order::latest()->first();
        
    $data=['page_title' => 'Payment Method' , 'order' => $order , 'getproductitem' => $getproductitem ];
     return view('letsShop.cart.payment_method' ,$data);
 }
  else{

    return redirect(url('/'));
  }
 }

 public function confirmed_order(Request $request)
 {
      

       $getproductitem=getProductItem();
    
     if(isset($getproductitem[0])){

     if($request->session()->has('customer_login')){

        $userid=$request->session()->get('customer_id');
      }
    $payment=Payment_method::create([

        'customer_id' => $userid,
        'order_id' => $request->order_id,
        'payment_amount' => $request->payment_amount,
        'order_status' => 1,
        'payment_status' => 'Pending',
        'payment_id' => 0,
        'payment_type' => 'COD'
    ]);
     
    $mail = Mail::send(new Orderemail($request)); 
    
   DB::table('carts')
            ->where(['user_id' => $userid , 'user_type' => 'Registered'])
            ->delete();


         $request->session()->put('Order_Id');

    $status = 'success';
    $msg = 'Congratulation!Order has been placed';

    return response()->json(['status' => $status , 'msg' => $msg]);

 }

   else{

     return redirect(url('/'));
   }

}

 public function thank_you()
 {

     $order=Order::latest()->first();
     $data=['page_title' => 'Thank You' , 'order' => $order];
     return view('letsShop.cart.thank_you' ,$data);

}

public function Orders(Request $request)
{

   $order=Payment_method::where('customer_id' , $request->session()->get('customer_id'))->get(); 
  $data=['page_title' => 'My Orders' , 'order' => $order];  
  return view('letsShop.cart.orders',$data);   
}

public function order_details($id)
{
    $order=DB::table('orders')
               ->leftJoin('payment_methods' , 'payment_methods.order_id' , '=' , 'orders.id')
               ->leftJoin('order_statuses' , 'payment_methods.order_status' , '=' , 'order_statuses.id')
               ->leftJoin('order_details' , 'order_details.order_id' , '=' , 'orders.id')
               ->leftJoin('products' , 'order_details.product_id' , '=' , 'products.id')
               ->leftJoin('product_attributes' , 'order_details.prodcut_attr_id' , '=' , 'product_attributes.id')
               ->leftJoin('product_images' , 'product_images.product_id' , '=' , 'products.id')
               ->leftJoin('sizes' , 'product_attributes.size_id' , '=' , 'sizes.id')
               ->leftJoin('colors' , 'product_attributes.color_id' , '=' , 'colors.id')
               ->leftJoin('cities' , 'orders.city' , '=' , 'cities.id')
               ->select('orders.*' , 'payment_methods.payment_amount' , 'payment_methods.payment_type' , 'payment_methods.order_status' , 'cities.city_name')
               ->where('orders.id' , $id)
               ->distinct()->get();
               // prx($order)
    $data=['page_title' => 'let`sShop - Orders details' , 'order' => $order];
    return view('letsShop.cart.order_details' ,$data);
}

public function example()
{
    $data=['page_title' => 'Example Task'];
    return view('letsShop.example' , $data);
}

public function store_example_form(Request $request)
{
    $example=[];
    foreach ($request->name as $key => $value) {
        
        $example[]=[

          'name' => $value,
          'email' => $request->email[$key],
          'password' => $request->password[$key]

        ];

    }

    DB::table('example_tasks')->insert($example);

    echo "Thank You";
}

}
