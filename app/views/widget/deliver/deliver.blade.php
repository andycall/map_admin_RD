<div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">待送订单</div>
      <div class="panel-body" id="js-wrapper">

      </div>
</div>

<script type="template/text" id="js-template">
 <div><span class="badge">订单id</span> <span><%= deal_id%></span></div>
 <div><span class="badge">订单号</span> <span><%= deal_number%></span></div>
 <div><span class="badge">订单时间</span> <span><%= deal_time%></span></div>
 <div><span class="badge">送达地址</span> <span><%= deliver_address%></span></div>
 <div><span class="badge">联系电话</span> <span><%= deliver_phone%></span></div>
 <div><span class="badge">备注</span> <span><%= deliver_remark%></span></div>

 <div class="panel panel-success">
 <!-- Default panel contents -->
        <%for(var i = 0,len = goods.length; i < len; i++){%>
       <div class="panel-heading"><%= goods[i].good_name%></div>
           <div class="panel-body">
                <div><span class="badge">价格</span> <span><%= goods[i].good_value%></span></div>
                <div><span class="badge">数量</span> <span><%= goods[i].good_amount%></span></div>
                <div><span class="badge">总计</span> <span><%= goods[i].good_total%></span></div>
           </div>
       <%}%>
 </div>

 <button type="button" class="btn btn-default btn-lg"><a href="<%= sure_href%>">确认订单</a></button>
</script>

@section("css")
    @parent
    {{HTML::style("/css/widget/deliver/deliver.css")}}
@stop