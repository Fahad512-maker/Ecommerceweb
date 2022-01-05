<?php

use Illuminate\Support\Facades\DB;

 function prx($arr){
 
  echo "<pre>";
  print_r($arr);
  die();

 }

 function hello()

{
	
	$categories=DB::table('categories')->where('is_home' , 1)->get();
   $result=[];
	foreach ($categories as $key => $value) {
		
		$result[$value->id]->category=$value->name;
	}
   
    prx($result);
	return $result;
}


 function TempUser()
{
 

  if(!session()->has('Temp_Users')){
     
    $rand=rand(111111111,999999999);     
  	session()->put('Temp_Users' , $rand);

  	return $rand; 
  }
  else{
    
  	return session()->get('Temp_Users');
  }
}

function getProductItem()
{
	if(session()->has('customer_login')){

        $userid=session()->get('customer_id');
        $usertype="Registered";
      }
      else{

        $userid=TempUser();
        $usertype="Unregistered";
      }

       $cart=DB::table('carts')
                ->leftJoin('products' , 'products.id' , '=' , 'carts.product_id')
                ->leftJoin('product_images' , 'product_images.product_id' , '=' , 'carts.product_id')
                ->leftJoin('product_attributes' , 'product_attributes.id' , '=' , 'carts.product_attr_id')
                ->leftJoin('sizes' , 'sizes.id' , '=' , 'product_attributes.size_id')
                ->leftJoin('colors' , 'colors.id' , '=' , 'product_attributes.color_id')
                ->where(['user_id' => $userid])
                ->where(['user_type' => $usertype])
                ->select('carts.qty' , 'products.title' , 'product_images.product_images' , 'product_attributes.price' , 'sizes.sizes' , 'colors.name' , 'products.id as pro_id' , 'product_attributes.id as attr_id')
                ->distinct()
                ->get();

        return $cart;                    
}

function Couponcode($coupon)
{
  
   $coupon=DB::table('coupons')
               ->where('code' , $coupon)
               ->get();
            
           $coupon_value=0;
           $type='';    
        $total=0;
    if(isset($coupon[0])){
        $coupon_value=$coupon[0]->value;
        $type=$coupon[0]->type;
        if($coupon[0]->status == 1){

            if($coupon[0]->is_one_time == 1){

             $status='error';
             $msg='Unfortunately!Coupon Code is already used.Please collect Other coupons';

            }
            else{
             
                $min_order_amount=$coupon[0]->min_order_amt;
                
                if($min_order_amount>0){

                $getproductitem=getProductItem();

                $total=0;
                foreach ($getproductitem as $value) {
                  $total=$total+($value->qty*$value->price);

                }

                if($min_order_amount < $total){
                    
                    $status='success';
                    $msg='Congratulation!Coupon Applied Successfully!';
                }

                else{

                    $status='error';
                    $msg='Coupon Value must greater than' .$min_order_amount;
                }

            }

            else
            {
            $status='success';
            $msg='Coupon code Applied successfully!';
            }

        }
    }
        else{

           $status='error';
           $msg='Unfortunately! Coupon Code Deactived';  
        }
     
     

    }
    else{

        $status='error';
        $msg='Sorry!this coupon is not valid.Please check any type of errors.';

     }
      
      if($status == 'success'){
        if($type == 'value'){
         
          $total=$total-$coupon_value;

        }elseif ($type == 'percentage') {
            
            $newprice=($coupon_value/100)*$total;
            $total=round($total-$newprice);

        }
         

      } 
 
    return json_encode(['coupon_value' => $coupon_value, 'type' => $type ,'status' => $status , 'msg' => $msg , 'total' => $total]); 
}

 function getAvailableQty($product_id, $product_attr_id)
{
    $quantity=DB::table('order_details')
              ->leftJoin('orders', 'order_details.order_id' , '=' , 'orders.id')
              ->leftJoin('product_attributes' , 'order_details.prodcut_attr_id' , '=' , 'product_attributes.id')
              ->where('order_details.product_id' , $product_id)
              ->where('order_details.prodcut_attr_id', $product_attr_id)
              ->select(['order_details.qty' , 'product_attributes.qty as pro_qty'])
              ->get();

              return $quantity;
}

?>
