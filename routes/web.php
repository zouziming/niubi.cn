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
 * 后台路由
 */
Route::group(['prefix' => '/admin', 'middleware' => ['user.login']], function(){
    // 后台首页
    Route::get('/', 'Admin\IndexController@index');

    // 后台退出
    Route::get('/logout', 'Admin\IndexController@logout');
    
    // 修改个人信息
    Route::post('/index', 'Admin\IndexController@info');
    // 修改头像
    Route::get('/headpic', 'Admin\IndexController@headpic');
    Route::post('/headpic', 'Admin\IndexController@editheadpic');

    // 修改密码
    Route::get('/pwd', 'Admin\IndexController@pwd');
    Route::post('/editpwd', 'Admin\IndexController@editpwd');

    /**
     * 用户模块
     */
    // 用户列表
    Route::get('/user/index', 'Admin\UserController@show');
    // 添加用户
    Route::get('/user/add', 'Admin\UserController@add');
    Route::post('/user/add', 'Admin\UserController@store');

    // 删除用户 
    Route::post('/user/del/{id}', 'Admin\UserController@del');

    // 显示修改页面
    Route::get('/user/edit', 'Admin\UserController@edit');
    // Route::post('/admin/user/edit', 'Admin\UserController@doedit');
    // 修改用户
    Route::post('/user/doedit', 'Admin\UserController@doedit');
    // 修改用户状态
    Route::post('/user/change', 'Admin\UserController@change');
    // 更换状态
    Route::get('/user/status/{id}/{status}', 'Admin\UserController@status');

});
    // 后台登录
Route::get('/admin/login', 'Admin\LoginController@show');
Route::post('/admin/login', 'Admin\LoginController@login');
   

// 搜索功能
Route::get('/search', 'Admin\UserController@search');





/**
 * 前台路由
 */
// 前台首页
Route::group(['prefix' => '/home', 'middleware' => ['users.login']], function(){
    Route::get('/', 'Home\IndexController@index');

    // 前台退出
    Route::get('/logout', 'Home\IndexController@logout');
});
// 前台登录
Route::get('/home/login', 'Home\LoginController@show');
Route::post('/home/login', 'Home\LoginController@login');

// 手机号登录
Route::get('/home/logincode', 'Home\LoginController@showphone');
Route::post('/home/logincode', 'Home\LoginController@logincode');
Route::post('/home/dologincode', 'Home\LoginController@dologincode');


/**
 *  前台注册
 */
// 手机号注册
Route::get('/home/register', 'Home\RegisterController@show');
Route::post('/home/register', 'Home\RegisterController@register');
Route::post('/home/doregister', 'Home\RegisterController@doregister');

// 密码
Route::get('/home/enroll', 'Home\RegisterController@reveal');
Route::post('/home/enroll', 'Home\RegisterController@enroll');





// 个人中心
Route::get('/home/user/secure', 'Home\UserController@secure');
Route::get('/home/user/mycenter', 'Home\UserController@mycenter');

// 个人资料修改
Route::post('/home/user/mycenter', 'Home\UserController@edit');
// 修改头像
Route::get('/home/user/picture', 'Home\UserController@pic');
Route::post('/home/user/picture', 'Home\UserController@picture');
// 修改密码
Route::get('/home/user/password', 'Home\UserController@show');
Route::post('/home/user/password', 'Home\UserController@password');

