<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') - 后台</title>
    <link rel="stylesheet" href="/lib/css/index.css" />
    <link rel="stylesheet" href="/lib/css/add.css" />
    <link rel="stylesheet" href="/lib/css/bootstrap.css" />
	<link href="/lib/style/adminStyle.css" rel="stylesheet" type="text/css" />

    @yield('css')
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

            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon  glyph-icon icon-reorder"></i>商品管理</a>
                <ul style="display: none;">
                    <li><a href="/admin/goods"><i class="glyph-icon icon-chevron-right"></i>商品列表</a></li>
            		<li><a href="/admin/goods/attr"><i class="glyph-icon icon-chevron-right"></i>添加规格属性</a></li>
            		<li><a href="/admin/allattr"><i class="glyph-icon icon-chevron-right"></i>查看所有规格</a></li>
            		<li><a href="/admin/comment"><i class="glyph-icon icon-chevron-right"></i>评论列表</a></li>
            		<li><a href="/admin/collection"><i class="glyph-icon icon-chevron-right"></i>收藏列表</a></li>
            		<li><a href="/admin/goods/recycle"><i class="glyph-icon icon-chevron-right"></i>回收站</a></li>
                </ul>
            </li> 
            <li class="childUlLi">
                <a href="#" target="_self"> <i class="glyph-icon icon-reorder"></i>订单管理</a>
                <ul>
                    <li><a href="/admin/seeks" target="_top"><i class="glyph-icon icon-chevron-right"></i>订单列表</a></li>
                    <li><a href="/admin/addOrder" target="_self"><i class="glyph-icon icon-chevron-right"></i>添加订单</a></li>
                    <li><a href="/admin/deliverGoods" target="_self"><i class="glyph-icon icon-chevron-right"></i>发货单</a></li>
                    <li><a href="/admin/refund" target="_self"><i class="glyph-icon icon-chevron-right"></i>退款单</a></li>
                    <li><a href="/admin/returnExchange" target="_self"><i class="glyph-icon icon-chevron-right"></i>退换单</a></li>
                </ul>
            </li>
            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon icon-reorder"></i>友链管理</a>
                <ul style="display: none;">
                    <li><a href="/admin/link"><i class="glyph-icon icon-chevron-right"></i>友链列表</a></li>
                </ul>
            </li>
            <li class="childUlLi">
                <a href="#"> <i class="glyph-icon icon-reorder"></i>轮播管理</a>
                <ul style="display: none;">
                    <li><a href="/admin/lunbo"><i class="glyph-icon icon-chevron-right"></i>轮播列表</a></li>
                </ul>
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
            </li>

        </ul>

    </div>
    <!--菜单结束-->

    <!-- 主体 -->
    <div id="layout_right_content" class="layout_right_content">
        <div class="mian_content">
            <div id="page_content">
                @yield('content')
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

    <script src="/lib/js/jquery.js"></script>
    <script src="/lib/js/tendina.js"></script>
    <script src="/lib/js/common.js"></script>
    <script src="/lib/js/public.js"></script>
    <script src="/lib/layer/layer.js"></script>
    @yield('script')
</body>
</html>
