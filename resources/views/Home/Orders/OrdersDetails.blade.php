<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="/lib/shopcar/css/iconfont.css">
	<link rel="stylesheet" href="/lib/shopcar/css/global.css">
	<link rel="stylesheet" href="/lib/shopcar/css/bootstrap.min.css">
	<link rel="stylesheet" href="/lib/shopcar/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/lib/shopcar/css/swiper.min.css">
	<link rel="stylesheet" href="/lib/shopcar/css/styles.css">
	<script src="/lib/shopcar/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="/lib/shopcar/js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="/lib/shopcar/js/swiper.min.js" charset="UTF-8"></script>
	<script src="/lib/shopcar/js/global.js" charset="UTF-8"></script>
	<script src="/lib/shopcar/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script>
	<title>U袋网</title>
</head>
<body>
	<!-- 顶部tab -->
	<div class="tab-header">
		<div class="inner">
			<div class="pull-left">
				@empty(SESSION('userInfo'))
				<span>您好！欢迎来到sb商城 请</span>
				<span>
				<a href="/home/login">[登录]</a>
				</span>
				<span>&nbsp;<a href="/home/register">[注册]</a></span>
				@else
				<span>欢迎您：</span>
				<a style="color:violet;text-decoration: none;">{{ session('userInfo.username') }}&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<a href="/home/logout" style="color:red;text-decoration: none;">退出&nbsp;&nbsp;&nbsp;&nbsp;</a>
				@endempty
			</div>
			<div class="pull-right">
				@empty(!SESSION('userInfo'))
				<a href="/home/collection">我的收藏</a>
				<a href="/home/shopcar">我的购物车</a>
				<a href="/ShowOrders">我的订单</a>
				<a href="udai_integral.html">积分平台</a>
				@endempty
			</div>
		</div>
	</div>
	<!-- 顶部标题 -->
	<div class="bgf5 clearfix">
		<div class="top-user">
			<div class="inner">
				<a class="logo" href="index.html"><img src="/lib/shopcar/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
				<div class="title">个人中心</div>
			</div>
		</div>
	</div>
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="pull-left bgf">
				<a href="udai_welcome.html" class="title">U袋欢迎页</a>
				<dl class="user-center__nav">
					<dt>帐户信息</dt>
					<a href="udai_setting.html"><dd>个人资料</dd></a>
					<a href="udai_treasurer.html"><dd>资金管理</dd></a>
					<a href="udai_integral.html"><dd>积分平台</dd></a>
					<a href="udai_address.html"><dd>收货地址</dd></a>
					<a href="udai_coupon.html"><dd>我的优惠券</dd></a>
					<a href="udai_paypwd_modify.html"><dd>修改支付密码</dd></a>
					<a href="udai_pwd_modify.html"><dd>修改登录密码</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>订单中心</dt>
					<a href="udai_order.html"><dd class="active">我的订单</dd></a>
					<a href="udai_collection.html"><dd>我的收藏</dd></a>
					<a href="udai_refund.html"><dd>退款/退货</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>服务中心</dt>
					<a href="udai_mail_query.html"><dd>物流查询</dd></a>
					<a href=""><dd>数据自助下载</dd></a>
					<a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
					<a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
					<a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
					<a href="temp_article/udai_article4.html"><dd>常见问题</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>新手上路</dt>
					<a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
					<a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
					<a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
					<a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>U袋网</dt>
					<a href="temp_article/udai_article10.html"><dd>企业简介</dd></a>
					<a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a>
					<a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a>
				</dl>
			</div>
			<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">订单中心-订单{{$order[0]['order_num']}}
						<a style="text-decoration: none;" href="/ShowOrders">返回订单</a>
					</div>
					
					<div class="order-info__box">
						<div class="order-addr">收货人：
							<span class="c6">{{$order[0]['getman']}}</span>
						</div>
						<div class="order-addr">收货电话：
							<span class="c6">{{$order[0]['phone']}}</span>
						</div>
						<div class="order-addr">收货地址：
							<span class="c6">{{$order[0]['address']}}</span>
						</div>
						<div class="order-info">
							订单信息
							<table>
								<tr>
									<td>订单编号：{{$order[0]['order_num']}}</td>
									<td>创建时间：{{$order[0]['addtime']}}</td>
								</tr>
								
							</table>
						</div>
						@if($order[0]['status'] != 4)
						<div class="table-thead">
							<div class="tdf3">商品</div>
							<div class="tdf1">数量</div>
							<div class="tdf1">单价</div>
							<div class="tdf2">优惠</div>
							<div class="tdf1">总价</div>
							<div class="tdf1">运费</div>
						</div>
						<div class="order-item__list">
							@foreach($detail as $v)
							<div class="item">
								<div class="tdf3">
									<a href="item_show.html">
										<div class="img"><img src="{{$v['pic']}}" alt="" class="cover"></div>
										<div class="ep2 c6">{{$v['gname']}}</div>
									</a>
									<div class="attr ep">规格：{{$v['specs']}}</div>
								</div>
								<div class="tdf1">{{$v['num']}}</div>
								<div class="tdf1">¥{{$v['price']}}</div>
								<div class="tdf2">
									<div class="ep2">活动99折优惠<br>优惠：¥0</div>
								</div>
								<div class="tdf1">¥{{$v['num'] * $v['price']}}</div>
								<div class="tdf1">
									<div class="ep2">快递<br>¥0.00</div>
								</div>
							</div>
							@endforeach
						</div>
						@else
						<div class="table-thead">
							<div class="tdf3">商品</div>
							<div class="tdf1">数量</div>
							<div class="tdf1">单价</div>
							<div class="tdf2">优惠</div>
							<div class="tdf1">总价</div>
							<div class="tdf1">运费</div>
							<div class="tdf1">评价</div>
						</div>
						<div class="order-item__list">
							@foreach($detail as $v)
							<div class="item">
								<div class="tdf3">
									<a href="item_show.html">
										<div class="img"><img src="{{$v['pic']}}" alt="" class="cover"></div>
										<div class="ep2 c6">{{$v['gname']}}</div>
									</a>
									<div class="attr ep">规格：{{$v['specs']}}</div>
								</div>
								<div class="tdf1">{{$v['num']}}</div>
								<div class="tdf1">¥{{$v['price']}}</div>
								<div class="tdf2">
									<div class="ep2">活动99折优惠<br>优惠：¥0</div>
								</div>
								<div class="tdf1">¥{{$v['num'] * $v['price']}}</div>
								<div class="tdf1">
									<div class="ep2">快递<br>¥0.00</div>
								</div>
								<div class="tdf1">
									<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
										评价
									</button>
									<!-- 添加模态框 -->
									    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									        <div class="modal-dialog">
									            <div class="modal-content">
									                <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="bi">
														&times;
													</button>
													<h4 class="modal-title" id="myModalLabel">
														评论
													</h4>
									                </div>
									                <div class="modal-body">
									                    <div class="form-group" style="margin-top: 20px;">
									                    <label for="firstname" class="col-sm-2 control-label" style="margin-top:5px;width:120px;">内容：</label>
									                    <input id="content" type="text" class="form-control" placeholder="评论" style="width:75%;">
									                    </div>
									                    <div class="form-group">
									                        <div id="errors" style="display:none;text-align:center;color:red;" role="alert"></div>
									                    </div>
									                </div>
									                <div class="modal-footer">
									                    <button type="button" class="btn btn-default" data-dismiss="modal" id="guan">关闭
									                    </button>
									                    <button type="button" class="btn btn-primary" id="bton">提交更改</button>
									                </div>
									            </div>
									        </div>
									    </div>
								</div>
							</div>
							@endforeach
						</div>
						@endif
						<div class="price-total">
							<div class="fz12 c9">使用优惠券【满￥20.0减￥0】优惠￥0元<br>快递运费 ￥0.0</div>
							<div class="fz18 c6">实付款：<b class="cr">¥{{$v['num'] * $v['price']}}</b></div>
							<div class="fz12 c9">（本单可获 <span class="c6">380</span> 积分）</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="udai_welcome.html" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_shopcart.html" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_collection.html" class="r-item-hd">
					<i class="iconfont icon-aixin"></i>
					<div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="" class="r-item-hd">
					<i class="iconfont icon-liaotian"></i>
					<div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="issues.html" class="r-item-hd">
					<i class="iconfont icon-liuyan"></i>
					<div class="r-tip__box"><span class="r-tip-text">留言反馈</span></div>
				</a>
			</li>
			<li class="r-toolbar-item to-top">
				<i class="iconfont icon-top"></i>
				<div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
			</li>
		</ul>
		<script>
			$(document).ready(function(){ $('.to-top').toTop({position:false}) });
		</script>
	</div>
	<!-- 底部信息 -->
	<div class="footer">
		<div class="footer-tags">
			<div class="tags-box inner">
				<div class="tag-div">
					<img src="/lib/shopcar/images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img src="/lib/shopcar/images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img src="/lib/shopcar/images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img src="/lib/shopcar/images/icons/footer_4.gif" alt="信誉认证">
				</div>
			</div>
		</div>
		<div class="footer-links inner">
			<dl>
				<dt>U袋网</dt>
				<a href="temp_article/udai_article10.html"><dd>企业简介</dd></a>
				<a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a>
				<a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a>
			</dl>
			<dl>
				<dt>服务中心</dt>
				<a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
				<a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
				<a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
				<a href="temp_article/udai_article4.html"><dd>常见问题</dd></a>
			</dl>
			<dl>
				<dt>新手上路</dt>
				<a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
				<a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
				<a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
				<a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
			</dl>
		</div>
		<div class="copy-box clearfix">
			<ul class="copy-links">
				<a href="agent_level.html"><li>网店代销</li></a>
				<a href="class_room.html"><li>U袋学堂</li></a>
				<a href="udai_about.html"><li>联系我们</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
			</ul>
			<!-- 版权 -->
			<p class="copyright">
				© 2005-2017 U袋网 版权所有，并保留所有权利<br>
				ICP备案证书号：闽ICP备16015525号-2
			</p>
		</div>
	</div>
	
	<script>
		$('#bton').click(function(){
			var content = $('#content').val()
			console.dir(content)
			// var gid = 
		})
	</script>
</body>
</html>