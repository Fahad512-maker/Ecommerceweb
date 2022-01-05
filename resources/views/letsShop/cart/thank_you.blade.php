@extends('layouts.shop_master' , ['page_name' => 'thank_you'])
@section('page_title' , $page_title)
@section('content')
<div class="container">
	<div class="row">
<div class="offset-2 col-md-4 col-4"></div>		
<div class="col-md-6 col-4">
	<h2 style="margin-top:20px;">Thank You For Ordering</h2>
	<a href="{{ url('/LetsShop/products') }}" class="btn btn-lg" style="margin-top:20px; background-color:#e35236; color:white; margin-left:50px;">Continue To Shopping</a>
	<h4 style="margin-top:20px; margin-left:60px; color:#e35236" class="font-weight-bold">Your Order ID is {{ $order->id }}</h4>
	
</div>
</div>
</div>
<div style="margin-bottom: 110px;"></div>
@endsection