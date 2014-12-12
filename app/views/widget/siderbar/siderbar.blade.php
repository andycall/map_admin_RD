

<ul class="list-group">
    <a class="list-group-item {{$active == "main" ? "active" : ""}}" href="{{$main}}">首页</a>
    <a class="list-group-item  {{$active == "shop_info" ? "active" : ""}} "  href="{{$shop_info}}">商家基本信息</a>
    <a class="list-group-item  {{$active == "category" ? "active" : ""}} "   href="{{$category}}">添加分类</a>
    <a class="list-group-item  {{$active == "announce" ? "active" : ""}} "  href='{{$announce}}'>添加公告</a>
    <a class="list-group-item   {{$active == "map" ? "active" : ""}} "    href="{{$map}}">添加位置地图</a>
    <a class="list-group-item  {{$active == "good" ? "active" : ""}}  "  href="{{$good}}">添加商品</a>
    <a class="list-group-item  {{$active == "deliver" ? "active" : ""}}  " href="{{$deliver}}">待送订单</a>
    <a class="list-group-item {{$active == "success" ? "active" : ""}}  "  href="{{$success}}">成功订单</a>
</ul>

@section("css")
    @parent
    {{HTML::style("/css/widget/siderbar/siderbar.css")}}
@stop
