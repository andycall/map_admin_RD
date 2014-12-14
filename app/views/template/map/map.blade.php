@extends("layout.shop")


@section("sidebar")
    @include("widget.breadcrumb.breadcrumb")
    @include("widget.siderbar.siderbar", array("active" => "map"))
@stop

@section("content")
    @include("widget.map.map")
@stop


@section("css")
    {{HTML::style("/css/lib/bootstrap.min.css")}}
    {{HTML::style("/css/lib/normalize.css")}}
    {{HTML::style("/css/template/map/map.css")}}
@stop

@section("script")
    {{HTML::script("/js/lib/require.min.js", ["data-main" => url("/js/template/map/map.js")])}}
@stop