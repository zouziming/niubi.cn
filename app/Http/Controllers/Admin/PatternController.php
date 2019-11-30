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
				// dd($vv);
				$data[$k]['key'][$kk]['value'] = ShopSpecsValue::where('specs_id', $vv['id'])->get();
			}
		}
		// dd($data);
		return view('Admin.pattern.edit')->with('data', $data);
	}
	
	public function checkedit(Request $request, $id)
	{
		$this->validate($request, [
			'pattern' => [
			        'required',
			        Rule::unique('shop_pattern', 'name')->ignore($id),
			    ],
		    // 'pattern' => 'required|unique:shop_pattern,name',
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
		// dd($request->specs_key);
		if ($request->specs_key != null) {
			foreach ($request->specs_key as $k=>$v) {
				$specsid[$k][] = ShopSpecsKey::insertGetId(['patt_id'=>$id, 'name'=>$v]);
			}
			
			// dd($request->specs_val);
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
		// dump($specs_id);
		foreach ($specs_id as $v) {
			ShopSpecsValue::where('specs_id', $v)->delete();
		}
		return redirect('/admin/pattern');
	}
	
	
}
