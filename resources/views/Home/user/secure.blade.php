@extends('Home.layout.mycenter')

@section('title', '账户安全')

@section('content')
<div class="member-right fr">
  <div class="member-head">
      <div class="member-heels fl"><h2>账户安全</h2></div>
  </div>
  <div class="member-border">
     <div class="member-secure clearfix">
         <div class="member-extent fl">
             <h2 class="fl">安全级别</h2>
             <ul class="fl">
                 <li class="on"></li>
                 <li class="on"></li>
                 <li class="on"></li>
                 <li class="on"></li>
                 <li class="on"></li>
                 <li class="on"></li>
                 <li class="on"></li>
                 <li class="on1"><a href="#"></a></li>
                 <li class="on2"><a href="#"></a></li>
                 <li class="on3"><a href="#"></a></li>
             </ul>
             <span class="fl">较高</span>
         </div>
         <div class="fr reds"><p> * 建议您开启全部安全设置，以保障您的账户及资金安全</p></div>
     </div>
     <div class="member-caution clearfix">
         <ul>
             <li class="clearfix">
                 <div class="warn1"></div>
                 <div class="warn2">登录密码</div>
                 <div class="warn3">互联网账号存在被盗风险，建议您定期更改密码以保护账户安全。</div>
                 <div class="warn4"><a href="/home/user/password?id={{ session('userInfo.id') }}">修改</a> </div>
             </li>
             <li class="clearfix">
                 <div class="warn1"></div>
                 <div class="warn2">密保问题</div>
                 <div class="warn3">建议您设置密保问题。  </div>
                 <div class="warn4"><a href="#">设置密保</a> </div>
             </li>
             <li class="clearfix">
                 <div class="warn1"></div>
                 <div class="warn2">手机验证</div>
                 <div class="warn3">您验证的手机： <i class="reds">134*****693</i>   若已丢失或停用，请立即更换，<i class="reds">避免账户被盗</i></div>
                 <div class="warn5"><p>解绑请咨询搜小悦官方客服 <i>souyue@zhongsou.com  </i></p></div>
             </li>
             <li class="clearfix">
                 <div class="warn6"></div>
                 <div class="warn2">支付密码</div>
                 <div class="warn3">安全程度：  建议您设置更高强度的密码。</div>
                 <div class="warn5"><a href="#">支付密码管理</a></div>
             </li>
         </ul>
         <div class="member-prompt">
             <p>安全提示：</p>
             <p>您当前IP地址是：<i class="reds">110.106.0.01</i>  北京市          上次登录的TP： 2015-09-16  <i class="reds">110.106.0.02 </i> 天津市</p>
             <p>1. 注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗。</p>
             <p>2. 建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保账户及交易安全。      </p>
         </div>
     </div>
  </div>
</div>
@endsection