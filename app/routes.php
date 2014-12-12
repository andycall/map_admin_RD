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
		"success"  => url("/success")
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
		"success"  => url("/success")
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
		"success"  => url("/success")
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
		"success"  => url("/success")
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
		"main"   => url("/"),
		"announce" => url("/announce"),
		"category" => url("/category"),
		"deliver"  => url("/deliver"),
		"good"     => url("/good"),
		"map"      => url("/map"),
		"shop_info" => url("/shop_info"),
		"success"  => url("/success")
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

#或取待送订单信息
Route::get('/getGoods', function(){
    $data = [
        "success" => true,

        "deal_id"   => 456789,
        "deal_time" => "08:45",
        "deal_number" => 132123,
        "deliver_address" => "重庆邮电大学17栋",
        "deliver_phone"  => 18166387284,
        "deliver_remark" => "小心保管",
        "sure_href" => "http://www.baidu.com",

        "goods" => [
            [
                "good_name" => "wjkhdkjewhd肉", // 商品名称
                "good_value" => "12",   // 商品价格
                "good_amount" => "20个",    // 商品数量
                "good_total" => "100元",     // 价格总计
            ],
            [
                "good_name" => "烧烤rthioyhjio", // 商品名称
                "good_value" => "450元",   // 商品价格
                "good_amount" => "200个",    // 商品数量
                "good_total" => "1000元",     // 价格总计
            ]
        ]
    ];

    return Response::json($data);
});
