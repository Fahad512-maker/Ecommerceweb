@extends('layouts.master' , ['category_name' => 'category'])
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Create Category</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/category') }}" class="btn btn-secondary">Manage Categories</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/store_category')  }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="container">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter Category Name">
					</div>

					<div class="form-group">
						<label>Image</label>
						<input type="file" name="category_image" class="form-control-file">
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