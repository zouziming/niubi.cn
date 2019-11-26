<?php

namespace App\Http\Controllers\Home;

use App\ShopCar;
use App\Goods;
use App\GoodsSpecs;
use App\AttributeKey;
use App\AttributeValue;
use App\ShopCate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function cate(Request $request)

	{	
		$cate = ShopCate::where('pid', 0)->get();
		
		$top = Goods::where('boutique', 1)->where('is_recycle', 0)->where('status', 1)->limit(2)->get();
		foreach ($top as $k=>$v) {
			$top[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
		}
		
		$id = $request->id;
		$pid = ShopCate::where('id', $id)->pluck('pid')[0];
		if ($pid == 0) {
			$sonid = ShopCate::where('pid', $id)->pluck('id');
			$goods = Goods::whereIn('cid', $sonid)->where('is_recycle', 0)->where('status', 1)->limit(8)->get();
			foreach ($goods as $k=>$v) {
				$goods[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
			}
			$catename[] = ShopCate::where('id', $id)->get()[0];
			$pin = ShopCate::where('pid', $id)->get();
		} else {
			$goods = Goods::where('cid', $id)->where('is_recycle', 0)->where('status', 1)->limit(8)->get();
			foreach ($goods as $k=>$v) {
				$goods[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
			}
			$catename[] = ShopCate::where('id', $pid)->get()[0];
			$catename[] = ShopCate::where('id', $id)->get()[0];
			$pin = ShopCate::where('id', $id)->get();
		}
		
		$shopcarnum = count(ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 0)->get());
		// dump($cate);
		return view('Home.cate',['cate'=>$cate, 'top'=>$top, 'goods'=>$goods, 'cid'=>$id, 'catename'=>$catename, 'pin'=>$pin, 'shopnum'=>$shopcarnum]);
	}
	
	public function sorts(Request $request)
	{
		$id = $request->id;
		$arr = explode('_', $id);
		// dd($arr);
		$pid = ShopCate::where('id', $arr[1])->pluck('pid')[0];
		if ($pid != 0) {
			if ($arr[0] == 1) {
				$data = Goods::where('cid', $arr[1])->where('is_recycle', 0)->where('status', 1)->orderBy('buynum', 'desc')->get();
				foreach ($data as $k=>$v) {
					$data[$k]['goods_price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
					$data[$k]['name'] = substr($v['name'], 0, 25);
				}
				return ['data'=>$data];
			}
			if ($arr[0] == 2) {
				$res = [];
				$cid = $arr[1];
				$data = DB::select("SELECT shop_goods.*, shop_goods_specs.id as sid,shop_goods_specs.goods_price FROM `shop_goods` shop_goods left join shop_goods_specs on shop_goods.id=shop_goods_specs.goods_id where shop_goods.is_recycle = 0 and shop_goods.status = 1 and shop_goods.cid = {$cid} group by shop_goods.id order by shop_goods_specs.goods_price desc");
				foreach ($data as $k=>$v) {
					$data[$k]->name = substr($v->name, 0, 25);
				}
				// dump($data);
				return ['data'=>$data];
			}
			if ($arr[0] == 3) {
				$res = [];
				$cid = $arr[1];
				$data = DB::select("SELECT shop_goods.*, shop_goods_specs.id as sid,shop_goods_specs.goods_price FROM `shop_goods` shop_goods left join shop_goods_specs on shop_goods.id=shop_goods_specs.goods_id where shop_goods.is_recycle = 0 and shop_goods.status = 1 and shop_goods.cid = {$cid} group by shop_goods.id order by shop_goods_specs.goods_price asc");
				foreach ($data as $k=>$v) {
					$data[$k]->name = substr($v->name, 0, 25);
				}
				return ['data'=>$data];
			}
			if ($arr[0] == 4) {
				$data = Goods::where('cid', $arr[1])->where('is_recycle', 0)->where('status', 1)->orderBy('addtime', 'desc')->get();
				foreach ($data as $k=>$v) {
					$data[$k]['goods_price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
					$data[$k]['name'] = substr($v['name'], 0, 25);
				}
				return ['data'=>$data];
			}
		} else {
			$sonid = ShopCate::where('pid', $arr[1])->pluck('id');
			$sid = implode(',', $sonid->toArray());
			if ($arr[0] == 1) {
			$data = Goods::whereIn('cid', $sonid)->where('is_recycle', 0)->where('status', 1)->orderBy('buynum', 'desc')->get();
			foreach ($data as $k=>$v) {
				$data[$k]['goods_price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
				$data[$k]['name'] = substr($v['name'], 0, 25);
			}
				return ['data'=>$data];
			}
			if ($arr[0] == 2) {
				$res = [];
				$cid = $arr[1];
				$data = DB::select("SELECT shop_goods.*, shop_goods_specs.id as sid,shop_goods_specs.goods_price FROM `shop_goods` shop_goods left join shop_goods_specs on shop_goods.id=shop_goods_specs.goods_id where shop_goods.is_recycle = 0 and shop_goods.status = 1 and shop_goods.cid in ({$sid}) group by shop_goods.id order by shop_goods_specs.goods_price desc");
				foreach ($data as $k=>$v) {
					$data[$k]->name = substr($v->name, 0, 25);
				}
				return ['data'=>$data];
			}
			if ($arr[0] == 3) {
				$res = [];
				$cid = $arr[1];
				$data = DB::select("SELECT shop_goods.*, shop_goods_specs.id as sid,shop_goods_specs.goods_price FROM `shop_goods` shop_goods left join shop_goods_specs on shop_goods.id=shop_goods_specs.goods_id where shop_goods.is_recycle = 0 and shop_goods.status = 1 and shop_goods.cid in ({$sid}) group by shop_goods.id order by shop_goods_specs.goods_price asc");
				foreach ($data as $k=>$v) {
					$data[$k]->name = substr($v->name, 0, 25);
				}
				return ['data'=>$data];
			}
			if ($arr[0] == 4) {
				$data = Goods::whereIn('cid', $sonid)->where('is_recycle', 0)->where('status', 1)->orderBy('addtime', 'desc')->get();
				foreach ($data as $k=>$v) {
					$data[$k]['goods_price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
					$data[$k]['name'] = substr($v['name'], 0, 25);
				}
				return ['data'=>$data];
			}
			
		}
	}
	
	public function search(Request $request)
	{
		$name = $request->data;
		$cid = $request->cid;
		$pid = ShopCate::where('id', $cid)->pluck('pid')[0];
		if ($pid == 0) {
			$sonid = ShopCate::where('pid', $cid)->pluck('id');
			$goods = Goods::whereIn('cid', $sonid)->where('name', 'like', '%'.$name.'%')->where('is_recycle', 0)->where('status', 1)->get();
		} else {
			$goods = Goods::where('cid', $cid)->where('name', 'like', '%'.$name.'%')->where('is_recycle', 0)->where('status', 1)->get();
		}
		foreach ($goods as $k=>$v) {
			$goods[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
		}	

		return ['data'=>$goods];
	}
}
