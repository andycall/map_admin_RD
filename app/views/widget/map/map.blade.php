<div id="map">
    <h3>添加位置地图</h3>

    @if($data['message'])
      <p class="bg-success message">{{{$data['message']}}}</p>
    @endif
    <img src="{{{$data['image_url']}}}" class="img-responsive" alt="地图">
    <form id="mapForm" action="{{{$map}}}" method="POST">
        <input type="file" name="map" class="form-control" />
        <button type="submit" class="btn btn-default">修改</button>
      </form>
</div>

@section("css")
    @parent
    {{HTML::style("/css/widget/map/map.css")}}
@stop