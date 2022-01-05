@extends('layouts.master' , ['category_name' => __('products') , 'page_name' => __('add_products')])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Create Posts</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/posts') }}" class="btn btn-secondary">Manage Posts</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/store_product')  }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					<label>Categories</label>
					<select class="form-control category_change" name="category_id">
					<option>-- Select Category --</option>
					@foreach($category as $value)
					<option value="{{ $value->id }}">{{ $value->name }}</option>
					@endforeach
					</select>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					<label>Subcategories</label>
					<select class="form-control getsubcategory" name="subcategory_id">
					<option>Please Select First Category</option>
					</select>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" placeholder="Enter Title">
					</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label>Brand</label>
						<input type="text" name="brand" class="form-control" placeholder="Brand">
					</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label>Model</label>
						<input type="text" name="model" class="form-control" placeholder="Model">
					</div>
					</div>
                       
                    					<div class="col-md-6">
						<div class="form-group">
					<label>Uses</label>
					<input type="text" class="form-control" placeholder="Uses" name="uses">
					</div>
					</div>
   
					<div class="col-md-12">
						<div class="form-group">
					<label>Short description</label>
					<textarea class="form-control" placeholder="description" name="short_description"></textarea>
					</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" placeholder="description" name="description"></textarea>
					</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
					<label>Tags</label>
					<textarea class="form-control" placeholder="Tags" name="Tags"></textarea>
					</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
					<label>Technical Specification</label>
					<input type="text" class="form-control" placeholder="Specification" name="technical_specification">
					</div>
					</div>

                    
					<div class="col-md-6">
						<div class="form-group">
					<label>Warranty</label>
					<input type="text" class="form-control" placeholder="Warranty" name="warranty">
					</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
					<label>lead_time</label>
					<input type="text" class="form-control" placeholder="lead_time" name="lead_time">
					</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
					<label>Tax</label>
					<input type="text" class="form-control" placeholder="tax" name="tax">
					</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
					<label>Tax Type</label>
					<input type="text" class="form-control" placeholder="Tax Type" name="tax_type">
					</div>
					</div>

					<div class="col-md-6"></div>

					<div class="col-md-3">
						<div class="form-group">
					<label>is_promo</label>
					<select name="is_promo" class="form-control">
					<option value="1">Yes</option>
					<option value="0" selected="">No</option>
					</select>
					</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
					<label>is_featured</label>
					<select name="is_featured" class="form-control">
					<option value="1">Yes</option>
					<option value="0" selected="">No</option>
					</select>
					</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
					<label>is_discounted</label>
					<select name="is_discounted" class="form-control">
					<option value="1">Yes</option>
					<option value="0" selected="">No</option>
					</select>
					</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
					<label>is_trending</label>
					<select name="is_trending" class="form-control">
					<option value="1">Yes</option>
					<option value="0" selected="">No</option>
					</select>
					</div>
					</div>

					<div class="card ml-2">
					<div class="card-header">
					<label>Project Images</label>
					</div>
					<div class="card-body">
					<div class="form-group">
					<input type="file" name="product_images[]" class="form-control-file" required="" multiple="">
					</div>	
					</div>
					</div>

                   <input type="hidden" class="number" value="0">
                    <div class="col-md-12">
					<div class="card">
					<div class="card-header">
					<h4>Product Attributes</h4>
					</div>
					<div class="card-body">
	                 <div class=" text-lg-right">                
					 <button type="button" class="btn btn-secondary add_attributes">+ Add Attributes</button>
					</div>
                    <div class="data"></div>

					</div>
					</div>
				</div>
                    </div>
                    
					{{-- <div class="col-md-6">
						<div class="form-group text-lg-right">
					<label>Attributes</label><br>
					<button type="button" class="btn btn-secondary rounded add_attributes">+ Add Product Attributes</button>
					</div>
					</div> --}}

					</div>
					
				</div>
			</div>
			    <div class="card-footer">
				<div class="form-group text-lg-right">
					<input type="submit" name="submit" class="btn btn-secondary" value="Created" />
				</div>
			   </div>
		</form>
	</div>
</div>
@endsection