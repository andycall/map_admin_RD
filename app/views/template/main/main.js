require.config({
	baseUrl : "/js/lib/",
	paths : {
		"shop_info" : "../template/shop_info",
		"map" : "../widget/map",
		"siderbar" : "../widget/siderbar",
		"main" : "../widget/main",
		//"lib" : "../lib"
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
	"main/main",
	//"lib/echarts"
], function($){
	console.log("init");
});

