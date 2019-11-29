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
            <style type="text/css">
                .list-group{
                    /*height:20px;*/
                     z-index:99999;
                    position:relative;
                    background: #fff;
                }
                .list-group-item {
                    /*height: 30px;*/
                    padding: 10px;
                    /*margin-top:10px;*/
                    /*left: 5px;*/
                }
                .dv{
                    padding-left:10px;
                }
            </style>
    </head>
    
    <body>
        <div class="mianCont">
            <div class="top">
                @empty(SESSION('userInfo'))
                <span>您好！欢迎来到sb商城 请</span>
                <span>
                <a href="/home/login">[登录]</a>
                </span>
				<span>&nbsp;<a href="/home/register">[注册]</a></span>
                @else
                <span>欢迎您：</span>
                <a style="color:violet">{{ session('userInfo.username') }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</a>
                <a href="/home/logout" style="color:red">退出&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</a>
				<span class="topRight">
                    <a href="/ShowOrders">我的订单</a>&nbsp;|
                    <a href="/home/collection">我的收藏</a>&nbsp;|
				</span>
                @endempty
            </div>
            <!--top/-->
            <div class="lsg">
                <h1 class="logo">
                    <a href="/home">
                        <img src="/lib/images/01.jpg" width="217" height="90" /></a>
                </h1>
                <form action="#" method="get" class="subBox">
                    <div class="subBoxDiv">
                        <input type="text" id="ipt" class="subLeft" />
                        <button class="sub">搜索</button>
                        <div class="hotWord">热门搜索：
                            <a href="home/goods/12">iPhone XS</a>&nbsp;
                            <a href="home/goods/16">机械革命</a>&nbsp;</div>
                        <!--hotWord/--></div>
                        <div class="list-group" id="searchList" ></div>
                    <!--subBoxDiv/--></form>
                <!--subBox/-->
                <div class="gouwuche">
                    <div class="gouCar" style="width: 100px;">
                        <a href="/home/shopcar"><img src="/lib/image/gouimg.png" width="19" height="20" style="position:relative;top:6px;" /></a>&nbsp;|
                        <strong class="red">{{ $shopnum }}</strong>&nbsp;件&nbsp;
                        <img src="/lib/image/youjian.jpg" width="5" height="8" /></div>
                    <!--gouCar/-->
                    <div class="myChunlv">
                        <a href="home/user/mycenter">
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
                            <a href="/home">商城首页</a></li>
                        <li>
                            <a href="home/user/mycenter">会员中心</a></li>
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
                            <dd>{{$v['name']}}</dd>
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
							<dd>{{$v['name']}}</dd>
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
									<dd>{{substr($v['name'], 0, 29)}}</dd>
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
								<dd>{{substr($v['name'], 0, 29)}}</dd>
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
                    <h4>友情链接</h4>
                    <ul class="inHeList">
						@foreach($link as $v)
						<li>
							<a href="{{$v['url']}}">{{$v['name']}}</a>
						</li>
						@endforeach
                        <div class="clears"></div>
                    </ul>
                    <!--inHeList/--></div>
                <!--inHLeft/-->
                <div class="inHLeft">
                    <h4>会员服务</h4>
                    <ul class="inHeList">
                        <li>
                            <a href="/home/register">会员注册</a></li>
                        <li>
                            <a href="/home/login">会员登录</a></li>
                        <li>
                            <a href="/home/shopcar">购物车</a></li>
                        <li>
                            <a href="/ShowOrders">我的订单</a></li>
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
                    <a href="#">商城首页</a>&nbsp;|&nbsp;
                    <a href="#">促销中心</a>&nbsp;|&nbsp;
                    <a href="#">我的订单</a>&nbsp;|&nbsp;
                    <a href="#">新闻动态</a>&nbsp;|&nbsp;
                    <a href="/home/user/mycenter">会员中心</a>&nbsp;|&nbsp;
                    <a href="#">帮助中心</a>
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

        var timer=undefined;
        var _sl = $('#searchList');
        $('#ipt').keyup(function(){
            // console.dir(123);
            var _v=this.value;
            // if (_v=='') {
            //     _sl.html('');
            //     return false;
            // }
            if (_v=='') {
                _sl.html('');
                return false;
            }
            clearTimeout(timer);
            timer=setTimeout(function() {

            $.ajax({
                type:'get',
                url:'/home/get',
                data:{
                    name:_v
                },
                success:function(res)
                {
                    _sl.html('');
                    if (res.length==0) {
                        //没有数据的情况
                        _sl.hide();
                    } else {
                        // 有数据的情况下
                        _sl.show();
                        for (var i = 0; i < res.length ; i++) {
                         $('<a href="/home/cate/'+res[i].id+'" class="list-group-item "></a>').html('<div class="dv">'+res[i].name+'</div>').appendTo(_sl);   
                        }
                    }
                }
            });
            },200)

        });

            // console.dir(123);
        $('.sub').click(function(){
            var _vv=$('#ipt').val();
            console.dir(_vv);

            $.ajax({
                type:'get',
                url:'/home/search',
                data:{
                    name:_vv,
                },
                success:function(res){
                    // console.dir(res);
                    if (res) {
                        location.href="/home/cate/"+res.id;
                    } else {
                        alert('搜不到结果');
                    }
                }
            })
            return false;
        })
	</script>	
	</body>
</html>

