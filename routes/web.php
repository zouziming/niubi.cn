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

//后台操作
// Route::group(['prefix' => '/admin', 'middleware' => ['user.login', 'user.power']], function(){


// 显示订单功能
    Route::get('/seeks', 'Admin\OrdersController@show_orders');

// 显示订单详情
    Route::get('/details', 'Admin\OrdersController@orders_detail');

// 显示修改订单
    Route::get('/amend', 'Admin\OrdersController@amend_orders');

// 显示提交修改订单
    Route::post('/amend', 'Admin\OrdersController@orders_detailq');

// 获取数据库表里的全部数据
    Route::get('/gainAll', 'Admin\OrdersController@gainAll');

// 添加订单功能
    Route::get('/datas', 'Admin\OrdersController@show_data');

// 订单管理搜索
    Route::post('/seeks', 'Admin\OrdersController@seek');

// 退款单
    Route::get('/refund', 'Admin\OrdersController@refund');

// 订单退款搜索功能 
    Route::post('/refund', 'Admin\OrdersController@refund_seek');

// 退换单
    Route::get('/returnExchange', 'Admin\OrdersController@return_exchange');

// 订单退换搜索功能 
    Route::post('/returnExchange', 'Admin\OrdersController@ReturnExchangeSeek');

// 发货单
    Route::get('/deliverGoods', 'Admin\OrdersController@DeliverGoods');

// 订单发货搜索功能 
    Route::post('/deliverGoods', 'Admin\OrdersController@DeliverGoodsSeek');

// 订单确认发货功能
    Route::get('/OrdersShipments', 'Admin\OrdersController@orders_shipments');

// 订单已发货功能
    Route::get('/shippeds', 'Admin\OrdersController@shipped');

// 发货成功后修改发货单的状态
    Route::get('/editStatus', 'Admin\OrdersController@edit_status');

// 显示添加订单
    Route::get('/addOrder', 'Admin\OrdersController@show_order');

// 添加订单
    Route::post('/addOrder', 'Admin\OrdersController@add_order');

// 订单退款详情 
    Route::get('/RefundParticulars', 'Admin\OrdersController@refund_particulars');

// 订单同意退款 
    Route::get('/ConsentRefund', 'Admin\OrdersController@refund_status');

// 订单拒绝退款  
    Route::get('/RefuseRefund','Admin\OrdersController@refuse_refund');

// 订单退换货详情  
    Route::get('/tuihuan','Admin\OrdersController@retreat_exchange');

// 订单退换审核提交
    Route::post('/tuihuan','Admin\OrdersController@TuiHuans');

// 订单退换删除功能
    Route::get('/dels','Admin\OrdersController@del');

/*----------------------------------------------------------------------------------*/
// 订单：前台我的订单显示
    Route::get('/ShowOrders','Home\OrdersController@show_orders');

//  修改支付状态
    Route::get('/xgzt','Home\OrdersController@xg');

// 订单提交成功页面
    Route::get('/OrdersSubmit','Home\OrdersController@orders_submit');

// 确认收货
    Route::get('/ConfirmReceipt','Home\OrdersController@confirm_receipt');
/*-----------------------------------------------------------------------------------*/
// 前台退货页面
    Route::get('/RetreatGoods','Home\OrdersController@retreat_goods');

// 前台订单详情页面
    Route::get('/OrdersDetails','Home\OrdersController@orders_details');

// 前台取消订单
    Route::get('/CancelOrders','Home\OrdersController@cancel_orders');

// 申请退款
    Route::get('/tuikuanz','Home\OrdersController@tkks');
 
// 显示退换货页面
    Route::get('/ReturnRefunding','Home\OrdersController@return_refunding');

// 申请退货
    Route::get('/tuihuo','Home\OrdersController@retreat_money');
