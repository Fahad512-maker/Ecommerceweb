@extends('layouts.master' , ['category_name' => 'size'])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Edit Size</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/size') }}" class="btn btn-secondary">Manage Size</a>
			</div>
			@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('error')}}
			</div>
			@endif
		</div>
		<form action="{{ url('admin/update/'.$Size->id.'/size')  }}" method="post">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="container">
					<div class="form-group">
						<label>Size</label>
						<input type="text" name="sizes" class="form-control" value="{{ $Size->sizes }}">
					</div>
					
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group text-lg-right">
					<button type="submit" class="btn btn-secondary">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection