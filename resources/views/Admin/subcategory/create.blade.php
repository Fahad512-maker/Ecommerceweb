@extends('layouts.master', ['category_name' => __('subcategory')])
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Create Subcategory</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/subcategory') }}" class="btn btn-secondary">Manage Subcategories</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/store_subcategory')  }}" method="post">
			@csrf
			<div class="card-body">
				<div class="container">
					<div class="form-group">
					<label>Categories</label>
					<select class="form-control" name="category_id">
					<option>-- Select Category --</option>
					@foreach($category as $value)
					<option value="{{ $value->id }}">{{ $value->name }}</option>
					@endforeach
					</select>
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="subcat_name" class="form-control" placeholder="Enter Subcategory Name">
					</div>
					
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group text-lg-right">
					<button type="submit" class="btn btn-secondary">Created</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection