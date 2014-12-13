<div id="announcement">

  <h3>餐厅公告</h3>
  <div class="announcement">
    <p>{{$data["announcement"]}}</p>
  </div>
  <textarea class="announcement"></textarea>
  <h4 class="min_price">起送价格；
    <span>{{$data["min_price"]}}</span>
    <input type="text" class="min_price_input"/>
  </h4>



</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/announce/announce.css")}}
@stop