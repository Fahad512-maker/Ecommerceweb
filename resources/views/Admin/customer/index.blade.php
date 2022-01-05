@extends('layouts.master', ['category_name' => __('customer') , 'page_name' => __('customers')])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h5>Customer</h5>
			{{-- <div class="text-lg-right">
				<a href="{{ url('admin/create_customer') }}" class="btn btn-secondary">+ Add Customer</a>
			</div> --}}
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
							<th>Name</th>
							<th>Email</th>
							<th>City</th>
							<th>Created at</th>
							<th class="dt-sorting">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($customer as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->city }}</td>
							<td>{{ $value->created_at->format('y.m.d') }}</td>
							<td><a href="javascript:void(0)" class="customer_detail"  data-id="{{ $value->id }}"><i class="fas fa-eye text-secondary"></i></a>
							{{-- <a href="{{ url('admin/delete/'.$value->id.'/subcategory') }}"><i class="fas fa-trash text-danger"></i></a> --}}
							@if($value->status == 1)
							<a href="javascript:void(0)" class="customer_status status-{{ $value->id }}" data-id="{{ $value->id }}"><i class="fas fa-check-circle text-success"></i></a>
							@else
						    <a href="javascript:void(0)" class="customer_status status-{{ $value->id }}" data-id="{{ $value->id }}"><i class="fas fa-times-circle text-danger"></i></a>
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



 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewdetail">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
@endsection


{{-- <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body view_detail">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}