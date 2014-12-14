require.config({
    baseUrl: "/js/lib/",
    paths: {
        shop_info: "../template/shop_info",
        map: "../widget/map",
        siderbar: "../widget/siderbar",
        success: "../widget/success"
    },
    shim: {
        bootstrap: {
            deps: [ "jquery" ],
            exports: "$.fn.popover"
        }
    },
    enforceDefine: !0
}), // 加载项目所需的所有依赖项
define([ "siderbar/siderbar", "success/success" ], function() {
    console.log("init");
});