<?php

namespace App\Http\Controllers\Admin;

use App\AttributeKey;
use App\GoodsSpecs;
use App\ShopCate;
use App\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    public function index(Request $request)
	{
		$res = '1';
		$data = Goods::where('is_recycle', 0)->orderBy('id', 'desc')->paginate(3);
		foreach ($data as $k=>$v) {
			$v['cid'] = ShopCate::where('id', $v['cid'])->pluck('name')[0];
			if (GoodsSpecs::where('goods_id', $v['id'])->first() == null) {
				Goods::where('id', $v['id'])->update(['status'=>0]);
			}
		}
		return view('Admin.goods.index')->with(["data"=>$data, 'res'=>$res]);
	}
	
	public function add()
	{
		// dump(session('data'));
		$catedata = ShopCate::orderByRaw('concat(path, id) ASC')->get();
		// dump($catedata);
		return view('Admin.goods.add')->with('cate', $catedata);
	}
	
	public function checkadd(Request $request)
	{
		$request->session()->flash('data', $request->all());
		
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
				
		$result = Goods::create($data);
		
		if ($result) {
			return redirect("admin/goods");
		}
	}
	
	public function edit(Request $request, $id)
	{	
		// dump($request->server());
		
		$request->session()->flash('url', $request->server('HTTP_REFERER'));
		// dump($page);
		$catedata = ShopCate::get();
		
		$data = Goods::find($id);
		// dump($this->name);
		return view('Admin.goods.edit')->with(['data'=>$data, 'cate'=>$catedata]);
	}
	
	public function checkedit(Request $request, $id)
	{
		$olddata = Goods::find($id);
		
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
		$res = Goods::where('id', $id)->update($data);
		if ($res) {
			return redirect($request->session()->get('url'));
		}
	}
	
	public function gorecycle($id)
	{
		$res = Goods::where('id', $id)->update(['is_recycle' => 1]);
		if ($res) {
			return redirect("admin/goods");
		}
	}
	
	public function backrecycle($id)
	{
		$res = Goods::where('id', $id)->update(['is_recycle' => 0]);
		if ($res) {
			return redirect("admin/goods/recycle");
		}
	}
	
	public function recycle()
	{
		// dump($id);
		$data = Goods::where('is_recycle', 1)->get();
		return view('Admin.goods.recycle')->with('data', $data);
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
		if ($request->name == null) {
			return redirect("admin/goods");
		}
		
		$name = $request->all()['name'];
		$res = Goods::where('name','like','%'.$name.'%')->first();
		$data = Goods::where('name','like','%'.$name.'%')->where('is_recycle', 0)->paginate(1)->appends($request->all());

		return view('Admin.goods.index')->with(["data"=>$data, 'res'=>$res]);
	}
	
	public function changestatus(Request $request)
	{
		$change = $request->all();
		$specs = GoodsSpecs::where('goods_id', $request->id)->first();
		
		if ($specs == null) {
			return ['code'=>1, 'msg'=>'请先把规格设置好'];
		}
		
		// dd($change);
		$res = Goods::where('id', $change['id'])->update(['status'=>$change['status']]);
		if ($res) {
			return [
		        'code' => 0,
		    ];
		} else {
			return [
		        'code' => 1,
				'msg' => '状态修改失败'
		    ];
		}
	}
	
	public function isonline(Request $request)
	{
		if($request->data != '/lib/images/no.gif') {
			return ['code'=>0];
		}
	}
	
	public function checkhasattr(Request $request)
	{
		$id = $request->id;
		$cid = Goods::where('id', $id)->pluck('cid');
		$pid = ShopCate::where('id', $cid)->pluck('pid');
		$key = AttributeKey::where('cate_id', $pid)->first();
		if ($key == null || $request->data != '/lib/images/no.gif') {
			return ['code'=>0, 'msg'=>'请先给分类添加主规格或者先下架'];
		} else {
			return ['code'=>1];
		}
	}
}
