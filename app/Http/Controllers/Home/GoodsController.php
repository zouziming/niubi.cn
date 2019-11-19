<?php

namespace App\Http\Controllers\Home;

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
			$allcatedata[$k]['er'] = ShopCate::where('pid', $v['id'])->pluck('name');
		} 
		// dd($comment);
		// dd($allcatedata);
		// dump($attr);
		return view('Home.goods')->with(['data'=>$goods, 'cate'=>$cate, 'pcate'=>$pcate, 'prices'=>$prices, 'comment'=>$comment, 'specs'=>$specs, 'allattr'=>$allattr, 'allcatedata'=>$allcatedata]);
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
}
