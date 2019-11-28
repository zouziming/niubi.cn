<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
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
	<script src="/layer/layer.js"></script>
	<title>U袋网</title>
</head>
<body>
	<!-- 顶部tab -->
	<div class="tab-header">
		<div class="inner">
			<div class="pull-left">
				@empty(SESSION('userInfo'))
				<span>您好！欢迎来到17商城 请</span>
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
				<a href="javascript:void(0)">我的订单</a>
				<a href="udai_integral.html">积分平台</a>
				@endempty
			</div>
		</div>
	</div>
	<!-- 顶部标题 -->
	<div class="bgf5 clearfix">
		<div class="top-user">
			<div class="inner">
				<a class="logo" href="/home"><img src="/lib/shopcar/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
				<div class="title">购物车</div>
			</div>
		</div>
	</div>
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				<div class="shop-title">收货地址</div>
				<form onsubmit="return false" class="shopcart-form__box">
					<div class="addr-radio">
						@foreach($address as $v)
							@if($v['status'] == 1)
							<div class="radio-line radio-box active" data-id="{{$v['id']}}">
								<label class="radio-label ep" title="{{$v['add_id']}} {{$v['address']}} （{{$v['consignee']}} 收） {{$v['phone']}}">
									<input name="addr" checked value="0" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
									{{$v['add_id']}}
									{{$v['address']}}
									（{{$v['consignee']}} 收） {{$v['phone']}}
								</label>
								
								<a href="javascript:;" class="default">默认地址</a>
								<a href="/home/addressEdit?id={{$v['id']}}" class="edit">修改</a>
							</div>
							@endif
						@endforeach
						@foreach($address as $v)
							@if($v['status'] == 2)
							<div class="radio-line radio-box" data-id="{{$v['id']}}">
								<label class="radio-label ep" title="{{$v['add_id']}} {{$v['address']}} （{{$v['consignee']}} 收） {{$v['phone']}}">
									<input name="addr" value="0" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
									{{$v['add_id']}}
									{{$v['address']}}
									（{{$v['consignee']}} 收） {{$v['phone']}}
								</label>
								<a href="/home/addressEdit?id={{$v['id']}}" class="edit">修改</a>
							</div>
							@endif
						@endforeach
					</div>
					<div class="add_addr"><a href="/home/addressIndex">添加新地址</a></div>
					<div class="shop-title">确认订单</div>
					<div class="shop-order__detail">
						<table class="table">
							<thead>
								<tr>
									<th width="120"></th>
									<th width="300">商品信息</th>
									<th width="150">单价</th>
									<th width="200">数量</th>
									<th width="200">运费</th>
									<th width="80">总价</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $v)
								<tr class="datas" data-id="{{$v['id']}}">
									<th scope="row">
										<a href="/home/goods/{{$v['gid']}}">
											<div class="img"><img src="{{$v['goods_img']}}" alt="" class="cover"></div>
										</a>
									</th>
									<td>
										<div class="name ep3">{{$v['goods_name']}}</div>
										<div class="type c9">规格：
										@foreach($v['goods_specs'] as $vv)
											{{$vv}} &nbsp;
										@endforeach
										</div>
									</td>
									<td>¥{{$v['goods_price']}}</td>
									<td>{{$v['goods_num']}}</td>
									<td>¥0.0</td>
									<td>¥<span class="prices">{{$v['goods_price'] * $v['goods_num']}}</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="shop-cart__info clearfix">
						<div class="pull-left text-left">
							<div class="info-line text-nowrap">购买时间：<span class="c6">{{date('Y-m-d H:i:s', time()+31130)}}</span></div>
							<div class="info-line text-nowrap">交易类型：<span class="c6">担保交易</span></div>
							<div class="info-line text-nowrap">交易号：<span class="c6">1001001830267490496</span></div>
						</div>
						<div class="pull-right text-right">
							
							
							<div class="info-line">优惠活动：<span class="c6">无</span></div>
							<div class="info-line">运费：<span class="c6">¥0.00</span></div>
							<div class="info-line"><span class="favour-value">已优惠 ¥0.0</span>合计：<b class="fz18 cr">¥<span id="price"></span></b></div>
							<div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div>
						</div>
					</div>
					
					<div class="user-form-group shopcart-submit">
						<button type="submit" class="btn">继续支付</button>
					</div>
					
				</form>
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
		$('#coupon').bind('change',function() {
			console.log($(this).val());
		})
	
		$(document).ready(function(){
			$(this).on('change','input',function() {
				$(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
			})
		});
	
		$(document).ready(function(){ $('.to-top').toTop({position:false}) });
	</script>
	<script>
		$(document).ready(function(){
			var price = 0
			$('.prices').each(function(){
				price += Number($(this).html())
			})
			$('#price').html(price)
			$('.fz17').html(price)
		})
		
		$('.btn').click(function(){
			var address = $('.active').data('id');
			var total = $('#price').html();
			var detail = [];
			// console.dir($('.datas'))
			// console.dir(total)
			$('.datas').each(function(index, item){
				detail.push($(item).data('id'))

			})
			// console.dir(detail)
			$.ajax({
				url: '/home/shopcar/orders',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					address : address,
					total : total,
					detail : detail,
				},
				success:function(res){
					if (res.code == 0) {
						layer.msg(res.msg)
						setTimeout(function(){
							location.href = '/home/shopcar/pyjy?id='+res.oid
						}, 1000);
					} else {
						layer.msg(res.msg)
					}
				}
			})
		})
	</script>
</body>
</html>