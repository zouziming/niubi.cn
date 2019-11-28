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

    // 修改用户
    Route::post('/user/doedit', 'Admin\UserController@doedit');
    // 修改用户状态
    Route::post('/user/change', 'Admin\UserController@change');
    // 更换状态
    Route::get('/user/status/{id}/{status}', 'Admin\UserController@status');

// Route::group(['prefix' => '/admin'], function(){
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
	
	Route::post('/goods/online', 'Admin\GoodsController@isonline');
	
	Route::post('/checkhasattr', 'Admin\GoodsController@checkhasattr');
	
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
	
	Route::post('/allattr/delson', 'Admin\AttrController@delson');
	
	Route::post('/hasson', 'Admin\AttrController@hasson');
	
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
	
	Route::get('/lunbo/del/{id}', 'Admin\LunboController@del');
	
	//订单
	Route::post('/order/fahuo', 'Admin\OrdersController@fahuo');
	Route::get('/order/refund', 'Admin\OrdersController@refundlist');
	Route::post('/refund/refuse', 'Admin\OrdersController@refundrefuse');	
	Route::get('/refund/agree/{id}', 'Admin\OrdersController@refundagree');
	Route::post('/pagepay/refund', 'Admin\OrdersController@refundpagepay');	



// 分类
// Route::group(['prefix'=>'/admin','middleware' => ['power']],function() {

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
	// Route::post('/power/userRole/edit/index','Admin\PowerController@editUserRole');


// 显示订单功能
    Route::get('/seeks', 'Admin\OrdersController@show_orders');

// 显示订单详情
    Route::get('/details', 'Admin\OrdersController@orders_detail');

// 订单管理搜索
    Route::post('/seeks', 'Admin\OrdersController@seek');
});

    // 后台登录
Route::get('/admin/login', 'Admin\LoginController@show');
Route::post('/admin/login', 'Admin\LoginController@login');

// 后台搜索功能
Route::get('/search', 'Admin\UserController@search');









/**
 * 前台路由
 */
// 前台首页
Route::group(['prefix' => '/home', 'middleware' => ['users.login']], function(){


// 添加收货地址页面
	Route::get('/addressIndex','Home\UserController@addressIndex');

// 添加收货地址
	Route::post('/addressIndex','Home\UserController@address');

// 修改收货地址页面
	Route::get('/addressEdit','Home\UserController@addressEditIndex');

// 修改收货地址
	Route::post('/addressEdit','Home\UserController@addressEdit');

// 删除收货地址
	Route::get('/ressDel','Home\UserController@delRess');

// 修改默认地址
	Route::get('/editDefault','Home\UserController@editDefault');


    // 前台退出
    Route::get('/logout', 'Home\IndexController@logout');

	// 个人中心
	Route::get('/user/secure', 'Home\UserController@secure');
	Route::get('/user/mycenter', 'Home\UserController@mycenter');

	// 个人资料修改
	Route::post('/user/mycenter', 'Home\UserController@edit');
	// 修改头像
	Route::get('/user/picture', 'Home\UserController@pic');
	Route::post('/user/picture', 'Home\UserController@picture');
	// 修改密码
	Route::get('/user/password', 'Home\UserController@show');
	Route::post('/user/password', 'Home\UserController@password');
	
	Route::get('/shopcar', 'Home\TrolleyController@shopcar');
	Route::post('/shopcar/jian', 'Home\TrolleyController@jian');
	Route::post('/shopcar/jia', 'Home\TrolleyController@jia');
	Route::post('/shopcar/ipt', 'Home\TrolleyController@ipt');
	Route::post('/shopcar/del', 'Home\TrolleyController@del');
	Route::post('/shopcar/alldel', 'Home\TrolleyController@alldel');
	Route::post('/shopcar/btn', 'Home\TrolleyController@btn');

	Route::get('/shopcar/pay', 'Home\TrolleyController@pay');
	Route::post('/shopcar/orders', 'Home\TrolleyController@orders');
	Route::post('/shopcar/delorder', 'Home\TrolleyController@delorders');
	Route::get('/shopcar/pyjy', 'Home\TrolleyController@pyjy');
	Route::post('/pay/pyjy', 'Home\TrolleyController@paypyjy');
	Route::get('/pay/return', 'Home\TrolleyController@returnurl');
	
	Route::get('/collection', 'Home\CollectionController@index');
	
	Route::get('/orders/detail/{id}', 'Home\OrdersController@details');
	Route::post('/order/annulla', 'Home\OrdersController@annullaorder');
	Route::post('/order/merci', 'Home\OrdersController@merciorder');
	Route::get('/order/edit/{id}', 'Home\OrdersController@editorder');
	Route::post('/order/edit/{id}', 'Home\OrdersController@checkeditorder');
	Route::post('/order/commit', 'Home\OrdersController@commit');
	Route::post('/order/seecommit', 'Home\OrdersController@selectcommit');
	
	Route::post('/refund/apply','Home\OrdersController@refundapply');
	Route::post('/refund/cancel','Home\OrdersController@refundcancel');
	Route::get('/refund/list','Home\OrdersController@refundlists');
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


    // 前台首页
    Route::get('/','Home\IndexController@index');
    // 分类页面
    // Route::get('/cate','Home\CateController@cate');


Route::group(['prefix' => '/home'], function(){
	
	Route::get('/', 'Home\IndexController@index');
	
	Route::get('/goods/{id}', 'Home\GoodsController@index');
	Route::post('/goods/specs', 'Home\GoodsController@changespecs');
	Route::post('/goods/collection', 'Home\GoodsController@collection');
	Route::post('/goods/share', 'Home\GoodsController@share');
	Route::post('/clicknum', 'Home\GoodsController@clicknum');
	Route::post('goods/search', 'Home\GoodsController@search');
	Route::post('goods/shop', 'Home\GoodsController@shop');
	
	Route::get('/cate/{id}', 'Home\CateController@cate');
	Route::post('/sorts', 'Home\CateController@sorts');
	Route::post('/cate/search', 'Home\CateController@search');
});



/*----------------------------------------------------------------------------------*/
// 订单：前台我的订单显示
    Route::get('/ShowOrders', 'Home\OrdersController@show_orders')->middleware('users.login');
	
/*-----------------------------------------------------------------------------------*/
// 前台退货页面
//     Route::get('/retreat','Home\OrdersController@retreat_goods');


// // 申请退款
//     Route::get('/tuikuanz','Home\OrdersController@tkks');
 
// // 显示退换货页面
//     Route::get('/ReturnRefunding','Home\OrdersController@return_refunding');

// // 申请退货
//     Route::get('/tuihuo','Home\OrdersController@retreat_money');

// // 键盘按下出现搜索
// 	Route::get('/home/get','Home\IndexController@get');

// // 搜索
// 	Route::get('/home/search','Home\IndexController@search');

