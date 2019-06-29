<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// admin 

Route::group(['prefix'=>'admin'],function(){

	Route::get('/home',function(){
		return view('admin.home');
	});

	Route::get('orderList',function(){
		return view('admin.orderList');
	})->name('OrderList');


	// user
	Route::resource('user','UserController');
	Route::post('/user/search','UserController@search')->name('search');


	//category
	Route::resource('category','CategoryController');
	// Route::get('reload','CategoryController@load');


	Route::resource('brand','BrandController');


	// size
	Route::resource('size','SizeController');


	//promotion
	Route::resource('promotion','PromotionController');
	Route::get('promotion/show/{id}','PromotionController@ShowInfo');

	//product
	Route::resource('product','ProductController');
	Route::get('product/editPro/{id}','ProductController@ShowInfo');
	Route::get('product/popover/{id}','ProductController@ShowPopover');
	Route::get('product/search','ProductController@Search');
	Route::PUT('/product/updateQuantity/{id}','ProductController@UpdateQuantity');


	Route::get('/test',function(){

		$size =\App\Size::all();
		$product =\App\Product::first();
		$product->sizes()->sync([1=>['quantity'=>2]]);

	});
});
