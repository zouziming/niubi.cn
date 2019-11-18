@extends('Admin.layout.main')

@section('title', '首页')

@section('content')
<div class="col-md-12" width="100%" height="100%" style="background:url(/lib/img/99.jpg) no-repeat center  0;background-size:100% 100%;"  >
<div class="route_bg">
    <a href="/admin">返回首页</a>
    -
    <span>个人中心</span>
</div>
    <div class="col-md-3 col-md-offset-2">
    <form action="/admin/user/doedit" method="post">
        <br>
        <div class="form-group col-md-12">
        <img src="/storage/{{ session('userInfo.pic') }}" value="" style="width:125px;height:125px" alt="" class="img-circle">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">用户名</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px">
                {{ session('userInfo.username') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">手机号</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px">
                {{ session('userInfo.phone') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">邮箱</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px">
                {{ session('userInfo.email') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">性别</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px">
                @if (session('userInfo.sex') == 0)
                    女
                @elseif (session('userInfo.sex') == 1)
                    男
                @else
                    保密
                @endif
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">权限</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px">
                <!-- {{ session('userInfo.sex') }} -->无
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">注册时间</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px">
                {{ session('userInfo.addtime') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-info" style="width:120px;">修改</button>
        </div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
        <div class="control-group"></div>
    </form>
    </div>
</div>
</div>
@endsection

