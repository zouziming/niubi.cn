<?php

namespace App\Http\Controllers\Admin;

use App\ShopSpecsKey;
use App\ShopSpecsValue;
use App\ShopPattern;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PatternController extends Controller
{
    public function lists(Request $request)
	{
		$data = ShopPattern::get();
		// dump($data);
		return view('Admin.pattern.lists')->with('data', $data);
	}
	
	public function add(Request $request)
	{
		return view('Admin.pattern.add');
	}
	
	public function checkadd(Request $request)
	{
		$this->validate($request, [
		    'pattern' => 'required|unique:shop_pattern,name',
		], [
		    'required' => ':attribute 必须填写',
		    'unique' => ':attribute 已经存在',
		], [
		    'pattern' => '模型名称',

		]);

		$patternId = ShopPattern::insertGetId(['name'=>$request->pattern]);
		foreach ($request->specs_key as $k=>$v) {
			$specsid[$k][] = ShopSpecsKey::insertGetId(['patt_id'=>$patternId, 'name'=>$v]);
		}

		foreach ($request->specs_val as $k=>$v) {
			foreach ($v as $vv) {
				ShopSpecsValue::create(['specs_id'=>$specsid[$k][0], 'name'=>$vv]);
			}
		}
		return redirect('/admin/pattern');
	}
	
	public function edit(Request $request)
	{
		$id = $request->id;
		$data['pattern'] = ShopPattern::where('id', $id)->first();
		foreach ($data as $k=>$v) {
			$data[$k]['key'] = ShopSpecsKey::where('patt_id', $v['id'])->get();
			foreach ($data[$k]['key'] as $kk=>$vv) {
				$data[$k]['key'][$kk]['value'] = ShopSpecsValue::where('specs_id', $vv['id'])->get();
			}
		}
		return view('Admin.pattern.edit')->with('data', $data);
	}
	
	public function checkedit(Request $request, $id)
	{
		$this->validate($request, [
			'pattern' => [
			        'required',
			        Rule::unique('shop_pattern', 'name')->ignore($id),
			    ],
		], [
		    'required' => ':attribute 必须填写',
		    'unique' => ':attribute 已经存在',
		], [
		    'pattern' => '模型名称',
		]);
		$specs_id = ShopSpecsKey::where('patt_id', $id)->pluck('id');
		ShopSpecsKey::where('patt_id', $id)->delete();
		// dump($specs_id);
		foreach ($specs_id as $v) {
			ShopSpecsValue::where('specs_id', $v)->delete();
		}
		ShopPattern::where('id', $id)->update(['name'=>$request->pattern]);
		if ($request->specs_key != null) {
			foreach ($request->specs_key as $k=>$v) {
				$specsid[$k][] = ShopSpecsKey::insertGetId(['patt_id'=>$id, 'name'=>$v]);
			}
			
			foreach ($request->specs_val as $k=>$v) {
				foreach ($v as $vv) {
					ShopSpecsValue::create(['specs_id'=>$specsid[$k][0], 'name'=>$vv]);
				}
			}
		}
		
		return redirect('/admin/pattern');
	}
	
	public function del(Request $request, $id)
	{
		ShopPattern::where('id', $id)->delete();
		$specs_id = ShopSpecsKey::where('patt_id', $id)->pluck('id');
		ShopSpecsKey::where('patt_id', $id)->delete();
		foreach ($specs_id as $v) {
			ShopSpecsValue::where('specs_id', $v)->delete();
		}
		return redirect('/admin/pattern');
	}
	
	public function setpattern(Request $request, $id)
	{
		$allmodel = ShopPattern::get();
		$data = '';
		return view('Admin.pattern.set')->with(['allm'=>$allmodel, 'data'=>$data]);
	}
	
	public function checkmodel(Request $request)
	{
		$data = ShopSpecsKey::where('patt_id', $request->id)->get();
		foreach ($data as $k=>$v) {
			$data[$k]['specs'] = ShopSpecsValue::where('specs_id', $v['id'])->get();
		}
		return ['data'=>$data];
	}
	
	public function checkspecskey(Request $request)
	{
		$keyid = ShopSpecsValue::whereIn('id', $request->id)->pluck('specs_id');
		$modelid = ShopSpecsKey::where('id', $keyid)->pluck('patt_id')[0];
		$num = count(ShopSpecsKey::where('patt_id', $modelid)->get());
		foreach ($keyid as $k=>$v) {
			$key[$k] = $v;
		}
		
		if ($num == count(array_unique($key))) {
			$id = $request->id;
			
			foreach ($id as $v) {
				foreach ($id as $j) {
					$a = ShopSpecsValue::where('id', $v)->get()[0];
					$b = ShopSpecsValue::where('id', $j)->get()[0];
					
					if (ShopSpecsKey::where('id', $a['specs_id'])->pluck('patt_id')[0] == ShopSpecsKey::where('id', $b['specs_id'])->pluck('patt_id')[0]) {
						
						if ($a['specs_id'] != $b['specs_id']) {
							$keygroup[] = $a['id'].'_'.$b['id'];
						}
					}
				}
			}
			
			foreach ($keygroup as $v) {
				$arr = explode('_', $v);
				// dd($arr);
				foreach ($arr as $k=>$j) {
					$val[$k] = ShopSpecsValue::where('id', $j)->pluck('name')[0];
				}
				$specsgroup[] = $val;
			}
			
			$count = count($keygroup)/2;
			for ($i = 0; $i < $count; $i++) {
				$group[$i]['key'][] = $keygroup[$i];
				$group[$i][] = $specsgroup[$i];
			}
			// dd($group);
			return ['code'=>0, 'group'=>$group];
		}
	}
}
