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
	<title>二级分类</title>
    <link rel="shortcut icon" type="image/x-icon" href="/lib/theme/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/lib/theme/css/base.css">
	<link rel="stylesheet" type="text/css" href="/lib/theme/css/home.css">

 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
                <li><a href="#">登录</a> </li>
                <li class="headerul">|</li>
                <li><a href="#">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="#">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li><a href="#">我的商城</a> </li>
                <li class="headerul">|</li>
                <li><a href="#" class="M-iphone">手机悦商城</a> </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">

        <div class="header-logo fl"><h1><a href="/home"><img src="/lib/theme/icon/logo.png"></a> </h1></div>

        <div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="手机模型">
                <button class="button" onClick="search('key');return false;">搜索</button>
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

        <div class="header-cart fr"><a href="#"><img src="/lib/theme/icon/car.png"></a> <i class="head-amount">99</i></div>

        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
                <h2 class="pullDownTitle">全部商品分类</h2>
            </div>

			
            <ul class="yMenuIndex">
				@foreach($cate as $v)
					<li><a href="/home/cate/{{$v['id']}}">{{$v->name}}</a></li>
				@endforeach
			</ul>
			

        </div>
    </div>
</header>
<!-- header End -->
	<div class="containers">
		<div class="pc-nav-item">
			@if(count($catename) == 2)
				<a  href="/home/cate/{{$catename[0]['id']}}">{{$catename[0]['name']}}</a> &gt; 
				<a href="/home/cate/{{$catename[1]['id']}}">{{$catename[1]['name']}}</a>
			@else
				<a href="/home/cate/{{$catename[0]['id']}}">{{$catename[0]['name']}}</a> &gt; 
			@endif
		</div>
	</div>
<div class="containers clearfix">
    <div class="fl">
        <div class="pc-sisters">
            <div class="pc-s-title"><h2>商品TOP排行</h2></div>
            <div>
                <ul>

					@foreach($top as $v)
                    <li>
                        <div class="pc-s-line"><a href="/home/goods/{{$v['id']}}"><img src="{{$v['pic']}}" width="188"></a> </div>
                        <div class="pc-s-link"><a href="/home/goods/{{$v['id']}}">{{substr($v['name'], 0, 30)}}</a> </div>
                        <div class="pc-s-lins"><p class="reds">￥{{$v['price']}}</p><p class="blue">已售出：{{$v['buynum']}}</p></div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <div class="pc-info fr">
        <div class="pc-term">
            <dl class="pc-term-dl clearfix">
                <dt>品牌：</dt>
				@foreach($pin as $v)
					<dd class="selected" style="width:50px;margin-left: 50px "><a href="/home/cate/{{$v['id']}}">{{$v['name']}}</a></dd>
				@endforeach
            </dl>


            <div class="pc-line"></div>
            <div class="pc-search clearfix">
                <div class="fl pc-search-in">
                    <input type="text" class="pc-search-w">

                    <a href="javascript:void(0)" class="pc-search-a" data-id="{{$cid}}">搜索</a>

                </div>
                <div class="fr pc-with">
                    相关搜索： 
					<a href="javascript:void(0)">飞机杯</a><em>|</em>
					<a href="javascript:void(0)">充气娃娃</a><em>|</em>
					<a href="javascript:void(0)">全自动电动按摩棒</a><em>|</em>
					<a href="javascript:void(0)">澳门皇家赌场入场券</a>
                </div>
            </div>
        </div>
        <div class="pc-term">
            <div class="clearfix pc-search-p">

                <div class="fl pc-search-e">
					
					<a href="javascript:void(0)" data-id="1_{{$cid}}">销量</a>
					<a href="javascript:void(0)" data-id="2_{{$cid}}">价格降序</a>
					<a href="javascript:void(0)" data-id="3_{{$cid}}">价格升序</a>
					<a href="javascript:void(0)" data-id="4_{{$cid}}">上架时间</a>
				</div>
				<div class="fr pc-search-v">
					<ul>
						<li><input type="checkbox"><a href="javascript:void(0)" class="jin">精品</a></li>
						<li><input type="checkbox"><a href="javascript:void(0)" class="hot">热销</a></li>
						<li><input type="checkbox"><a href="javascript:void(0)" class="new">新品</a></li>
					</ul>
				</div>
            </div>
            
        </div>
        <div class="time-border-list pc-search-list clearfix">
            <ul class="clearfix">
				<div id="goods">
				@foreach($goods as $v)
                <li>
                    <a href="/home/goods/{{$v['id']}}"> <img src="{{$v['pic']}}" width="200"></a>
                    <p class="head-name"><a href="/home/goods/{{$v['id']}}">{{substr($v['name'], 0, 25)}}</a> </p>
                    <p><span class="price">￥{{$v['price']}}</span></p>
                    <p class="head-futi clearfix"><span class="fl">好评度：100% </span> <span class="fr">{{$v['buynum']}}人购买</span></p>
                    <p class="clearfix">
						<span class="label-default fl">抢购</span>
						<a href="javascript:void(0)" class="fr pc-search-c">收藏</a>
					</p>
                </li>
				@endforeach
				</div>
            </ul>
            <div class="clearfix">
                
            </div>
        </div>
        

    </div>
</div>
<!--- footer begin-->
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>

                <span><img src="/lib/theme/icon/icon-d1.png"></span>
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

                <span><img src="/lib/theme/icon/icon-d2.png"></span>
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
                <span><img src="/lib/theme/icon/icon-d3.png"></span>
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
                <span><img src="/lib/theme/icon/icon-d1.png"></span>
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
	<script type="text/javascript" src="/lib/theme/js/jquery.js"></script>
	<script src="/lib/layer/layer.js"></script>
	<script>
		// $('.pc-search-c').click(function(){
		// 	console.dir($(this).css('background-color'))
		// 	console.dir($(this).css('color'))
		// 	if ($(this).css('background-color') == 'rgb(225, 37, 36)') {
		// 		$(this).css('background-color', 'rgb(225, 37, 36)');
		// 		$(this).css('color', 'rgb(255, 255, 255)');
		// 	}
			
		// });
		$('.pc-search-e').on('click', 'a', function(){
			$('.pc-search-e').children().removeClass('cur')
			$(this).addClass('cur')
			var id = $(this).data('id')
			$.ajax({
				url: '/home/sorts',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					id : id,
				},
				success : function(res){
					var str = '';
					$('#goods').empty();
					console.dir(res.data)
					for (k in res.data) {
						str += '<li>';
						str += '<a href="/home/goods/'+res.data[k].id+'"> <img src="'+res.data[k].pic+'" width="200"></a>';
						str += '<p class="head-name"><a href="/home/goods/'+res.data[k].id+'">'+res.data[k].name+'</a></p>';
						str += '<p><span class="price">￥'+res.data[k].goods_price+'</span></p>'
						str += '<p class="head-futi clearfix"><span class="fl">好评度：100% </span> <span class="fr">'+res.data[k].buynum+'人购买</span></p>';
						str += '<p class="clearfix">';
						str += '<span class="label-default fl">抢购</span>';
						str += '<a href="javascript:void(0)" class="fr pc-search-c">收藏</a>';
						str += '</p></li>';
						console.dir(str);
						$('#goods').append(str)
						str = '';
					}
				},
			})
		})
		
		$('.pc-search-in').on('click', 'a', function(){
			var data = $(this.parentElement).children().eq(0).val();
			var cid = $(this).data('id')
			console.dir(cid);
			$.ajax({
				url: '/home/cate/search',
				method: 'post',
				data: {
					_token : '{{ csrf_token() }}',
					data : data,
					cid : cid,
				},
				success : function(res){
					// console.dir(res.goods)
					var str = '';
					$('#goods').empty();
					console.dir(res.data)
					for (k in res.data) {
						str += '<li>';
						str += '<a href="/home/goods/'+res.data[k].id+'"> <img src="'+res.data[k].pic+'" width="200"></a>';
						str += '<p class="head-name"><a href="/home/goods/'+res.data[k].id+'">'+res.data[k].name+'</a></p>';
						str += '<p><span class="price">￥'+res.data[k].goods_price+'</span></p>'
						str += '<p class="head-futi clearfix"><span class="fl">好评度：100% </span> <span class="fr">'+res.data[k].buynum+'人购买</span></p>';
						str += '<p class="clearfix">';
						str += '<span class="label-default fl">抢购</span>';
						str += '<a href="javascript:void(0)" class="fr pc-search-c">收藏</a>';
						str += '</p></li>';
						console.dir(str);
						$('#goods').append(str)
						str = '';
					}
				}
			})
		})
		
		$('.pc-with').on('click', 'a', function(){
			layer.msg('怎么可能有这些东西，我们是正规网站')
		})
	</script>
</body>
</html>
