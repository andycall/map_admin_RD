define([ "jquery", "underscore", "port", "bootstrap" ], function($, _, port) {
    /*ajax轮询 1s*/
    function ajaxQueen(template, $wrapper) {
        $.get(port.get_goods_info, function(res) {
            if ("object" != typeof res) try {
                res = $.parseJSON(res);
            } catch (err) {
                return void alert("服务器数据出错");
            }
            if (console.log(res), res.success) {
                var $html = template(res);
                $wrapper.html($html);
            }
        });
        var fn = arguments.callee;
        setTimeout(function() {
            fn(template, $wrapper);
        }, 1e3);
    }
    $(function() {
        var template = _.template($("#js-template").html()), $wrapper = $("#js-wrapper");
        //开始
        ajaxQueen(template, $wrapper);
    });
});