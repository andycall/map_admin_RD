

<ul class="list-group">
    <a class="list-group-item active" href="#">首页</a>
    <a class="list-group-item" href="#">商家基本信息</a>
    <a class="list-group-item" href="#">添加分类</a>
    <a class="list-group-item" href='#'>添加公告</a>
    <a class="list-group-item" href="#">添加位置地图</a>
    <a class="list-group-item" href="#">添加商品</a>
    <a class="list-group-item" href="#">待送订单</a>
    <a class="list-group-item" href="#">成功订单</a>
</ul>

@section("css")
    @parent
    {{HTML::style("/css/widget/siderbar/siderbar.css")}}
@stop


@section("script")
    @parent
    {{HTML::script("/js/widget/siderbar/siderbar.js")}}
@stop