<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="shortcut icon" href="/lib/shopcar/favicon.ico"> -->
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
	<script src="/lib/layer/layer.js"></script>
	<title>sb网</title>
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
				<a href="/ShowOrders">我的订单</a>
				@endempty
			</div>
		</div>
	</div>
	<!-- 顶部标题 -->
	<div class="bgf5 clearfix">
		<div class="top-user">
			<div class="inner">
				<a class="logo" href="/home"><img src="/lib/images/01.jpg" alt="sb网" class="cover"></a>
				<div class="title">购物车</div>
			</div>
		</div>
	</div>
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车</div>
				<form onsubmit="return false" class="shopcart-form__box">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="200">商品图片</th>
								<th width="350">商品信息</th>
								<th width="200">单价</th>
								<th width="200">数量</th>
								<th width="130">操作</th>
							</tr>
						</thead>
						<tbody id="bodys">
							@foreach($data as $v)
							<tr>
								<th scope="row">
									<label class="checked-label"><input type="checkbox" class="xuan" data-id="{{$v['id']}}"><i></i>
										<div class="img"><img src="{{$v['goods_img']}}" alt="" class="cover" style="height: 185px;"></div>
									</label>
								</th>
								<td style="padding-bottom: 8px; position: relative;">
									<div class="name ep3" >{{$v['goods_name']}}</div>
									<div class="type c9" style="position:absolute;bottom: 30px;left: 20px;">规格：
									@foreach($v['goods_specs'] as $vv)
										{{$vv}} &nbsp;
									@endforeach
									</div>
								</td>
								<td style="line-height: 180px;" class="price">¥<span>{{$v['goods_price']}}</span></td>
								<td>
									<div class="cart-num__box">
										<input readonly type="button" class="sub jian" value="-"  data-id="{{$v['id']}}">
										<input type="text" class="val ipts" value="{{$v['goods_num']}}" maxlength="2" data-id="{{$v['id']}}">
										<input readonly type="button" class="add jia" value="+" data-id="{{$v['id']}}">
									</div>
								</td>
								<td style="line-height: 180px;"><a href="javascript:void(0)" class="del" data-id="{{$v['id']}}">删除</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="user-form-group tags-box shopcart-submit pull-right">
						<button type="submit" class="btn">提交订单</button>
					</div>
					<div class="checkbox shopcart-total">
						<a href="javascript:void(0)" style="font-size: 10px;" id="alldel">清空购物车</a>
						<div class="pull-right" id="pull-right-n">
							已选商品 <span class="fz23">0</span> 件
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费）
							<b class="cr">¥&nbsp;<span class="fz24">0</span></b>
						</div>
					</div>
					
				</form>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="/home/user/mycenter" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/home/shopcar" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/home/collection" class="r-item-hd">
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
				<a href="#" class="r-item-hd">
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
				<a href="#l"><dd>企业简介</dd></a>
				<a href="#l"><dd>加入U袋</dd></a>
				<a href="#l"><dd>隐私说明</dd></a>
			</dl>
			<dl>
				<dt>服务中心</dt>
				<a href="#"><dd>售后服务</dd></a>
				<a href="#"><dd>配送服务</dd></a>
				<a href="#"><dd>用户协议</dd></a>
				<a href="#"><dd>常见问题</dd></a>
			</dl>
			<dl>
				<dt>新手上路</dt>
				<a href="#"><dd>如何成为代理商</dd></a>
				<a href="#"><dd>代销商上架教程</dd></a>
				<a href="#"><dd>分销商常见问题</dd></a>
				<a href="#"><dd>付款账户</dd></a>
			</dl>
		</div>
		<div class="copy-box clearfix">
			<ul class="copy-links">
				<a href="#"><li>网店代销</li></a>
				<a href="#"><li>U袋学堂</li></a>
				<a href="#"><li>联系我们</li></a>
				<a href="#"><li>企业简介</li></a>
				<a href="#"><li>新手上路</li></a>
			</ul>
			<!-- 版权 -->
			<p class="copyright">
				© 2005-2017 U袋网 版权所有，并保留所有权利<br>
				ICP备案证书号：闽ICP备16015525
			</p>
		</div>
	</div>
	<script>
		$(document).ready(function(){ $('.to-top').toTop({position:false}) });
	</script>
	<script>
		$(document).ready(function(){
			var $item_checkboxs = $('.shopcart-form__box tbody input[type="checkbox"]'),
				$check_all = $('.check-all');
			// 全选
			$check_all.on('change', function() {
				$check_all.prop('checked', $(this).prop('checked'));
				$item_checkboxs.prop('checked', $(this).prop('checked'));
			});
			// 点击选择
			$item_checkboxs.on('change', function() {
				var flag = true;
				$item_checkboxs.each(function() {
					if (!$(this).prop('checked')) { flag = false }
				});
				$check_all.prop('checked', flag);
			});
			// 个数限制输入数字
			$('input.val').onlyReg({reg: /[^0-9.]/g});
			// 加减个数
			$('.cart-num__box').on('click', '.sub,.add', function() {
				var value = parseInt($(this).siblings('.val').val());
				if ($(this).hasClass('add')) {
					$(this).siblings('.val').val(Math.min((value += 1),99));
				} else {
					$(this).siblings('.val').val(Math.max((value -= 1),1));
				}
			});
		});
	</script>
	<script>
		function isemptys()
		{
			if ($('#bodys').children().length == 0) {
				$('#bodys').html('<tr><th colspan="5">购物车是空的，请滚去<a href="/home" style="color:red">购物</a></th></tr>')
			}
		}
		
		function total()
		{
			var nums = 0;
			var prices = 0;
			$('input.xuan:checked').each(function(){

				nums += Number($(this.parentElement.parentElement.parentElement).children().eq(3).children().eq(0).children().eq(1).val());
		
				prices += Number($(this.parentElement.parentElement.parentElement).children().eq(3).children().eq(0).children().eq(1).val()) * Number($(this.parentElement.parentElement.parentElement).children().eq(2).children().eq(0).html() * 100);
			})
			// console.dir(prices / 100)
			// console.dir(nums)
			$('#pull-right-n span.fz23').html(nums)
			$('#pull-right-n span.fz24').html(prices /100)
		}
				
		$(document).ready(function(){
			isemptys();
		})
		
		$('.jian').click(function(){
			// console.dir(id)
			var num = ($(this.parentElement).children().eq(1).val())-1
			var id = $(this).data('id')
			var _this = this
			$.ajax({
				url: '/home/shopcar/jian',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					num : num,
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						layer.msg(res.msg)
						total()
					} else if (res.code == 1) {
						$(_this.parentElement).children().eq(1).val(res.num)
						layer.msg(res.msg)
						total()
					}
				}
			})
		})
		
		$('.jia').click(function(){
			var num = Number($(this.parentElement).children().eq(1).val())+1
			var id = $(this).data('id')
			var _this = this
			// console.dir($(_this.parentElement).children().eq(1))
			$.ajax({
				url: '/home/shopcar/jia',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					num : num,
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						layer.msg(res.msg)
						total()
					} else if (res.code == 1) {
						$(_this.parentElement).children().eq(1).val(res.num)
						layer.msg(res.msg)
						total()
					}
				}
			})
		})
		
		$('.ipts').blur(function(){
			var _this = this
			var num = Number($(this.parentElement).children().eq(1).val())
			var id = $(this).data('id')
			console.dir(id)
			$.ajax({
				url: '/home/shopcar/ipt',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					num : num,
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						layer.msg(res.msg)
						total()
					} else if (res.code == 1) {
						$(_this.parentElement).children().eq(1).val(res.num)
						layer.msg(res.msg)
						total()
					}
				}
			})
		})
		
		$('.del').click(function(){
			var id = $(this).data('id')
			var _this = $(this.parentElement.parentElement)
			// console.dir(id)
			$.ajax({
				url: '/home/shopcar/del',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						_this.remove()
						layer.msg(res.msg)
						isemptys()
						total()
					} else {
						layer.msg(res.msg)
					}
				}
			})
		})
		
		$('#alldel').click(function(){
			var id = {{session('userInfo.id')}}
			var _this = $(this.parentElement.parentElement).children().eq(0).children().eq(1)
			
			// console.dir(_this)
			$.ajax({
				url: '/home/shopcar/alldel',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						_this.empty()
						layer.msg(res.msg)
						isemptys()
						total()
					} else {
						layer.msg(res.msg)
					}
				}
			})
		})
		
		$('.checked-label').on('click', 'input.xuan', function(){
			total()
		})
		
		$('.btn').click(function(){
			var uid = {{session('userInfo.id')}}
			var id = [];
			$('input.xuan:checked').each(function(){
				id.push($(this).data('id'))
			})
			$.ajax({
				url: '/home/shopcar/btn',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					uid : uid,
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						// console.dir(id)
						location.href = '/home/shopcar/pay'
					} else {
						layer.msg(res.msg)
					}
				}
			})
		})
	</script>
</body>
</html>