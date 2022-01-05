@extends('layouts.shop_master' , ['page_name' => 'order_detail'])
@section('page_title', $page_title)
@section('content')
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
            <div class="row">
            <div class="col-md-12 col-xs-4 bg-danger">
            <h3>Customer Details</h3>
            <div class="row">
            <div class="col-md-4">
             Name :<br>
             Email :<br>
             Shipping Address : <br>
             Mobile Number : <br>
             City : <br>
            </div>
            <div class="col-md-8">
            {{ $order[0]->name }}<br>
            {{ $order[0]->email }}<br>
            {{ $order[0]->address }}<br>
            {{ $order[0]->mobile_number }}<br>
            {{ $order[0]->city_name }}
            </div>
            </div>
            </div>
        </div><br>
             <div class="row">
             <div class="col-md-12 col-xs-12 bg-danger">
             <h4>Product Details</h4>
              <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Product Image</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                    	{{-- <?php $total=0;?>
                      	@foreach($order as $value)
                      	<?php $total=$total+($value->payment_amount); ?>
                      	<tr>
                        <td><a class="aa-cart-title" href="{{ url('/order_detail/'.$value->order_id) }}">{{ $value->id }}</a></td>
                        <td>{{ $value->order->name }}</td>
                        <td>{{ $value->payment_status }}</td>
                        <td>Rs. {{ $value->payment_amount }}</td>
                        <td>{{ $value->payment_type }}</td>
                        <td>{{ $value->payment_id }}</td>
                        <td>{{ $value->created_at }}</td>
                        </tr>
                        @endforeach --}}
                      
                      
                      </tbody>
                  </table>
                </div>
             </form>
             </div>
             
            </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
@endsection