<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="/lib/site/css/iconfont.css">
	<link rel="stylesheet" href="/lib/site/css/global.css">
	<link rel="stylesheet" href="/lib/site/css/bootstrap.min.css">
	<link rel="stylesheet" href="/lib/site/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/lib/site/css/swiper.min.css">
	<link rel="stylesheet" href="/lib/site/css/styles.css">
	<script src="/lib/site/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="/lib/site/js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="/lib/site/js/swiper.min.js" charset="UTF-8"></script>
	<script src="/lib/site/js/global.js" charset="UTF-8"></script>
	<!-- <script src="/lib/site/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script> -->
	<title>U袋网</title>
</head>
<body>
	<!-- 顶部tab -->
	<div class="tab-header">
		<div class="inner">
			<div class="pull-left">
				<div class="pull-left">嗨，欢迎来到<span class="cr">U袋网</span></div>
				<a href="agent_level.html">网店代销</a>
				<a href="temp_article/udai_article4.html">帮助中心</a>
			</div>
			<div class="pull-right">
				<a href="login.html"><span class="cr">登录</span></a>
				<a href="login.html?p=register">注册</a>
				<a href="udai_welcome.html">我的U袋</a>
				<a href="udai_order.html">我的订单</a>
				<a href="udai_integral.html">积分平台</a>
			</div>
		</div>
	</div>
	<!-- 顶部标题 -->
	<div class="bgf5 clearfix">
		<div class="top-user">
			<div class="inner">
				<a class="logo" href="index.html"><img src="/lib/site/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
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
					<a href="udai_address.html"><dd class="active">收货地址</dd></a>
					<a href="udai_coupon.html"><dd>我的优惠券</dd></a>
					<a href="udai_paypwd_modify.html"><dd>修改支付密码</dd></a>
					<a href="udai_pwd_modify.html"><dd>修改登录密码</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>订单中心</dt>
					<a href="udai_order.html"><dd>我的订单</dd></a>
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
					<div class="title">账户信息-添加收货地址</div>
					<form action="/home/addressIndex" method="post" class="user-addr__form form-horizontal" role="form">
						{{csrf_field()}}
						<p class="fz18 cr">添加收货地址<span class="c6" style="margin-left: 20px">电话号码、手机号码选填一项，其余均为必填项</span></p>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">收货人姓名：</label>
							<div class="col-sm-6">
								<input class="form-control" id="name" name="consignee" placeholder="请输入姓名" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="details" class="col-sm-2 control-label">收货地址：</label>
							<div class="col-sm-10">
								<div class="addr-linkage">
									<select name="province"></select>
									<select name="city"></select>
									<select name="area"></select>
									<select name="town"></select>
								</div>
								<input class="form-control" name="address" id="details" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码等信息" maxlength="30" type="text">
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="code" class="col-sm-2 control-label">地区编码：</label>
							<div class="col-sm-6">
								<input class="form-control" id="code" placeholder="请输入邮政编码" type="text">
							</div>
						</div> -->
						<div class="form-group">
							<label for="mobile" class="col-sm-2 control-label">手机号码：</label>
							<div class="col-sm-6">
								<input class="form-control" name="phone" id="mobile"  placeholder="请输入手机号码" type="text">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
								<div class="checkbox">
									<label><input type="checkbox" name="status" value="1" checked><i></i> 设为默认收货地址</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
								<button type="submit" class="but">保存</button>
							</div>
						</div>
						<script src="/lib/site/js/jquery.citys.js"></script>
						<script>
							$(document).ready(function(){
								// 添加街道/乡镇
								function townFormat(info){
									// console.dir(info);
									$('.addr-linkage select[name="town"]').hide().empty();
									if (info['code'] % 1e4 && info['code'] < 7e6){	//是否为“区”且不是港澳台地区
										var ajaxConfig = {
											url: 'http://passer-by.com/data_location/town/' + info['code'] + '.json',
											scriptCharset:'UTF-8',
											dataType: "/lib/site/json",
											timeout: 4000,
											success: function(data) {
												$('.addr-linkage select[name="town"]').show();
												// $('#code').val(info['code']) // 填地区编码
												for (i in data) {
													$('.addr-linkage select[name="town"]').append(
														'<option value="' + data[i] + '">' + data[i] + '</option>'
													);
												};
												$('.addr-linkage select[name="town"]').find('option[value="洪山镇"]').prop("selected", "selected");
											},
										};
										$.ajax(ajaxConfig).fail(function(p1,p2,p3){
											ajaxConfig.url = 'js/data_location/town/' + info['code'] + '.json';
											$.ajax(ajaxConfig)
										});
									}
								};
								$('.addr-linkage').citys({
									// 如果某天这个仓库地址失效了dataUrl请使用本地 2017.10 的数据 'js/data_location/list.json'
									dataUrl: 'http://passer-by.com/data_location/list.json',
									spareUrl: 'js/data_location/list.json',
									dataType: 'json',
									valueType: 'name',
									// province: '福建省',
									// city:'福州市',
									// area: '鼓楼区',
									onChange: function(data) {
										townFormat(data)
									},
								},function(api){
									var info = api.getInfo();
									townFormat(info);
								});
							}); 
						</script>
					</form>
					<p class="fz18 cr">已保存的有效地址</p>

					<div class="table-thead addr-thead">
						<div class="tdf1">收货人</div>
						<div class="tdf2">所在地</div>
						<div class="tdf3"><div class="tdt-a_l">详细地址</div></div>
						<!-- <div class="tdf1">邮编</div> -->
						<div class="tdf1">电话/手机</div>
						<div class="tdf1">操作</div>
						<div class="tdf1"></div>
					</div>
					<div class="addr-list">
						@foreach($data as $v)
						<div class="addr-item">
							<div class="tdf1">{{$v->consignee}}</div>
							<div class="tdf2 tdt-a_l">{{$v->add_id}}</div>
							<div class="tdf3 tdt-a_l">{{$v->address}}</div>
							<!-- <div class="tdf1">350111</div> -->
							<div class="tdf1">{{$v->phone}}</div>
							<div class="tdf1 order">
								<a href="/home/addressEdit?id={{$v->id}}">修改</a><a href="/home/ressDel?id={{$v->id}}">删除</a>
							</div>
							<div class="tdf1">
								<a href="/home/editDefault?id={{$v->id}}" class="default 

								@if($v->status==1)
								active
								@endif
								">默认地址</a>
							</div>
						</div>
						@endforeach
						
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
					<img src="/lib/site/images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img src="/lib/site/images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img src="/lib/site/images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img src="/lib/site/images/icons/footer_4.gif" alt="信誉认证">
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
				ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
			</p>
		</div>
	</div>
	
</body>
</html>