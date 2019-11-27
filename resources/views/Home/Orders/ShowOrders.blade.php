@extends('Home.layout.main')

@section('title','商城-订单')

@section('body')
<div class="member-head">
  <div class="member-heels fl"><h2>订单列表</h2></div>
</div>

<div class="member-whole clearfix">
  <ul id="H-table" class="H-table">
    <li class="cur"><a href="#">所有订单</a></li>
    <li><a href="#">待付款</a></li>
    <li><a href="#">待发货</a></li>
    <li><a href="#">待收货</a></li>
    <li><a href="#">待评价</a></li>
  </ul>
</div>

<!-- 所有订单开始 -->
<div class="member-border">
  <div class="member-return H-over">
    <div class="member-cancel clearfix">
      <span class="be2" style="width: 300px;">收货人</span>
      <span class="be2" style="width: 180px;">订单金额</span>
      <span class="be2" style="width: 220px;">订单时间</span>
      <span class="be2">订单状态</span>
      <span class="be2" style="width: 150px;">订单操作</span>
    </div>

<div class="member-sheet clearfix">
  <ul>
  @foreach($data as $v)
    <li>
		<div class="member-minute clearfix">
			<span>订单号：<em>{{$v['order_num']}}</em></span>
		</div>
		<div class="member-circle clearfix">
			<div class="ci2" style="width: 300px;">{{$v->getman}}</div>
			<div class="ci3" style="width: 180px;">
				<b>￥{{$v['total']}}<br></b>
			</div>

			<div class="ci4" style="width: 220px;"><p>{{$v['addtime']}}</p></div>
			<div class="ci5">
				<p>
					@if ($v->status == 1)
						等待付款
					@elseif ($v->status == 2)
						等待商家发货
					@elseif ($v->status == 3)
						等待收货
					@elseif ($v->status == 4)
						等待评价
					@endif
				</p>
				<p><a href="/home/orders/detail/{{$v['id']}}">订单详情</a></p>
			</div>
			<div class="ci5 ci8" style="width: 150px;position: relative;">
			@if ($v->status == 1)
				<p>
					<a style="position:absolute;left:17px;top:64px;" href="/home/shopcar/pyjy?id={{$v['id']}}" class="member-touch">立即支付</a>
					<a href="javascript:void(0)" class="annulla" data-id="{{$v['id']}}">取消订单</a>
					<a href="/home/order/edit/{{$v['id']}}" class="edits">修改订单</a>
				</p>
			@elseif ($v->status == 2)
				<p>
					<a style="position:absolute;left:17px;top:64px;" href="javascript:void(0)" class="member-touch tixing">提醒发货</a>
					<a href="javascript:void(0)" class="annulla" data-id="{{$v['id']}}">取消订单</a>
					<a href="/home/order/edit/{{$v['id']}}" class="edits">修改订单</a>
				</p>
			@elseif ($v->status == 3)
				<p><a style="position:absolute;left:17px;top:64px;" href="javascript:void(0)" class="member-touch queren" data-pan="1" data-id="{{$v['id']}}">确认收货</a></p>
			@elseif ($v->status == 4)
				<p>
					<a style="position:absolute;left:17px;top:64px;" href="javascript:void(0)" class="member-touch">评价商品</a>
					<a href="javascript:void(0)" class="refund" data-id="{{$v['id']}}">申请退货</a>
				</p>
			@endif
		  </div>
		</div>
    </li>
  @endforeach
  </ul>
</div>
<!-- 所有订单结束 -->
  </div>

<!-- 待付款开始 -->
<div class="member-return H-over" style="display:none;">
  <div class="member-cancel clearfix">
    <span class="be2" style="width: 300px;">收货人</span>
    <span class="be2" style="width: 180px;">订单金额</span>
    <span class="be2" style="width: 220px;">订单时间</span>
    <span class="be2">订单状态</span>
    <span class="be2" style="width: 150px;">订单操作</span>
  </div>

<div class="member-sheet clearfix">
  <ul>
  @foreach($data1 as $v)
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$v['order_num']}}</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci2" style="width: 300px;">{{$v->getman}}</div>
        <div class="ci3" style="width: 180px;">
			<b>￥{{$v->total}}</b>
		</div>
        <div class="ci4" style="width: 220px;">
			<p>{{$v->addtime}}</p>
		</div>
        <div class="ci5">
			<p>待付款</p>
			<p><a href="/home/orders/detail/{{$v['id']}}">订单详情</a></p>
		</div>
        <div class="ci5 ci8" style="width: 150px;position: relative;">
			<p><a style="position:absolute;left:17px;top:70px;" href="/home/shopcar/pyjy?id={{$v['id']}}" class="member-touch">立即支付</a></p>
			<p>
				<a href="/home/order/annulla/{{$v['id']}}" class="annulla" data-id="{{$v['id']}}">取消订单</a>
				<a href="/home/order/edit/{{$v['id']}}" class="edits">修改订单</a>
			</p>
        </div>
      </div>
    </li>
  @endforeach
  </ul>
</div>
</div>
<!-- 待付款结束 -->

<!-- 待发货开始 -->
<div class="member-return H-over" style="display:none;">
  <div class="member-cancel clearfix">
    <span class="be2" style="width: 300px;">收货人</span>
    <span class="be2" style="width: 180px;">订单金额</span>
    <span class="be2" style="width: 220px;">订单时间</span>
    <span class="be2">订单状态</span>
    <span class="be2" style="width: 150px;">订单操作</span>
  </div>
<div class="member-sheet clearfix">
  <ul>
  @foreach($data2 as $v)
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$v->order_num}}</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci2" style="width: 300px;">{{$v->getman}}</div>
        <div class="ci3" style="width: 180px;">
			<b>￥{{$v->total}}</b>
		</div> 
        <div class="ci4" style="width: 220px;">
			<p>{{$v->addtime}}</p>
		</div>
        <div class="ci5">
			<p>待发货</p>
			<p><a href="/home/orders/detail/{{$v['id']}}">订单详情</a></p>
		</div>
		<div class="ci5 ci8" style="width: 150px;position: relative;">
			<p>
				<a style="position:absolute;left:17px;top:70px;" href="javascript:void(0)" class="member-touch tixing">提醒发货</a>
				<a href="javascript:void(0)" class="annulla" data-id="{{$v['id']}}">取消订单</a>
				<a href="/home/order/edit/{{$v['id']}}" class="edits">修改订单</a>
			</p>
		</div>
		
    </li>
  @endforeach
  </ul>
</div>
</div>
<!-- 待发货结束 -->


<!-- 待收货开始 -->
<div class="member-return H-over" style="display:none;">
  <div class="member-cancel clearfix">
    <span class="be2" style="width: 300px;">收货人</span>
    <span class="be2" style="width: 180px;">订单金额</span>
    <span class="be2" style="width: 220px;">订单时间</span>
    <span class="be2">订单状态</span>
    <span class="be2" style="width: 150px;">订单操作</span>
  </div>
<div class="member-sheet clearfix">
  <ul>
  @foreach($data3 as $v)
    <li>
		<div class="member-minute clearfix">
			<span>订单号：<em>{{$v->order_num}}</em></span>
		</div>
		<div class="member-circle clearfix">
        <div class="ci2" style="width: 300px;">{{$v->getman}}</div>
        <div class="ci3" style="width: 180px;"><b>￥{{$v->total}}</b></div>
        <div class="ci4" style="width: 220px;"><p>{{$v->addtime}}</p></div>
        <div class="ci5">
			<p>待收货</p>
			<p><a href="/home/orders/detail/{{$v['id']}}">订单详情</a></p>
		</div>
        <div class="ci5 ci8" style="width: 150px;position: relative;">
			<p>
				<a style="position:absolute;left:17px;top:64px;" href="javascript:void(0)" class="member-touch queren" data-pan="2" data-id="{{$v['id']}}">确认收货</a>
			</p>
        </div>
      </div>
    </li>
  @endforeach
  </ul>
</div>                  
</div>
<!-- 待收货结束 -->

<!-- 待评价开始 -->
<div class="member-return H-over" style="display:none;">
  <div class="member-cancel clearfix">
    <span class="be2" style="width: 300px;">收货人</span>
    <span class="be2" style="width: 180px;">订单金额</span>
    <span class="be2" style="width: 220px;">订单时间</span>
    <span class="be2">订单状态</span>
    <span class="be2" style="width: 150px;">订单操作</span>
  </div>
<div class="member-sheet clearfix">
	<ul>
	@foreach($data4 as $v)
    <li>
		<div class="member-minute clearfix">
			<span>订单号：<em>{{$v->order_num}}</em></span>
		</div>
		<div class="member-circle clearfix">
			<div class="ci2" style="width: 300px;">{{$v->getman}}</div>
			<div class="ci3" style="width: 180px;">
				<b>￥{{$v->total}}</b>
			</div>
			<div class="ci4" style="width: 220px;">
				<p>{{$v->addtime}}</p>
			</div>
			<div class="ci5">
				<p>待评价</p>
				
			</div>
			<div class="ci5 ci8" style="width: 150px;position: relative;">
				<p>
					<a style="position:absolute;left:17px;top:64px;" href="/home/orders/detail/{{$v['id']}}" class="member-touch">评价</a>
					<a href="javascript:void(0)" class="refund" data-id="{{$v['id']}}">申请退货</a>
				</p>
			</div>
		</div>
    </li>
	@endforeach
	</ul>
</div>
</div>

<!-- 待评价结束 -->

@endsection

@section('script')
<script>
	$('.annulla').click(function(){
		var id = $(this).data('id');
		var _this = this
		$.ajax({
			url: '/home/order/annulla',
			method: 'post',
			data: {
				_token : '{{ csrf_token() }}',
				id : id,
			},
			success:function(res){
				if (res.code == 0) {
					$(_this.parentElement.parentElement.parentElement.parentElement).remove()
					layer.msg(res.msg)
					// location.href = '/home/shopcar/pay'
				} else {
					layer.msg(res.msg)
				}
			}
		})
	})
	
	$('.tixing').click(function(){
		layer.msg('以提醒商家，请耐心等待')
	})
	
	$('.queren').click(function(){
		var id = $(this).data('id');
		var _this = this.parentElement.parentElement.parentElement
		var pan = $(this).data('pan');
		// console.dir($(_this))
		$.ajax({
			url: '/home/order/merci',
			method: 'post',
			data: {
				_token : '{{ csrf_token() }}',
				id : id,
				pan : pan,
			},
			success:function(res){
				if (res.code == 0) {
					$(_this).children().eq(3).children().eq(0).html('等待评价')
					$(_this).children().eq(4).children().eq(0).html('<a style="position:absolute;left:17px;top:64px;" href="javascript:void(0)" class="member-touch">评价商品</a>')
					layer.msg(res.msg)
				} else if (res.code == 1) {
					$(_this.parentElement).remove()
					layer.msg(res.msg)
				} else {
					layer.msg(res.msg)
				}
			}
		})
	})
	
	$('.refund').click(function(){
		var id = $(this).data('id')
		// console.dir(id)
		$.ajax({
			url: '/home/refund/apply',
			method: 'post',
			data: {
				_token : '{{ csrf_token() }}',
				id : id,
			},
			success:function(res){
				if (res.code == 0) {
					layer.msg(res.msg)
				} else {
					layer.msg(res.msg)
				}
			}
		})
	})
</script>
@endsection