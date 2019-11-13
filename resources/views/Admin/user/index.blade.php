@extends('Admin.layout.main')

@section('title', '用户列表')

@section('content')
<div class="route_bg">
    <a href="/admin/user/index">返回主页</a>
    <span>用户列表</span>
</div>
<div class="col-md-12" style="margin-top:5px;">
    <div class="content">
        <form class="form-inline" method="post" action="/search">>
             {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputName2">用户名：</label>
                <input type="text" name="username" value="" class="form-control" id="exampleInputName2" placeholder="按用户名搜">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
       
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>手机号</th>
                <th>头像</th>
                <th>邮箱</th>
                <th>状态</th>
                <th>注册时间</th>
                <th>操作</th> 
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>
                @if ($user->sex === 0)
                    女
                @elseif ($user->sex === 1)
                    男
                @else
                    保密
                @endif
                </td>
                <td>{{$user->phone}}</td>
                <td>
                    <img src="/storage/{{$user->pic}}" style="width:100px;height:100px;border:1px solid #ccc" alt="">
                </td>
                <td>{{$user->email}}</td>
                <td>
                @if ($user->status === 1)
                    正常
                @else
                    禁用
                @endif
                </td>
                <td>{{$user->addtime}}</td>
                <td>
                    <!-- <a href="/admin/user/in">删除</a> -->
                    <!-- <a href="">修改</a> -->
                    <button type="button" data-id=" {{ $user->id }} " class="btn btn-info delete">删除</button>
                    <a href="/admin/user/edit"><button type="button" class="btn btn-info">修改</button></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection

@section('script')
<script>
    $('.delete').click(function(){
        console.dir($(this).data('id'));

        let _t = this;

        $.ajax({
            type: 'post',
            // url: '/admin/image/del/' + $(this).data('id'),
            url: '/admin/user/del/' + $(this).data('id'),

            data: {
                _token: '{{csrf_token()}}'
            },
            success: function(res) {
                console.dir(res)
                if (res.code == 0) {
                    alert(res.msg)
                    $(_t).parent().parent().remove()
                }
            },
            error: function (err) {
                alert(err.responseJSON.msg);
            }
        });
    });
</script>
@endsection;

