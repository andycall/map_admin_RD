require.config({
	baseUrl : "js/lib/",
	paths : {
		"shop_info" : "../template/shop_info",
		"map" : "../widget/map",
		"siderbar" : "../widget/siderbar",
		"main" : "../widget/main",
		"good" : "../widget/good",
		"deliver" : "../widget/deliver"
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
	"deliver/deliver"
], function($){
	console.log("init");
});


