<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Cate;

class CateController extends Controller
{
    //
    // public function index()
    // {	
    //     $cate =new \App\Models\Cate;
    // 	$res=$cate->orderByRaw('concat(path, id) ASC')
    //     ->paginate(5);
    // 	dump($res);       
    // 	return view('/Admin/cate/index',['cate'=>$res]);
    // } 

    // 搜索
    public function index(Request $request)
    {   
        $map=[];
        if (!empty($request->name)) {
            $map[]=['name','like','%'.$request->name.'%'];
        };
        if (empty($request->name)) {
            $map[]=['name','like','%'.$request->name.'%'];
        };
        if (!empty($request->id)) {
            $map[]=['id','like','%'.$request->id.'%'];
        };
        if (empty($request->id)) {
            $map[]=['id','like','%'.$request->id.'%'];
        };
        // dd($map);
        $name='';
        $id='';
        $name=$request->name;
        $id=$request->id;
        $cate =new \App\Models\Cate;
       $data= $cate->where($map)
                   ->orderByRaw('concat(path, id) ASC')
                   ->paginate(5);
                   // dd($data);
         $data->withPath('/admin/cate/index'.'?name='.$name.'&id='.$id);
        // dd($data[0]);
       return view('/Admin/cate/index',['cate'=>$data,'name'=>$name,'id'=>$id]);
    }


    public function add(Request $request)
    {

        $cate =new \App\Models\Cate;

        $res=$cate->where('id','=',$request->id)->first();
        // dump($res);
        // echo $res['id'];
        if ($res) {
            $res->path = $res->path.$res->id.',';
            // dump($res);
        }
    	return view('/Admin/cate/add',['data'=>$res]);
    }

    public function store(Request $request)
    {   
                $this->validate($request, [
            
            'name'=>'required',
        ],[
            'required'=>':attribute 必须要填写',
        ],[
            'name'=>'分类名',
        ]);
        
        $cate =new \App\Models\Cate;
    	$data['name']=$request->name;
    	$data['pid']=$request->pid;
    	$data['path']=$request->path;
    	$res =$cate->insert($data);
    	if ($res) {
            return redirect('/admin/cate/index');
            
        }
    }

    public function addSon()
    {
        // return Cate::getMember();
        $flights =new \App\Models\Cate;
              
      

    }

    public function del(Request $request)
    {
        $cate = new \App\Models\Cate;
        $pid = $cate->where('id', $request->id)->pluck('pid')[0];
        // dd($pid); 
       if ($pid == 0) {
            $res = $cate->where('pid', $request->id)->first();
            // dd($res);
            if ($res == null) {
                $del=$cate ->where('id','=',$request->id)->delete();
                if ($del) {
                      return [
                            'code'=>0,
                            'msg'=>'你真棒',
                            ];
                } else {
                       return ['msg'=>'删除失败'];
                }
            } else {
                return ['msg'=>'请先删除子类'];
            }
       } else {
            $del=$cate ->where('id', $request->id)->delete();
            if ($del) {
                  return [
                        'code'=>0,
                        'msg'=>'你真棒',
                        ];
            } else {
                return ['msg'=>'删除失败'];
            }
       }
        

     
    }

    // 分类编辑页面
    public function edit(Request $request)
    {

        

        // dd($request->server('HTTP_REFERER'));
        $cate = new \App\Models\Cate;
        $data=$cate->where('id','=',$request->id)->first();
        // dump($data);
         return view('/Admin/cate/edit',['edit'=>$data,'page'=>$request->server('HTTP_REFERER')]);
    }

    // 编辑分类
    public function cateEdit(Request $request)
    {       
        $cate = new \App\Models\Cate;     
        $edit = $cate->where('id','=',$request->id)->update(['name'=>$request->name]);        
        if ($edit) {
             // echo "<script>alert('编辑成功');location.href=".$request->page."</script>";
            return redirect($request->page);
        } else {
             // echo "<script>alert('编辑失败');location.href='/admin/cate/index'</script>";
           return back()->withErrors(['编辑失败']);
            // return redirect($request->page);

        }
    }
}
