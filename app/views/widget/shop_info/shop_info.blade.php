

<div id="shop_info">

    <h3>商家基本信息</h3>

    @if($data['message'])
        <p class="bg-success message">{{$data['message']}}</p>
    @endif

    <form class="form-horizontal" action="{{$shop_info}}" method="POST">

        <div class="form-group">
            <label for="shop_name" class="col-sm-2 control-label">商家名称：</label>
            <div class="col-sm-2">
                <input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_name"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_type" class="col-sm-2 control-label">商家类型：</label>
            <div class="col-sm-2">
                <input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_type"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_address" class="col-sm-2 control-label">商家地址：</label>
            <div class="col-sm-2">
                <input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_address"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="deliver_begin" class="col-sm-2 control-label">送餐开始时间：</label>
            <div class="col-sm-2">
                <input type="text" class="min_price_input form-control" value="{{$widge_shop_info["deliver_begin"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_time" class="col-sm-2 control-label">商家开门时间：</label>
            <div class="col-sm-2">
                <input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_time"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_statement" class="col-sm-2 control-label">商家简介：</label>
            <div class="col-sm-2">
                <input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_statement"]}}">
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="shop_open" class="col-sm-2 control-label">开门时间：</label>--}}
            {{--<div class="col-sm-2">--}}
                {{--<input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_open"]}}">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label for="shop_close" class="col-sm-2 control-label">关门时间：</label>--}}
            {{--<div class="col-sm-2">--}}
                {{--<input type="text" class="min_price_input form-control" value="{{$widge_shop_info["shop_close"]}}">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>


    </form>

</div>

@section("css")
    @parent
    {{HTML::style("/css/widget/shop_info/shop_info.css")}}
@stop
