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
	})->name('homeAdmin');

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
	Route::get('promotion/ShowInfo/{id}','PromotionController@ShowInfoAll');

	//product
	Route::resource('product','ProductController');
	Route::get('product/editPro/{id}','ProductController@ShowInfo');
	Route::get('product/popover/{id}','ProductController@ShowPopover');
	Route::get('product/search','ProductController@Search');
	Route::PUT('/product/updateQuantity/{id}','ProductController@UpdateQuantity');
	Route::post('product/searchPoduct','ProductController@SearchProduct');
	Route::post('product/searchPoductQuickly','ProductController@SearchProductQuickly');

	//images
	Route::resource('image','ImageController');
	Route::get('image/show/{id}','ImageController@ShowInfo');
	Route::post('image/upload/{id}','ImageController@UpLoadImage');

	//comments
	Route::resource('comments','CommentController');
	Route::post('comments/approve','CommentController@read');

	//order
	Route::resource('orders','OrderController');
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


	Route::get('login','LoginController@index')->name('formLogin');
	Route::post('login','LoginController@login')->name('login');
	Route::get('register','LoginController@create')->name('register');
	Route::post('register','LoginController@store')->name('registerUser');




	Route::group(['prefix'=>'user'],function(){

		// Route::get('home',function(){
		// 	return view('user.home');
		// });
		Route::resource('page','LoadPageController');
		Route::post('search','LoadPageController@search');




	});