<?php

namespace App\Http\Controllers\Home;

use App\ShopLink;
use App\ShopCar;
use App\ShopLunbo;
use App\ShopCate;
use App\Goods;
use App\GoodsSpecs;
use App\AttributeKey;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;

class IndexController extends Controller
{
    // 退出登录
    public function logout()
    {

        session()->forget('qtLogin');
        session()->forget('userInfo');
        return redirect('/home');

    }
	
	public function index(Request $request)
	{
		// dump(session('userInfo'));
		
		$link = ShopLink::limit(4)->orderBy('id', 'desc')->get();
		$shopnum = 0;
		if (session('userInfo.id')) {
			$shopcar = ShopCar::where('uid', session('userInfo.id'))->where('is_buy', 0)->get();
			foreach ($shopcar as $v) {
				
				$shopnum += $v['goods_num'];
			}
		}
		// dd($shopnum);
		// dump(session('userInfo'));
		$cate = ShopCate::where('pid', 0)->get();

		foreach ($cate as $k=>$v) {
			$data[$k]['fu'] = $v;
			$data[$k]['er'] = ShopCate::where('pid', $v['id'])->get();
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

		$hot = Goods::where('hot', 1)->where('is_recycle', 0)->where('status', 1)->limit(5)->get(); 
		foreach ($hot as $k=>$v) {
			$hot[$k]['price'] = GoodsSpecs::where('goods_id', $v['id'])->pluck('goods_price')[0];
		}
	   
        $obj=Cate::where('pid','=',0)->get();
        foreach ($obj as $key => $value) {
            $son = Cate::where('pid','=',$value->id)->get();
            $obj[$key]['son'] =$son;
            // dump($son);
        }

		$lunbo = ShopLunbo::limit(5)->orderBy('id', 'desc')->get();
		
		return view('Home.index')->with(['data'=>$data, 'tui'=>$tui, 'hot'=>$hot, 'lunbo'=>$lunbo, 'shopnum'=>$shopnum, 'link'=>$link]);
	}

	// 键盘按下搜索
	public function get(Request $request)
	{	
		if (!empty($request->name)) {
			$str[]=['name','like','%'.$request->name.'%'];
		}
		$res=ShopCate::where($str)
					->take(8)
					->get();
		return $res;

	}

	// 搜索
	public function search(Request $request) 
	{
		if (!empty($request->name)) {
			$str[]=['name','like','%'.$request->name.'%'];
		}
		$res=ShopCate::where($str)
				->first();
			return $res;
	}
}

