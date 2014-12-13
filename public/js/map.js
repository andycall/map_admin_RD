require.config({
    baseUrl: "js/lib/",
    paths: {
        shop_info: "../template/shop_info",
        map: "../widget/map",
        siderbar: "../widget/siderbar"
    },
    shim: {
        bootstrap: {
            deps: [ "jquery" ],
            exports: "$.fn.popover"
        }
    },
    enforceDefine: !0
}), // 加载项目所需的所有依赖项
define([ "siderbar/siderbar", "map/map" ], function() {
    console.log("init");
});