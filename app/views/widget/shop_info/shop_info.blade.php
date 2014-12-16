

<div id="shop_info">

    <h3>商家基本信息</h3>

    @if($data['message'])
        <p class="bg-success message">{{$data['message']}}</p>
    @endif

    <form id="shopInfoForm" action="{{$shop_info}}" method="POST">
        <div class="form-group">
            <label for="shop_name" class="col-sm-2 control-label">商家头像：</label>
            <div class="col-sm-2">
                <div class="avatar"><img src="{{$widge_shop_info["shop_img"]}}" alt=""/><span id="upload_btn"></span></div>
            </div>
        </div>
        <div class="form-group">
            <label for="shop_name" class="col-sm-2 control-label">商家名称：</label>
            <div class="col-sm-2">
                <input type="text" class="shop_name_input form-control" name="shop_name" value="{{$widge_shop_info["shop_name"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_type" class="col-sm-2 control-label">商家类型：</label>
            <div class="col-sm-2">
                <input type="text" class="shop_type_input form-control" name="shop_type" value="{{$widge_shop_info["shop_type"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_address" class="col-sm-2 control-label">商家地址：</label>
            <div class="col-sm-2">
                <input type="text" class="shop_address_input form-control" name="shop_address" value="{{$widge_shop_info["shop_address"]}}">
            </div>
        </div>
        <div class="form-group">
            <label for="deliver_begin" class="col-sm-2 control-label">送餐开始时间：</label>
            <div class="col-sm-2">
                <input type="text" class="deliver_begin_input form-control" name="deliver_begin" value="{{$widge_shop_info["deliver_begin"]}}">
            </div>
        </div>
        <div class="form-group shop_time">
            <label for="shop_time" class="col-sm-2 control-label">商家开门时间：</label>
            <div class="col-sm-2">
                <input type="text" class="shop_time_input form-control" name="shop_time" placeholder="eg.09:50 - 13:30 / 16:00 - 19:30" value="{{$widge_shop_info["shop_time"]}}" >
            </div>
            <div class="error bg-danger">请输入符合该样式的时间：09:50 - 13:30 / 16:00 - 19:30</div>
        </div>
        <div class="form-group">
            <label for="shop_statement" class="col-sm-2 control-label">商家简介：</label>
            <div class="col-sm-2">
                <input type="text" class="shop_statement_input form-control" name="shop_statement" value="{{$widge_shop_info["shop_statement"]}}">
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
