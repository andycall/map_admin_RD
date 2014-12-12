<div>主页</div>

<script src="js/lib/echarts.js" type="text/javascript"></script>

<div id="main"style="height:500px;border:1px solid #ccc;padding:10px;"></div>

<script type="text/javascript">

  require.config({

    paths: {

      echarts:'js/lib',

    }

  });

  require(

    [

      'echarts',

      'echarts/chart/bar',

      'echarts/chart/line'

    ],

    function (ec) {
      //--- 折柱 ---
      var myChart = ec.init(document.getElementById('main'));
      myChart.setOption({
        tooltip : {
          trigger: 'axis'
        },
        legend: {
          data:['蒸发量','降水量']
        },
        toolbox: {
          show : true,
          feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
          }
        },
        calculable : true,
        xAxis : [
          {
            type : 'category',
            data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
          }
        ],
        yAxis : [
          {
            type : 'value',
            splitArea : {show : true}
          }
        ],
        series : [
          {
            name:'蒸发量',
            type:'bar',
            data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
          },
          {
            name:'降水量',
            type:'bar',
            data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
          }
        ]
      });

    }

  );

</script>

@section("css")
  @parent
  {{HTML::style("/css/widget/main/main.css")}}
@stop