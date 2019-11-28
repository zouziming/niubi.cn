@extends('Admin.layout.main')

@section('title','添加管理员')

@section('body')
	<div class="route_bg">

        <a href="/admin">返回主页</a>
        >
        <span>添加管理员</span>

    </div><br>
   @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form action="/admin/power/userRole/addIndex" method="post">
	 {{ csrf_field() }}
 
  <div class="form-group">
    <label for="exampleInputEmail1">用户名</label>
    <input type="text" class="form-control" name="username" placeholder="用户名">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">密码</label>
    <input type="password" class="form-control" name="password" placeholder="密码">
  </div>

  选择角色：<select class="form-control" style="width:200px" name="role_id">
    @foreach($data as $v)
    <option value="{{$v->id}}">{{$v->name}}</option>
    @endforeach
  </select>
  
  <button style="margin-left:300px" type="submit" class="btn btn-default">Submit</button>
 

  
    </label>

</form>
@endsection