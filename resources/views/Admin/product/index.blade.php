@extends('layouts.master' , ['category_name' => __('products') , 'page_name' => __('products')])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Posts</h5>
			<div class="text-lg-right">
				    
				    <a href="{{ url('admin/color') }}" class="btn btn-dark" title="Colors"><i class="fas fa-paint-brush"></i></a>
				    <a href="{{ url('admin/size') }}" class="btn btn-dark" title="Size"><i class="fas fa-pencil-alt"></i></a>
					<a href="{{ url('admin/create_product') }}" class="btn btn-secondary">+ Add Product</a>
			</div>
			@if (Session::has('success'))
			<div class="alert alert-success alert-dismissible mt-3">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('success')}}
			</div>
			@endif
		</div>
		<div class="card-body">
			<div class="container">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>id</th>
							<th>Category</th>
							<th>Subcategory</th>
							<th>Title</th>
							<th>Images</th>
							<th>Created at</th>
							<th class="dt-sorting">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($product as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->category->name }}</td>
							<td>{{ $value->subcategory->subcat_name }}</td>
							<td>{{ $value->title }}</td>
							<td><img src="{{ asset('products/images/'.$value->productimage->product_images) }}" width="100" height="100"></td>
							<td>{{ $value->created_at }}</td>
							<td><a href="{{ url('admin/edit/'.$value->id.'/product') }}"><i class="fas fa-edit text-secondary"></i></a>
							<a href="{{ url('admin/delete/'.$value->id.'/product') }}"><i class="fas fa-trash text-danger"></i></a >

							 @if($value->status == 1)
							 <a href="javascript:void(0)" title="publish" class="product_publish status-{{ $value->id }}" data-id={{ $value->id }} ><i class="fas fa-eye text-secondary"></i></a>
							 @else
							 <a href="javascript:void(0)" title="unpublish" class="product_publish status-{{ $value->id }}" data-id={{ $value->id }} ><i class="fas fa-eye-slash text-secondary"></i></a>
							 @endif
						   </td>
						</tr>
						@endforeach
					</tbody>
					{{-- <tfoot>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Office</th>
						<th>Age</th>
						<th>Start date</th>
						<th>Salary</th>
					</tr>
					</tfoot> --}}
				</table>
			</div>
		</div>
	</div>
</div>
@endsection