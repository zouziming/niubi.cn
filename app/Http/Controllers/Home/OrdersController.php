<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShopCardetail;
use App\ShopCarorder;
use App\ShopAddres;
use App\ShopCar;
use App\Comment;

class OrdersController extends Controller
{
    // 订单：前台我的订单显示
    public function  show_orders(Request $request)
    {
		$uid = session('userInfo.id');
		// dd($uid);

        $data = ShopCarorder::where('uid', $uid)->whereNotIn('status', [5])->get();
        $weizhifu = ShopCarorder::where('uid', $uid)->where('status', 1)->get();
        $daifahuo = ShopCarorder::where('uid', $uid)->where('status', 2)->get();
        $daishouhuo = ShopCarorder::where('uid', $uid)->where('status', 3)->get();
        $daipingjia = ShopCarorder::where('uid', $uid)->whereIn('status', [4, 6])->get();

        return view('Home.Orders.ShowOrders',['data'=>$data, 'data1'=>$weizhifu, 'data2'=>$daifahuo,'data3'=>$daishouhuo,'data4'=>$daipingjia]);
    }
	
	public function details(Request $request, $id)
	{
		// dump($id);
		$detail = ShopCardetail::where('oid', $id)->get();
		$order = ShopCarorder::where('id', $id)->get();
		foreach ($detail as $v) {
			$arr = explode('_', $v['specs']);
			$v['specs'] = implode(' ', $arr);
		}
		// dump($detail);
		
		return view('Home.Orders.OrdersDetails')->with(['detail'=>$detail, 'order'=>$order]);
	}

	public function annullaorder(Request $request)
	{
		$res = ShopCarorder::where('id', $request->id)->update(['status'=>5]);
		if ($res) {
			return ['code'=>0, 'msg'=>'取消订单成功'];
		} else {
			return ['code'=>1, 'msg'=>'取消订单失败'];
		}
	}
	
	public function merciorder(Request $request)
	{
		// dd($request->all());
		$res = ShopCarorder::where('id', $request->id)->update(['status'=>4]);
		if ($res && $request->pan == 1) {
			return ['code'=>0, 'msg'=>'确认收货成功'];
		} elseif ($res && $request->pan == 2) {
			return ['code'=>1, 'msg'=>'确认收货成功'];
		} else {
			return ['msg'=>'确认收货失败'];
		}
		
	}
	
	public function editorder($id)
	{
		$data = ShopCarorder::where('id', $id)->first();
		// dump($data);
		return view('Home.Orders.EditOrder')->with('data', $data);
	}
	
	public function checkeditorder(Request $request, $id)
	{
		$this->validate($request, [
		    'getman' => 'required',
		    'phone' => ['regex:/^1[3456789]\d{9}$/', 'required', 'numeric'],
		    'code' => ['regex:/\d{6}/', 'required', 'numeric'],
		], [
		    'required' => ':attribute 必须填写',
			'numeric'   => ':attribute 必须为数字',
		], [
		    'getman' => '收件人',
		    'phone' => '手机',
		    'code' => '邮编',
		]);
		$data = $request->all();
		
		unset($data['_token']);
		// dump($data);
		$res = ShopCarorder::where('id', $id)->update($data);
		
		return redirect('/ShowOrders');
		
	}
	
    public function commit(Request $request)
	{
		
		return view('Home.Orders.commit');
	}
}

