<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/lib/css/index.css" />
    <link rel="stylesheet" href="/lib/css/add.css">
    <link rel="stylesheet" href="/lib/css/bootstrap.css">

    <script src="/lib/js/jquery.js"></script>
    <script src="/lib/js/tendina.js"></script>
    <script src="/lib/js/common.js"></script>

</head>
<body>
    <!--顶部-->
    <div class="layout_top_header">
        <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">Beyond管理后台</span></div>
        <div id="ad_setting" class="ad_setting">
            <a class="ad_setting_a">
                <i class="icon-user glyph-icon" style="font-size: 20px"></i>
                <span>管理员</span>
                <i class="icon-chevron-down glyph-icon"></i>
            </a>
            <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                <li class="ad_setting_ul_li"> <a href="#"><i class="icon-user glyph-icon"></i> 个人中心 </a> </li>
                <li class="ad_setting_ul_li"> <a href="#"><i class="icon-cog glyph-icon"></i> 设置 </a> </li>
                <li class="ad_setting_ul_li"> <a href="#"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
            </ul>
        </div>
    </div>
    <!--顶部结束-->

    <!--菜单-->
    <div class="layout_left_menu">
        <ul class="tendina" id="menu">
            <li class="childUlLi">
               <a href=""><i class="glyph-icon icon-home"></i>首页</a>
            </li>
            <li class="childUlLi">
                <a href="#" target="_self"> <i class="glyph-icon icon-reorder"></i>订单管理</a>
                <ul>
                    <li><a href="/seeks" target="_top"><i class="glyph-icon icon-chevron-right"></i>订单列表</a></li>
                    <li><a href="/addOrder" target="_self"><i class="glyph-icon icon-chevron-right"></i>添加订单</a></li>
                    <li><a href="/deliverGoods" target="_self"><i class="glyph-icon icon-chevron-right"></i>发货单</a></li>
                    <li><a href="/refund" target="_self"><i class="glyph-icon icon-chevron-right"></i>退款单</a></li>
                    <li><a href="/returnExchange" target="_self"><i class="glyph-icon icon-chevron-right"></i>退换单</a></li>

                </ul>
            </li>
        </ul>
    </div>
    <!--菜单结束-->

    <!-- 主体 -->
    <div id="layout_right_content" class="layout_right_content">
        <div class="mian_content">
            <div id="page_content">
                @yield('body')
            </div>
        </div>
    </div>
    <!-- 主体结束 -->

    <!-- 尾部 -->
    <div class="layout_footer">
        <p>Copyright © 2019 - 世界第一个没有之一科技</p>
    </div>
    <!-- 尾部结束 -->
@yield('script')

</body>
</html>