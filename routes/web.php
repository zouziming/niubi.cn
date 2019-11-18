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
