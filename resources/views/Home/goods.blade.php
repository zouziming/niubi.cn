<!doctype html>
<html>
 <head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"> 
	<meta name="renderer" content="webkit">
	<title>商品详情</title>
    <link rel="shortcut icon" type="image/x-icon" href="/lib/theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/lib/theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="/lib/theme/css/home.css">
	<link rel="stylesheet" type="text/css" href="/lib/viewer/css/viewer.min.css">
	
	<style>
		#big{
			width: 500px;
			height: 500px;
			overflow:hidden;
			display:none;
			position:absolute;
			left:800px;
			top:258px;
		}
	</style>
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
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
				<li class="headerul">|</li>
                <li><a href="/ShowOrders">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/home/collection">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li><a href="#" class="M-iphone">手机悦商城</a> </li>
				<li class="headerul">|</li>
				@endempty
            </ul>
        </div>
    </div>
    <div class="container clearfix">

        <div class="header-logo fl"><h1><a href="/home"><img src="/lib/theme/icon/logo.png"></a> </h1></div>
        <div class="head-form fl">
            <form class="clearfix" onsubmit="return false">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="手机模型">
                <button class="button">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>
        <div class="header-cart fr"><a href="/home/shopcar"><img src="/lib/theme/icon/car.png"></a> <i class="head-amount">??</i></div>
        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
                <h2 class="pullDownTitle">全部商品分类</h2>
            </div>
            <ul class="yMenuIndex">
				@foreach($parcate as $v)
					<li><a href="/home/cate/{{$v['id']}}">{{$v['name']}}</a></li>
				@endforeach
            </ul>
        </div>
    </div>
</header>
<!-- header End -->

<!-- 商品详情 begin -->
<section>
    <div class="pc-details" >
        <div class="containers">
            <div class="pc-nav-item">
				<a class="pc-title" href="/home/cate/{{$pcate['id']}}">{{$pcate['name']}}</a> &gt; 
				<a href="/home/cate/{{$cate['id']}}">{{$cate['name']}}</a> &gt; 
				<a href="javascript:void(0)">{{$data['name']}}</a> 
			</div>
            <div class="pc-details-l">
                <div class="pc-product clearfix">
                    <div class="pc-product-h">
						
						
						<div id="small" class="pc-product-top" data-id="{{$data['id']}}">
							<img data-original="{{$data['pic']}}" src="{{$data['pic']}}"  width="418" height="418">
						</div>
						<div id="big">
							<img src="{{$data['pic']}}" alt="" width="1000" height="1000">
						</div>

                        <div class="pc-product-bop clearfix" id="pro_detail">
                            <ul>
                                <li>
									<a href="javascript:void(0);" class="cur" simg="{{$data['pic']}}">
										<img src="{{$data['pic']}}" width="58" height="58">
									</a>
								</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pc-product-t">
                        <div class="pc-name-info">
                            <h1>{{$data['name']}}</h1>
                            <p class="clearfix pc-rate"><strong>￥{{$prices[1]}}~￥{{$prices[0]}}</strong> <span><em>限时抢购</em></span></p>
                            <p>由<a href="javascript:void(0)" class="reds">sb官方旗舰店</a> 负责发货，并提供售后服务。</p>
                        </div>
                        <div class="pc-dashed clearfix">
                            <span>累计销量：<em class="reds">{{$data['buynum']}}</em> 件</span><b>|</b><span>累计评价：<em class="reds">{{count($comment)}}</em></span>
                        </div>
                        <div class="pc-size">
							
							@foreach($allattr as $k=>$v)
                            <div class="attrdiv pc-telling clearfix">
                                <div class="pc-version">{{$v['shu']}}</div>
                                <div class="pc-adults">
                                    <ul>
										@foreach($v['val'] as $vv)
                                        <li><a href="javascript:void(0);" class="attr">{{$vv}}</a> </li>
										<!-- class="cur" -->
										@endforeach
                                    </ul>
                                </div>
                            </div>
							@endforeach
                            
                            <div class="pc-telling clearfix">
                                <div class="pc-version">数量</div>
                                <div class="pc-adults clearfix">
                                    <div class="pc-adults-p clearfix fl">
                                        <input type="" id="subnum" value="1">
                                        <a href="javascript:void(0);" class="amount1" style="background: url(/lib/theme/icon/pro_left.png);width: 19px;"></a>
                                        <a href="javascript:void(0);" class="amount2" style="background: url(/lib/theme/icon/pro_down.png);width: 19px;"></a>
                                    </div>
                                    <div class="fl pc-letter ">件</div>
                                    <div class="fl pc-stock ">库存<em>？？？</em>件</div>
                                </div>
                            </div>
                            <div class="pc-number clearfix">
								<span class="fl">商品编号：{{$data['id']}}</span>
								<span class="fr">
									<a class="pc-share">分享</a> 
									<a class="pc-collection" data-id="{{$data['id']}}">收藏</a>
								</span>
							</div>
                        </div>
                        <div class="pc-emption" id="pc-emption-tj">
                            <a href="javascript:void(0)">立即购买</a>
                            <a href="javascript:void(0)" class="join">加入购物车</a>
							
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containers clearfix" style="margin-top:20px;">
        <div class="fl">
            <div class="pc-menu-in">
				<h2>店内搜索</h2>
				<form>
					<p>关键词:<input type="text" class="pc-input1"></p>
					<p><a href="javascript:void(0)">搜索</a> </p>
				</form>
			</div>
            <div class="menu_list" id="firstpane">
                <h2>店内分类</h2>
				@foreach($allcatedata as $v)
                <h3 class="menu_head current">{{$v['fu']}}</h3>
					<div class="menu_body" style="display: none;">
					@foreach($v['er'] as $vv)
						<a href="/home/cate/{{$vv['id']}}">{{$vv['name']}}</a>
					@endforeach	
					</div>
				@endforeach
            </div>
        </div>
        <div class="pc-info fr">
            <div class="pc-overall">
                <ul id="H-table1" class="brand-tab H-table1 H-table-shop clearfix ">
                    <li class="cur"><a href="javascript:void(0);">商品介绍</a></li>
                    <li><a href="javascript:void(0);">商品评价<em class="reds">({{count($comment)}})</em></a></li>
                    <li><a href="javascript:void(0);">售后保障</a></li>
                </ul>
                <div class="pc-term clearfix">
                   <div class="H-over1 pc-text-word clearfix">
                       <ul class="clearfix">
                           <li>
                               <p>屏幕尺寸：4.8英寸</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>后置摄像头：800万像素</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>前置摄像头：190万像素</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>3G：电信(CDMA2000)</p>
                               <p>2G：移动/联通(GSM)/电信(CDMA </p>
                           </li>
                       </ul>
                       <div class="pc-line"></div>
                       <ul class="clearfix">
                           <li>
                               <p>商品名称：{{substr($data['name'], 0, 15)}}...</p>
                               <p>商品毛重：360.00g </p>
                           </li>
                           <li>
                               <p>商品编号：{{$data['id']}}</p>
                               <p>商品产地：中国大陆</p>
                           </li>
                           <li>
                               <p>品牌： {{$cate['name']}}</p>
                               <p>系统：安卓（Android）</p>
                           </li>
                           <li>
                               <p>上架时间：{{date('Y-m-d H:i:s', $data['addtime'])}}</p>
                           </li>
                       </ul>
                       <div>
                       </div>
                   </div>
                   <div class="H-over1" style="display:none">
                       <div class="pc-comment fl"><strong>100<span>%</span></strong><br> <span>好评度</span></div>
                       <div class="pc-percent fl">
                           <dl>
                               <dt>好评<span>(100%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>中评<span>(0%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>差评<span>(0%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                       </div>
                   </div>
                   <div class="H-over1 pc-text-title" style="display:none">
						<p>
							本产品全国联保，享受三包服务，质保期为：一年质保 如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！<br>(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击<a class="zheer">这儿</a>查询......
						</p>
                       <div class="pc-line"></div>
                   </div>
                </div>
            </div>
            <div class="pc-overall">
                <ul class="brand-tab H-table H-table-shop clearfix " id="H-table" style="margin-left:0;">
                    <li class="cur"><a href="javascript:void(0);">全部评价（{{count($comment)}}）</a></li>
                    <li><a href="javascript:void(0);">好评<em class="reds">（{{count($comment)}}）</em></a></li>
                    <li><a href="javascript:void(0);">中评<em class="reds">（0）</em></a></li>
                    <li><a href="javascript:void(0);">差评<em class="reds">（0）</em></a></li>
                </ul>
                <div class="pc-term clearfix">
                    <div class="pc-column">
                        <span class="column1">评价心得</span>
                        <span class="column2">顾客满意度</span>
                        <span class="column3">购买信息</span>
                        <span class="column4">评论者</span>
                    </div>
                    <div class="H-over  pc-comments clearfix">
						<ul class="clearfix">
							@foreach($comment as $v)
							<li class="clearfix">
                                <div class="column1">
                                    <p>{{$v['content']}}</p>
                                    <p class="column5">{{$v['addtime']}}</p>
                                </div>
                                <div class="column2"><img src="/lib/theme1/icon/star.png"></div>
                                <div class="column3">颜色：屎黄色</div>
                                <div class="column4">
                                    <p><img src="/lib/theme1/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
							@endforeach
						</ul>
                    </div>
					<div style="display:none" class="H-over pc-comments">
						<ul class="clearfix">
							@foreach($comment as $v)
							<li class="clearfix">
						        <div class="column1">
						            <p>{{$v['content']}}</p>
						            <p class="column5">{{$v['addtime']}}</p>
						        </div>
						        <div class="column2"><img src="/lib/theme1/icon/star.png"></div>
						        <div class="column3">颜色：屎黄色</div>
						        <div class="column4">
						            <p><img src="/lib/theme1/icon/user.png"></p>
						            <p>2014-11-23 22:37 购买</p>
						        </div>
						    </li>
							@endforeach
						</ul>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 商品详情 End -->

<!--- footer begin-->
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme1/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme1/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme1/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/lib/theme1/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">购物流程</a> </li>
                <li><a href="#">会员介绍 </a> </li>
                <li><a href="#">生活旅行</a> </li>
                <li><a href="#"> 常见问题 </a> </li>
                <li><a href="#"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>
<!-- footer End -->


	<script type="text/javascript" src="/lib/theme/js/jquery.js"></script>
	<script type="text/javascript" src="/lib/theme/js/index.js"></script>
	<script type="text/javascript" src="/lib/theme/js/js-tab.js"></script>
	<script src="/lib/viewer/js/viewer-jquery.min.js"></script>
	<script src="/layer/layer.js"></script>
	<script>
         $(function(){
             $(".yScrollListInList1 ul").css({width:$(".yScrollListInList1 ul li").length*(160+84)+"px"});
             $(".yScrollListInList2 ul").css({width:$(".yScrollListInList2 ul li").length*(160+84)+"px"});
             var numwidth=(160+84)*4;
             $(".yScrollListInList .yScrollListbtnl").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts<60){
                         obj.animate({left:lefts+numwidth},1000);
                     }
                 }
             })
             $(".yScrollListInList .yScrollListbtnr").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 var objcds=-(60+(Math.ceil(obj.find("li").length/4)-4)*numwidth);
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts>objcds){
                         obj.animate({left:lefts-numwidth},1000);
                     }
                 }
             })
         })
     </script>
	<script>
         $(function(){
         	$('.amount2').click(function(){
		        var num_input = $("#subnum");
		        var buy_num = (num_input.val()-1)>0?(num_input.val()-1):1;
		        num_input.val(buy_num);
		    });
		
		    $('.amount1').click(function(){
		        var num_input = $("#subnum");
		        var buy_num = Number(num_input.val())+1 > $('.pc-stock em').html() ? $('.pc-stock em').html() : Number(num_input.val())+1;
		        num_input.val(buy_num);
		    });
			
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
	<script type="text/javascript">
         $(document).ready(function(){

             $("#firstpane .menu_body:eq(0)").show();
             $("#firstpane h3.menu_head").click(function(){
                 $(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

             $("#secondpane .menu_body:eq(0)").show();
             $("#secondpane h3.menu_head").mouseover(function(){
                 $(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

         });
    </script>
	
	<script>
		var price = $('.pc-rate strong').html()
		$('.attr').click(function(){
			var ul = this.parentElement.parentElement;
			var attrs;
			var sb = '';
			var id = $('#small').data('id')
			if ($(this).hasClass('cur')) {
				$(ul).find('a').removeClass("cur");
			} else {
				$(ul).find('a').removeClass("cur");
				$(this).addClass('cur');
			}
			attrs = $('.pc-size').find('a.attr.cur')
			// console.dir(attrs)
			for (var i = 0; i < attrs.length; i++) {
				sb += $(attrs[i]).html()+'_'
			}
			// console.dir(sb)
			$.ajax({
				url: '/home/goods/specs',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					specs : sb,
					id : id,
				},
				success:function(res){
					if (res.code == 0) {
						$('.pc-rate strong').html('￥'+res.price)
						$('.pc-stock em').html(res.stock)
					} else {
						$('.pc-rate strong').html(price)
						$('.pc-stock em').html(res.stock)
					}
				}
			})
		})
	</script>
	<script>
		
		$('.zheer').click(function(){
			layer.msg('滚');
		})
	</script>
	<script>
		$('.pc-collection').click(function(){
			var id = $(this).data('id')
			$.ajax({
				url: '/home/goods/collection',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					id : id
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
		
		$('.pc-share').click(function(){
			$.ajax({
				url: '/home/goods/share',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
				},
				success:function(res){
					if (res.code == 0) {
						layer.msg(res.msg)
					}
				}
			})
		})
	</script>
	<script>
		// 1. 给小图绑定鼠标移动事件
		    small.onmousemove = function()
		    {
		        // 2. 获取鼠标坐标点, 根据鼠标坐标点计算在小图上的偏移量
		        var x = event.clientX - small.offsetLeft;
		        var y = event.clientY - small.offsetTop;
		        // 4. 偏移量乘以8，设置为大图的滚动条位置
		        big.scrollLeft = x * 2 - 100;
		        big.scrollTop = y * 2 - 50;
		
		        big.style.display = 'block'
		    }
		    small.onmouseout = function()
		    {
		        big.style.display = 'none'
		    }
	</script>
	
	<script>
		$(function() {
			$('.pc-product-top').viewer({
				url: 'data-original',
			});
		});
	</script>
	<script>
		$('.pc-menu-in').on('click', 'a', function(){
			var name = $(this.parentElement.parentElement).children().eq(0).children().eq(0).val()
			$.ajax({
				url: '/home/goods/search',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					name : name,
				},
				success:function(res){
					if (res.code == 0) {
						location.href = '/home/cate/'+res.id
					} else {
						layer.msg(res.msg)
					}
				}
			})
		});
	</script>
	<script>
		$('#pc-emption-tj').on('click', 'a', function(){
			var status
			var button
			if ($('.pc-stock em').html() == '？？？') {
				status = 1
			} else {
				if (Number($('#subnum').val()) > Number($('.pc-stock em').html())) {
					status = 2
				}
				if (Number($('#subnum').val()) < 1) {
					status = 3
				}
			}
			if ($(this).hasClass('join')) {
				button = 2
			} else {
				button = 1
			}
			var data = [];
			var str = '';
			var price = $('.pc-rate strong').html()
			var num = $('#subnum').val()
			data.push({!! $data !!});
			$('.pc-adults a.cur').each(function(){
				str += $(this).html()+'_'
			})
			// console.dir(str);
			$.ajax({
				url: '/home/goods/shop',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					data : data,
					num : num,
					str : str,
					price : price,
					status : status,
					button : button,
				},
				success:function(res){
					if (res.code == 0) {
						layer.msg(res.msg)
					} else if (res.code == 1) {
						layer.msg(res.msg)
						setTimeout(function(){
							location.href = '/home/shopcar/pay'
						}, 1500)
					} else if (res.code == 2) {
						layer.msg(res.msg)
						if (!$('.pc-product-t').hasClass('sb')) {
							$('.pc-product-t').addClass('sb');
							$('.pc-product-t').append('<span class="fr" style="position:relative;top:10px"><a href="/home">继续购物</a> &nbsp;<a href="/home/shopcar" style="font-size: 20px;">进入购物车</a></span>')
						}
					} else {
						layer.msg(res.msg)
					}
				}
			})
		})
	</script>
</body>
</html>