@extends('layouts.shop_master' , ['page_name' => 'checkout'])
@section('page_title' , $page_title)
@section('content')
  <!-- catg header banner section -->
{{--   <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section> --}}
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="" id="order_place_form">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Have a Coupon?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <input type="text" name="copoun_code" placeholder="Coupon Code" class="aa-coupon-code copoun_code">
                          <div class="text-right" id="coupon_code_msg" style="margin-top:-15px; color: red; font-size: 11px;"></div>
                          <input type="submit" value="Apply Coupon" class="aa-browse-btn coupon">
                        </div>
                      </div>
                    </div>
                    <!-- Login section -->
                    @if(Session::has('customer_login') == null)
                    <div class="panel panel-default aa-checkout-login">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a href="" data-toggle="modal" data-target="#login-modal">Customer Login</a>
                        </h4>
                      </div>
                      {{-- <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
                          <input type="text" placeholder="Username or email">
                          <input type="password" placeholder="Password">
                          <button type="submit" class="aa-browse-btn">Login</button>
                          <label for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                          <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                        </div>
                      </div> --}}
                    </div>
                    @endif
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Name*" name="name" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->name }} @endif">
                              </div>                             
                            </div>
                             <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" name="email"value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->email}} @endif">
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" name="mobile_number" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->mobile_number }} @endif">
                              </div>
                            </div>
                             <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" name="zipcode" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->zip_code }} @endif">
                              </div>                             
                            </div>                           
                          </div>  
{{--                           <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" value="">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" value="{{ $cart_data->customer_info[0]->mobile_number }}">
                              </div>
                            </div>
                          </div>  --}}
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="address">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->address }} @endif</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="country_id" class="country">
                                  <option value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->country->id }} @endif">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->country->name }} @endif</option>
                                  <option value="0">Select Your Country</option>
                                   @foreach($country as $value)
                                   <option value="{{ $value->id }}">{{ $value->name }}</option>
                                  @endforeach
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select name="state_id" class="form-control state states" style="height:40px;">
                                  <option value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->state->id }} @endif">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->state->name }} @endif</option>
                                  <option value="0">First Select Country</option>
                                </select>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <select name="city_id" class="form-control city" style="height: 40px;">
                                <option value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->city->id }} @endif">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->city->name }} @endif</option>
                                <option value="0">First Select State</option>
                             </select>
                            </div>
                          </div>   
                          <div class="row">
                            {{-- <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="District*">
                              </div>                             
                            </div> --}}
                            {{-- <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->zip_code }} @endif">
                              </div>
                            </div> --}}
                          </div>                                    
                        </div>
                      </div>
                    </div>
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                         <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Name*" name="name" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->name }} @endif">
                              </div>                             
                            </div>
                             <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" name="email"value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->email}} @endif">
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" name="mobile_number" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->mobile_number }} @endif">
                              </div>
                            </div>
                             <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" name="zipcode" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->zip_code }} @endif">
                              </div>                             
                            </div>                           
                          </div>  
{{--                           <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" value="">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" value="{{ $cart_data->customer_info[0]->mobile_number }}">
                              </div>
                            </div>
                          </div>  --}}
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="address">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->address }} @endif</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select name="country_id" class="country">
                                  <option value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->country->id }} @endif">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->country->name }} @endif</option>
                                  <option value="0">Select Your Country</option>
                                   @foreach($country as $value)
                                   <option value="{{ $value->id }}">{{ $value->name }}</option>
                                  @endforeach
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <select name="state_id" class="form-control state states" style="height:40px;">
                                  <option value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->state->id }} @endif">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->state->name }} @endif</option>
                                  <option value="0">First Select Country</option>
                                </select>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <select name="city_id" class="form-control city" style="height: 40px;">
                                <option value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->city->id }} @endif">@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->city->name }} @endif</option>
                                <option value="0">First Select State</option>
                             </select>
                            </div>
                          </div>   
                          <div class="row">
                            {{-- <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="District*">
                              </div>                             
                            </div> --}}
                            {{-- <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" value="@if(Session::has('customer_login')) {{ $cart_data->customer_info[0]->zip_code }} @endif">
                              </div>
                            </div> --}}
                          </div>                                    
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
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total=0;?>
                        @foreach($cart_data as $value)
                        <?php $total=$total+($value->qty * $value->price) ?>
                        <tr>
                          <td>{{ $value->title }} <strong> x  {{ $value->qty }}</strong>
                              <br><span style="color:red; font-size: 14px; font-weight:bold;">{{ strtoupper($value->name) }}</span>
                           </td>
                          <td>Rs. {{ $value->price }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td>Rs. {{ $total }}</td>
                        </tr>
                         <tr id="coupon_code"style="display:none;">
                          <th id="coupon_code_str">Coupon</th>
                          <td id="coupon_code_str_value"></td>
                        </tr>
                         <tr>
                          <th>Total</th>
                          <td id="total_value_product">Rs. {{ $total }}</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  {{-- <h4>Payment Method</h4> --}}
                  <div class="aa-payment-method">                    
                    {{-- <label for="cashondelivery"><input type="radio" checked id="cashondelivery" value="COD" name="payment_type"> Cash on Delivery </label>
                    <label for="stripe"><input type="radio" id="stripe" value="Payment Gateway" name="payment_type"> Via on Stripe </label> --}}
                    
                    {{-- <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"> --}}    
                    <input type="submit" value="Proceed To Pay" class="aa-browse-btn order_place_btn">
                    <div id="order_placed_msg" style="color: red; font-size: 15px;"></div>                
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection