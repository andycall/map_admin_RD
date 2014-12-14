<div id="announcement">


  <h3>修改餐厅公告</h3>

  @if($data['message'])
    <p class="bg-success message">{{{$data['message']}}}</p>
  @endif

  <form action="{{{$announce}}}" method="POST">
  <textarea class="announcement form-control" rows="5" name="announcement">{{{$data["announcement"]}}}</textarea>

    {{--<div class="form-group">--}}
      {{--<label for="min_price" class="col-sm-2 control-label">起送价格:</label>--}}
      {{--<div class="col-sm-2">--}}
        {{--<input type="text" class="min_price_input form-control" value="{{$data["min_price"]}}"/>--}}
      {{--</div>--}}
    {{--</div>--}}

    <button type="submit" class="btn btn-default">修改</button>
  </form>

</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/announce/announce.css")}}
@stop