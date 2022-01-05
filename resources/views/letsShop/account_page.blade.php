@extends('layouts.shop_master' , ['page_name' => __('account_page')])
@section('page_title' , $page_title)
@section('content')
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{ asset('LetsShop/img/fashion/fashion-header-bg-8.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-2">
       {{--          <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="" class="aa-login-form">
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div> --}}
              </div>
              <div class="col-md-8 center">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form  id="register_form" data-validate="parsley">
                 
                  <div id="register-success-msg" style="display: none;">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span id="register-success-msg-val"></span>
                            </div>
                        </div>
                        <div id="register-danger-msg" style="display: none;">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span id="register-danger-msg-val"></span>
                            </div>
                        </div>
                  
                 	<div class="row">
                 	<div class="col-md-6">
                 	<label for="">Name<span  style="color: red;">*</span></label>
                    <input type="text" name="name" placeholder="Name" class="form-control p_input" id="name"  required style="height:40px;">
                 	</div>
                 	<div class="col-md-6">
                 	<label for="">Email<span style="color: red;">*</span></label>
                    <input type="email" name="email" class="form-control" id="email" required style="height: 40px;">
                 	</div>
                 	<div class="col-md-6">
                 	<label for="">Password<span style="color: red;">*</span></label>
                    <input type="password" name="password" placeholder="Password" id="password" class="form-control" data-parsley-equalto="#confirm_password" class="form-control p_input" data-parsley-required-message="The value must be same as confirm password"  style="height: 40px;" required="">
                 	</div>
                  <div class="col-md-6">
                  <label for="">Confirm Password<span style="color: red;">*</span></label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" data-parsley-equalto="#password" class="form-control p_input"  data-parsley-required-message="The value must be same as password" class="form-control" style="height: 40px;" required>
                  </div>
                   <div class="col-md-6">
                  <label>Company</label>
                  <input type="text" name="company" placeholder="Company" class="form-control" style="height:40px;">
                  </div>
                  <div class="col-md-6">
                  <label for="">Mobile Number</label>
                    <input type="text" placeholder="Number" class="form-control" name="mobile_number" data-parsley-type="digits"
                      data-parsley-required-message="The value should be in numbers" style="height: 40px;">
                  </div>
                 	<div class="col-md-6">
                 	<label for="">Birthday</label>
                    <input type="date" name="birthday" class="form-control" style="height: 40px;">
                 	</div>
                 	<div class="col-md-6">
                 	<label for="">Gender</label>
                    <select name="gender" class="form-control" style="height: 40px;">
                    <option>-- Select Gender --</option>	
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    </select>
                 	</div>
                  <div class="col-md-6">
                  <label for="">Country</label>
                  <select name="country_id" class="form-control country" style="height:40px;">
                  <option value="0">-- Select Country --</option>
                  @foreach($country as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                  </select>
                  </div>
                  <div class="col-md-6">
                  <label for="">State</label>
                  <select name="state_id" class="form-control state states" style="height:40px;">
                  <option value="0">First Select Country</option>
                  </select>
                  </div>
                  <div class="col-md-6">
                  <label for="">City</label>
                  <select name="city_id" class="form-control city" style="height: 40px;">
                  <option value="0">First Select State</option>
                  </select>
                  </div>
                  <div class="col-md-6">
                  <label>Zip Code</label>
                  <input type="text" name="zip_code" class="form-control" placeholder="71000" style="height:40px;">
                  </div>
                  <div class="col-md-12">
                  <label for="">Address</label>
                    <textarea class="form-control" name="address" placeholder="Address"></textarea>
                  </div>
                </div>
                    
                     <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-danger">Register</button>
                     </div>              
                  </form>
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