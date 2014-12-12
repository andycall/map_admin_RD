@extends("layout.shop")


@section("sidebar")
    @include("widget.breadcrumb.breadcrumb")
    @include("widget.siderbar.siderbar")
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
    {{HTML::script("/js/lib/jquery.min.js")}}
    {{HTML::script("/js/lib/bootstrap.min.js")}}
@stop