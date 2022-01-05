@extends('layouts.shop_master' , ['page_name' => 'payment'])
@section('page_title' , $page_title)
@section('content')

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Cash On delivery -->
                       <div class="panel panel-default aa-checkout-billaddress stripe_payment_gateway">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#COD">
                            Cash On delivery
                          </a>
                        </h4>
                      </div>
                      <div id="COD" class="panel-collapse collapse">
                       <div class="panel-body">
                       	<p>You can pay in cash to our courier when you receive the goods at your doorstep.</p>
                       <form action="" id="cod_confirm_order">
                        <input type="hidden" name="payment_amount" value="{{ $order->total_amt }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                       <div class="aa-payment-method">                    
                       <input type="submit" value="Confirm Order" class="aa-browse-btn order_place_btn">
                       <div id="order_placed_msg" style="color: red; font-size: 15px;"></div>                
                       </div>
                       </form>
                       </div>
                      </div>
                    </div>
                    
                   
                      <!-- PAyment Gateway-->
                    <div class="panel panel-default aa-checkout-billaddress stripe_payment_gateway">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#Payment">
                            Payment Gateway
                          </a>
                        </h4>
                      </div>
                      <div id="Payment" class="panel-collapse collapse">
                     <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form 
                            role="form" 
                            action="{{ url('stripe_payment') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                         <input type="hidden" name="payment_amount" value="{{ $order->total_amt }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-lg btn-block" type="submit" style="background-color: #e35236; border-color: #e35236; color:white;">Pay Now</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                     <div class="row">
                    <div class="col-md-8">
                    Subtotal<br>
                    <span style="font-size:12px;">({{ count($getproductitem) }} @if(count($getproductitem) > 1) items @else item @endif and shipping fees included)</span>
                    </div>
                    <div class="col-md-4">
                     Rs. {{ $order->total_amt}}
                    </div>
                    </div>
                    <div class="total_amount mt-5">
                    <div class="row">
                    <div class="col-md-8">
                    Total Amount
                    </div>
                    <div class="col-md-4">
                    <span style="font-size:22px; color:#e35236;">Rs. {{ $order->total_amt }}</span>
                    </div>
                    </div>
                    </div>
                  </div>
                  {{-- <h4>Payment Method</h4> --}}
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection