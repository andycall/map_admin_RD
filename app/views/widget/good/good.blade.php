<div>

  <p>添加商品</p>
  <p>商品名称：</p>
  <input type="text"/>
  <p>商品价格：</p>
  <input type="text"/>
  <p>商品类别：</p>
@if(count($widge_category))
  <select name="style">
@foreach($widge_category as $classify)
    <option value="{{$classify["classify_id"]}}">{{$classify["classify_name"]}}</option>
@endforeach
  </select>
@else
  <p>你还没有添加任何类别呢，先去添加类别吧。</p>
@endif
</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/good/good.css")}}
@stop