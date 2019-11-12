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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => '/admin'], function(){
	//商品
    Route::get('/goods', 'Admin\GoodsController@index');
	Route::post('/goods', 'Admin\GoodsController@search');
	
	Route::get('/goods/add', 'Admin\GoodsController@add');
	Route::post('/goods/add', 'Admin\GoodsController@checkadd');
	
	Route::get('/goods/edit/{id}', 'Admin\GoodsController@edit');
	Route::post('/goods/edit/{id}', 'Admin\GoodsController@checkedit');
	
	Route::get('/goods/del/{id}', 'Admin\GoodsController@del');
	
	//规格
	Route::get('/goods/attr', 'Admin\AttrController@attr');
	
	Route::get('/attr/add', 'Admin\AttrController@add');
	Route::post('/attr/add', 'Admin\AttrController@checkadd');
	
	Route::get('/attr/edit/{id}', 'Admin\AttrController@edit');
	Route::post('/attr/edit', 'Admin\AttrController@checkedit');
	
	Route::get('/attr/son/{id}', 'Admin\AttrController@son');
	
	Route::get('/attr/del/{id}', 'Admin\AttrController@del');
});