@extends('Home.layout.main')

@section('title','商城-订单')

@section('body')
<div class="member-head">
  <div class="member-heels fl"><h2>订单列表</h2></div>
  <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
  <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
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
      <span class="be1">订单信息</span>
      <span class="be2">收货人</span>
      <span class="be2">订单金额</span>
      <span class="be2">订单时间</span>
      <span class="be2">订单状态</span>
      <span class="be2">订单操作</span>
    </div>

<div class="member-sheet clearfix">
  <ul>
  @foreach($qts as $qt)
  <?php
  dd($qt->ShopDetails);
  ?>
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$qt->did}}</em></span>
        <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci1">
        @foreach($qt->ShopDetails as $op)
        <div class="ci7 clearfix" >
          <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
          <span class="gr2"><a href="#">{{$op->gname}}</a></span>
          <span class="gr3">X1</span>
        </div>
        @endforeach
        </div>
        <div class="ci2">{{$qt->getman}}</div>
        <div class="ci3">
        <?php
          $num=0;
        ?>
        @foreach($qt->ShopDetails as $op)
        @php
          $num+=$op->price;
        @endphp
        <b>￥{{$op->price}}<br></b>
        @endforeach
        </div>

        <div class="ci4"><p>{{$qt->addtime}}</p></div>
        <div class="ci5"><p>
        @if ($qt->status === 1)
            待付款
        @elseif ($qt->status === 2)
            已付款
        @elseif ($qt->status === 3)
            已发货
        @elseif ($qt->status === 4)
            已收货
        @elseif ($qt->status === 6)
            已取消
        @endif
        </p><p><a href="/OrdersDetails">订单详情</a></p>
        </div>
        <div class="ci5 ci8"><!-- <p>剩余15时20分</p> --> <p>
        @if ($qt->status === 1)
        <a style="margin:40px 15px" href="/OrdersSubmit?id={{$qt->id}}&status=2" class="member-touch">立即支付</a> </p>
        @endif
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
    <span class="be1">订单信息</span>
    <span class="be2">收货人</span>
    <span class="be2">订单金额</span>
    <span class="be2">订单时间</span>
    <span class="be2">订单状态</span>
    <span class="be2">订单操作</span>
  </div>

<div class="member-sheet clearfix">
  <ul>
  @foreach($sss as $qt)
  <?php
  // dd($qt->ShopDetails);
  ?>
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$qt->did}}</em></span>
        <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci1">
        @foreach($qt->ShopDetails as $k=> $op)
        <div class="ci7 clearfix" >
          <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
          <span class="gr2"><a href="#">{{$op->gname}}</a></span>
          <span class="gr3">X1</span>
        </div>
        @endforeach
        </div>
        <div class="ci2">{{$qt->getman}}</div>
        <div class="ci3"><b>￥{{$qt->total}}</b></div>
        <div class="ci4"><p>{{$qt->addtime}}</p></div>
        <div class="ci5"><p>
        @if ($qt->status === 1)
            待付款
        @elseif ($qt->status === 2)
            已付款
        @endif

        </p><p><a href="#">订单详情</a></p></div>
        @if ($qt->status === 1)
        <div class="ci5 ci8"><!-- <p>剩余15时20分</p> --> <p>
        <a href="/OrdersSubmit?id={{$qt->id}}&status=2" class="member-touch">立即支付</a>
         </p> <p><a href="#">取消订单</a> </p>
        </div>
        @endif
      </div>
    </li>
  @endforeach
  </ul>
</div>
<!-- 待付款结束 -->

</div>

<!-- 待发货开始 -->
<div class="member-return H-over" style="display:none;">
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
  @foreach($dds as $qt)
  <?php
  // dd($qt->ShopDetails);
  ?>
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$qt->did}}</em></span>
        <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci1">
        @foreach($qt->ShopDetails as $k=> $op)
        <div class="ci7 clearfix" >
          <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
          <span class="gr2"><a href="#">{{$op->gname}}</a></span>
          <span class="gr3">X1</span>
        </div>
        @endforeach
        </div>
        <div class="ci2">{{$qt->getman}}</div>
        <div class="ci3"><b>￥{{$qt->total}}</b></div> 
        <div class="ci4"><p>{{$qt->addtime}}</p></div>
        <div class="ci5"><p>
        @if ($qt->status === 2)
            待发货
        @elseif ($qt->status === 3)
            已发货
        @endif

        </p><p><a href="#">订单详情</a></p></div>

    </li>
  @endforeach
  </ul>
</div>
</div>
<!-- 待发货结束 -->


<!-- 待收货开始 -->
<div class="member-return H-over" style="display:none;">
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
  @foreach($ffs as $qt)
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$qt->did}}</em></span>
        <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci1">
        @foreach($qt->ShopDetails as $k=> $op)
        <div class="ci7 clearfix" >
          <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
          <span class="gr2"><a href="#">{{$op->gname}}</a></span>
          <span class="gr3">X1</span>
        </div>
        @endforeach
        </div>
        <div class="ci2">{{$qt->getman}}</div>
        <div class="ci3"><b>￥{{$qt->total}}</b></div>
        <div class="ci4"><p>{{$qt->addtime}}</p></div>
        <div class="ci5"><p>

        @if ($qt->status === 3)
            待收货
        @elseif ($qt->status === 4)
            已收货
        @endif

        </p><p><a href="#">订单详情</a></p></div>

        @if ($qt->status === 3)
        <div class="ci5 ci8"><!-- <p>剩余15时20分</p> --> <p>
        <a href="/ConfirmReceipt?id={{$qt->id}}&status=3" class="member-touch">确认收货</a>
        </div>
        @endif
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
    <span class="be1">订单信息</span>
    <span class="be2">收货人</span>
    <span class="be2">订单金额</span>
    <span class="be2">订单时间</span>
    <span class="be2">订单状态</span>
    <span class="be2">订单操作</span>
  </div>
<div class="member-sheet clearfix">
  <ul>
  @foreach($ggs as $qt)
    <li>
      <div class="member-minute clearfix">
        <span>订单号：<em>{{$qt->did}}</em></span>
        <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
      </div>
      <div class="member-circle clearfix">
        <div class="ci1">
        @foreach($qt->ShopDetails as $k=> $op)
        <div class="ci7 clearfix" >
          <span class="gr1"><a href="#"><img src="theme/img/pd/m1.png" width="60" height="60" title="" about=""></a></span>
          <span class="gr2"><a href="#">{{$op->gname}}</a></span>
          <span class="gr3">X1</span>
        </div>
        @endforeach
        </div>
        <div class="ci2">{{$qt->getman}}</div>
        <div class="ci3"><b>￥{{$qt->total}}</b></div>
        <div class="ci4"><p>{{$qt->addtime}}</p></div>
        <div class="ci5"><p>

        @if ($qt->status === 4)
            待评价
        @endif
        </p><p><a href="#"></a></p></div>
        <div class="ci5 ci8"><!-- <p>剩余15时20分</p> --> <p>
        <p><a href="#">评价</a> </p>
      </div>
      </div>
    </li>
  @endforeach
  </ul>
</div> 
</div>
<!-- 待评价结束 -->
</div>
@endsection
