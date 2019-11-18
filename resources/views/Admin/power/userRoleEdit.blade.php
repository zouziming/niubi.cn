@extends('Admin.layout.main')

@section('title','编辑角色')

@section('body')
<div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>修改用户角色</em></span>
  </div><br>
  <h1>修改id为《{{$uid}}》的用户</h1>
<form action="/admin/power/userRole/edit/index" method="post">
  {{csrf_field()}}
     <input type="hidden" name="id" value="{{$id}}">
      <br><button style="margin-left: 172px" class="btn btn-success">提交</button>
      <h2>设置角色：</h2>
      <select name="role_id">
        @foreach($data as $v)
        <option value="{{$v->id}}"
          @if($v->id==$role->id)selected
          @endif
          >{{$v->name}}</option>
        @endforeach
      </select>
</form>
 </div>
@endsection

@section('script')

@endsection