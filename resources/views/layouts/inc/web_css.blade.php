   <!-- Font awesome -->
    <link href="{{ asset('LetsShop/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('LetsShop/css/bootstrap.css') }}" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('LetsShop/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('LetsShop/css/jquery.simpleLens.css') }}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('LetsShop/css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('LetsShop/css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('LetsShop/css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('LetsShop/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('LetsShop/css/style.css') }}" rel="stylesheet">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
@if($page_name)

@switch($page_name)

@case('account_page')

<style type="text/css">
	.parsley-errors-list li{
		list-style: none;
		color: red;
	}
</style>
@break;

@case('product_page')
<style type="text/css">

 .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-bottom: 16px solid blue;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
/*#product_card{
  display: none;
}*/
</style>
@break;
@case('product_detail')
<style type="text/css">
  .aa-product-view-price{
    color: #e35236;
    font-size: 29px;
    font-family: sans-serif;
  }

  .aa-product-delivery{

        padding: 8px;
    font-weight: bold;
    color: #82847d;
  }
</style>
@break
@endswitch
@endif