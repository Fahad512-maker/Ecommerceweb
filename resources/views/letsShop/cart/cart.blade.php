@extends('layouts.shop_master' , ['page_name' => 'my_cart'])
@section('page_title', $page_title)
@section('content')

 <section id="aa-catg-head-banner">
  
 </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
            @if($cart->isNotEmpty())
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                  	
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $grandtotal=0;
                      ?>	
                      @foreach($cart as $value)
                      <?php
                       $grandtotal=$grandtotal+($value->qty*$value->price);
                       ?>
                      <tr id="cart_box-{{ $value->attr_id }}">
                        <td><a class="remove deletecart" href="javascript:void(0)" data-id="{{ $value->attr_id }}" size-id="{{ $value->sizes }}" color-id="{{ $value->name }}" pro-id="{{ $value->pro_id }}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="{{ url('/product/'.$value->title)}}"><img src="{{ asset('products/images/'.$value->product_images) }}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="{{ url('/product/'.$value->title)}}">{{ $value->title }}</a>
                        @if($value->sizes != '')
                        <br>SIZE: {{ $value->sizes }}
                        @endif	
                         @if($value->name != '') 	
                        <br>COLOR: {{ $value->name }}
                        @endif
                        </td>
                        
                        <td>Rs. {{ $value->price }}</td>
                        <td><input class="aa-cart-quantity cart_quantity" id="qty-{{$value->attr_id}}"  size-id="{{ $value->sizes }}" color-id="{{ $value->name }}" pro-id ="{{ $value->pro_id }}" attr-id="{{ $value->attr_id }}" price="{{ $value->price }}" type="number" value="{{ $value->qty }}"></td>
                        <td id="Total_product_price-{{ $value->attr_id }}">Rs. {{ $value->qty*$value->price }}</td>
                      </tr>
                       @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          {{-- <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div> --}}
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
               <form id="product_form">
            <input type="hidden" id="color_id" name="color_id">
           <input type="hidden" id="size_id" name="size_id">
           <input type="hidden" id="pqty" name="qty">
           <input type="hidden" id="product_id" name="product_id">
           @csrf
            </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
{{--                    <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr> --}}
                   <tr>
                     <th>Grand Total</th>
                     <td id="grand_Total">Rs. {{ $grandtotal }}</td>
                   </tr>
                 </tbody>
               </table>
               @if($cart->isNotEmpty())
               <a href="{{ url('/checkout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
               @endif
             </div>
               @else
                  <h3 class="text-danger font-weight-bold">Cart Empty</h3>
            @endif
           </div>
           
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@endsection