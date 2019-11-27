@extends('/Admin/layout/main')

@section('title','分类')


@section('body')


   <form class="form-search" action="/admin/cate/index" placeholder="" method="get">
     {{ csrf_field() }}
            搜索分类：
  <div class="form-group">
  <input type="text" name="name" value="{{$name}}" class="input-medium search-query" placeholder="按分类名搜索">
  <input type="text" name="id" value="{{$id}}" class="input-medium search-query" placeholder="按id搜索">
<button type="submit" class="btn">搜索</button>　<button id="bon" class="btn">清空</button>
  </div> 
    </form>




      <div class="route_bg">
        <a href="/admin">返回主页</a>
        >
        <span>分类列表</span>
    </div>
    <div class="col-md-10" style="margin-top:5px;">
        <div class="content">
            <table  class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>分类名</th>
                    <th>父ID</th>
                    <th>path路径</th>
                    <th>操作</th>
                </tr>
               @if($cate[0]==null)
               <tr>
                 <td colspan="5">没有结果</td>
               </tr>
                @else
                @foreach($cate as $v)  
                @php
                   $num = substr_count($v->path, ',');
                        $str = str_repeat('--', ($num-1)*2);

                @endphp           
                    <tr style="font-size: 10px">
                       <td>{{$v->id}}</td>
                       <td>{{$str}}{{$v->name}}</td>
                       <td>{{$v->pid}}</td>
                       <td>{{$v->path}}</td>
                       <td><a href="/admin/cate/add?id={{$v->id}}">添加子类</a>|<a class="del" data-id="{{$v->id}}" href="javascript:void(0)">删除</a>|
                        <a href="/admin/cate/edit?id={{$v->id}}">编辑</a>
                        </td>
                        
                    </tr>
               @endforeach
              
               
               @endif
            </table>
            {{ $cate->links() }}
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
  
$('.del').click(function(){
  var r=confirm('确定删除吗');
  if (r==true) {

  let _t = this;
  var id = $(this).data('id')
  $.ajax({
    method:'get',
    url:'/admin/cate/del',
    data:{
      _token:'{{csrf_token()}}',
      id : id,
    },
    success:function(res) {
      // console.dir(res);
      if (res.code == 0) {
          // alert(res.msg);
          $(_t).parent().parent().remove()
        } else {
           alert(res.msg);
        }
    },
  })
  }
})

var ipt=$('.input-medium ');
$('#bon').click(function(){
 for (var i = 0; i < ipt.length;i++) {
    ipt[i].value
    ='';
 }
 return false;
})
</script>

@endsection