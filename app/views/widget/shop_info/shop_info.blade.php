<div>

    <p>商家名称：{{$widge_shop_info["shop_name"]}}</p>
    <p>商家类型：{{$widge_shop_info["shop_type"]}}</p>
    <p>商家地址：{{$widge_shop_info["shop_address"]}}</p>
    <p>起送价：{{$widge_shop_info["price_begin"]}}</p>
    <p>送餐开始时间：{{$widge_shop_info["deliver_begin"]}}</p>
    <p>商家开门时间：{{$widge_shop_info["shop_time"]}}</p>
    <p>商家简介：{{$widge_shop_info["shop_statement"]}}</p>
    <p>开门时间：{{$widge_shop_info["shop_open"]}}</p>
    <p>关门时间：{{$widge_shop_info["shop_close"]}}</p>

</div>

@section("css")
    @parent
    {{HTML::style("/css/widget/shop_info/shop_info.css")}}
@stop
