<?php

namespace App\Http\Controllers\Admin;

use App\Cate;
use App\Goods;
use App\GoodsSpecs;
use App\AttributeKey;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecsController extends Controller
{
    public function index($id)
	{
		
		$cid = Goods::where('id', $id)->pluck('cid');
		$attr = Goods::where('id', $id)->pluck('attribute_list');
		
		$pid = Cate::where('id', $cid)->pluck('pid');
		
		$key = AttributeKey::where('cate_id', $pid)->get();
		
		foreach ($key as $k=>$v) {
			$value[$k] = AttributeValue::where('attr_id', $v['id'])->get();
		}
		
		return view('Admin.specs.index')->with(['key'=>$key, 'value'=>$value, 'id'=>$id, 'attr'=>$attr[0]]);
	}
	
	public function set(Request $request)
	{
		$all = $request->all();
		
		$data = json_encode($all['datas'], JSON_UNESCAPED_UNICODE);
		
		$res = Goods::where('id', $all['id'])->update(['attribute_list' => $data]);
		
		if ($res) {
		    $res = [
				'code' => 0,
		    ];
		} else {
		    $res = [
		        'code' => 1,
		    ];
		}
		return $res;
	}
	
	public function setprice($id)
	{
		
		$attr_list = Goods::where('id', $id)->pluck('attribute_list')[0];
		$attr_list = json_decode($attr_list);
		// dump($attr_list);
		foreach ($attr_list as $v) {
			foreach ($attr_list as $j) {
				$a = AttributeValue::where('attr_value', $v)->get()[0];
				$b = AttributeValue::where('attr_value', $j)->get()[0];
				if ($a['attr_id'] != $b['attr_id']) {
					$keygroup[] = $a['id'].'_'.$b['id'];
				}
			}
		}
		
		foreach ($keygroup as $v) {
			$arr = explode('_', $v);
			foreach ($arr as $k=>$j) {
				$val[$k] = AttributeValue::where('id', $j)->pluck('attr_value')[0];
			}
			$specsgroup[] = implode('_', $val);
		}
		
		$count = count($keygroup)/2;
		for ($i = 0; $i < $count; $i++) {
			$group[$i]['key'] = $keygroup[$i];
			$group[$i]['name'] = $specsgroup[$i];
		}
		
		$data = GoodsSpecs::where('goods_id', $id)->get();
		$pan = $data->isempty();
		dump($data);
		
		return view('Admin.specs.set')->with(['group'=>$group, 'gid'=>$id, 'pan'=>$pan, 'data'=>$data]);
	}
	
	public function addsetprice(Request $request)
	{
		$data = $request->data;

		if ($data[3] == null || $data[4] == null) {
			$res = [
				'code' => 1,
				'msg' => '服务器繁忙,添加失败',
		    ];
			return $res;
		}
		
		if (strpos($data[3], '.')) {
			$price = explode('.', $data[3]);
			$price = $price[0].'.'.substr($price[1], 0, 2);
		} else {
			$price = $data[3];
		}
		
		if (strpos($data[4], '.')) {
			$stock = explode('.', $data[4]);
			$stock = $stock[0];			
		} else {
			$stock = $data[4];
		}
		
		$specs['goods_id'] = $data[0];
		$specs['gkey'] = $data[1];
		$specs['goods_specs'] = $data[2];
		$specs['goods_price'] = $price;
		$specs['goods_stock'] = $stock;
		$res = GoodsSpecs::create($specs);
		if ($res) {
		    $res = [
				'code' => 0,
		    ];
		} else {
		    $res = [
		        'code' => 1,
		    ];
		}
		return $res;
	}
	
	public function editsetprice(Request $request)
	{
		$data = $request->data;
		
		if ($data[1] == null || $data[2] == null) {
			$res = [
				'code' => 1,
				'msg' => '服务器繁忙,添加失败',
		    ];
			return $res;
		}
		
		if (strpos($data[1], '.')) {
			$price = explode('.', $data[1]);
			$price = $price[0].'.'.substr($price[1], 0, 2);
		} else {
			$price = $data[1];
		}
		
		if (strpos($data[2], '.')) {
			$stock = explode('.', $data[2]);
			$stock = $stock[0];			
		} else {
			$stock = $data[2];
		}
		
		$specs['goods_price'] = $price;
		$specs['goods_stock'] = $stock;
		
		$res = GoodsSpecs::where('id', $data[0])->update($specs);
		if ($res) {
		    $res = [
				'code' => 0,
		    ];
		} else {
		    $res = [
		        'code' => 1,
		    ];
		}
		return $res;
	}
}
