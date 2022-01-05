@extends('layouts.master', ['category_name' => __('coupon')  , 'page_name' => ''])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Create Posts</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/coupons') }}" class="btn btn-secondary">Manage Coupons</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form class="needs-validation" novalidate action="{{ url('/admin/store_coupon') }}" method="post">
			@csrf
			<div class="card-body">
          <div class="form-row">
         <div class="col-md-6 mb-3">
      <label for="validationCustom01">Title</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Title" value="{{ old('title') }}" name="title" required>
      <div class="invalid-feedback">
        Please Enter A Title
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Code</label>
      <input type="text" class="form-control" id="validationCustom02" name="code" placeholder="Code" value="{{ old('code') }}" required>
      <div class="invalid-feedback">
         Please Enter Code
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Value</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="Value" name="value" required>
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>

     <div class="col-md-6 mb-3">
      <label for="validationCustom03">Type</label>
      <select name="type" class="form-control">
        <option value="value">Value</option>
        <option value="percentage">Percentage</option>
      </select>
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>

  </div>

    <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Min Order Amount</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="amount" name="min_order_amt" required="">
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>

     <div class="col-md-6 mb-3">
      <label for="validationCustom03">Is One Time</label>
      <select name="is_one_time" class="form-control">
        <option value="0">-- Select Type --</option>
        <option value="1">Yes</option>
        <option value="0" selected="">No</option>
      </select>
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>

  </div>

 <div class="form-group text-lg-right">
 	  <button class="btn btn-secondary" type="submit">Created</button>
 </div>
</div>
</form>
	</div>
</div>
@endsection