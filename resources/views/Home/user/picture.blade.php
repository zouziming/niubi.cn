@extends('Home.layout.mycenter')

@section('title', '个人信息')

@section('content')
<div class="containers"><div class="pc-nav-item"><a href="/home">首页</a> &gt; <a href="#">会员中心 </a></div></div>

<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a>
                @if(session('userInfo.pic') == true)
                <img src="/storage/{{ $user->pic }}"></a></div>
                @else
                <img src="/lib/img/do.jpg"></a></div>
                @endif
                <div class="fl">
                    <p>用户名：</p>
                    <p><a style="color:violet">{{ session('userInfo.username') }}</a></p>
                    <p>搜悦号：</p>
                    <p>389323080</p>
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="#">我的订单</a></dd>
                    <dd><a href="/home/collection">我的收藏</a></dd>
                    <dd><a href="/home/user/mycenter">我的信息</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="/home/addressIndex">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="#">退货申请</a></dd>
                    <dd><a href="#">退货/退款记录</a></dd>
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd><a href="#">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
       


        <div class="member-right fr">
        <div class="member-head">
            <div class="member-heels fl"><h2>个人信息 - 修改头像</h2></div>
        </div>

        <div class="user-info">

            <!--个人信息 -->
            <div class="info-main">

            <form class="am-form " action="/home/user/picture" method="post" id="form">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ session('userInfo.id') }}">
                @if($user->pic == true)
                <img id="img" style="width:200px;height:200px;" src="/storage/{{$user->pic}}" />
                @else
                <img id="img" style="width:200px;height:200px;" src="/lib/img/do.jpg" />
                @endif
                <div class="am-form-group">
                    <label for="user-phone" class="am-form-label">选择图片</label>
                    <div class="am-form-content">
                    <input id="file" name="pic" type="file" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;
                    </div>
                </div>
                
                <div class="info-btn">
                    <div class="am-btn am-btn-danger">
                        <button id="btn" class="btn" style="border:0px;background:#dd514c;height:28px;width:81px">保存修改</button>
                    </div>
                </div>
            </form>     
            </div>
        </div>
        </div>
        </div>


<!-- 商城快讯 End -->
    </div>
</section>
@endsection

@section('script')
<script src="/lib/js/jquery-1.12.4.min.js"></script>
<script>
    var file = document.getElementById('file')
    var img = document.getElementById('img')
    file.addEventListener('change',function(){
    var obj = file.files[0]
    var reader = new FileReader();
    reader.readAsDataURL(obj);
    reader.onloadend = function() {
        img.setAttribute('src',reader.result);
    }
})
</script>

<script>
    $('#btn').click(function(){

        var fd = new FormData($('#form')[0]);

        $.ajax({
            type: 'post',
            url: '/home/user/picture',
            processData: false,
            contentType: false,
            data: fd,
            success: function (res) {
                if (res.code == 0) {
                    alert(res.msg);
                    location.href = "/home/user/picture"
                }
                if (res.code == 1) {
                    alert(res.msg);
                    location.href = "/home/user/picture"
                }
            },
            error: function (err) {
                $('#errors').css('display', 'block').html('');
                let errs = err.responseJSON.errors
                for (e in errs) {
                    $('<p>' + errs[e][0] + '</p>').appendTo('#errors');
                }
            }
        })
        return false;
    });
</script>
@endsection
