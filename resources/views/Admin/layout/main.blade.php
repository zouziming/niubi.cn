<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
   
   <link rel="stylesheet" href="/lib/css/index.css" />
    <link rel="stylesheet" href="/lib/css/add.css">
    <link rel="stylesheet" href="/lib/css/bootstrap.css">
    <link href="/lib/style/adminStyle.css" rel="stylesheet" type="text/css" />
    <script src="/lib/js/jquery.js"></script>
    <script src="/lib/js/tendina.js"></script>
    <script src="/lib/js/common.js"></script>
    <script src="/lib/js/public.js"></script>
    <script src="/lib/layer/layer.js"></script>
</head>
<body>
	 <!--顶部-->
    <div class="layout_top_header">
        <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d">XXXX管理后台</span></div>
        <div id="ad_setting" class="ad_setting">
            <a class="ad_setting_a" href="javascript:;">
                <i class="icon-user glyph-icon" style="font-size: 20px"></i>
                <span>管理员</span>
                <i class="icon-chevron-down glyph-icon"></i>
            </a>
            <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-user glyph-icon"></i> 个人中心 </a> </li>
                <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-cog glyph-icon"></i> 设置 </a> </li>
                <li class="ad_setting_ul_li"> <a href="__MODULE__/Login/logout"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
            </ul>
        </div>
    </div>
    <!--顶部结束-->

    <!--菜单-->
    <div class="layout_left_menu">
        <ul class="tendina" id="menu">
            <li class="childUlLi">
               <a href="/admin"><i class="glyph-icon icon-home"></i>首页</a>
            </li>
            <li class="childUlLi">
                <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>分类管理</a>
                <ul style="display: none;">
                    <li><a target="main" href="/admin/cate/index"><i class="glyph-icon icon-chevron-right"></i>分类列表</a></li>
                    <li><a target="main" href="/admin/cate/add"><i class="glyph-icon icon-chevron-right"></i>添加顶级分类</a></li>
                </ul>
            </li>
            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon  icon-location-arrow"></i>权限管理</a>
                <ul style="display: none;">
                    <li><a href="/admin/power/role" target="main"><i class="glyph-icon icon-chevron-right"></i>角色列表</a></li>
                    <li><a href="/admin/power" target="main"><i class="glyph-icon icon-chevron-right"></i>权限列表</a></li>
                    <li><a href="/admin/power/userRole" target="main"><i class="glyph-icon icon-chevron-right"></i>管理员列表</a></li>
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
        <p>Copyright © 2014 - XXXX科技</p>
    </div>
    <!-- 尾部结束 -->
   
   @yield('script')
   
</body>
</html>