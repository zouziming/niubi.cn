@extends('Home.layout.mycenter')

@section('title', '个人信息')

@section('content')
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
