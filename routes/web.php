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
    return password_hash("123456789", PASSWORD_DEFAULT);
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

// 显示修改页面
Route::get('/admin/user/edit', 'Admin\UserController@edit');
// Route::post('/admin/user/edit', 'Admin\UserController@doedit');
// 修改用户
Route::post('/admin/user/doedit', 'Admin\UserController@doedit');

// 修改用户状态
Route::post('/admin/user/change', 'Admin\UserController@change');

// 搜索功能
Route::post('/search', 'Admin\UserController@search');




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

// 分类
Route::group(['prefix'=>'/admin','middleware' => ['power']],function() {
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


	// 权限表
	Route::get('/power','Admin\PowerController@index');
	// 删除权限
	Route::get('/power/del/{id}','Admin\PowerController@del');
	// 添加权限页面
	Route::get('/power/add','Admin\PowerController@add');
	// 添加权限
	Route::post('/power/add','Admin\PowerController@addPower');
	// 编辑权限页面
	Route::get('/power/edit/index','Admin\PowerController@edit');
	// 编辑权限
	Route::post('/power/edit/index','Admin\PowerController@editPower');
	// 角色列表
	Route::get('/power/role','Admin\PowerController@role');
	// 添加角色页面
	Route::get('/power/role/add','Admin\PowerController@roleIndex');
	// 添加角色
	Route::post('/power/role/add','Admin\PowerController@roleAdd');
	// 删除角色
	Route::get('/power/role/del','Admin\PowerController@roleDel');
	// 编辑角色页面
	Route::get('/power/role/edit','Admin\PowerController@roleEdit');
	// 编辑角色
	Route::post('/power/role/edit','Admin\PowerController@editRole');
	// 管理员列表
	Route::get('/power/userRole','Admin\PowerController@userRole');
	// 删除管理员
	Route::get('/power/userRole/del','Admin\PowerController@userRoleDel');
	// 添加管理员页面
	Route::get('/power/userRole/addIndex','Admin\PowerController@userRoleAdd');
	// 添加管理员
	Route::post('/power/userRole/addIndex','Admin\PowerController@addUserRole');
	// 修改管理员页面
	Route::get('/power/userRole/edit/index','Admin\PowerController@userRoleEdit');
	// 修改管理员
	Route::post('/power/userRole/edit/index','Admin\PowerController@editUserRole');
});
