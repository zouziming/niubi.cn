@extends('Admin.layout.main')

@section('title','权限表')

@section('body')
	<div class="route_bg">

        <a href="/admin">返回主页</a>
        >
        <span>角色列表</span>

    </div>
    <div class="col-md-10" style="margin-top:5px;">
        {{ session('status') }}
        <div class="content">
            <table  class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>角色名</th>
                    <th>操作</th>
                </tr>
              	@foreach($data as $v)
                <tr  style="font-size:10px">
                	<td>{{$v->id}}</td>
                	<td>{{$v->name}}</td>
                	<td><a class="del" data-id="{{ $v->id }}" href="javascript:void(0)">删除</a>|<a href="/admin/power/role/edit?id={{$v->id}}">编辑</a></td>
                </tr>
               	@endforeach
              
            </table>
           
        </div>
         <button type="button" class="btn btn-default"><a href="/admin/power/role/add">添加角色</a></button>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.del').click(function(){
            var r=confirm("点击删除");
            var _t=this;
            var id=$(this).data('id');
            if (r==true) {
                
                $.ajax({
                    type:'get',
                    url:'/admin/power/role/del',
                    data:{
                        id:id,
                    },
                    success:function(res)
                    {
                        if (res.code==0) {
                            // alert(res.msg);
                            $(_t).parent().parent().remove()
                        } else {
                            alert(res.msg);
                        }
                    }
                })
            }
        })
    </script>
@endsection
