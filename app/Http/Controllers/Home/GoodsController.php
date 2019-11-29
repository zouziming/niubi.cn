<?php

namespace App\Http\Controllers\Home;

use App\ShopUserinfo;
use App\ShopCar;
use App\ShopCate;
use App\Goods;
use App\GoodsSpecs;
use App\AttributeKey;
use App\AttributeValue;
use App\Comment;
use App\ShopCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function index($id)
	{
		// dump(session('userInfo'));
		$parentcate = ShopCate::where('pid', 0)->get();
		$goods = Goods::where('id', $id)->get()[0];
		$cate = ShopCate::where('id', $goods['cid'])->get()[0];
		$pcate = ShopCate::where('id', $cate['pid'])->get()[0];
		$specs = GoodsSpecs::where('goods_id', $id)->get();
		// dump($goods);
		foreach ($specs as $v) {
			$price[] = $v['goods_price'];
		}
		$prices[] = max($price);
		$prices[] = min($price);
		$comment = Comment::where('gid', $id)->get();
		foreach ($comment as $k=>$v) {
			$comment[$k]['tou'] = ShopUserinfo::where('id', $v['uid'])->pluck('pic')[0];
		}
		// dump($comment);
		$list = $goods['attribute_list'];
		$attr_list = json_decode($list);
		foreach ($attr_list as $k=>$v) {
			$attr[] = AttributeValue::where('attr_value', $v)->pluck('attr_id')[0];
		}
		$attr = array_unique($attr);
		foreach ($attr as $k=>$v) {
			$allattr[$k]['shu'] = AttributeKey::where('id', $v)->pluck('attr_name')[0];
			foreach ($attr_list as $vv) {
				$aid = AttributeValue::where('attr_value', $vv)->pluck('attr_id')[0];
				if ($aid == $v) {
					$allattr[$k]['val'][] = $vv;
				}
				
			}
		}
		$allcate = ShopCate::where('pid', 0)->get();
		foreach ($allcate as $k=>$v) {
			$allcatedata[$k]['fu'] = $v['name'];
			$allcatedata[$k]['er'] = ShopCate::where('pid', $v['id'])->get();
		}
		
		// if (session('userInfo.id')) {
		// 	$shopcarnum = count(ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 0)->get());
		// 	$collstatus = ShopCollection::where('uid', session('userInfo.id'))->where('gid', $goods['id'])->first();
		// }
		
		// dump(session('userInfo.id'));
		// dump($goods['id']);
		// dump($collstatus);
		return view('Home.goods')->with(['data'=>$goods, 'cate'=>$cate, 'pcate'=>$pcate, 'prices'=>$prices, 'comment'=>$comment, 'specs'=>$specs, 'allattr'=>$allattr, 'allcatedata'=>$allcatedata, 'parcate'=>$parentcate]);
	}
	
	public function changespecs(Request $request)
	{
		$specs = $request->specs;
		$specs = rtrim($specs, '_');
		$data = GoodsSpecs::where('goods_specs', $specs)->where('goods_id', $request->id)->first();
		// dump($data);
		if ($data != null) {
			return [
				'code'=>0,
				'price'=>$data['goods_price'],
				'stock'=>$data['goods_stock'],
			];
		} else {
			return [
				'code'=>1,
				'stock'=>'？？？',
			];
		}
	}
	
	public function collection(Request $request)
	{
		$gid = $request->id;
		// dd($gid);
		$is_coll = ShopCollection::where('uid', session('userInfo.id'))->where('gid', $gid)->first();

		if ($is_coll == null) {
			$collect['uid'] = session('userInfo.id');
			$collect['gid'] = $gid;
			$collect['status'] = 1;
			$collect['addtime'] = date('Y-m-d H:i:s', time());
			$res = ShopCollection::create($collect);
			return ['code'=>0, 'msg'=>'收藏成功'];
		} else {
			if ($is_coll['status'] == 1) {
				$res = ShopCollection::where('id', $is_coll['id'])->update(['status'=>0]);
				return ['code'=>0, 'msg'=>'取消收藏成功'];
			} else {
				$res = ShopCollection::where('id', $is_coll['id'])->update(['status'=>1]);
				return ['code'=>0, 'msg'=>'收藏成功'];
			}
		}
		

		return ['code'=>1, 'msg'=>'收藏失败'];
		
	}
	
	public function share(Request $request)
	{
		return ['code'=>0, 'msg'=>'功能还没开放'];
	}
	
	public function clicknum(Request $request)
	{
		$id = $request->id;
		$res = Goods::where('id',$id)->increment('clicknum');
	}
	
	public function search(Request $request)
	{
		$name = $request->name;
		$data = ShopCate::where('name', 'like', '%'.$name.'%')->first();
		if ($data == null) {
			return ['msg'=>'没有搜到这个东西'];
		} else {
			return ['code'=>0, 'id'=>$data['id']];
		}
	}
	
	public function shop(Request $request)
	{
		$userinfo = session('userInfo');
		$status = $request->status;
		// dd($request->all());
		if ($status == 1) {
			return ['msg'=>'请选好规格,sb'];
		} elseif ($status == 2) {
			return ['msg'=>'我没那么多货，sb'];
		} elseif ($status == 3) {
			return ['msg'=>'不买就滚！'];
		} else {
			if ($userinfo == null) {
				return ['code'=>0, 'msg'=>'请先去登录'];
			} else {
				$specs = rtrim($request->str, '_');
				$price = GoodsSpecs::where('goods_id', $request->data[0]['id'])->where('goods_specs', rtrim($request->str, '_'))->pluck('goods_price')[0];
					// dump($request->all());
					$shuju['gid'] = $request->data[0]['id'];
					$shuju['uid'] = session('userInfo.id');
					$shuju['goods_name'] = $request->data[0]['name'];
					$shuju['goods_price'] = $price;
					$shuju['goods_num'] = $request->num;
					$shuju['goods_specs'] = $specs;
					$shuju['goods_img'] = $request->data[0]['pic'];
					if ($request->button == 1) {
						$shuju['is_buy'] = 1;
						$res = ShopCar::create($shuju);
						if ($res) {
							return ['code'=>1, 'msg'=>'购买成功，请滚去结账'];
						} else {
							return ['msg'=>'购买失败'];
						}
					} else {
						$old = ShopCar::where('gid', $request->data[0]['id'])->where('goods_specs', $specs)->first();
						if ($old != null) {
							$res = ShopCar::where('gid', $request->data[0]['id'])->where('goods_specs', $specs)->increment('goods_num', $request->num);
						} else {
							$shuju['is_buy'] = 0;
							$res = ShopCar::create($shuju);
						}

						if ($res) {
							return ['code'=>2, 'msg'=>'添加购物车成功'];
						} else {
							return ['msg'=>'添加购物车失败'];
						}
					}
				
				
			}
		}
	}
}
