@extends('Home.layout.main')

@section('title','商城-退换货')

@section('body')
            <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>退货/退款记录</h2></div>
                <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
                <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
            </div>
            <div class="member-switch clearfix">
                <ul id="H-table" class="H-table">
                    <li><a href="#">退货申请 <em>(0)</em></a></li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">申请退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">申请退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">申请退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">申请退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">申请退货</a> </p></div>
                               </div>
                           </li>
                       </ul>
                   </div>
               </div>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">取消退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">取消退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">取消退货</a> </p></div>
                               </div>
                           </li>
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
                                   <div class="ci5"><p>已完成</p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci6"><p><a href="#">取消退货</a> </p></div>
                               </div>
                           </li>
                       </ul>
                   </div>
               </div>



                <div class="clearfix" style="padding:30px 20px;">
                    <div class="fr pc-search-g pc-search-gs">
                        <a style="display:none" class="fl " href="#">上一页</a>
                        <a href="#" class="current">1</a>
                        <a href="javascript:;">2</a>
                        <a href="javascript:;">3</a>
                        <a href="javascript:;">4</a>
                        <a href="javascript:;">5</a>
                        <a href="javascript:;">6</a>
                        <a href="javascript:;">7</a>
                        <span class="pc-search-di">…</span>
                        <a href="javascript:;">1088</a>
                        <a title="使用方向键右键也可翻到下一页哦！" class="" href="javascript:;">下一页</a>
                    </div>
                </div>

            </div>
        </div>
@endsection