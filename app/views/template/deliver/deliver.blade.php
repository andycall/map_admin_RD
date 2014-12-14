@extends("layout.shop")


@section("sidebar")
    @include("widget.breadcrumb.breadcrumb")
    @include("widget.siderbar.siderbar", array("active" => "deliver"))
@stop

@section("content")
    @include("widget.deliver.deliver")
@stop


@section("css")
    {{HTML::style("/css/lib/bootstrap.min.css")}}
    {{HTML::style("/css/lib/normalize.css")}}
    {{HTML::style("/css/template/deliver/deliver.css")}}
@stop

@section("script")
    {{HTML::script("/js/lib/require.min.js", ["data-main" => url("/js/template/deliver/deliver.js")])}}
@stop