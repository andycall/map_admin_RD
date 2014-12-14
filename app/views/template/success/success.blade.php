@extends("layout.shop")


@section("sidebar")
    @include("widget.breadcrumb.breadcrumb")
    @include("widget.siderbar.siderbar", array("active" => "success"))
@stop

@section("content")
    @include("widget.success.success")
@stop


@section("css")
    {{HTML::style("/css/lib/bootstrap.min.css")}}
    {{HTML::style("/css/lib/normalize.css")}}
    {{HTML::style("/css/template/success/success.css")}}
@stop

@section("script")
    {{HTML::script("/js/lib/require.min.js", ["data-main" => url("/js/template/success/success.js")])}}
@stop