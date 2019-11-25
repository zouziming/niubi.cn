@extends('Home.layout.main')

@section('title','商城-订单详情')

@section('body')
<div class="member-right fr">
    <div class="member-head">
        <div class="member-heels fl"><h2>订单详情</h2></div>
    </div>

    @foreach($thhs as $th)
    <div class="member-border">
        @if ($th->status === 1)
        <div class="member-newly"><b>等待付款：</b></div>
        @endif
        <div class="member-sites">
            <ul>
                <li class="clearfix">
                    @if ($th->status === 1)
                    <div class="default fl" style="margin-left:10px -50px"><a href="/OrdersSubmit?id={{$th->id}}&status">立即付款</a> </div>
                    <div class="default fl" style="margin-left:10px -50px"><a href="/CancelOrders?id={{$th->id}}&status=6">取消订单</a> </div>
                    @endif

                    @if ($th->status === 6)
                    <div class="default fl" style="margin-left:10px -50px">已取消 </div>
                    @endif
                    <div class="user-info1 fl clearfix">
                        <div class="user-info">
                            <span class="info1">收货人：</span>
                            <span class="info2">{{$th->getman}}</span>
                        </div>
                        <div class="user-info">
                            <span class="info1">地址：</span>
                            <span class="info2">{{$th->address}}</span>
                        </div>
                        <div class="user-info">
                            <span class="info1">手机：</span>
                            <span class="info2">{{$th->phone}}</span>
                        </div>
                        <div class="user-info">
                            <span class="info1">付款状态：</span>
                            <span class="info2">
                            @if ($th->status === 1)
                                未支付
                            @elseif ($th->status === 2)
                                已支付
                            @elseif ($th->status === 3)
                                已支付
                            @elseif ($th->status === 4)
                                已支付
                            @elseif ($th->status === 5)
                                已支付
                            @elseif ($th->status === 6)
                                已取消
                            @endif
                            </span>
                        </div>
                        <div class="user-info">
                            <span class="info1">商品总额：</span>
                            <span class="info2">{{$th->total}}</span>
                        </div>
                    </div>
                    @endforeach

<!--                     <div class="pc-event">
                        <a href="#" class="pc-event-d">设为默认地址</a>
                        <a href="#">编辑 </a>
                        <a href="#">删除</a>
                    </div> -->
                </li>
            </ul>
        </div>

<!--         <div class="member-pages clearfix">
            <div class="fr pc-search-g">
                <a href="#" class="fl pc-search-f">上一页</a>
                <a class="current" href="#">1</a>
                <a href="javascript:;">2</a>
                <a href="javascript:;">3</a>
                <a href="javascript:;">4</a>
                <a href="javascript:;">5</a>
                <a href="javascript:;">6</a>
                <a href="javascript:;">7</a>
                <span class="pc-search-di">…</span>
                <a onClick="SEARCH.page(3, true)" href="javascript:;" class="pc-search-n" title="使用方向键右键也可翻到下一页哦！">下一页</a>
            <span class="pc-search-y">
                <em>  共20页    到第</em>
                <input type="text" placeholder="1" class="pc-search-j">
                <em>页</em>
                <a class="confirm" href="#">确定</a>
            </span>

            </div>
        </div> -->

    </div>
</div>
@endsection