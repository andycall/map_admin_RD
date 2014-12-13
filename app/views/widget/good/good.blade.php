<div id="addGood">

  <h3>添加商品</h3>


  @if($data['message'])
    <p class="bg-success message">{{{$data['message']}}}</p>
  @endif

  <form class="form-horizontal" action="{{{$good}}}" method="POST">

      <div class="form-group">
        <label for="good_name" class="col-sm-2 control-label">商品名称：</label>
        <div class="col-sm-2">
          <input type="text" class="min_price_input form-control" value="">
        </div>
      </div>

      <div class="form-group">
        <label for="good_price" class="col-sm-2 control-label">商品价格：</label>
        <div class="col-sm-2">
          <input type="text" class="min_price_input form-control" value="">
        </div>
      </div>

     <div class="form-group">
       <label for="good_category" class="col-sm-2 control-label">商品类别：</label>
       <div class="col-sm-2">
         @if(count($widge_category))
             <select class="form-control" name="style">
                 @foreach($widge_category as $classify)
                     <option value="{{$classify["classify_id"]}}">{{$classify["classify_name"]}}</option>
                 @endforeach
             </select>
         @else
             <p>你还没有添加任何类别呢，先去添加类别吧。</p>
         @endif
       </div>
     </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">添加</button>
      </div>
    </div>


  </form>

</div>

@section("css")
  @parent
  {{HTML::style("/css/widget/good/good.css")}}
@stop