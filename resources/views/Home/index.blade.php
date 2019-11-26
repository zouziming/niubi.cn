<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>sb商城</title>
        <link type="text/css" href="/lib/theme/css/css.css" rel="stylesheet" />
        <script type="text/javascript" src="/lib/theme/js/jquery.js"></script>
        <script type="text/javascript" src="/lib/theme/js/js.js"></script>
        <script src="/lib/theme/js/wb.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">$(function() {
                $("#kinMaxShow").kinMaxShow();
            });</script>
    </head>
    
    <body>
        <div class="mianCont">
            <div class="top">
                @empty(SESSION('userInfo'))
                <span>您好！欢迎来到17商城 请</span>
                <span>
                <a href="/home/login">[登录]</a>
                </span>
				<span>&nbsp;<a href="/home/register">[注册]</a></span>
                @else
                <span>欢迎您：</span>
                <a style="color:violet">{{ session('userInfo.username') }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</a>
                <a href="/home/logout" style="color:red">退出&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</a>
				<span class="topRight">
                <a href="/home/user/secure">账户安全</a>&nbsp;| 
                    <a href="order.html">我的订单</a>&nbsp;|
                    <a href="/home/collection">我的收藏</a>&nbsp;|
                    <a href="contact.html">联系我们</a>
				</span>
                @endempty
            </div>
            <!--top/-->
            <div class="lsg">
                <h1 class="logo">
                    <a href="index.html">
                        <img src="/lib/image/logo.png" width="217" height="90" /></a>
                </h1>
                <form action="#" method="get" class="subBox">
                    <div class="subBoxDiv">
                        <input type="text" class="subLeft" />
                        <input type="image" src="/lib/image/subimg.png" width="63" height="34" class="sub" />
                        <div class="hotWord">热门搜索：
                            <a href="proinfo.html">冷饮杯</a>&nbsp;
                            <a href="proinfo.html">热饮杯</a>&nbsp;
                            <a href="proinfo.html">纸杯</a>&nbsp;
                            <a href="proinfo.html">纸巾</a>&nbsp;
                            <a href="proinfo.html">纸巾</a>&nbsp;
                            <a href="proinfo.html">纸杯</a>&nbsp;</div>
                        <!--hotWord/--></div>
                    <!--subBoxDiv/--></form>
                <!--subBox/-->
                <div class="gouwuche">
                    <div class="gouCar">
                        <img src="/lib/image/gouimg.png" width="19" height="20" style="position:relative;top:6px;" />&nbsp;|&nbsp;
                        <strong class="red">0</strong>&nbsp;件&nbsp;|
                        <strong class="red">￥ 0.00</strong>
                        <a href="order.html">去结算</a>
                        <img src="/lib/image/youjian.jpg" width="5" height="8" /></div>
                    <!--gouCar/-->
                    <div class="myChunlv">
                        <a href="vip.html">
                            <img src="/lib/image/mychunlv.jpg" width="112" height="34" /></a>
                    </div>
                    <!--myChunlv/--></div>
                <!--gouwuche/--></div>
            <!--lsg/-->
            <div class="pnt">
                <div class="pntLeft">
                    <h2 class="Title">所有商品分类</h2>
                    <ul class="InPorNav">
						@foreach($data as $v)
                        <li>
                            <a href="/home/cate/{{$v['fu']['id']}}">{{$v['fu']['name']}}</a>
                            <div class="chilInPorNav">
								@foreach($v['er'] as $vv)
								<a href="/home/cate/{{$vv['id']}}">{{$vv['name']}}</a>
								@endforeach
							</div>
                            <!--chilLeftNav/-->
						</li>
						@endforeach
                    </ul>
                    <!--InPorNav/--></div>
                <!--pntLeft/-->
                <div class="pntRight">
                    <ul class="nav">
                        <li class="navCur">
                            <a href="index.html">商城首页</a></li>
                        <li>
                            <a href="product.html">促销中心</a></li>
                        <li>
                            <a href="login.html">会员中心</a></li>
                        <li>
                            <a href="help.html">帮助中心</a></li>
                        <div class="clears"></div>
					</ul>
                    <!--nav/-->
                    <div class="banner">
                        <div id="kinMaxShow">
							@foreach($lunbo as $v)
                            <div>
                                <a href="{{$v['url']}}">
                                    <img src="{{$v['pic']}}" height="360" />
								</a>
                            </div>
                            @endforeach
                        </div>
                        <!--kinMaxShow/--></div>
                    <!--banner/--></div>
                <!--pntRight/-->
                <div class="clears"></div>
            </div>
            <!--pnt/-->
            <div class="rdPro">
                <div class="rdLeft">
                    <ul class="rdList">
                        <li>推荐产品</li>
                        <li>热销产品</li>
                        <div class="clears"></div>
                    </ul>
                    <!--rdList/-->
                    <div class="rdProBox">
						@foreach($tui as $v)
                        <dl>
                            <dt>
                                <a href="/home/goods/{{$v['id']}}" class="clicknum" data-id="{{$v['id']}}">
                                    <img src="{{$v['pic']}}" width="132" height="129" /></a>
                            </dt>
                            <dd>{{substr($v['name'], 0, 31)}}</dd>
                            <dd class="cheng">￥{{$v['price']}}</dd>
						</dl>
						@endforeach
                       <div class="clears"></div>
                    </div>
                    <!--rdPro/-->
                    <div class="rdProBox">
						@foreach($hot as $v)
						<dl>
							<dt>
								<a href="/home/goods/{{$v['id']}}" class="clicknum" data-id="{{$v['id']}}">
									<img src="{{$v['pic']}}" width="132" height="129" /></a>
							</dt>
							<dd>{{substr($v['name'], 0, 31)}}</dd>
							<dd class="cheng">￥{{$v['price']}}</dd>
						</dl>
						@endforeach
                        <div class="clears"></div>
                    </div>
                    <!--rdPro/--></div>
                <!--rdLeft/-->
                <div class="rdRight">
                    <img src="/lib/image/rdRight.jpg" width="221" height="254" />
				</div>
                <!--rdRight/-->
                <div class="clears"></div>
            </div>
            <!--rdPro/-->
            <div class="hengfu">
                <img src="/lib/image/hengfu1.jpg" width="979" height="97" /></div>
            <!--hengfu/-->
			
            <div class="floor" id="floor1">
                <h3 class="floorTitle">1F&nbsp;&nbsp;&nbsp;&nbsp;{{$data[0]['fu']['name']}}系列
                    <a href="/home/cate/{{$data[0]['fu']['id']}}" class="more">更多 &gt;</a></h3>
                <div class="floorBox">
                    <div class="floorLeft">
                        <ul class="flList">
							@foreach($data[0]['er'] as $v)
                            <li>{{$v['name']}}</li>
                            <li>
                                <a href="/home/cate/{{$v['id']}}">更多&gt;&gt;</a>
							</li>
							@endforeach
                            <div class="clears"></div>
                        </ul>
                        <!--flList/-->
                        <div class="flImg">
                            <img src="/lib/image/flListimg.jpg" width="198" height="290" /></div>
                    </div>
                    <!--floorLeft/-->
						<div class="floorRight">
							<div class="frProList">
								@foreach($data[0]['goods'] as $v)
								<dl>
									<dt>
										<a href="/home/goods/{{$v['id']}}" class="clicknum" data-id="{{$v['id']}}">
											<img src="{{$v['pic']}}" width="132" height="129" />
										</a>
									</dt>
									<dd>{{substr($v['name'], 0, 30)}}</dd>
									<dd class="cheng">￥{{$v['price']}}</dd>
									<dd style="float: right;">点击:{{$v['clicknum']}}</dd>
								</dl>
								@endforeach
								<div class="clears"></div>
							</div>
						</div>
                    <!--floorRight/-->
                    <div class="clears"></div>
                </div>
                <!--floorBox/--></div>
            <!--floor/-->
            <div class="hengfu">
                <img src="/lib/image/hengfu2.jpg" width="978" height="97" /></div>
            <!--hengfu/-->
            <div class="floor" id="floor2">
                <h3 class="floorTitle">2F&nbsp;&nbsp;&nbsp;&nbsp;{{$data[1]['fu']['name']}}系列
                    <a href="/home/cate/{{$data[1]['fu']['id']}}" class="more">更多 &gt;</a></h3>
                <div class="floorBox">
                    <div class="floorLeft">
                        <ul class="flList">
							@foreach($data[1]['er'] as $v)
							<li>{{$v['name']}}</li>
							@endforeach
                            <li>
                                <a href="/home/cate/{{$v['id']}}">更多&gt;&gt;</a>
							</li>
                            <div class="clears"></div>
                        </ul>
                        <!--flList/-->
                        <div class="flImg">
                            <img src="/lib/image/flListimg.jpg" width="198" height="290" />
						</div>
                    </div>
                    <!--floorLeft/-->
                    <div class="floorRight">
                        <div class="frProList">
							@foreach($data[1]['goods'] as $v)
							<dl>
								<dt>
									<a href="/home/goods/{{$v['id']}}" class="clicknum" data-id="{{$v['id']}}">
										<img src="{{$v['pic']}}" width="132" height="129" />
									</a>
								</dt>
								<dd>{{substr($v['name'], 0, 30)}}</dd>
								<dd class="cheng">￥{{$v['price']}}</dd>
								<dd style="float: right;">点击:{{$v['clicknum']}}</dd>
							</dl>
							@endforeach
							<div class="clears"></div>
                        </div>
					</div>
                    <!--floorRight/-->
                    <div class="clears"></div>
                </div>
                <!--floorBox/--></div>
            <!--floor/-->
            <div class="hengfu">
                <img src="/lib/image/hengfu1.jpg" width="978" height="97" />
			</div>
            <!--hengfu/-->
			<div class="floor" id="floor3">
				<h3 class="floorTitle">3F&nbsp;&nbsp;&nbsp;&nbsp;{{$data[2]['fu']['name']}}系列
					<a href="/home/cate/{{$data[2]['fu']['id']}}" class="more">更多 &gt;</a></h3>
				<div class="floorBox">
					<div class="floorLeft">
						<ul class="flList">
							@foreach($data[2]['er'] as $v)
								<li>{{$v['name']}}</li>
							@endforeach
							<li>
								<a href="/home/cate/{{$v['id']}}">更多&gt;&gt;</a>
							</li>
							<div class="clears"></div>
						</ul>
						<!--flList/-->
						<div class="flImg">
							<img src="/lib/image/flListimg.jpg" width="198" height="290" /></div>
					</div>
					<!--floorLeft/-->
					<div class="floorRight">
						<div class="frProList">
							@foreach($data[2]['goods'] as $v)
							<dl>
								<dt>
									<a href="/home/goods/{{$v['id']}}" class="clicknum" data-id="{{$v['id']}}">
										<img src="{{$v['pic']}}" width="132" height="129" />
									</a>
								</dt>
								<dd>{{substr($v['name'], 0, 32)}}</dd>
								<dd class="cheng">￥{{$v['price']}}</dd>
								<dd style="float: right;">点击:{{$v['clicknum']}}</dd>
							</dl>
							@endforeach
							<div class="clears"></div>
						</div>
					</div>
					<!--floorRight/-->
					<div class="clears"></div>
				</div>
                <!--floorBox/-->
			</div>
			
			<div class="hengfu">
			    <img src="/lib/image/hengfu1.jpg" width="978" height="97" />
			</div>
			
			
            
            <div class="inHelp">
                <div class="inHLeft">
                    <h4>帮助中心</h4>
                    <ul class="inHeList">
                        <li>
                            <a href="help.html">购物指南</a></li>
                        <li>
                            <a href="help.html">支付方式</a></li>
                        <li>
                            <a href="help.html">售后服务</a></li>
                        <li>
                            <a href="about.html">企业简介</a></li>
                        <div class="clears"></div>
                    </ul>
                    <!--inHeList/--></div>
                <!--inHLeft/-->
                <div class="inHLeft">
                    <h4>会员服务</h4>
                    <ul class="inHeList">
                        <li>
                            <a href="reg.html">会员注册</a></li>
                        <li>
                            <a href="login.html">会员登录</a></li>
                        <li>
                            <a href="order.html">购物车</a></li>
                        <li>
                            <a href="order.html">我的订单</a></li>
                        <div class="clears"></div>
                    </ul>
                    <!--inHeList/--></div>
                <!--inHLeft/-->
                <div class="inHRight">
                    <h4>全国统一免费服务热线</h4>
                    <div class="telBox">400-0000-0000</div>
                    <div class="weibo">
                        <wb:follow-button uid="2991975565" type="red_1" width="67" height="24"></wb:follow-button>
                    </div>
                </div>
                <!--inHRight/-->
                <div class="clears"></div>
            </div>
            <!--inHelp/-->
            <div class="footer">
                <p>
                    <a href="#">进入17官网</a>&nbsp;|&nbsp;
                    <a href="index.html">商城首页</a>&nbsp;|&nbsp;
                    <a href="product.html">促销中心</a>&nbsp;|&nbsp;
                    <a href="order.html">我的订单</a>&nbsp;|&nbsp;
                    <a href="new.html">新闻动态</a>&nbsp;|&nbsp;
                    <a href="login.html">会员中心</a>&nbsp;|&nbsp;
                    <a href="help.htmll">帮助中心</a>
				</p>
            </div>
            <!--footer/--></div>
        <!--mianCont/-->
        <a href="#" class="backTop">&nbsp;</a>
		
	<script>
		$('.clicknum').click(function(){
			var id = $(this).data('id');
			$.ajax({
				url: '/home/clicknum',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					id : id,
				},
				
			})
		});
	</script>	
	</body>
</html>

