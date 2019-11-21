<?php

namespace App\Http\Controllers\Home;

use App\ShopCar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrolleyController extends Controller
{
    public function shopcar(Request $request)
	{
		$userinfo = session('userInfo');
		$data = ShopCar::where('uid', session('userInfo.id'))->get();
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
}
