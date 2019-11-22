<?php

namespace App\Http\Controllers\Home;

use App\ShopDetail;
use App\ShopOrder;
use App\ShopAddres;
use App\ShopCar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrolleyController extends Controller
{
    public function shopcar(Request $request)
	{
		$userinfo = session('userInfo');
		$data = ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 0)->get();
		foreach ($data as $k=>$v) {
			$data[$k]['goods_specs'] = explode('_', $v['goods_specs']);
		}
		// dump($data);
		return view('Home.shopcar')->with('data', $data);
	}
	
	public function jian(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->update(['goods_num'=>$request->num]);
		if ($res) {
			return ['code'=>0, 'msg'=>'ok'];
		}
	}
	
	public function jia(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->update(['goods_num'=>$request->num]);
		if ($res) {
			return ['code'=>0, 'msg'=>'ok'];
		}
	}
	
	public function ipt(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->update(['goods_num'=>$request->num]);
		if ($res) {
			return ['code'=>0, 'msg'=>'ok'];
		}
	}
	
	public function del(Request $request)
	{
		$res = ShopCar::where('id', $request->id)->delete();
		if ($res) {
			return ['code'=>0, 'msg'=>'删除成功'];
		} else {
			return ['code'=>1, 'msg'=>'删除失败'];
		}
	}
	
	public function alldel(Request $request)
	{
		$res = ShopCar::where('uid', $request->id)->delete();
		if ($res) {
			return ['code'=>0, 'msg'=>'清空购物车成功'];
		} else {
			return ['code'=>1, 'msg'=>'清空购物车失败'];
		}
	}
	
	public function btn(Request $request)
	{
		$res = ShopCar::where('uid', $request->uid)->first();
		// dump($res);
		if ($res == null) {
			return ['code'=>1, 'msg'=>'什么东西都没有，提交个鬼'];
		}
		if ($request->id == null) {
			return ['code'=>2, 'msg'=>'你TM倒是选啊'];
		} else {
			foreach ($request->id as $v) {
				ShopCar::where('id', $v)->update(['is_buy'=>1]);
			}
			return ['code'=>0];
		}
	}
	
	public function pay(Request $request)
	{
		$address = ShopAddres::where('uid', session('userInfo.id'))->get();
		$data = ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 1)->get();
		foreach ($data as $k=>$v) {
			$data[$k]['goods_specs'] = explode('_', $v['goods_specs']);
		}
		// dump($data);
		return view('Home.shopcarpay')->with(['data'=>$data, 'address'=>$address]);
	}
	
	public function orders(Request $request)
	{
		$address = ShopAddres::where('id', $request->address)->get();

		$addr['getman'] = $address[0]['consignee'];
		$addr['phone'] = $address[0]['phone'];
		$addr['address'] = $address[0]['add_id'].' '.$address[0]['address'];
		$addr['total'] = $request->total;
		$addr['uid'] = session('userInfo.id');
		$addr['addtime'] = date('Y-m-d H:i:s', time());
		$addr['code'] = '000000';
		$addr['status'] = 1;
		$oid = ShopOrder::insertGetId($addr);
		// dd($oid);
		foreach ($request->detail as $v) {
			$car = ShopCar::where('id', $v)->get();
			$details['oid'] = $oid;
			$details['gid'] = $car[0]['gid'];
			$details['gname'] = $car[0]['goods_name'];
			$details['num'] = $car[0]['goods_num'];
			$details['pic'] = $car[0]['goods_img'];
			$details['price'] = $car[0]['goods_price'];
			$details['specs'] = $car[0]['goods_specs'];
			// dump($details);
			$res = ShopDetail::create($details);
		}
		
		if ($res) {
			ShopCar::whereIn('id', $request->detail)->delete();
			return ['code'=>0, 'msg'=>'提交订单成功', 'oid'=>$oid];
		} else {
			return ['msg'=>'提交订单失败'];
		}
	}
	
	public function pyjy(Request $request)
	{
		$data = ShopOrder::where('id', $request->id)->get();

		return view('Home.pay')->with('data', $data);
	}
}
