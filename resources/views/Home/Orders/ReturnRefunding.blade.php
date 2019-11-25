@extends('Home.layout.main')

@section('title','商城-退货/退款记录')

@section('body')
<div class="member-right fr">
    <div class="member-head">
    <div class="member-heels fl"><h2>退货/退款记录</h2></div>
    <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
    <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
    </div>
<div class="member-switch clearfix">
    <ul id="H-table" class="H-table">
    <li><a href="#">退货申请</a></li>
    <li class="cur"><a href="#">退货/退款记录 <em>(44)</em></a></li>
    </ul>
</div>
<div class="member-border">
    <div class="member-return H-over"  style="display:none;">
      <div class="member-cancel clearfix">
          <span class="be1">订单信息</span>
          <span class="be2">收货人</span>
          <span class="be2">订单金额</span>
          <span class="be2">订单时间</span>
          <span class="be2">订单状态</span>
          <span class="be2">订单操作</span>
      </div>
<!-- 退货申请开始 -->
<div class="member-sheet clearfix">
    <ul>
        <li>
            @foreach($rrs as $rrq)
            <?php
                dump($rrq->ShopDetails);
            ?>
            <div class="member-minute clearfix">
                <span>{{$rrq->addtime}}</span>
                <span>订单号：<em>{{$rrq->did}}</em></span>
                <span><a href="#">以纯甲醇旗舰店</a></span>
                <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
            </div>
            <div class="member-circle clearfix">
                <div class="ci1">
                    @foreach($rrq->ShopDetails as $pls)
                    <div class="ci7 clearfix">
                        <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
                        <span class="gr2"><a href="#">{{$pls->gname}}</a></span>
                        <span class="gr3">X1</span>
                    </div>
                    @endforeach
                </div>
                <div class="ci2" >{{$rrq->getman}}</div>
                <div class="ci3"><b>￥{{$pls->price}}</b><p>货到付款</p></div>
                <div class="ci4"><p>{{$rrq->addtime}}</p></div>
                <div class="ci5"><p>
                </p> <p><a href="#">订单详情</a></p></div>
                @if ($pls->status === 3)
                <div class="ci6"><p><a>已申请退货</a> </p></div>
                @elseif ($rrq->status === 2)
                <div class="ci6"><p><a href="/tuihuo?id={{$rrq->id}}&status=3">申请退货</a> </p></div>
                @endif
            </div>
            @endforeach
                </li>
                </ul>
                </div>
                </div>
                <!-- 退货申请结束 -->








            <!-- 退货/退款记录开始 -->
            <div class="member-return H-over">
                <div class="member-cancel clearfix">
                    <span class="be1">订单信息</span>
                    <span class="be2">收货人</span>
                    <span class="be2">订单金额</span>
                    <span class="be2">订单时间</span>
                    <span class="be2">订单状态</span>
                    <span class="be2">订单操作</span>
                </div>
                <div class="member-sheet clearfix">
                <ul>
        <li>
            <div class="member-minute clearfix">
                <span>2015-09-22 18:22:33</span>
                <span>订单号：<em>98653056821</em></span>
                <span><a href="#">以纯甲醇旗舰店</a></span>
                <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                </div>
            <div class="member-circle clearfix">
            <div class="ci1">
            <div class="ci7 clearfix">
                <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
                <span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
                <span class="gr3">X1</span>
            </div>
            <div class="ci7 clearfix">
                <span class="gr1"><a href="#"><img src="theme/img/pd/m2.png" width="60" height="60" title="" about=""></a></span>
                <span class="gr2"><a href="#">AXON天机mini NBA限量版</a></span>
                <span class="gr3">X9</span>
            </div>
            </div>
                <div class="ci2" >张子琪</div>
                <div class="ci3"><b>￥120.00</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                <div class="ci4"><p>2015-09-22</p></div>
                <div class="ci5"><p>已申请退货</p> <p><a href="#">退货日志</a></p></div>
                <div class="ci6"><p><a href="#">取消退货</a> </p></div>
            </div>
        </li>
    </ul>
</div>
</div>
<!-- 退货/退款记录开始 -->
</div>
</div>
</div>
@endsection