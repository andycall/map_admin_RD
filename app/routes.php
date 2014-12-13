<?php


# 模板测试

Route::get("shop_info", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success"),
		"widge_shop_info" => [
			"shop_name" => "大盘鸡", // 商家名称
			"shop_logo" => "", // 商家logo
			"shop_type" => "中式", // 商家类型
			"shop_address" => "堕落街", // 商家地址
			"price_begin" => "58", // 起送价
			"deliver_begin" => "6；00", // 送餐开始时间
			"shop_time" => "09:50 - 13:30 / 16:00 - 19:30", // 商家开门时间. 单输入框
			"shop_statement" => "大盘鸡，就是好吃", // 商家简介
			"shop_open" => "12：00", // 开门时间
			"shop_close" => "8：00" // 关门时间
		]
	];

	return View::make("template.shop_info.shop_info")->with($data);
});

Route::get("announce", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success"),
		"data" => [
            "message" => Session::get('announceMsg'),
			"announcement" => "买买买",
			"min_price" => "58"
		]
	];

	return View::make("template.announce.announce")->with($data);
});

Route::get("category", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success"),
        "data" => [
            "message" => Session::get('catMsg')
        ]
	];

	return View::make("template.category.category")->with($data);
});

Route::get("good", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success"),
        "data" => [
            "message" => Session::get('goodMsg'),
        ],
		"widge_category" => [
			[
				"classify_name" => "buy1",
				"classify_id" => "1"
			],
			[
				"classify_name" => "buy2",
				"classify_id" => "2"
			],
			[
				"classify_name" => "buy3",
				"classify_id" => "3"
			],
			[
				"classify_name" => "buy4",
				"classify_id" => "4"
			],
			[
				"classify_name" => "buy5",
				"classify_id" => "5"
			]
		]
	];
	return View::make("template.good.good")->with($data);
});

Route::get("map", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success")
	];

	return View::make("template.map.map")->with($data);
});

Route::get("deliver", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success")
	];

	return View::make("template.deliver.deliver")->with($data);
});

Route::get("success", function()
{
	$data = [
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success")
	];

	return View::make("template.success.success")->with($data);
});

Route::get('users', function()
{
    return 'Users!';
});


# 商家管理主页面
Route::get('/', function(){
	$data = [
		"main"   => url("/123"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success"),
		"widge_main" => [
			"shop_name" => "大盘鸡",
			"shop_logo" => "",
			"shop_type" => "中餐",
			"shop_address" => "堕落街"
		]
	];

	return View::make("template.main.main")->with($data);

});

# 登录与注册
Route::get('geohashSet', 'ShopController@geoHashSet');
Route::get('geohashGet', 'ShopController@geoHashGet');
Route::post('register', 'UserAccessController@register');
Route::post('login', 'UserAccessController@login');

# 商家的基本操作
Route::post('addgroup', 'ShopAdminController@addGroup');		// 添加分组
Route::post('addmenu', 'ShopAdminController@addMenu');          // 添加菜单
Route::post('addshop', 'ShopAdminController@addShop');			// 添加店铺
Route::post('delmenu', 'ShopAdminController@delMenu');          // 删除菜单
Route::post('modifymenu', 'ShopAdminController@modifyMenu');	// 修改菜单
Route::post('modifyorder', 'ShopAdminController@modifyOrder');	// 修改订单状态


//main 测试
Route::post("/goodsChart", function(){
	$data = [
		"success" => "true",
		"state"   => 200,
		"errMsg"  => "",
		"no"  => "",

		"data"    => [
			"month"  => ["七月","八月","九月","十月","十一月","十二月"],
			"goods" =>
				[
					[
						"goods_id" => "10",
						"goods_name" => "红烧肉",
						"goods_sails" => [10,20,30,40,50,60]
					],
					[
						"goods_id" => "11",
						"goods_name" => "青椒肉丝",
						"goods_sails" => [11,21,31,41,51,61]
					],
					[
						"goods_id" => "12",
						"goods_name" => "土豆肉丝",
						"goods_sails" => [12,22,32,42,52,62]
					],
					[
						"goods_id" => "13",
						"goods_name" => "京酱肉丝",
						"goods_sails" => [13,23,33,43,53,63]
					],
					[
						"goods_id" => "14",
						"goods_name" => "虎皮青椒",
						"goods_sails" => [14,24,34,44,54,64]
					],
					[
						"goods_id" => "15",
						"goods_name" => "回锅肉",
						"goods_sails" => [15,25,35,45,55,65]
					],
					[
						"goods_id" => "16",
						"goods_name" => "糖醋排骨",
						"goods_sails" => [16,26,36,46,56,66]
					]
				]
		]


	];

	return Response::json($data);
});

//修改公告
Route::post("/announce", function(){
    return Redirect::to('/announce')->with('announceMsg', '修改成功!');
});

//添加商品
Route::post("/good", function(){
    return Redirect::to('/good')->with('goodMsg', '添加成功!');
});

//添加分类

Route::post("category", function(){
    return Redirect::to('/category')->with('catMsg', '添加分类成功!');
});