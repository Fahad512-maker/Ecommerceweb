@extends('layouts.master', ['category_name' => __('subcategory')])
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Subcategories</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/create_subcategory') }}" class="btn btn-secondary">+ Add Subcategories</a>
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
							<th>Name</th>
							<th>Created at</th>
							<th class="dt-sorting">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subcategory as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->category->name }}</td>
							<td>{{ $value->subcat_name }}</td>
							<td>{{ $value->created_at }}</td>
							<td><a href="{{ url('admin/edit/'.$value->id.'/subcategory') }}"><i class="fas fa-edit text-secondary"></i></a>
							<a href="{{ url('admin/delete/'.$value->id.'/subcategory') }}"><i class="fas fa-trash text-danger"></i></a></td>
						</tr>
						@endforeach
					</tbody>
					{{--         <tfoot>
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