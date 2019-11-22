<?php

namespace App\Http\Controllers\Home;

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
		foreach ($specs as $v) {
			$price[] = $v['goods_price'];
		}
		$prices[] = max($price);
		$prices[] = min($price);
		$comment = Comment::where('gid', $id)->get();
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
		
		// dump($pcate);
		// dd($allcatedata);
		
		return view('Home.goods')->with(['data'=>$goods, 'cate'=>$cate, 'pcate'=>$pcate, 'prices'=>$prices, 'comment'=>$comment, 'specs'=>$specs, 'allattr'=>$allattr, 'allcatedata'=>$allcatedata, 'parcate'=>$parentcate]);
	}
	
	public function changespecs(Request $request)
	{
		$specs = $request->specs;
		$specs = rtrim($specs, '_');
		$data = GoodsSpecs::where('goods_specs', $specs)->first();
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
		// $id = $request->id;
		// $res = ShopCollection::where('')
		return ['code'=>0, 'msg'=>'功能还没开放'];
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
				$price = substr($request->price, 3);
				$specs = rtrim($request->str, '_');
				// dump($request->all());
				$shuju['gid'] = $request->data[0]['id'];
				$shuju['uid'] = session('userInfo.id');
				$shuju['goods_name'] = $request->data[0]['name'];
				$shuju['goods_price'] = $price;
				$shuju['goods_num'] = $request->num;
				$shuju['goods_specs'] = $specs;
				$shuju['goods_img'] = $request->data[0]['pic'];

				$res = ShopCar::create($shuju);
				if ($res) {
					return ['code'=>1, 'msg'=>'添加购物车成功'];
				} else {
					return ['msg'=>'添加购物车失败'];
				}
			}
		}
	}
}
