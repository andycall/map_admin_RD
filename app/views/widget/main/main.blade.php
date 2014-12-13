
<script src="js/lib/echarts.js" type="text/javascript"></script>
<script src="js/lib/jquery.js" type="text/javascript"></script>

<p>Hi! {{$widge_main["shop_name"]}}</p>

<p style="text-align: center; font-size: 26px;padding: 20px">进六个月各菜品销量统计</p>
<div id="main" style="height:500px;border:1px solid #ccc;padding:10px;"></div>

<script type="text/javascript">

  $.ajax({
    url: "/goodsChart",
    type: "POST",
    success: function(res) {

      if (res.success == 'true') {

        require.config({

          paths: {

            echarts:'js/lib',

          }

        });

        var month = res.data.month;

        var meun = [];

        var goods_meun = [];

        var len = res.data.goods.length;

        for(var i = 0 ;  i < len ; i++ ){
          meun[i] = res.data.goods[i].goods_name;
          goods_meun[i] = {};
          goods_meun[i].name = meun[i];
          goods_meun[i].type = 'bar';
          goods_meun[i].stack =  '总量';
          goods_meun[i].itemStyle = { normal: {label : {show: true, position: 'insideRight'}}};
          goods_meun[i].data = res.data.goods[i].goods_sails;
        };

        require(

          [

            'echarts',

            'echarts/chart/bar',

            'echarts/chart/line'

          ],

          function (ec) {
            var myChart = ec.init(document.getElementById('main'));
            myChart.setOption({
              tooltip : {
                trigger: 'axis',
                axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                  type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                }
              },
              legend: {
                data:meun
              },
              toolbox: {
                show : true,
                feature : {
                  mark : {show: true},
                  dataView : {show: true, readOnly: false},
                  restore : {show: true},
                  saveAsImage : {show: true}
                }
              },
              calculable : true,
              xAxis : [
                {
                  type : 'value'
                }
              ],
              yAxis : [
                {
                  type : 'category',
                  data : month
                }
              ],
              series : goods_meun
            });

          }

        );


      } else {
        alert(res.errMsg);
      }
    }
  });

</script>

@section("css")
  @parent
  {{HTML::style("/css/widget/main/main.css")}}
@stop