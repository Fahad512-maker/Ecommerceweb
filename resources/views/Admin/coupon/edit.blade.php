@extends('layouts.master' , ['category_name' => __('coupon')])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>{{ $page_title }}</h5>
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
		<form class="needs-validation" novalidate action="{{ url('/admin/update/'.$coupon->id.'/coupon') }}" method="post">
			@csrf
			@method('put')
			<div class="card-body">
          <div class="form-row">
         <div class="col-md-6 mb-3">
      <label for="validationCustom01">Title</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Title" value="{{ $coupon->title }}" name="title" required>
      <div class="invalid-feedback">
        Please Enter A Title
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Code</label>
      <input type="text" class="form-control" id="validationCustom02" name="code" placeholder="Code" value="{{ $coupon->code }}" required>
      <div class="invalid-feedback">
         Please Enter Code
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Value</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="Value" value="{{ $coupon->value }}" name="value" required>
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>


     <div class="col-md-6 mb-3">
      <label for="validationCustom03">Type</label>
      <select name="type" class="form-control">
        @if($coupon->type == 'value')
        <option value="0">-- Select Type --</option>
        <option value="value" selected="">Value</option>
        <option value="percentage">Percentage</option>
        @elseif($coupon->type == 'percentage')
        <option value="0">-- Select Type --</option>
        <option value="value">Value</option>
        <option value="percentage" selected="">Percentage</option>
        @else
        <option value="0">-- Select Type --</option>
        <option value="value">Value</option>
        <option value="percentage">Percentage</option>
        @endif
      </select>
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>


  </div>

      <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Min Order Amount</label>
      <input type="text" class="form-control" id="validationCustom03" value="{{ $coupon->min_order_amt }}" name="min_order_amt" required="">
      {{-- <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div> --}}
    </div>

     <div class="col-md-6 mb-3">
      <label for="validationCustom03">Is One Time</label>
      <select name="is_one_time" class="form-control">
        @if($coupon->is_one_time == 1)
        <option value="1" selected="">Yes</option>
        <option value="0">No</option>
        @else
        <option value="1">Yes</option>
        <option value="0" selected="">No</option>
        @endif
      </select>
      <div class="invalid-feedback">
        Please Enter a Coupon Value
      </div>
    </div>

  </div>

 <div class="form-group text-lg-right">
 	  <button class="btn btn-secondary" type="submit">Update</button>
 </div>
</div>
</form>
	</div>
</div>
@endsection