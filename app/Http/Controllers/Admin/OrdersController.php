<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\orders;


class OrdersController extends Controller
{
    // 显示订单页面
    public function show_orders()
    {

    // 从数据库获取表的全部的数据
        $query = \App\ShopOrder::whereBetween('status', [1,5])->paginate(5);
        return view('Admin.Orders.show_orders',[
            'datas'=>$query
        ]);
    }


    // 显示订单详情页面
    public function orders_detail(Request $request)
    {

    // 从数据库获取表的全部的数据
        $dd = \App\ShopDetail::where('oid','=',$request->id)->get();
        return view('Admin.Orders.orders_detail',[
            'dds'=>$dd
        ]);
    }


    // 显示修改订单
    public function amend_orders(Request $request)
    {

    // 从数据库获取表的全部的数据
        $xg = \App\ShopOrder::where('id','=',$request->id)->first();
        return view('Admin.Orders.amend_orders',[
            'ddss'=>$xg
        ]);
    }

    // 显示点击提交后的修改订单
    public function orders_detailq(Request $request)
    {
        
        // 修改指定指段
        $xgg = \App\ShopOrder::where('id','=',$request->id)->update([
                  'getman'=>$request->getman,
                  'phone'=>$request->phone,
                  'code'=>$request->code,
                  'address'=>$request->address,
                ]);
        if ($xgg) {
            echo "<script>alert('修改成功');location.href='seeks'</script>";
        } else {
            echo "<script>alert('修改失败');location.href='seeks'</script>";
        }
    }


    // 订单列表搜索功能
    public function seek(Request $request) 
    {
        $kong = [];
        if (!empty($request->status)) {
          $kong[] = ['status','like',$request->status];
        };
        $ss = \App\ShopOrder::where('id','like','%'.$request->id.'%')
        ->where('getman','like','%'.$request->getman.'%')
        ->where('address','like','%'.$request->address.'%')
        ->where($kong)
        ->paginate(5);
        return view('Admin.Orders.show_orders',[
            'datas'=>$ss
        ]);
    }

    //显示订单退款页面
     public function refund()
    {
            // 从数据库获取表的全部的数据
        $tk = \App\ShopOrder::whereBetween('status2', [1,3])->paginate(5);
        return view('Admin.Orders.refund',[
            'datas'=>$tk
        ]);
    }


     // 订单退款搜索功能
      public function refund_seek(Request $request) 
    {
        // $kongg = [];
        // if (!empty($request->status)) {
        //   $kong[] = ['status','like',$request->status];
        // };
        $ssq = \App\ShopOrder::where('id','like','%'.$request->id.'%')
        ->where('getman','like','%'.$request->getman.'%')
        ->where('address','like','%'.$request->address.'%')
        ->where('phone','like','%'.$request->phone.'%')
        ->whereBetween('status2', [1,3])
        // ->where($kongg)
        ->paginate(5);
        return view('Admin.Orders.refund',[
            'datas'=>$ssq
        ]);
    }
  

       //显示订单退换页面
       public function return_exchange(Request $request)
    {
            // 从数据库获取表的全部的数据
        $qwe = \App\ShopDetail::whereBetween('status', [1,3])
        ->whereBetween('status2',[1,5])
        ->paginate(3);
        return view('Admin.Orders.return_exchange',[
            'fakes'=>$qwe
        ]);
    }


      // 订单退换搜索功能
      public function ReturnExchangeSeek(Request $request) 
    {
        // $kongg = [];
        // if (!empty($request->status)) {
        //   $kong[] = ['status','like',$request->status];
        // };
        $ssq = \App\ShopDetail::where('id','like','%'.$request->id.'%')
        ->where('getman','like','%'.$request->getman.'%')
        ->where('address','like','%'.$request->address.'%')
        ->where('phone','like','%'.$request->phone.'%')
        ->whereBetween('status', [1,3])
        ->whereBetween('status2', [1,5])
        // ->where($kongg)
        ->paginate(3);
        return view('Admin.Orders.return_exchange',[
            'fakes'=>$ssq
        ]);
    }


      //显示发货单页面
      public function DeliverGoods(Request $request)
    {
            // 从数据库获取表的全部的数据
        $tks = \App\ShopOrder::where('status','=',2)->paginate(5);
        return view('Admin.Orders.deliver_goods',[
            'datas'=>$tks
        ]);
    }


    // 订单发货列表搜索功能
      public function DeliverGoodsSeek(Request $request) 
    {
        $ssq = \App\ShopOrder::where('id','like','%'.$request->id.'%')
        ->where('getman','like','%'.$request->getman.'%')
        ->where('phone','like','%'.$request->phone.'%')
        ->paginate(3);
        return view('Admin.Orders.deliver_goods',[
            'datas'=>$ssq
        ]);
    }


    //显示发货单页面
     public function orders_shipments(Request $request)
    {
            // 从数据库获取表的全部的数据
        $qqs = \App\ShopDetail::where('oid','=',$request->id)->paginate();
        return view('Admin.Orders.OrdersShipments',[
            'fhd'=>$qqs
        ]);
    }

      // 显示已发货页面
      public function shipped(Request $request)
    {
        // 从数据库获取表的全部的数据
        $aas = \App\ShopDetail::where('oid','=',$request->id)->paginate();
        return view('Admin.Orders.shippeds',[
            'yfh'=>$aas
        ]);
    }

    // 发货成功后修改发货单的状态
    public function edit_status(Request $request)
    {
        // 修改指定指段
        $xggi = \App\ShopOrder::where('id','=',$request->id)->update([
                  'status'=>3
                ]);
        if ($xggi) {
            echo "<script>alert('操作修改成功~~~');location.href='deliverGoods'</script>";
        } else {
            echo "<script>alert('操作修改失败~~~');location.href='seeks'</script>";
        }
    }


    // 显示订单
    public function show_order()
    {
        return view('Admin.Orders.addOrder',[
            'datas'
        ]);
        
    }

    // 添加订单
    public function add_order(Request $request)
    {
        $add = \App\ShopOrder::insertGetId([
            'getman'=>$request->getman,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'total'=>$request->total,
            'uid'=>$request->uid,
            'code'=>$request->code,
            'username'=>$request->username,
            'status'=>$request->status,
            'status2'=>$request->status2,
        ]);

        if ($add) {
            echo "<script>alert('添加订单成功~~~');location.href='seeks'</script>";
        } else {
            echo "<script>alert('添加订单失败~~~');location.href='seeks'</script>";
        }
    }

    // 订单退款详情
    public function refund_particulars(Request $request)
    {
        $ddxqs = \App\ShopDetail::where('oid','=',$request->id)->paginate();
        return view('Admin.Orders.RefundParticulars',[
            'ddxqy'=>$ddxqs
        ]);
    }


        // 同意退款成功后修改退款单的状态
        public function refund_status(Request $request)
    {
        // 修改指定指段
        $refunds = \App\ShopOrder::where('id','=',$request->id)->update([
                  'status2'=>1
                ]);
        if ($refunds) {
            echo "<script>alert('操作退款成功~~~');location.href='refund'</script>";
        } else {
            echo "<script>alert('操作退款失败~~~');location.href='refund'</script>";
        }
    }


    // 拒绝退款成功后修改退款单的状态
    public function refuse_refund(Request $request)
    {
        // 点击拒绝退款时修改status(状态)为3(已拒绝)
        $refuse = \App\ShopOrder::where('id','=',$request->id)->update([
                'status2'=>3
            ]);
        if ($refuse) {
            echo "<script>alert('操作拒绝退款成功~~~');location.href='refund'</script>";
        } else {
            echo "<script>alert('操作拒绝退款失败~~~');location.href='refund'</script>";   
        }

    }

    // 订单退换货详情
    public function retreat_exchange(Request $request)
    {
        $thh = \App\ShopDetail::where('gid','=',$request->id)->first();
        $zxc = ['', '仅退款', '换货', '退货退款'];
        $thh->status = $zxc[$thh->status];
        return view('Admin.Orders.tuihuan',[
            'th'=>$thh
        ]);
    }

    public function TuiHuans(Request $request)
    {
        // 修改指定指段
        $thq = \App\ShopDetail::where('id','=',$request->id)->update([
                  'status2'=>$request->status2
                ]);
        if ($thq) {
            echo "<script>alert('操作成功~~~');location.href='returnExchange'</script>";
        } else {
            echo "<script>alert('操作失败~~~');location.href='returnExchange'</script>";
        }
    }

    public function del(Request $request)
    {
        $dels = \App\ShopDetail::where('id','=',$request->id)->delete();
        if ($dels) {
            echo "<script>alert('删除成功~~~');location.href='returnExchange'</script>";
        } else {
            echo "<script>alert('删除失败~~~');location.href='returnExchange'</script>";
        }
    }

}



