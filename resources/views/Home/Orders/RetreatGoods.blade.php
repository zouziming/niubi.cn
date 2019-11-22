@extends('Home.layout.main')

@section('title','商城-退款申请')

@section('body')

<div class="member-right fr">
    <div class="member-head">
        <div class="member-heels fl"><h2>退款申请</h2></div>
        <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
        <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
    </div>
    <div class="member-border">
        @foreach($rgs as $rg)
        <?php
        // dd($rg->ShopDetails);
        ?>
        <div class="member-newly"><span><b>订单号：</b>{{$rg->did}}</span> <span><b>订单状态：</b><i class="reds">已完成</i></span></div>
        <div class="member-cargo">
            <h3>收货人信息：</h3>
            <p>{{$rg->getman}}</p>
            <p>{{$rg->phone}}</p>
            <p>{{$rg->address}}</p>
        </div>
        <div class="member-cargo">
            <h3>商品信息：</h3>
            <p>无敌城自营店</p>
        </div>

    <div class="member-sheet clearfix">
        <ul>
            <li>
                <div class="member-circle clearfix">
<!--                     @foreach($rg->ShopDetails as $jq)
                    <div class="member-apply clearfix">
                        <div class="ap1 fl">
                        <span class="gr1"><a href="#"><img width="60" height="60" about="" title="" src="theme/img/pd/m1.png"></a></span>
                        <span class="gr2"><a href="#">{{$jq->gname}}</a></span>
                        <span class="gr3">X1</span>
                        </div>
                        <div class="ap2 fl"><a href="#">查看订单</a> </div>
                        <div class="ap3 fl"><a href="#">申请退款</a> </div>
                    </div>
                    @endforeach -->
                    <table>
                      <tr>
                        <th style="width:20%">图片</th>
                        <th style="width:30%">商品名</th>
                        <th style="width:20%">商品数量</th>
                        <th style="width:20%">商品单价</th>
                        <th style="width:10%">　　　操作</th>
                      </tr>
                      @foreach($rg->ShopDetails as $jq)
                      <tr>
                        <td>
                            <span class="gr1"><a href="#"><img width="60" height="60" about="" title="" src="theme/img/pd/m1.png"></a></span>
                        </td>
                        <td>
                          <span class="gr2"><a href="#">{{$jq->gname}}</a></span>
                        </td>
                        <td>
                          <span class="gr3">X1</span>
                        </td>
                        <td>{{$jq->price}}</td>
                        <td>
                            @if ($rg->status2 === 2)
                            <div class="member-apply clearfix">
                          <div class="ap3 fl"><a style="width:87px;" href="/tuikuanz?id={{$rg->id}}&status2=4">申请退款</a> </div>
                            @endif
                        </td>
                        <td>
                            @if ($rg->status2 === 4)
                            <div class="member-apply clearfix">
                          <div class="ap3 fl"><a style="width:87px;">申请退款中</a> </div>
                            @endif
                          </td>
                        <td>
                            @if ($rg->status2 === 1)
                            <div class="member-apply clearfix">
                          <div class="ap3 fl"><a style="width:87px;">已退款</a> </div>
                            @endif
                        </td>
                        <td>
                            @if ($rg->status2 === 3)
                            <div class="member-apply clearfix">
                          <div class="ap3 fl"><a style="width:87px;">拒绝退款</a> </div>
                            @endif
                        </td>
                        </div>
                      </tr>
                      @endforeach
                    </table>
                </div>
            </li>
        </ul>
    </div>
<!--     <div class="member-modes clearfix">
        <p class="clearfix"><b>配送方式：</b><em> 顺丰快递</em></p>
    </div> -->
    <div class="member-modes clearfix">
        <p class="clearfix"><b>商品金额：</b><em> ￥{{$rg->total}}</em></p>
        <!-- <p class="clearfix"><b>运费：</b><em> ￥20.00</em></p> -->
    </div>
    <div class="member-modes clearfix">
        <p class="clearfix"><b>订单合计金额：</b><em> {{$rg->total}}元</em></p>
    </div>
    @endforeach
    </div>
</div>

@endsection
