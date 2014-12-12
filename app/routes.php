<?php



Route::get('users', function()
{
    return 'Users!';
});

# 商家管理主页面
Route::get('/', function(){

	return View::make("template.shop_info.shop_info");

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
