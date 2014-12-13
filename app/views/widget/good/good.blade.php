<div id="addGood">

  <h3>添加商品</h3>

  <form action="" method="POST">

      <div class="form-group">
        <label for="good_name" class="col-sm-2 control-label">商品名称：</label>
        <div class="col-sm-2">
          <input type="text" class="min_price_input form-control" value="">
        </div>
      </div>

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

    <button type="submit" class="btn btn-default">添加</button>
  </form>

</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/good/good.css")}}
@stop