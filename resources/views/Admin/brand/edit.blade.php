@extends('layouts.master' , ['category_name' => 'brand'])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h4>Edit Brand</h4>
			<div class="text-lg-right">
				<a href="{{ url('admin/brand') }}" class="btn btn-secondary">Manage Brands</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/update/'.$brand->id.'/brand')  }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="container">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $brand->title }}">
					</div>
					
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control-file" placeholder="Enter File">
					</div>
					<div class="card-img">
					<img src="{{ asset('Brand/images/'.$brand->image) }}" class="img-fluid" width="300px" height="100px">
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