@extends('Admin.layout.main')

@section('title','编辑角色')

@section('body')
<div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>修改角色</em></span>
  </div>
<form action="/admin/power/role/edit" method="post">
  {{csrf_field()}}
  <input type="hidden" name="role_id" value="{{$data->id}}">
  <table class="noborder">
   <tr>
    <td width="15%" style="text-align:right;">角色：</td>
    <input type="hidden" name="id" value="{{$data->id}}">
    <td><input type="text" value="{{$data->name}}" name="name" class="textBox length-middle"/></td>
   </tr>

  </table>
  <br><button style="margin-left: 172px" class="btn btn-success">提交</button>
  <h2>设置权限：</h2><button id="quanxuan" class="btn btn-success">全选</button>　<button id="quanquxiao" class="btn btn-success">全取消</button>　
  @foreach($qx as $v) 

  <label><input style="width:15px" type="checkbox" name="permission_id[]"  value="{{$v->id}}" 
    @if(in_array($v->id, $arr))
        checked 
    @endif
    >
    {{$v->name}}　
    </label>
  @endforeach
</form>
 </div>
@endsection

@section('script')
  <script type="text/javascript">
      var ipt = $('input[type="checkbox"]')
    $('#quanxuan').click(function(){
      for (var i = 0; i < ipt.length; i++) {
        ipt[i].checked=true;
      }
      return false;
    })


    $('#quanquxiao').click(function(){
      for (var i = 0; i < ipt.length; i++) {
        ipt[i].checked=false;
      }
      return false;
    })
  </script>
@endsection