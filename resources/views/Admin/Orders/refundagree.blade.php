<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="/lib/layer/theme/default/layer.css">
	<link rel="stylesheet" href="/lib/libs/layui/css/layui.css">
	<!-- <link rel="stylesheet" href="/lib/libs/xadmin.css"> -->
	<script type="text/javascript" src="/lib/libs/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="/lib/libs/xadmin.js"></script> -->
	<script type="text/javascript" src="/lib/libs/layui/layui.js"></script>
	<script type="text/javascript" src="/lib/libs/layui/lay/modules/layer.js"></script>
</head>
<body>
	<h1 style="text-align: center;">退货</h1>
	<form class="layui-form" name="traderefund" action="/admin/pagepay/refund" method="post" target="_blank">
		{{ csrf_field() }}
		<div id="body3" class="tab-content" name="divcontent">
			<div class="layui-form-item">
				<label class="layui-form-label">商户订单号：</label>
				<div class="layui-input-block">
					<input readonly type="text" name="WIDTRout_trade_no" autocomplete="off" class="layui-input" value="{{$data['order_num']}}">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">支付宝交易号：</label>
				<div class="layui-input-block">
					<input readonly type="text" name="WIDTRtrade_no" autocomplete="off" class="layui-input" value="{{$data['trade_no']}}">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">退款金额：</label>
				<div class="layui-input-block">
					<input readonly type="text" name="WIDTRrefund_amount" autocomplete="off" class="layui-input" value="{{$data['total']}}">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">退款原因：</label>
				<div class="layui-input-block">
					<input type="text" name="WIDTRrefund_reason" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">退款请求号：</label>
				<div class="layui-input-block">
					<input type="text" name="WIDTRout_request_no" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
					
				</div>
			</div>
	  </div>
	</form>
	 <a style="position: relative;left: 260px;top:-53px;" class="layui-btn" href="/admin/order/refund">返回</a>
</body>
</html>
