<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShopCardetail;
use App\ShopCarorder;
use App\ShopAddres;
use App\ShopCar;
use App\ShopUserinfo;
use App\Comment;


class OrdersController extends Controller
{
    // 显示订单页面
    public function show_orders()
    {
		$data = ShopCarorder::whereBetween('status', [1,6])->paginate(5);
		foreach ($data as $k=>$v) {
			$v['uid'] = ShopUserinfo::where('id', $v['uid'])->pluck('username')[0];
		}
		// dump($data);
		return view('Admin.Orders.show_orders', ['datas' => $data]);
    }

    // 显示订单详情页面
    public function orders_detail(Request $request)
    {
        $detail = ShopCardetail::where('oid', $request->id)->get();
		foreach ($detail as $k=>$v) {
			$detail[$k]['comment'] = Comment::where('did', $v['id'])->get();
		}
		// dump($detail);
        return view('Admin.Orders.orders_detail', ['detail'=>$detail]);
    }
	
	public function fahuo(Request $request)
	{
		// dd($request->all());
		$id = $request->id;
		$res = ShopCarorder::where('id', $id)->update(['status'=>3]);
		if ($res) {
			return ['code'=>0, 'msg'=>'发货成功'];
		} else {
			return ['code'=>1, 'msg'=>'发货失败'];
		}
	}

	public function refundlist(Request $request)
	{
		$data = ShopCarorder::whereIn('refund', [2, 3, 4])->get();
		// dd($data);
		foreach ($data as $k=>$v) {
			$v['uid'] = ShopUserinfo::where('id', $v['uid'])->pluck('username')[0];
		}
		return view('Admin.Orders.refund', ['data'=>$data]);
	}
	
	public function refundrefuse(Request $request)
	{
		$res = ShopCarorder::where('id', $request->id)->update(['refund'=>4]);
		if ($res) {
			return ['code'=>0, 'msg'=>'拒绝那个吊毛成功'];
		} else {
			return ['code'=>1, 'msg'=>'拒绝那个吊毛失败'];
		}
	}
	
	public function refundagree(Request $request, $id)
	{
		$data = ShopCarorder::where('id', $id)->first();
		return view('Admin.Orders.refundagree')->with('data', $data);
	}
	
	public function refundpagepay(Request $request)
	{
		require_once base_path("/storage/pay/pagepay/refund.php");
	}
	
    // 订单列表搜索功能
    public function seek(Request $request) 
    {
        $kong = [];
        if (!empty($request->status)) {
          $kong[] = ['status','like',$request->status];
        };
        $data = ShopCarorder::where('id','like','%'.$request->id.'%')
        ->where('getman','like','%'.$request->getman.'%')
        ->where('address','like','%'.$request->address.'%')
        ->where('status','like','%'.$request->status.'%')
        ->where($kong)
        ->paginate(5)
        ->appends(['id' => $request->id, 'getman'=> $request->getman, 'address' => $request->address ,'status' => $request->status]);
        // $data->withPath('seeks?status='.$request->status);
        return view('Admin.Orders.show_orders', ['datas'=>$data]);
    }
	
}