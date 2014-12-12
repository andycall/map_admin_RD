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
