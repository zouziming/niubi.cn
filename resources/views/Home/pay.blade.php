<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>sb商城</title>
    <meta name="keywords" content="开源商城">
    <meta name="description" content="TPshop">
    <link rel="shortcut icon" type="image/x-icon" href="http://192.168.5.75/public/upload/logo/2018/04-09/516bc70315079d81dc3726991672b4af.png" media="screen">
    <!-- <link rel="stylesheet" href="/lib/pyjy/pay.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/lib/pyjy/tpshop.css">
    <link rel="stylesheet" type="text/css" href="/lib/pyjy/base.css">
    <link href="/lib/pyjy/common.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/lib/pyjy/jh.css">
	<link rel="stylesheet" href="/lib/pyjy/layer.css" id="layui_layer_skinlayercss">
    <script src="/lib/pyjy/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/lib/pyjy/global.js"></script>
    <script src="/lib/pyjy/pc_common.js"></script>
    <script src="/lib/pyjy/layer.js"></script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="/lib/pyjy/base.css">
<div class="top-hander" moduleid="1539923">
    <div class="w1224 clearfix">
      <div class="fl">
          <div class="ls-dlzc fl islogin">
              
          </div>
          <script>
              $(function (){
                      var uname = getCookie('uname');
                      if (uname == '') {
                          $('.islogin').remove();
                          $('.nologin').show();
                      } else {
                          $('.nologin').remove();
                          $('.islogin').show();
                          $('.userinfo').html(decodeURIComponent(uname).substring(0,11));
                      }
              })

          </script>

      </div>
      <ul class="top-ri-header fr clearfix">
		  @empty(SESSION('userInfo'))
		  <span>您好！欢迎来到17商城 请</span>
		  <span>
		  <a href="/home/login">[登录]</a>
		  </span>
		  <span>&nbsp;<a href="/home/register">[注册]</a></span>
		  @else
		  
		  &nbsp;&nbsp;&nbsp;&nbsp;
		  <span>欢迎您：</span>
		  <a style="color:violet;text-decoration: none;">{{ session('userInfo.username') }}&nbsp;&nbsp;&nbsp;&nbsp;</a>
		  <a href="/home/logout" style="color:red;text-decoration: none;">退出&nbsp;&nbsp;&nbsp;&nbsp;</a>
		  @endempty

          <li><a target="_blank" href="javascript:void(0)">我的订单</a></li>
          <li class="spacer"></li>
          <li><a target="_blank" href="javascript:void(0)">我的浏览</a></li>
          <li class="spacer"></li>
          <li><a target="_blank" href="/home/collection">我的收藏</a></li>
          <li class="spacer"></li>
          <li>客户服务</li>
          <li class="spacer"></li>
          <li class="hover-ba-navdh">
            <div class="nav-dh">
              <span>网站导航</span>
              <i class="share-a_a1"></i>
            </div>
            <ul class="conta-hv-nav clearfix">
                <li>
                    <a href="http://192.168.5.75/index.php/Home/Activity/promoteList.html">优惠活动</a>
                </li>
                <li>
                    <a href="http://192.168.5.75/index.php/Home/Activity/pre_sell_list.html">预售活动</a>
                </li>

                <li>
                    <a href="http://192.168.5.75/index.php/Home/Goods/integralMall.html">兑换中心</a>
                </li>
            </ul>
          </li>
      </ul>
    </div>
</div>


<div class="fn-cart-pay">
    <!-- cart-title -->
    <div class="wrapper1190">
        <div class="order-header">
            <div class="layout after">
                <div class="fl">
                    <div class="logo pa-to-36 wi345">
                        <a href="/home">
							<img src="/lib/pyjy/814d7e9a0eddcf3754f2e8373a50a19c.png" alt="" style="max-width: 240px;max-height: 80px;">
						</a>
                    </div>
                </div>
                <div class="fr">
                    <div class="pa-to-36 progress-area">
                        <div class="progress-area-wd" style="display:none">我的购物车</div>
                        <div class="progress-area-tx" style="display:none">填写核对订单信息</div>
                        <div class="progress-area-cg">成功提交订单</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cart-title -->

        <div class="layout after-ta order-ha">
            <div class="erhuh">
                <i class="icon-succ"></i>

                <h3>订单提交成功，请您尽快付款！</h3>

                <p class="succ-p">
					订单号：&nbsp;&nbsp;{{time().$data[0]['id']}}&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;付款金额（元）：&nbsp;&nbsp;<b>{{$data[0]['total']}}</b>&nbsp;<b>元</b>
				</p>
                <div class="succ-tip">
                    请您在&nbsp;&nbsp;<b>2019-11-23</b>&nbsp;完成支付，否则订单将自动取消
                </div>
            </div>
            <div class="ddxq-xiaq">
				<a href="http://192.168.5.75/index.php/Home/Order/order_detail/id/1518.html">订单详情<i></i></a>
			</div>
            <form action="http://192.168.5.75/index.php/Home/Payment/getCode.html" method="post" name="cart4_form" id="cart4_form">
                <div class="orde-sjyy">
                    <h3 class="titls">选择支付方式</h3>

                    <div class="bsjy-g">
                        <dl>
                            <dd>
                                <div class="order-payment-area">
                                    <div class="dsfzfpte">
                                        <b>选择支付方式</b>
                                    </div>
                                    <div class="po-re dsfzf-ee">
                                        <ul>
                                            <li>
                                                <div class="payment-area">
                                                    <input type="radio" id="input-ALIPAY-1" value="pay_code=cod" class="radio vam" name="pay_radio">
                                                    <label for="">
                                                        <img src="/lib/pyjy/logo.jpg" width="40" height="40" onclick="change_pay(this);">到货付款
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="payment-area">
                                                    <input type="radio" id="input-ALIPAY-1" value="pay_code=tenpay" class="radio vam" name="pay_radio">
                                                    <label for="">
                                                        <img src="/lib/pyjy/logo(1).jpg" width="40" height="40" onclick="change_pay(this);">PC端财付通
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="payment-area">
                                                    <input type="radio" id="input-ALIPAY-1" value="pay_code=unionpay" class="radio vam" name="pay_radio">
                                                    <label for="">
                                                        <img src="/lib/pyjy/logo(2).jpg" width="40" height="40" onclick="change_pay(this);">银联在线支付
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="payment-area">
                                                    <input type="radio" id="input-ALIPAY-1" value="pay_code=weixin" class="radio vam" name="pay_radio">
                                                    <label for="">
                                                        <img src="/lib/pyjy/logo(3).jpg" width="40" height="40" onclick="change_pay(this);">微信支付(PC&amp;微商城)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="payment-area">
                                                    <input type="radio" id="input-ALIPAY-1" value="pay_code=newalipay" class="radio vam" name="pay_radio">
                                                    <label for="">
                                                        <img src="/lib/pyjy/logo(4).jpg" width="40" height="40" onclick="change_pay(this);">新PC&amp;APP端支付宝
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                        <div class="order-payment-action-area">
                            <a class="button-style-5 button-confirm-payment" href="javascript:void(0);" onclick="$(&#39;#cart4_form&#39;).submit();">确认支付方式</a>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="master_order_sn" value="">
                <input type="hidden" name="order_id" value="1518">
            </form>
        </div>
    </div>
</div>


<!--微信扫一扫支付对话框  -->
<div id="wchatQrcodeDlg" class="g-cartpay-dlg" style="display: none;" data-show="">
    <div class="g-cartpay-content">
        <div class="g-h"><span class="u-close"></span></div>
        <div class="g-c">
            <div class="g-t"> 使用微信支付<span>￥<small class="wx_amount">118</small></span></div>
            <div class="g-qrcode"><img alt="使用微信支付" src="/lib/pyjy/loading.gif"></div>
        </div>
        <div class="g-f fixed"><i class="icon_scan"></i>

            <div class="u-label">
                <p>请使用微信扫一扫<br>
                    扫描二维码完成支付</p>
            </div>
        </div>
    </div>
    <div class="u-mask"></div>
</div>
<!--微信扫一扫支付对话框 / -->
<div id="addCardNewBind"></div>
<!--footer-s-->
<div class="footer p">
    <div class="tpshop-service">
	<ul class="w1224 clearfix">
		<li>
			<i class="ico ico-day7">16</i>
			<p class="service">16天无理由退货</p>
		</li>
		<li>
			<i class="ico ico-day15">16</i>
			<p class="service">16天免费换货</p>
		</li>
		<li>
			<i class="ico ico-quality"></i>
			<p class="service">正品行货 品质保障</p>
		</li>
		<li>
			<i class="ico ico-service"></i>
			<p class="service">专业售后服务</p>
		</li>
	</ul>
</div>
<div class="footer">
	<div class="w1224 clearfix" style="padding-bottom: 10px;">
		<div class="left-help-list">
			<div class="help-list-wrap clearfix">
				<dl>
					<dt>新手上路</dt>
						<dd><a href="http://192.168.5.75/index.php/Home/Article/detail/article_id/35.html">测试文章</a></dd>
						<dd><a href="http://192.168.5.75/index.php/Home/Article/detail/article_id/36.html">[首届]四川海峡两岸摄影家大会新闻发布会发言稿</a></dd>
						<dd><a href="http://192.168.5.75/index.php/Home/Article/detail/article_id/37.html">暨首届海峡两岸摄影家摄影展</a></dd>
				</dl>
				<dl>
					<dt>购物指南</dt>
				</dl>
				<dl>
					<dt>售后服务</dt>
				</dl>
				<dl>
					<dt>支付方式</dt>
				</dl>
				<dl>
				    <dt>配送方式</dt>
				</dl>
			</div>
			
		</div>
		<div class="right-contact-us">
			<h3 class="title">联系我们</h3>
			<span class="phone">0755-123456</span>
			<p class="tips">周一至周日8:00-18:00<br>(仅收市话费)</p>

		</div>
	</div>
    <div class="mod_copyright p">
        <div class="grid-top">
                        <!--<a href="javascript:void (0);">关于我们</a><span>|</span>-->
            <!--<a href="javascript:void (0);">联系我们</a><span>|</span>-->
            <!---->
        </div>
        <p>Copyright © 2016-2025 TPshop开源商城 版权所有 保留一切权利 备案号:<a href="http://www.miitbeian.gov.cn/">粤ICP备123456号</a></p>
        <p class="mod_copyright_auth">
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_1" href="http://192.168.5.75/index.php?m=Home&amp;c=Cart&amp;a=cart4&amp;order_sn=201911221438562359" target="_blank">经营性网站备案中心</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_2" href="http://192.168.5.75/index.php?m=Home&amp;c=Cart&amp;a=cart4&amp;order_sn=201911221438562359" target="_blank">可信网站信用评估</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_3" href="http://192.168.5.75/index.php?m=Home&amp;c=Cart&amp;a=cart4&amp;order_sn=201911221438562359" target="_blank">网络警察提醒你</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_4" href="http://192.168.5.75/index.php?m=Home&amp;c=Cart&amp;a=cart4&amp;order_sn=201911221438562359" target="_blank">诚信网站</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_5" href="http://192.168.5.75/index.php?m=Home&amp;c=Cart&amp;a=cart4&amp;order_sn=201911221438562359" target="_blank">中国互联网举报中心</a>
        </p>
    </div>
</div>
<style>
    .mod_copyright {
        border-top: 1px solid #EEEEEE;
    }
    .grid-top {
        margin-top: 20px;
        text-align: center;
    }
    .grid-top span {
        margin: 0 10px;
        color: #ccc;
    }
    .mod_copyright > p {
        margin-top: 10px;
        color: #666;
        text-align: center;
    }
    .mod_copyright_auth_ico {
        overflow: hidden;
        display: inline-block;
        margin: 0 3px;
        width: 103px;
        height: 32px;
        background-image: url(/template/pc/rainbow/static/images/ico_footer.png);
        line-height: 1000px;
    }
    .mod_copyright_auth_ico_1 {
        background-position: 0 -151px;
    }
    .mod_copyright_auth_ico_2 {
        background-position: -104px -151px;
    }
    .mod_copyright_auth_ico_3 {
        background-position: 0 -184px;
    }
    .mod_copyright_auth_ico_4 {
        background-position: -104px -184px;
    }
    .mod_copyright_auth_ico_5 {
        background-position: 0 -217px;
    }
</style>
<script>
    // 延时加载二维码图片
    jQuery(function($) {
        $('img[img-url]').each(function() {
            var _this = $(this),
                    url = _this.attr('img-url');
            _this.attr('src',url);
        });
    });
</script>
</div>
<!--footer-e-->
<script>
    $(document).ready(function () {
        $("input[name='pay_radio']").first().trigger('click');
    });
    // 切换支付方式
    function change_pay(obj) {
        $(obj).parent().siblings('input[name="pay_radio"]').trigger('click');
    }
</script>


<input type="file" id="" name="file" style="display: none;"><div data-v-cef78672="" class="container_selected_area" style="cursor: url(&quot;chrome-extension://ialiedlpfknneamnbemcgmaboleiccdd/assets/images/cursor-imagen.svg&quot;) 9 9, crosshair;"><div data-v-cef78672="" class="area"></div></div>

</body>
</html>
