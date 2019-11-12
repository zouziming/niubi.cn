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


// 分类
Route::group(['prefix'=>'/admin'],function() {
	// 首页
	Route::get('/','Admin\IndexController@index');
	// 分类列表
	Route::get('/cate/index','Admin\CateController@index');
	// 搜索
	Route::post('/cate/index','Admin\CateController@seek');
	// 添加主分类页面
	Route::get('/cate/add','Admin\CateController@add');
	// 添加分类
	Route::post('/cate/add','Admin\CateController@store');
	// 添加子类页面
	Route::get('/cate/addson','Admin\CateController@addSon');
	// 删除分类
	Route::get('/cate/del','Admin\CateController@del');
	// 编辑分类页面
	Route::get('/cate/edit','Admin\CateController@edit');
	// 编辑分类
	Route::post('/cate/edit','Admin\CateController@cateEdit');

});
