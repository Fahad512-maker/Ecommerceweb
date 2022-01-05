@extends('layouts.master' , ['category_name' => 'category'])
@section('content')

<div class="container">
<div class="card">
<div class="card-header">
<h5>Edit Category</h5>

<div class="text-lg-right">
	<a href="{{ url('admin/category') }}" class="btn btn-secondary">Manage Categories</a>
</div>
</div>
<form action="{{ url('admin/update/'.$category->id.'/category')  }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="card-body">
	<div class="container">
	<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{ $category->name }}">
	</div>
	<div class="form-group">
	<label>Category Image</label>
	<input type="file" name="category_image" class="form-control-file"/>
	<img src="{{ asset('Category/images/'.$category->category_image) }}" class="mt-3" style="width:100px; height: 100px;">
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