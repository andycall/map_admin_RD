require.config({
	baseUrl : "js/lib/",
	paths : {
		"shop_info" : "../template/shop_info",
		"map" : "../widget/map",
		"siderbar" : "../widget/siderbar",
		"shop_info" : "../widget/shop_info"
	},
	shim: {
		"bootstrap": {
			deps: ["jquery"],
			exports: "$.fn.popover"
		}
	},
	enforceDefine: true
});

// 加载项目所需的所有依赖项
define([
	"siderbar/siderbar",
	"shop_info/shop_info"
], function($){
	console.log("init");
});

