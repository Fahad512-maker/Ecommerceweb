<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hello' , function(){
   return view('layouts.inc.web_css');
});
Route::get('/' , [FrontController::class , 'index']);
Route::prefix('admin')->group(function(){

Route::get('/login', function () {
   return view('auth.login');
});
});


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::get('/dashboard' , [HomeController::class, 'dashboard']);

Route::group(['middleware' => 'auth'] , function(){

   Route::prefix('admin')->group(function() {

// Categories

Route::get('/category', [CategoryController::class , 'index']);
Route::get('/create_category' , [CategoryController::class , 'create']);
Route::post('/store_category' , [CategoryController::class , 'store']);
Route::get('/edit/{id}/category' , [CategoryController::class , 'edit']);
Route::put('/update/{id}/category' , [CategoryController::class , 'update']);
Route::get('/delete/{id}/category' , [CategoryController::class , 'destroy']);
Route::get('/show/{id}/category' , [CategoryController::class , 'show']);
Route::post('/category/{id}/is_home' , [CategoryController::class , 'showhomebystatus']);

// Subcategories

Route::get('/subcategory', [SubcategoryController::class , 'index']);
Route::get('/create_subcategory' , [SubcategoryController::class , 'create']);
Route::post('/store_subcategory' , [SubcategoryController::class , 'store']);
Route::get('/edit/{id}/subcategory' , [SubcategoryController::class , 'edit']);
Route::put('/update/{id}/subcategory' , [SubcategoryController::class , 'update']);
Route::get('/delete/{id}/subcategory' , [SubcategoryController::class , 'destroy']);
Route::get('/show/{id}/subcategory' , [SubcategoryController::class , 'show']);

// Products


Route::get('/products', [ProductController::class , 'index']);
Route::get('/create_product' , [ProductController::class , 'create']);
Route::post('/store_product' , [ProductController::class , 'store']);
Route::get('/edit/{id}/product' , [ProductController::class , 'edit']);
Route::put('/update/{id}/product' , [ProductController::class , 'update']);
Route::get('/delete/{id}/product' , [ProductController::class , 'destroy']);
Route::get('/show/{id}/product' , [ProductController::class , 'show']);
Route::get('/getSubcategoriesByCatId/{id}' , [ProductController::class , 'getsubcategorybycatid']);
Route::post('/status/{id}/products' , [ProductController::class , 'changestatusafterpublish']);


// Coupon
Route::get('/coupons', [CouponController::class , 'index']);
Route::get('/create_coupon' , [CouponController::class , 'create']);
Route::post('/store_coupon' , [CouponController::class , 'store']);
Route::get('/edit/{id}/coupon' , [CouponController::class , 'edit']);
Route::put('/update/{id}/coupon' , [CouponController::class , 'update']);
Route::get('/delete/{id}/coupon' , [CouponController::class , 'destroy']);
Route::get('/show/{id}/coupon' , [CouponController::class , 'show']);
Route::post('/coupon_status/{id}' , [CouponController::class , 'statuschangebylink']);


// Brand
Route::get('/brand', [BrandController::class , 'index']);
Route::get('/create_brand' , [BrandController::class , 'create']);
Route::post('/store_brand' , [BrandController::class , 'store']);
Route::get('/edit/{id}/brand' , [BrandController::class , 'edit']);
Route::put('/update/{id}/brand' , [BrandController::class , 'update']);
Route::get('/delete/{id}/brand' , [BrandController::class , 'destroy']);
Route::get('/show/{id}/brand' , [BrandController::class , 'show']);
// Route::post('/coupon_status/{id}' , [BrandController::class , 'statuschangebylink']);


// Size

Route::get('/size', [SizeController::class , 'index']);
Route::get('/create_size' , [SizeController::class , 'create']);
Route::post('/store_size' , [SizeController::class , 'store']);
Route::get('/edit/{id}/size' , [SizeController::class , 'edit']);
Route::put('/update/{id}/size' , [SizeController::class , 'update']);
Route::get('/delete/{id}/size' , [SizeController::class , 'destroy']);
Route::get('/show/{id}/size' , [SizeController::class , 'show']);


// Color

Route::get('/color', [ColorController::class , 'index']);
Route::get('/create_color' , [ColorController::class , 'create']);
Route::post('/store_color' , [ColorController::class , 'store']);
Route::get('/edit/{id}/color' , [ColorController::class , 'edit']);
Route::put('/update/{id}/color' , [ColorController::class , 'update']);
Route::get('/delete/{id}/color' , [ColorController::class , 'destroy']);
Route::get('/show/{id}/color' , [SizeController::class , 'show']);
 

// Customer

Route::get('/customer',         [CustomerController::class , 'index']);
Route::get('/create_customer' ,     [CustomerController::class , 'create']);
Route::get('/edit/{id}/customer' , [CustomerController::class , 'edit']);
Route::put('/update/{id}/customer' , [CustomerController::class , 'update']);
Route::get('/delete/{id}/customer' , [CustomerController::class , 'destroy']);
Route::post('/show/{id}/customer' , [CustomerController::class , 'show']);
Route::post('/status/{id}' , [CustomerController::class , 'changestatus']);

// Home_slder

Route::get('/home_slider',         [HomeSliderController::class , 'index']);
Route::get('/add_home_slider' ,     [HomeSliderController::class , 'create']);
Route::post('store_home_slider' , [HomeSliderController::class , 'store']);
Route::get('/edit/{id}/home_slider' , [HomeSliderController::class , 'edit']);
Route::put('/update/{id}/home_slider' , [HomeSliderController::class , 'update']);
Route::get('/delete/{id}/home_slider' , [HomeSliderController::class , 'destroy']);
Route::post('/show/{id}/home_slider' , [HomeSliderController::class , 'show']);
Route::post('/status/{id}/home_slider' , [HomeSliderController::class , 'changestatus']);

});
});

// Front Controller

Route::post('/store_customer' , [CustomerController::class , 'store']);
Route::post('/login_form' , [loginController::class , 'login_form']);
Route::get('/verifyemail/{email}' , [loginController::class , 'verify_email']);
Route::get('/account_page' , [FrontController::class , 'account_page']);
Route::post('state/{country_id}' , [FrontController::class , 'getStateByCountryId'] );
Route::post('city/{state_id}' , [FrontController::class , 'getCityByStateId'] );
Route::get('/posts/{subcat?}' , [FrontController::class , 'GetPostsbycatId']);
Route::get('LetsShop/products' , [FrontController::class , 'showallproducts']);
Route::post('show/products/{id}' , [FrontController::class , 'showproductsbycategory']);
Route::post('sort/products/{sort_value}' , [FrontController::class , 'sortproductsbyvalue']);
Route::post('search/color/{id}/product' , [FrontController::class , 'searchproductbycolor']);
Route::post('/search/products' , [FrontController::class , 'searchproductbyinput']);
Route::get('/product/{title}' , [FrontController::class , 'getproductbytitle'] );
Route::get('/fetch/products' , [FrontController::class , 'getproductbypage']);
Route::post('/add_to_cart' , [FrontController::class , 'add_to_cart']);
Route::get('/product_cart' , [FrontController::class , 'my_cart']);
Route::get('/checkout' , [FrontController::class , 'checkout']);
Route::post('/coupon_code' , [FrontController::class , 'coupon_code']);
Route::post('/place_order' , [FrontController::class , 'place_order']);
Route::get('/payment_method' , [FrontController::class , 'payment_method']);
Route::post('/confirm_order' , [FrontController::class , 'confirmed_order']);
Route::get('/example' , [FrontController::class , 'example']);
Route::post('/store_example_form' , [FrontController::class , 'store_example_form']);
Route::get('stripe_url' , function(){
 
 return view('letsShop.cart.stripe');

});
Route::post('stripe_payment' , [FrontController::class , 'stripe_payment']);
Route::get('thank_you' , [FrontController::class , 'thank_you']);
Route::group(['middleware' => 'UserAuth'] , function(){
   Route::get('orders' , [FrontController::class , 'Orders']);
   Route::get('order_detail/{id}' , [FrontController::class , 'order_details']);
 });  
Route::get('/logout' , function(){

session()->forget('customer_login');
session()->forget('customer_id');
session()->forget('Temp_Users');

return redirect(url('/')); 


});