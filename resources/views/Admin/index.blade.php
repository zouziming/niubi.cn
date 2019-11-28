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
    <form>
        <br>
        <div class="form-group col-md-12">
        @if(session('users.pic') == true)
        <a href="/admin/headpic"><img src="/storage/{{ session('users.pic') }}" value="" style="width:125px;height:125px" alt="" class="img-circle"></a>
        @else
        <a href="/admin/headpic"><img src="/lib/img/do.jpg" value="" style="width:125px;height:125px" alt="" class="img-circle"></a>
        @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">用户名</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px;height:36px">
                {{ session('users.username') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">手机号</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px;height:36px">
                {{ session('users.phone') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">邮箱</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px;height:36px">
                {{ session('users.email') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">性别</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px;height:36px">
                @if (session('users.sex') == 0)
                    女
                @elseif (session('users.sex') == 1)
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
              <div class="panel-body" style="padding:8px;height:36px">
                <!-- {{ session('users.sex') }} -->无
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:blue">注册时间</label>
            <div class="panel panel-default">
              <div class="panel-body" style="padding:8px;height:36px">
                {{ session('users.addtime') }}
              </div>
            </div>
        </div>
        <div class="form-group">
            <!-- <button class="btn btn-info" style="width:120px;">修改</button> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">修改资料</button>
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
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">修改个人信息</h4>
            </div>
            <form>
            <!-- action="/admin/index" method="post" -->
            <input type="hidden" name="id" value="{{ session('users.id') }}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">用户名:</label>
                    <input type="text" name="username" class="form-control" id="recipient-name" value="{{ session('users.username') }}">
                    {{$errors->first('username')}}
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">手机号:</label>
                    <input type="text" name="phone" class="form-control" id="recipient-name" value="{{ session('users.phone') }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">邮箱:</label>
                    <input type="text" name="email" class="form-control" id="recipient-name" value="{{ session('users.email') }}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">性别:</label>
                    <select name="sex" class="form-control">
                        <option value="1">男</option>
                        <option value="0">女</option>
                        <option value="2">保密</option> 
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="btn" class="btn btn-primary">确认修改</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script>
    $('#btn').click(function(){
        var id = $('input[name=id]').val();
        var username = $('input[name=username]').val();
        var phone = $('input[name=phone]').val();
        var email = $('input[name=email]').val();
        var sex = $('select[name=sex]').val();

        $.ajax({
            type: 'post',
            url: '/admin/index',
            data: {
                id:id,
                username:username,
                phone:phone,
                email:email,
                sex:sex,
                '_token':'{{csrf_token()}}',
            },
            success: function (res) {
                if (res.code == 0) {
                    alert('修改成功！');
                    location.href = "/admin"
                }
                if (res.code == 1) {
                    alert('修改失败！');
                    location.href = "/admin"
                }
            },
            error: function (err) {
                console.log(err);
                alert('请填写好要修改的内容!');
            }
        })
    })
</script>
@endsection

