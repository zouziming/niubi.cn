@extends('Admin.layout.main')

@section('title', '首页')

@section('content')
<div class="route_bg">
    <a href="/admin">返回首页</a>
    -
    <span>个人中心 - 修改头像</span>
</div>
    <div class="col-md-3 col-md-offset-2">
        <br>
        <form id="form">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ session('userInfo.id') }}">
            @if(session('userInfo.pic') == true)
            <img id="img" style="width:200px;height:200px;" src="/storage/{{ session('userInfo.pic') }}">
            @else
            <img id="img" style="width:200px;height:200px;" src="/lib/img/do.jpg">
            @endif
            <br><br>
            <label for="user-phone" class="am-form-label">选择图片</label>
            <div class="am-form-content">
            <input id="file" name="pic" type="file" style="border:1px solid #00CCFF;height:28px">&nbsp;&nbsp;
            </div>
            <button id="btn" type="button" class="btn btn-info">保存修改</button>
        </form> 
    </div>

@endsection
@section('script')
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
            url: '/admin/headpic',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: fd,
            success: function (res) {
                if (res.code == 0) {
                    alert(res.msg);
                    location.href = "/admin/headpic"
                }
                if (res.code == 1) {
                    alert(res.msg);
                    location.href = "/admim/headpic"
                }
            },
            error: function (err) {
                console.log(err);
                
            }
        })
    });
</script>
@endsection

