<!doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"> 
    <meta name="renderer" content="webkit">
    <title>@yield('title') - 歪秀购物</title>
    <link rel="shortcut icon" type="image/x-icon" href="/lib/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/lib/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/lib/theme/css/home.css">

    <script type="text/javascript" src="/lib/theme/js/jquery.js"></script>
    <script type="text/javascript" src="/lib/theme/js/index.js"></script>
    <script type="text/javascript" src="/lib/theme/js/js-tab.js"></script>
    <script type="text/javascript" src="/lib/theme/js/MSClass.js"></script>
    <script type="text/javascript" src="/lib/theme/js/jcarousellite.js"></script>
    <script type="text/javascript" src="/lib/theme/js/top.js"></script>
    <script type="text/javascript">
         var intDiff = parseInt(80000);//倒计时总秒数量
         function timer(intDiff){
             window.setInterval(function(){
                 var day=0,
                         hour=0,
                         minute=0,
                         second=0;//时间默认值
                 if(intDiff > 0){
                     day = Math.floor(intDiff / (60 * 60 * 24));
                     hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                     minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                     second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                 }
                 if (minute <= 9) minute = '0' + minute;
                 if (second <= 9) second = '0' + second;

                 $('#hour_show').html('<s id="h"></s>'+hour+'');
                 $('#minute_show').html('<s></s>'+minute+'');
                 $('#second_show').html('<s></s>'+second+'');
                 intDiff--;
             }, 1000);
         }

         $(function(){
             timer(intDiff);
         });
     </script>
 </head>
 <body>


<div>
    <div id="moquu_wxin" class="moquu_wxin"><a href="javascript:void(0)"><div class="moquu_wxinh"></div></a></div>
    <div id="moquu_wshare" class="moquu_wshare"><a href="javascript:void(0)" style="text-indent:0"><div class="moquu_wshareh"><img src="/lib/theme/icon/moquu_wshare.png" width="100%"></div></a></div>
    <div id="moquu_wmaps"><a href="javascript:void(0)" class='moquu_wmaps'></a></div>
    <a id="moquu_top" href="javascript:void(0)"></a>
</div>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
                @empty(SESSION('userInfo'))
                <li style="float:left">亲：</li>
                <li style="float:left">
                <a href="/home/login" style="color:#ea4949;">请登录</a>
                </li>
                @else
                <li>欢迎您：</li>
                <li>
                <a style="float:left;color:violet">{{ session('userInfo.username') }}</a> 
                <a href="/home/logout" style="float:left;color:red">退出</a> </li>
                @endempty
                <li class="headerul">|</li>
                <li><a href="/home/register">免费注册</a> </li>
                <li class="headerul">|</li>
                <li><a href="my-d.html">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="my-s.html">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="my-user.html" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="my-d.html">我的订单</a>
                        <a href="my-s.html">我的收藏</a>
                        <a href="my-user.html">账户安全</a>
                        <a href="my-add.html">地址管理</a>
                        <a href="my-p.html">我要评价</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                <li id="pc-nav1" class="menu"><a href="#" class="tit M-iphone">手机悦商城</a>
                   <div class="subnav">
                       <a href="#"><img src="/lib/theme/icon/ewm.png" width="115" height="115" title="扫一扫，有惊喜！"></a>
                   </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl"><h1><a href="首页.html"><img src="/lib/theme/icon/logo.png"></a> </h1></div>
        <div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="洗衣机">
                <button class="button" onClick="search('key');return false;">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>
        <div class="header-cart fr"><a href="#"><img src="/lib/theme/icon/car.png"></a> <i class="head-amount">99</i></div>
        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">

            <ul class="pullDownList">
                <li class="menulihover">
                    <i class="listi1"></i>
                    <a href="all-cl.html" target="_blank">家用电器</a>
                    <span></span>
                </li>
            </ul>
            <div class="yMenuListCon">

                <div class="yMenuListConin">
                    <div class="yMenuLCinLisi fl">
                        <ul>
                            <li><a href="#">大家电<i class="fr">></i></a></li>
                            <li><a href="#">生活电器<i class="fr">></i></a></li>
                            <li><a href="#">厨房电器<i class="fr">></i></a></li>
                            <li><a href="#">个护健康<i class="fr">></i></a></li>
                            <li><a href="#">五金家装<i class="fr">></i></a></li>
                        </ul>
                    </div>
                    <div class="yMenuLCinList fl">
                        <p>
                            <a href="" class="ecolor610">大牌上新</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                        </p>
                        <p>
                            <a href="" class="ecolor610">大牌上新</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                        </p>
                        <p>
                            <a href="" class="ecolor610">大牌上新</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                        </p>
                        <p>
                            <a href="" class="ecolor610">大牌上新</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                        </p>

                        <p>
                            <a href="" class="ecolor610">大牌上新</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                            <a href="">商场同款</a>
                            <a href="">男装集结</a>
                            <a href="">羽绒服</a>
                            <a href="">加厚羽绒 </a>
                            <a href="">高帮鞋</a>
                        </p>
                    </div>
                </div>
            </div>
            </div>
            <ul class="yMenuIndex">
                <li><a href="" target="_blank">服装城</a></li>
                <li><a href="" target="_blank">美妆馆</a></li>
                <li><a href="" target="_blank">美食</a></li>
                <li><a href="" target="_blank">全球购</a></li>
                <li><a href="" target="_blank">闪购</a></li>
                <li><a href="" target="_blank">团购</a></li>
                <li><a href="" target="_blank">拍卖</a></li>
                <li><a href="" target="_blank">金融</a></li>
                <li><a href="" target="_blank">智能</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- header End -->
@yield('body')


<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">购物流程</a> </li>
                <li><a href="#">会员介绍 </a> </li>
                <li><a href="#">生活旅行</a> </li>
                <li><a href="#"> 常见问题 </a> </li>
                <li><a href="#"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">banner()</script>
@yield('script')

</body>
</html>