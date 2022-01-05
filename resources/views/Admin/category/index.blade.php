@extends('layouts.master', ['category_name' => __('category') , 'page_name' => __('categories')])
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Categories</h5>
			
			<div class="text-lg-right">
				<a href="{{ url('admin/create_category') }}" class="btn btn-secondary">+ Add Categories</a>
			</div>
			@if (Session::has('success'))
			<div class="alert alert-success alert-dismissible mt-3">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('success')}}
			</div>
			@endif
			<div id="status-success-msg" style="display: none;" class="mt-3">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span id="status-success-msg-val"></span>
                            </div>
             </div>
		</div>
		<div class="card-body">
			<div class="container">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>id</th>
							<th>Name</th>
							<th>Image</th>
							<th>Created at</th>
							<th class="dt-sorting">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($category as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->name }}</td>
							<td><img src="{{ asset('Category/images/'.$value->category_image)}}" class="img-fluid"></td>
							<td>{{ $value->created_at }}</td>
							<td><a href="{{ url('admin/edit/'.$value->id.'/category') }}"><i class="fas fa-edit text-secondary"></i></a>
							<a href="{{ url('admin/delete/'.$value->id.'/category') }}"><i class="fas fa-trash text-danger"></i></a>
                            @if($value->is_home == 1)
                            <a href="javascript:void(0)" data-id="{{ $value->id }}" class="category_is_home status-{{ $value->id }}"><i class="fas fa-eye text-dark"></i></a>
                            @elseif($value->is_home == 0)
                            <a href="javascript:void(0)" data-id="{{ $value->id }}" class="category_is_home status-{{ $value->id }}" ><i class="fas fa-eye-slash text-dark"></i></a>
                            @endif

						      </td>
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