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
	
	Route::get('/attr/del', 'Admin\AttrController@del');
	
	//全部规格属性
	Route::get('/allattr', 'Admin\AttrController@allattr');
	
	Route::get('/allattr/editson/{id}', 'Admin\AttrController@editson');
	Route::post('/allattr/editson', 'Admin\AttrController@checkeditson');
	
	Route::get('/allattr/delson/{id}', 'Admin\AttrController@delson');
	
	//规格与商品
	Route::get('/specs/{id}', 'Admin\SpecsController@index');
	Route::post('/specs', 'Admin\SpecsController@set');
	
	Route::get('/specs/goods/{id}', 'Admin\SpecsController@setprice');
	Route::post('/specs/addgoodsspecs', 'Admin\SpecsController@addsetprice');
	Route::post('/specs/editgoodsspecs', 'Admin\SpecsController@editsetprice');
	Route::post('/specs/delgoodsspecs', 'Admin\SpecsController@delsetprice');
	
	//评论
	Route::get('/comment', 'Admin\CommentController@index');
	
	Route::get('/comment/del/{id}', 'Admin\CommentController@del');
	Route::post('/comment/reply', 'Admin\CommentController@reply');
	
	Route::get('/comment/search', 'Admin\CommentController@search');
	
	//友链
	Route::get('/link', 'Admin\LinkController@index');
	
	Route::get('/link/add', 'Admin\LinkController@add');
	Route::post('/link/add', 'Admin\LinkController@checkadd');
	
	Route::get('/link/edit/{id}', 'Admin\LinkController@edit');
	Route::post('/link/edit', 'Admin\LinkController@checkedit');
	
	Route::get('/link/del/{id}', 'Admin\LinkController@del');
	
	Route::get('/link/search', 'Admin\LinkController@search');
	
	//收藏
	Route::get('/collection', 'Admin\CollectionController@index');
	
	Route::get('/collection/del/{id}', 'Admin\CollectionController@del');
	
	Route::get('/collection/search', 'Admin\CollectionController@search');
	
	//轮播
	Route::get('/lunbo', 'Admin\LunboController@index');
	
	Route::get('/lunbo/add', 'Admin\LunboController@add');
	Route::post('/lunbo/add', 'Admin\LunboController@checkadd');
	
	Route::get('/lunbo/edit/{id}', 'Admin\LunboController@edit');
	Route::post('/lunbo/edit', 'Admin\LunboController@checkedit');
	
	Route::get('lunbo/del/{id}', 'Admin\LunboController@del');
});


Route::get('/', 'Home\IndexController@index');

Route::group(['prefix' => '/home'], function(){
	
	Route::get('/', 'Home\IndexController@index');
	
	Route::get('/goods/{id}', 'Home\GoodsController@index');
	Route::post('/goods/specs', 'Home\GoodsController@changespecs');
	Route::post('/goods/collection', 'Home\GoodsController@collection');
	Route::post('/goods/share', 'Home\GoodsController@share');
	Route::post('/clicknum', 'Home\GoodsController@clicknum');
	
	Route::get('/cate/{id}', 'Home\CateController@cate');
	Route::post('/sorts', 'Home\CateController@sorts');
	Route::post('/cate/search', 'Home\CateController@search');
});
