<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') - 后台</title>
    <link rel="stylesheet" href="/lib/css/index.css" />
    <link rel="stylesheet" href="/lib/css/add.css" />
    <link rel="stylesheet" href="/lib/css/bootstrap.css" />
</head>
<body>
    
    <!--顶部-->
    <div class="layout_top_header">
        <div style="float: left"><span style="font-siz e: 16px;line-height: 45px;padding-left: 20px;color: violet ">您好，{{ session('userInfo.username') }} 欢迎您来到后台管理</span></div>
        <div id="ad_setting" class="ad_setting">
            <a class="ad_setting_a" href="javascript:;">
                <i class="icon-user glyph-icon" style="font-size: 20px"></i>
                <span>管理员</span>
                <i class="icon-chevron-down glyph-icon"></i>
            </a>
            <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                <li class="ad_setting_ul_li"> <a href="/admin"><i class="icon-user glyph-icon"></i> 个人中心 </a> </li>
                <li class="ad_setting_ul_li"> <a href="/admin/pwd?id={{ session('userInfo.id') }}"><i class="icon-cog glyph-icon"></i> 修改密码 </a> </li>
                <li class="ad_setting_ul_li"> <a href="/admin/logout"><i class="icon-signout glyph-icon"></i><span class="font-bold">退出</span> </a> </li>
            </ul>
        </div>
    </div>
    <!--顶部结束-->

    <!--菜单-->
    <div class="layout_left_menu">
        <ul class="tendina" id="menu">
            <li class="childUlLi">
               <a href="/admin" target=""><i class="glyph-icon icon-home"></i>首页</a>
            </li>
            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon icon-reorder"></i>用户管理</a>
                <ul style="display: none;">
                    <li><a href="/admin/user/index" target=""><i class="glyph-icon icon-chevron-right"></i>用户列表</a></li>
                    <li><a target="" href="/admin/user/add"><i class="glyph-icon icon-chevron-right"></i>添加用户</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--菜单结束-->

    <!-- 主体 -->
    <div id="layout_right_content" class="layout_right_content">
        <div class="mian_content">
            <div id="page_content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- 主体结束 -->

    <!-- 尾部 -->
    <div class="layout_footer">
        <p>Copyright © 2014 - XXXX科技</p>
    </div>
    <!-- 尾部结束 -->
    <script src="/lib/js/jquery.js"></script>
    <script src="/lib/js/tendina.js"></script>
    <script src="/lib/js/common.js"></script>
    <script src="/lib/js/public.js"></script>
    <script src="/lib/layer/layer.js"></script>
    @yield('script')
</body>
</html>