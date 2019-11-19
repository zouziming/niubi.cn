@extends('Home.layout.main')

@section('title','我的订单')

@section('body')
<div class="member-heels fl"><h2>订单号：{{$qts->uid}}</h2></div>
    <div class="member-backs fr"><a href="#">返回订单首页</a></div>
        </div>
        <div class="member-border">
           <div class="member-order">
               <dl>
                   <dt>发货信息</dt>
                   <dd class="member-seller">卖家已发货 <a href="#">（物流查询）</a> </dd>
               </dl>
               <dl class="member-custom clearfix ">
                   <dt>订单信息</dt>
                   <dd>订单编号：{{$qts->uid}}</dd>
                   <dd>订单金额：￥{{$qts->total}}</dd>
                   <dd>下单时间：{{$qts->addtime}}</dd>
               </dl>
               <dl>
                   <dt>配送信息</dt>
                   <dd class="member-seller"><span>收货地址：<em>{{$qts->getman}}</em></span> <span>{{$qts->phone}}</span> <span>{{$qts->address}}</span></dd>
               </dl>
               <dl>
                   <dt>商品信息</dt>
                   <dd class="member-seller">本订单是由 “以纯甲醇旗舰店” 发货并且提高售后服务，商品在下单后会尽快给您发货。 </dd>
               </dl>
           </div>

           <div class="member-serial">
               <ul>
                   <li class="clearfix">
                       <div class="No1">商品编号</div>
                       <div class="No2">商品详情</div>
                       <div class="No3">数量</div>
                       <div class="No4">单价</div>
                       <div class="No5">小计</div>
                   </li>
                   <li class="clearfix">
                       <div class="No1">987645</div>
                       <div class="No2"><a href="#">BWXD日系复古男士松紧腰小脚九分裤简约休闲收口运动潮裤垮裤百搭</a> </div>
                       <div class="No3">1</div>
                       <div class="No4">￥78.00</div>
                       <div class="No5">￥99.00</div>
                   </li>
               </ul>
           </div>

        </div>
        <div class="member-settle clearfix">
            <div class="fr">
                <div><span>商品金额：</span><em>￥270.00</em></div>
                <div><span>运费：</span><em>￥270.00</em></div>
                <div class="member-line"></div>
                <div><span>共需支付：</span><em>￥280.00</em></div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- 商城快讯 End -->

<!--- footer begin-->
<div class="aui-footer-bot">
<div class="time-lists aui-footer-pd clearfix">
    <div class="aui-footer-list clearfix">
        <h4>
            <span><img src="theme/icon/icon-d1.png"></span>
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
            <span><img src="theme/icon/icon-d2.png"></span>
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
            <span><img src="theme/icon/icon-d3.png"></span>
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
            <span><img src="theme/icon/icon-d1.png"></span>
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
@endsection


