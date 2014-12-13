<div id="announcement">

  <h3>餐厅公告</h3>
  <textarea class="announcement">{{$data["announcement"]}}</textarea>
  <a class="btn announcement_save">保存</a>


  <h4 class="min_price">起送价格；
    <input type="text" class="min_price_input" value="{{$data["min_price"]}}"/>
    <a class="btn min_price_save">保存</a>
  </h4>


</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/announce/announce.css")}}
@stop