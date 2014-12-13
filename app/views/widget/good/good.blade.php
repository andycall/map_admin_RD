<div>

  <p>添加商品</p>
  <p>商品名称：</p>
  <input type="text"/>
  <p>商品类别：</p>
  <select name="style">
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
  </select>

</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/good/good.css")}}
@stop