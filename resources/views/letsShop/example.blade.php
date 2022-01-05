@extends('layouts.shop_master' , ['page_name' => 'example_task'])
@section('content')

<div class="container">
<h2>JQuery Form</h2>
<form action="{{ url('/store_example_form') }}" method="POST">
@csrf
<div class="row" style="margin-bottom:20px;">
<div class="col-md-3">
<input type="text" name="name[]" placeholder="Name" class="form-control">
</div>	
<div class="col-md-3">
<input type="email" name="email[]" placeholder="email" class="form-control">
</div>	
<div class="col-md-3">
<input type="password" name="password[]" placeholder="password" class="form-control">
</div>
<div class="col-md-3">
<button type="button" name="add_more" class="btn btn-primary add_more">Add More</button>
</div>	
</div>
<div class="add"></div>
<div>
<input type="submit" name="submit" class="btn btn-danger" style="margin-bottom:20px;">
</div>
</form>
</div>
@endsection