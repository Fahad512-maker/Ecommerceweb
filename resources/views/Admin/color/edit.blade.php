@extends('layouts.master' , ['category_name' => 'color'])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Add Color</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/color') }}" class="btn btn-secondary">Manage Color</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/update/'.$color->id.'/color')  }}" method="post">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="container">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="{{ $color->name }}">
					</div>
					
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group text-lg-right">
					<button type="submit" class="btn btn-secondary">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection