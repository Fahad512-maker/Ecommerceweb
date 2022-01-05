@extends('layouts.shop_master' , ['page_name' => 'my_order'])
@section('page_title', $page_title)
@section('content')
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Total Amount</th>
                        <th>Payment Type</th>
                        <th>Payment Id</th>
                        <th>Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $total=0;?>
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
                        @endforeach
                      
                      
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Order Summary</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>Rs. {{ $total }}</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>Rs. {{ $total }}</td>
                   </tr>
                 </tbody>
               </table>
               {{-- <a href="#" class="aa-cart-view-btn">Proced to Checkout</a> --}}
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