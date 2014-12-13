<div id="category">

    <h3>添加分类</h3>

    @if($data['message'])
        <p class="bg-success message">{{{$data['message']}}}</p>
    @endif

      <form class="form-horizontal" action="{{{$category}}}" method="POST">

          <div class="form-group">
            <label for="good_name" class="col-sm-2 control-label">分类名称：</label>
            <div class="col-sm-2">
              <input type="text" class="min_price_input form-control" value="" name="classify_name">
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
    {{HTML::style("/css/widget/category/category.css")}}
@stop