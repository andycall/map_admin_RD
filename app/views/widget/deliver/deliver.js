define(['jquery', "underscore", "port", 'bootstrap'], function($,_,port){
    $(function(){
        var template = _.template( $("#js-template").html() ),
            $wrapper = $("#js-wrapper");

        //开始
        ajaxQueen(template, $wrapper);
    });

    /*ajax轮询 1s*/
    function ajaxQueen(template, $wrapper){
        $.get(port["get_goods_info"], function(res){
            if(typeof  res != "object"){
                try{
                    res = $.parseJSON(res);
                }catch (err){
                    alert("服务器数据出错");
                    return ;
                }
            }

            console.log(res);

            if(res.success){
                var $html = template(res);
                $wrapper.html( $html );
            }
        });

        var fn = arguments.callee;
        setTimeout(function(){
            fn(template, $wrapper);
        }, 1000);   //1s
    }
});

