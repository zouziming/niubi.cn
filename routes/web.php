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
	Route::get('/goods/search', 'Admin\GoodsController@search');
	Route::post('/goods/status', 'Admin\GoodsController@changestatus');
	
	Route::get('/goods/add', 'Admin\GoodsController@add');
	Route::post('/goods/add', 'Admin\GoodsController@checkadd');
	
	Route::get('/goods/edit/{id}', 'Admin\GoodsController@edit');
	Route::post('/goods/edit/{id}', 'Admin\GoodsController@checkedit');
	
	Route::get('/goods/del/{id}', 'Admin\GoodsController@del');
	
	Route::get('/goods/recycle', 'Admin\GoodsController@recycle');
	Route::get('/goods/gorecycle/{id}', 'Admin\GoodsController@gorecycle');
	Route::get('/goods/backrecycle/{id}', 'Admin\GoodsController@backrecycle');
	
	//规格属性
	Route::get('/goods/attr', 'Admin\AttrController@attr');
	
	Route::get('/attr/add', 'Admin\AttrController@add');
	Route::post('/attr/add', 'Admin\AttrController@checkadd');
	
	Route::get('/attr/edit/{id}', 'Admin\AttrController@edit');
	Route::post('/attr/edit', 'Admin\AttrController@checkedit');
	
	Route::get('/attr/son/{id}', 'Admin\AttrController@addson');
	Route::post('attr/son', 'Admin\AttrController@checkaddson');
	
	Route::get('/attr/del/{id}', 'Admin\AttrController@del');
	
	//全部规格属性
	Route::get('/allattr', 'Admin\AttrController@allattr');
	
	Route::get('/allattr/editson/{id}', 'Admin\AttrController@editson');
	Route::post('/allattr/editson', 'Admin\AttrController@checkeditson');
	
	Route::get('/allattr/delson/{id}', 'Admin\AttrController@delson');
	
	//规格与商品
	Route::get('/specs/{id}', 'Admin\SpecsController@index');
	Route::post('/specs', 'Admin\SpecsController@set');
	
	Route::get('/specs/goods/{id}', 'Admin\SpecsController@setprice');
	Route::post('/specs/addgoods', 'Admin\SpecsController@addsetprice');
	Route::post('/specs/editgoods', 'Admin\SpecsController@editsetprice');
	
	//评论
	Route::get('/comment', 'Admin\commentController@index');
});