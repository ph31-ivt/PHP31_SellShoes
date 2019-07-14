<?php
// admin 

Route::group(['prefix'=>'admin','middleware'=>['checkLogin','checkAdmin','web']],function(){

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
	Route::post('product/updateQuantity','ProductController@UpdateQuantity');
	Route::post('product/searchPoduct','ProductController@SearchProduct');
	Route::post('product/searchPoductQuickly','ProductController@SearchProductQuickly');
	// Route::post('product/capnhat','ProductController@capnhat');	

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
	Route::get('logout','LoginController@logout')->name('logout');
	Route::post('login','LoginController@login')->name('login');
	Route::post('loginUser','LoginController@loginUser')->name('loginUser');
	Route::get('register','LoginController@create')->name('register');
	Route::post('register','LoginController@store')->name('registerUser');




Route::resource('user/page','LoadPageController');
	Route::post('user/search','LoadPageController@search');

	Route::get('user/showDetail/{id}','LoadPageController@showDetail')->name('showDetail')->middleware('checkLogin');
	// trả về giá moi khi click tăng giảm số lượng
	

Route::group(['prefix'=>'user','middleware'=>['checkLogin','web']],function(){
	Route::post('showPrice','LoadPageController@showPrice');
	Route::post('cartShopping','LoadPageController@cartShopping')->name('shopDetail');
	Route::get('cartDetail','LoadPageController@cartDetail')->name('cartDetail');
	Route::post('cartDetail','LoadPageController@deleteCart')->name('deleteCart');
	Route::get('checkout','LoadPageController@checkout')->name('checkout');
});
