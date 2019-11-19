<?php

namespace App\Http\Controllers\Home;

use App\ShopLunbo;
use App\ShopCate;
use App\Goods;
use App\GoodsSpecs;
use App\AttributeKey;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
	{
		$cate = ShopCate::where('pid', 0)->get();
		foreach ($cate as $k=>$v) {
			$data[$k]['fu'] = $v['name'];
			$data[$k]['er'] = ShopCate::where('pid', $v['id'])->pluck('name');
			$id = ShopCate::where('pid', $v['id'])->pluck('id');
			$data[$k]['goods'] = Goods::whereIn('cid', $id)->where('is_recycle', 0)->where('status', 1)->limit(8)->get();
			foreach ($data[$k]['goods'] as $kk=>$vv) {
				$data[$k]['goods'][$kk]['price'] = GoodsSpecs::where('goods_id', $vv['id'])->pluck('goods_price')[0];
			}
			
		} 
		$tui = Goods::where('boutique', 1)->where('is_recycle', 0)->where('status', 1)->limit(5)->orderBy('addtime', 'desc')->get();
		foreach ($tui as $k=>$v) {
			$tui[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
		}
		// dump($tui);
		$hot = Goods::where('hot', 1)->where('is_recycle', 0)->where('status', 1)->limit(5)->get(); 
		foreach ($hot as $k=>$v) {
			$hot[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
		}

		$lunbo = ShopLunbo::limit(5)->orderBy('id', 'desc')->get();
		dump($lunbo);
		
		return view('Home.index')->with(['data'=>$data, 'tui'=>$tui, 'hot'=>$hot, 'lunbo'=>$lunbo]);
	}
}
