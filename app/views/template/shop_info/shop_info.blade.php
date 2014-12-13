@extends("layout.shop")

@section("sidebar")
    @include("widget.breadcrumb.breadcrumb")
    @include("widget.siderbar.siderbar", array("active" => "shop_info"))
@stop

@section("content")
    @include("widget.shop_info.shop_info")
@stop


@section("css")
    {{HTML::style("/css/lib/bootstrap.min.css")}}
    {{HTML::style("/css/lib/normalize.css")}}
    {{HTML::style("/css/template/shop_info/shop_info.css")}}
@stop

@section("script")
    {{HTML::script("/js/lib/require.min.js", ["data-main" => url("/js/template/shop_info/shop_info.js")])}}
@stop