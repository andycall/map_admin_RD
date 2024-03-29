<div class="success">
    <div class="header"><h2>成功订单 - 共{{$widge_success['deal_count']}}张</h2></div>
    <div class="inner">
@foreach($widge_success['deal'] as $value)
        <div class="order_form">
            <div class="order_header">
                <div class="order_wrapper">
@if($value['deal_statue'] == 0)
                    <div class="order_title unfinish">付款失败</div>
@elseif($value['deal_statue'] == 1)
                    <div class="order_title unfinish">无效订单</div>
                    <div class="refund">
                        <span></span>
                        付款金额会在3-7个工作日内退回您支付时的账户。
                    </div>
@else
                    <div class="order_title finish">交易已完成</div>
@endif
                </div>
                <div class="order_table">
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <span>餐厅名:</span>
                                    <a href="{{$value['deal_again']}}">{{$value['shop_name']}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>额单号:</span>
                                    {{$value['deal_number']}}
                                </td>
                                <td>
                                    <span>支付时间:</span>
                                    {{$value['deal_time']}}
                                </td>
                                <td>
                                    <span>餐厅电话:</span>
                                    {{$value['deal_phone']}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>饿单地址:</span>
                                    {{$value['deliver_address']}}
                                </td>
                                <td>
                                    <span>联系电话:</span>
                                    {{$value['deliver_phone']}}
                                </td>
                                <td>
                                    <span>饿单备注:</span>
                                    {{$value['deliver_remark']}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                </div>


                <div class="order_evaluate">
@if($value['deal_statue'] > 1)

@if($value['deal_speed'])
                    <div class="content">
                        <p>点评送餐速度：</p>
                        <p>已点评， 时间： {{$value['deal_speed']}}</p>
                    </div>
@else
                    <div class="content">
                        <p>点评送餐速度：</p>
                        <p>未点评</p>
                    </div>
@endif

@else
                    <div class="content">
                        <p>点评送餐速度：</p>
                        <p>当前状态下不能点评</p>
                    </div>
@endif

@if($value['deal_statue'] > 1)

@if($value['deal_satisfied'])
                    <div class="content">
                        <p>您对餐厅的服务是否满意：</p>
                        <p>已点评，
                            @if($value['deal_satisfied']==1)
                                不满意
                            @elseif($value['deal_satisfied']==2)
                                一般般
                            @elseif($value['deal_satisfied']==3)
                                满意
                            @endif
                        </p>
                    </div>
@else
                    <div class="content">
                        <p>您对餐厅的服务是否满意：</p>
                        <p>未点评</p>
                    </div>
@endif

@else
                    <div class="content">
                        <p>您对餐厅的服务是否满意：</p>
                        <p>当前状态下不能点评</p>
                    </div>
@endif
                </div>

                <div class="order_wrpper">
                    <table>
                        <thead>
                        <tr>
                            <th class="name">
                                美食篮子
                            </th>
                            <th class="rating"></th>
                            <th class="price">
                                单价
                            </th>
                            <th class="num">
                                数量
                            </th>
                            <th class="sub">
                                小计
                            </th>
                        </tr>
                        </thead>
                        <tbody>
@foreach($value['good'] as $meun)
                            <tr>
                                <td class="name">
                                    {{$meun['goods_name']}}
                                </td>

@if($value['deal_statue'] > 1)

@if($meun['good_atisfied'])

@if($meun['good_atisfied'] == 1)
                                <td class="rating">
                                    <div class="comment">
                                        <div title="差评" class="mouseover">
                                            <div title="差点意思">
                                                <div title="一般般">
                                                    <div title="有点滋味">
                                                        <div title="我的最爱">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating_text">差评</div>
@elseif($meun['good_atisfied'] == 2)
                                <td class="rating">
                                    <div class="comment">
                                        <div title="差评">
                                            <div title="差点意思" class="mouseover">
                                                <div title="一般般">
                                                    <div title="有点滋味">
                                                        <div title="我的最爱">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating_text">差点意思</div>
@elseif($meun['good_atisfied'] == 3)
                                <td class="rating">
                                    <div class="comment">
                                        <div title="差评">
                                            <div title="差点意思">
                                                <div title="一般般" class="mouseover">
                                                    <div title="有点滋味">
                                                        <div title="我的最爱">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating_text">一般般</div>
@elseif($meun['good_atisfied'] == 4)
                                <td class="rating">
                                    <div class="comment">
                                        <div title="差评">
                                            <div title="差点意思">
                                                <div title="一般般">
                                                    <div title="有点滋味" class="mouseover">
                                                        <div title="我的最爱">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating_text">有点滋味</div>
@else
                                <td class="rating">
                                    <div class="comment">
                                        <div title="差评">
                                            <div title="差点意思">
                                                <div title="一般般">
                                                    <div title="有点滋味">
                                                        <div title="我的最爱" class="mouseover">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rating_text">我的最爱</div>
@endif

@else
                                        <td class="rating">
                                            <div class="comment">
                                                <div title="差评">
                                                    <div title="差点意思">
                                                        <div title="一般般">
                                                            <div title="有点滋味">
                                                                <div title="我的最爱" class="mouseover">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating_text">还未点评</div>
@endif

@else
                                    <td class="content" style="color:#999;">
                                        当前状态下不能点评
@endif
                                    </td>
                                    <td class="price">
                                        ￥{{$meun['goods_value']}}
                                    </td>
                                    <td class="num">
                                        {{$meun['goods_amount']}}
                                    </td>
                                    <td class="sub">
                                        ￥{{$meun['goods_total']}}
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="name">
                                        其他费用
                                    </th>
                                    <th class="rating"></th>
                                    <th class="price">
                                        单价
                                    </th>
                                    <th class="num">
                                        数量
                                    </th>
                                    <th class="sub">
                                        小计
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
@foreach($value['others'] as $meun)
                                <tr>
                                    <td class="name">
                                        {{$meun['item_name']}}
                                    </td>
                                    <td class="rating"></td>
                                    <td class="price">
                                        ￥{{$meun['item_value']}}
                                    </td>
                                    <td class="num">
                                        {{$meun['item_amount']}}
                                    </td>
                                    <td class="sub">
                                        ￥{{$meun['item_total']}}
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="name">
                                        合计
                                    </th>
                                    <th class="rating"></th>
                                    <th class="price"></th>
                                    <th class="num"></th>
                                    <th class="sub">
                                        ￥{{$value['total']}}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
@endforeach
            </div>
        </div>
@section("css")
    @parent
    {{HTML::style("/css/widget/success/success.css")}}
@stop