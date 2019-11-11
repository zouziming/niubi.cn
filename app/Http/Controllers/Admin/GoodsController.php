<?php

namespace App\Http\Controllers\Admin;

use App\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    public function index()
	{
		$goods = new \App\Goods;
		$data = $goods->paginate(3);
		// dump($data);
		return view('Admin.goods.index')->with("data",$data);
	}
	
	public function add()
	{
		return view('Admin.goods.add');
	}
	
	public function checkadd(Request $request)
	{
		
		$this->validate($request, [
		    'name' => 'required',
		    'cid' => 'required',
		    'file' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'name' => '商品名称',
		    'cid' => '分类',
		    'file' => '图片',
		]);
		// dump($request->file);
		
		if($request -> hasFile('file')){
			// 使用request 创建文件上传对象
			$profile = $request -> file('file');
			// 获取文件后缀名
			// dump($profile);
			$ext = $profile->getClientOriginalExtension();
			// dump($ext);
			// 处理文件名称
			$temp_name = str_random(20);
			$filename =  $temp_name.'.'.$ext;
			
			// 保存文件
			$res = $profile->move('./storage/goods/', $filename);
	   }	
		
		$data['name'] = $request->name;
		$data['cid'] = $request->cid;
		$data['pic'] = '/storage/goods/'.$filename;
		$data['addtime'] = time();
		$data['descr'] = $request->descr;
		$data['free'] = $request->baoyou;
		if ($request->xinpin == null) {
			$data['new'] = '0';
		} else {
			$data['new'] = $request->xinpin;
		}
		if ($request->jinpin == null) {
			$data['boutique'] = '0';
		} else {
			$data['boutique'] = $request->jinpin;
		}
		if ($request->rexiao == null) {
			$data['hot'] = '0';
		} else {
			$data['hot'] = $request->rexiao;
		}
		
		// dump($data);
		
		$goods = new \App\Goods;
		$result = $goods->create($data);
		
		if ($result) {
			return redirect("admin/goods");
		}
	}
	
	public function edit($id)
	{
		$goods = new \App\Goods;
		// dump($id);
		$data = $goods->find($id);
		// dump($data->name);
		return view('Admin.goods.edit')->with('data', $data);
	}
	
	public function checkedit(Request $request, $id)
	{
		$goods = new \App\Goods;
		
		$olddata = $goods->find($id);
		
		$this->validate($request, [
		    'name' => 'required',
		    'cid' => 'required',
		], [
		    'required' => ':attribute 必须填写',
		], [
		    'name' => '商品名称',
		    'cid' => '分类',
		]);
		
		if($request->hasFile('file')){
			// 使用request 创建文件上传对象
			$profile = $request -> file('file');
			// 获取文件后缀名
			// dump($profile);
			$ext = $profile->getClientOriginalExtension();
			// dump($ext);
			// 处理文件名称
			$temp_name = str_random(20);
			$filename =  $temp_name.'.'.$ext;
			
			// 保存文件
			$res = $profile->move('./storage/goods/', $filename);
			$data['pic'] = '/storage/goods/'.$filename;
			
			unlink('.'.$olddata->pic);
		}
		
		// $sj = $request->all();
		$data['name'] = $request->name;
		$data['cid'] = $request->cid;
		$data['edittime'] = time();
		$data['descr'] = $request->descr;
		$data['free'] = $request->baoyou;
		if ($request->xinpin == null) {
			$data['new'] = '0';
		} else {
			$data['new'] = $request->xinpin;
		}
		if ($request->jinpin == null) {
			$data['boutique'] = '0';
		} else {
			$data['boutique'] = $request->jinpin;
		}
		if ($request->rexiao == null) {
			$data['hot'] = '0';
		} else {
			$data['hot'] = $request->rexiao;
		}
		
		// dump($data);
		$res = $goods->where('id', $id)->update($data);
		if ($res) {
			return redirect("admin/goods");
		}
	}
	
	public function del($id)
	{
		$ids = explode(',', $id);
		// dump($ids);
		$goods = new \App\Goods;
		$res = $goods->destroy($ids);
		if ($res) {
			return redirect("admin/goods");
		}
	}
	
	public function search(Request $request)
	{
		$goods = new \App\Goods;
		$name = $request->all()['name'];
		// dump($name);
		$data = $goods->where('name','like','%'.$name.'%')->paginate(3);
		return view('Admin.goods.index')->with("data",$data);
	}
}
