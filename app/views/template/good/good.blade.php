@extends("layout.shop")


@section("sidebar")
    @include("widget.breadcrumb.breadcrumb")
    @include("widget.siderbar.siderbar", array("active" => "good"))
@stop

@section("content")
    @include("widget.good.good")
@stop


@section("css")
    {{HTML::style("/css/lib/bootstrap.min.css")}}
    {{HTML::style("/css/lib/normalize.css")}}
    {{HTML::style("/css/template/good/good.css")}}
@stop

@section("script")
    {{HTML::script("/js/lib/require.min.js", ["data-main" => url("/js/template/good/good.js")])}}
@stop