<?php
use App\Marketplace\FeaturedProducts;
use App\Product;
use App\Category;
use App\Vendor;

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


Route::name('auth.')->group(function () {
    include 'auth.php';
});
Route::prefix('admin') -> group(function (){
    Route::middleware(['admin_panel_access'])->group(function () {
        include 'admin.php';
    });
});
// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('banned', 'ProfileController@banned')->name('profile.banned');
    Route::middleware(['is_banned']) -> group(function(){
        include 'profile.php';
    });

    Route::get('/', 'IndexController@home')->name('home');
	Route::get('/category/{category}', 'IndexController@category') -> name('category.show');

	// Product routes
	Route::get('product/{product}', 'ProductController@show') -> name('product.show');
	Route::get('product/{product}/rules', 'ProductController@showRules') -> name('product.rules');
	Route::get('product/{product}/feedback', 'ProductController@showFeedback') -> name('product.feedback');
	Route::get('product/{product}/delivery', 'ProductController@showDelivery') -> name('product.delivery');
	Route::get('product/{product}/coupon', 'ProductController@showCoupon') -> name('product.coupon');
	Route::post('product/{product}/coupons', 'ProductController@generateCoupon') -> name('product.coupon.generate');
	Route::get('product/{product}/vendor', 'ProductController@showVendor') -> name('product.vendor');

	// category routes
	Route::get('category/{category}', 'IndexController@category') -> name('category.show');

	// vendor routes
	Route::get('vendor/{user}', 'IndexController@vendor') -> name('vendor.show');

	Route::get('vendor/{user}/feedback', 'IndexController@vendorsFeedbacks') -> name('vendor.show.feedback');

	Route::post('search','SearchController@search')->name('search');
	Route::get('search','SearchController@searchShow')->name('search.show');

	//navbar routes
	Route::get('/featured', function () {
		$featuredProducts = FeaturedProducts::get();
	    return view('tailwind-ui.featured')
	    	->with([
	    		'products' => $featuredProducts
	    	]);
	});

	Route::get('/shop', function () {
		$products = Product::all();
	    return view('shop')
	    	->with([
	    		'products' => $products,
	    		'categories' => Category::roots()
	    	]);
	});

	Route::get('/vendors', function () {
		$vendors = Vendor::allUsers2();
	    return view('tailwind-ui.vendors')
	    	->with([
	    		'vendors' => $vendors
	    	]);
	});

	Route::get('/faqs', function() {
		return view('tailwind-ui.faqs');
	});

});


Route::get('/login', 'IndexController@login')->name('login');
Route::get('/confirmation', 'IndexController@confirmation')->name('confirmation');

Route::get('setview/{list}', 'IndexController@setView') -> name('setview');


