<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShopOrder;

class OrdersController extends Controller
{
    // 订单：前台我的订单显示
    public function  show_orders()
    {
        $qt = \App\ShopOrder::whereBetween('status', [1,5])->first();
        return view('Home.Orders.ShowOrders',[
                'qts'=>$qt
            ]);
    }

    // 订单：前台商品详情显示
    // public function show_details()
    // {
    //     $sd = \App\ShopDetail::where('status',[1,3])->get();
    //     dump($sd);
    // }
}
