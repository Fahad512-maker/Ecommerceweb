@extends('layouts.master' , ['category_name' => 'home_slider'])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h4>Add Home Slider Images</h4>
			<div class="text-lg-right">
				<a href="{{ url('admin/home_slider') }}" class="btn btn-secondary">Manage Slider</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/store_home_slider')  }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<div class="container">
					<div class="row">
					<div class="col-md-6">
					<div class="form-group">
						<labelm>Title</label>
						<input type="text" name="title" class="form-control" placeholder="Enter Title">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control-file">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Button Text</label>
						<input type="text" name="button_txt" class="form-control" placeholder="Enter Button Text">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Button Link</label>
						<input type="text" name="button_link" class="form-control" placeholder="Enter Button Link">
					</div>
					</div>
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