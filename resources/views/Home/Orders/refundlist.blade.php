@extends('Home.layout.main')

@section('title','商城-退货')

@section('body')
<div class="member-head">
	<div class="member-heels fl"><h2>退货/退款记录</h2></div>
</div>
<div class="member-switch clearfix">
	<ul id="H-table" class="H-table">
		<li class="cur"><a href="#">退货申请</a></li>
		<li><a href="#">退货/退款记录</a></li>
	</ul>
</div>
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
			   @foreach($apply as $v)
			   <li>
				   <div class="member-minute clearfix">
					   <span>{{$v['addtime']}}</span>
					   <span>订单号：<em>{{$v['order_num']}}</em></span>
				   </div>
				   <div class="member-circle clearfix">
					   <div class="ci2" style="width: 300px;">{{$v['getman']}}</div>
					   <div class="ci3" style="width: 180px;">
							<b>￥{{$v['total']}}<br></b>
					   </div>
					   
					   <div class="ci4" style="width: 220px;"><p>{{$v['addtime']}}</p></div>
					   <div class="ci5">
							<p>等待商家退货</p>
							<p><a href="/home/orders/detail/{{$v['id']}}">订单详情</a></p>
					   </div>
					   <div class="ci5 ci8" style="width: 150px;position: relative;">
							<p>
								<a data-id="{{$v['id']}}" style="position:absolute;left:17px;top:70px;" href="javascript:void(0)" class="member-touch">取消退货</a>
							</p>
					   </div>
				   </div>
			   </li>
			   @endforeach
			</ul>
	   </div>
   </div>
   <div class="member-return H-over" style="display:none;">
	   <div class="member-cancel clearfix">
		   <span class="be2" style="width: 300px;">收货人</span>
		   <span class="be2" style="width: 230px;">订单金额</span>
		   <span class="be2" style="width: 270px;">订单时间</span>
		   <span class="be2" style="width: 168px;">订单状态</span>
	   </div>
	   <div class="member-sheet clearfix">
		   <ul>
				@foreach($complete as $v)
				<li>
					<div class="member-minute clearfix">
						<span>{{$v['addtime']}}</span>
						<span>订单号：<em>{{$v['order_num']}}</em></span>
					</div>
					<div class="member-circle clearfix">
						<div class="ci2" style="width: 300px;">{{$v['getman']}}</div>
						<div class="ci3" style="width: 230px;">
							<b>￥{{$v['total']}}<br></b>
						</div>
					   
						<div class="ci4" style="width: 270px;"><p>{{$v['addtime']}}</p></div>
						<div class="ci5" style="width: 164px;">
							@if($v['refund'] == 3)
							<p>商家以同意退货</p>
							@else
							<p>商家拒绝退货</p>
							@endif
							<p><a href="/home/orders/detail/{{$v['id']}}">订单详情</a></p>
						</div>
					</div>
				</li>
				@endforeach
		   </ul>
	   </div>
   </div>

</div>
   
    
@endsection

@section('script')
	<script type="text/javascript">
         (function(a){
             a.fn.hoverClass=function(b){
                 var a=this;
                 a.each(function(c){
                     a.eq(c).hover(function(){
                         $(this).addClass(b)
                     },function(){
                         $(this).removeClass(b)
                     })
                 });
                 return a
             };
         })(jQuery);

         $(function(){
             $("#pc-nav").hoverClass("current");
         });
     </script>

     <script>
         $(function(){

             $("#H-table li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over").hide();
                         $(".H-over:eq(" + _index + ")").show();
                     }
                 })(i));
             });
             $("#H-table1 li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over1").hide();
                         $(".H-over1:eq(" + _index + ")").show();
                     }
                 })(i));
             });
         });
     </script>
	 <script>
		 $('.member-touch').click(function(){
			 var id = $(this).data('id')
			 var _this = this.parentElement
			 $.ajax({
			 	url: '/home/refund/cancel',
			 	method: 'post',
			 	data: {
			 		_token : '{{ csrf_token() }}',
			 		id : id,
			 	},
			 	success:function(res){
			 		if (res.code == 0) {
						$(_this.parentElement.parentElement.parentElement.parentElement).remove()
			 			layer.msg(res.msg)
			 		} else {
			 			layer.msg(res.msg)
			 		}
			 	}
			 })
		 })
	 </script>
@endsection