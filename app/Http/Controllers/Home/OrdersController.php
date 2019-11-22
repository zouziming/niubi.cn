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
        // $qt = \App\ShopOrder::where('uid','=',4560)->get();
        // $qt->goods = \App\ShopOrder::find(1)->ShopDetails()->get();
        $qq = \App\ShopOrder::where('uid','1')->get();
        $ss = \App\ShopOrder::where('uid','1')->where('status',1)->get();
        $dd = \App\ShopOrder::where('uid','1')->where('status',2)->get();
        $ff = \App\ShopOrder::where('uid','1')->where('status',3)->get();
        $gg = \App\ShopOrder::where('uid','1')->where('status',4)->get();
        return view('Home.Orders.ShowOrders',[
                'qts'=>$qq,'sss'=>$ss,'dds'=>$dd,'ffs'=>$ff,'ggs'=>$gg
            ]);
    }

    // 显示成功提交订单页面
    public function orders_submit(Request $request)
    {
        $ddzf = \App\ShopOrder::where('id','=',$request->id)->get();
        return view('Home.Orders.OrdersSubmit',[
            'zfs'=>$ddzf
        ]);
    }


    // 支付成功后改变状态否则支付失败
    public function xg(Request $request)
    {
        // 修改支付状态
        $zf = \App\ShopOrder::where('id','=',$request->id)->update(['status'=>$request->status]);
        if ($zf) {
            echo "<script>alert('支付成功~~~');location.href='ShowOrders'</script>";
        } else {
            echo "<script>alert('支付失败~~~');location.href='ShowOrders'</script>";
        }
    }

    // 前台点击确认收货时更改状态为4(已收货)
    public function confirm_receipt(Request $request)
    {
        $qr = \App\ShopOrder::where('id','=',$request->id)->update(['status'=>$request->status=4]);
        if ($qr) {
            echo "<script>alert('收货成功~~~');location.href='ShowOrders'</script>";
        } else {
            echo "<script>alert('收货失败~~~');location.href='ShowOrders'</script>";
        }
    }

    // 前台退货页面
    public function retreat_goods()
    {
        $rg = \App\ShopOrder::where('uid','1')->get();
        return view('Home.Orders.RetreatGoods',[
            'rgs'=>$rg
        ]);
    }

    // 前台退货页面
    public function orders_details()
    {
        $thh = \App\ShopOrder::where('id',1)->get();
        return view('Home.Orders.OrdersDetails',[
            'thhs'=>$thh
        ]);
    }

   // 订单详情的取消订单
   public function cancel_orders(Request $request)
   {
        $qx = \App\ShopOrder::where('id','=',$request->id)->update(['status'=>$request->status]);
        if ($qx) {
            echo "<script>alert('取消订单成功~~~');location.href='ShowOrders'</script>";
        } else {
            echo "<script>alert('取消订单失败~~~');location.href='ShowOrders'</script>";
        }
   }

   // 退款页面
   public function tkks(Request $request)
   {
       $tkp = \App\ShopOrder::where('id','=',$request->id)->update(['status2'=>$request->status2]);
        if ($tkp) {
            echo "<script>alert('申请退款成功~~~');location.href='RetreatGoods'</script>";
        } else {
            echo "<script>alert('申请退款失败~~~');location.href='RetreatGoods'</script>";
        }
   }

   public function return_refunding()
   {
        // $rr = \App\ShopOrder::where('id',1)->get();
        return view('Home.Orders.ReturnRefunding');
   }
}