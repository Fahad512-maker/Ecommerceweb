@extends('layouts.master' , ['category_name' => __('coupon') , 'page_name' => __('coupon')])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Posts</h5>
			<div class="text-lg-right">
				<a href="{{ url('admin/create_coupon') }}" class="btn btn-secondary">+ Add Coupon</a>
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
							<th>Title</th>
							<th>Code</th>
							<th>Value</th>
							<th>Created at</th>
							<th class="dt-sorting">Action</th>
						</tr>
					</thead>
					<tbody>
						@if($coupon)
						@foreach($coupon as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->title }}</td>
							<td>{{ $value->code }}</td>
							<td>{{ $value->value }}</td>
							<td>{{ $value->created_at }}</td>
							<td><a href="{{ url('admin/edit/'.$value->id.'/coupon') }}"><i class="fas fa-edit text-secondary"></i></a>
							<a href="{{ url('admin/delete/'.$value->id.'/coupon') }}"><i class="fas fa-trash text-danger"></i></a>
							@if($value->status == 1)
							<a href="javascript:void(0)" title="Active" data-id="{{ $value->id }}" class="coupon_status status-{{ $value->id }}  text-success"><i class="fas fa-check-circle text-success"></i></a>
							@elseif($value->status == 0)
							<a href="javascript:void(0)" title="Deactive" data-id="{{ $value->id }}" class="coupon_status status-{{ $value->id }} text-danger"><i class="fas fa-times-circle text-danger"></i></a>
							@endif
						   </td>

						</tr>
						@endforeach
						@else
						<td>No Data Available</td>
						@endif
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