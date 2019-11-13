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

// test哈希加密
Route::get('/test', function () {
    return password_hash("123456", PASSWORD_DEFAULT);
});


/**
 * 后台操作
 */
Route::group(['prefix' => '/admin', 'middleware' => ['user.login']], function(){
    // 后台首页
    Route::get('/', 'Admin\IndexController@index');

    // 后台退出
    Route::get('/logout', 'Admin\IndexController@logout');
});
    // 后台登录
Route::get('/admin/login', 'Admin\LoginController@show');
Route::post('/admin/login', 'Admin\LoginController@login');
    

/**
 * 用户模块
 */
// 用户列表
Route::get('/admin/user/index', 'Admin\UserController@show');
// 添加用户
Route::get('/admin/user/add', 'Admin\UserController@add');
Route::post('/admin/user/add', 'Admin\UserController@store');

// 删除用户 
Route::post('/admin/user/del/{id}', 'Admin\UserController@del');

//
Route::get('/admin/user/edit', 'Admin\UserController@edit');
Route::post('/admin/user/doedit', 'Admin\UserController@doedit');

// 搜索功能
Route::post('/search', 'Admin\UserController@search');



