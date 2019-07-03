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

// Route::group(['prefix'=>'admin'],function(){

// 	Route::get('/home',function(){
// 		return view('admin.home');
// 	});

// 	Route::get('orderList',function(){
// 		return view('admin.orderList');
// 	})->name('OrderList');


// 	// user
// 	Route::resource('user','UserController');
// 	Route::post('/user/search','UserController@search')->name('search');


// 	//category
// 	Route::resource('category','CategoryController');
// 	// Route::get('reload','CategoryController@load');


// 	Route::resource('brand','BrandController');


// 	// size
// 	Route::resource('size','SizeController');


//Show page index
Route::get('index', 'User\PageController@index')->name('index-page');

Route::get('contact', 'User\PageController@showContactPage')->name('contact-page');



