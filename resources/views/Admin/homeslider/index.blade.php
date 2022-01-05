@extends('layouts.master', ['category_name' => __('home_slider') , 'page_name' => __('homeslider')])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h4>Home Slider</h4>
			
			<div class="text-lg-right">
				<a href="{{ url('admin/add_home_slider') }}" class="btn btn-secondary">+ Add Home Slider</a>
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
							<th>Title</th>
							<th>Image</th>
							<th>Button Text</th>
							<th>Button Link</th>
							<th>Created at</th>
							<th class="dt-sorting">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($HomeSlider as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->title }}</td>
							<td><img src="{{ asset('HomeSlider/images/'. $value->image) }}" class="img-fluid"></td>
							<td>{{ $value->button_txt }}</td>
							<td>{{ $value->button_link }}</td>
							<td>{{ $value->created_at }}</td>
							<td><a href="{{ url('admin/edit/'.$value->id.'/home_slider') }}"><i class="fas fa-edit text-secondary"></i></a>
							<a href="{{ url('admin/delete/'.$value->id.'/home_slider') }}"><i class="fas fa-trash text-danger"></i></a>
                            @if($value->status == 1)
                            <a href="javascript:void(0)" class="status-{{ $value->id }} slider_status" data-id={{ $value->id }}><i class="fas fa-eye text-dark"></i></a>
                            @else
                            <a href="javascript:void(0)" class="status-{{ $value->id }} slider_status" data-id={{ $value->id }}><i class="fas fa-eye-slash text-dark"></i></a>
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