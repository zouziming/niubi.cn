<?php

namespace App\Http\Controllers\Admin;

use App\Cate;
use App\AttributeKey;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttrController extends Controller
{
    public function attr()
    {
		$cateid = AttributeKey::groupBy('cate_id')->pluck('cate_id');
		$data = Cate::where('pid', '0')->whereIn('id', $cateid)->get();
		
		$result = [];
		foreach ($data as $k=>$v) {
			$result[$k][] = $v->posts;
			$result[$k][] = $v;
		}
    	return view('Admin.attr.show')->with('result', $result);
    }
    
    public function add()
    {
		$cateid = AttributeKey::groupBy('cate_id')->pluck('cate_id');
		// dump($cateid);
		$catedata = Cate::where('pid', '0')->whereNotIn('id', $cateid)->get();
		// dump($catedata[0]->id);
    	return view('Admin.attr.add')->with('catedata', $catedata);
    }
	
	public function checkadd(Request $request)
	{
		$this->validate($request, [
		    'name' => 'required',
		    'cate_id' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'name' => '规格名称',
		    'cate_id' => '分类',
		]);
		
		// dump($request->all());
		foreach ($request->all()['name'] as $v) {
			$data['attr_name'] = $v;
			$data['cate_id'] = $request->all()['cate_id'];
			$res = AttributeKey::create($data);
			// dump($data);
		}
		
		if ($res) {
			return redirect("admin/goods/attr");
		}
	}
    
    public function edit(Request $request, $id)
    {
		
		$data = AttributeKey::where('cate_id', $id)->get();
		$cate = Cate::where('id', $data[0]['cate_id'])->get();
		// dump($cate);

		// dump($data);
		return view('Admin.attr.edit')->with(['data'=>$data, 'cate'=>$cate]);
    }
	
	public function checkedit(Request $request)
	{
		$this->validate($request, [
		    'name' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'name' => '规格名称',
		]);
		
		$data = $request->all();
		
		// dump($data);
		$attr = AttributeKey::find($data['id']);
		$attr->attr_name = $data['name'];
		$res = $attr->save();
		
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
	
	public function del($id)
	{
		$data = AttributeKey::where('cate_id', $id)->delete();
		if ($data) {
			return redirect("admin/goods/attr");
		}
	}
	
	public function addson($id)
	{
		$cate = Cate::where('id', $id)->get();
		$attr = AttributeKey::where('cate_id', $id)->get();
		// dump($attr);
		return view('Admin.attr.son')->with(['cate'=>$cate[0], 'attr'=>$attr]);
	}
	
	public function checkaddson(Request $request)
	{
		$this->validate($request, [
		    'value' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'value' => '规格名称',
		]);
		
		$data = $request->all();
		
		// dump($data);
		$val = new AttributeValue;
		$val->attr_value = $data['value'];
		$val->attr_id = $data['id'];
		$res = $val->save();
		
		
		$res = [
			'code' => 0,
		];
		return $res;
	}
	
	public function allattr()
	{
		$cateid = AttributeKey::groupBy('cate_id')->pluck('cate_id');
		$keydata = Cate::where('pid', '0')->whereIn('id', $cateid)->get();
		// $value = 
		$result = [];
		foreach ($keydata as $k=>$v) {
			$result[$k]['key'] = $v->posts;
			$result[$k]['cate'] = $v;
		}
		
		foreach($result as $k=>$v) {
			foreach($v['key'] as $kk=>$vv) {
				// dump($vv);
				$result[$k]['key'][$kk]['value'] = $vv->attr;
			}
		}
		
		// dump($result);
		return view('Admin.attr.showson')->with('result', $result);
	}
	
	public function editson($id)
	{
		$key = AttributeKey::where('cate_id', $id)->get();
		
		foreach ($key as $k=>$v) {
			$key[$k]['value'] = $v->attr;
		}
		
		// dump($key);
		return view('Admin.attr.editson')->with(['key'=>$key]);
	}
	
	public function checkeditson(Request $request)
	{
		$this->validate($request, [
		    'datas' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'datas' => '规格',
		]);
		$data = $request->datas;

		foreach ($data as $k=>$v) {
			if ($v != null) {
				AttributeValue::where('id', $k)->update(['attr_value' => $v]);
			}
		}

		$res = [
			'code' => 0,
		];
		return $res;
	}
	
	public function delson($id)
	{
		$keyid = AttributeKey::where('cate_id', $id)->pluck('id');
		$data = AttributeValue::whereIn('attr_id', $keyid)->delete();
		if ($data) {
			return redirect("admin/allattr");
		}
	}
}
