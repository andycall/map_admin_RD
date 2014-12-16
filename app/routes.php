<?php


# 模板测试
//Route::get("shop_info", function()
//{
//	$data = [
//		"main"   => url("/"),
//		"announce" => url("/announce"),
//		"category" => url("/category"),
//		"deliver"  => url("/deliver"),
//		"good"     => url("/good"),
//		"map"      => url("/map"),
//		"shop_info" => url("/shop_info"),
//		"success"  => url("/success"),
//		"widge_shop_info" => [
//			"shop_img" => "http://www.baidu.com/img/baidu_jgylogo3.gif",
//			"shop_name" => "大盘鸡", // 商家名称
//			"shop_logo" => "", // 商家logo
//			"shop_type" => "中式", // 商家类型
//			"shop_address" => "堕落街", // 商家地址
//			"price_begin" => "58", // 起送价
//			"deliver_begin" => "6；00", // 送餐开始时间
//			"shop_time" => "09:50 - 13:30 / 16:00 - 19:30", // 商家开门时间. 单输入框
//			"shop_statement" => "大盘鸡，就是好吃", // 商家简介
//			"shop_open" => "12：00", // 开门时间
//			"shop_close" => "8：00" // 关门时间
//		],
//		"data" => [
//			"message" => Session::get('infoMsg')
//		]
//	];
//
//	return View::make("template.shop_info.shop_info")->with($data);
//});

/*
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
*/
/*
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
*/

/*
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
*/

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
		"success"  => url("/success"),
        "data" => [
            "image_url" => "http://www.baidu.com/img/bd_logo1.png",
            "message" => Session::get("mapMsg")
        ]
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
/*
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
		"success"  => url("/success"),
		"widge_success" => [
			"deal_count" => "11",
			"deal" => [
				[
					"deal_id" => "123",
					"deal_statue" => "3",
					"same_again" => "##",
					"deal_again" => "##",
					"shop_name" => "臭脚丫",
					"deal_number" => "1234567345678",
					"deal_time" => "2014-11-18 11:11:27",
					"deal_phone" => "15340525659 15340525659",
					"deliver_address" => "邮电大学太极操场西6门",
					"deliver_phone" => "18716625394",
					"deliver_remark" => "吃吃吃！",
					"deal_speed" => "0",
					"deal_satisfied" => "0",
					"good" => [
						[
							"goods_id" => "111123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						],
						[
							"goods_id" => "111123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "2"
						]
					],
					"others" => [
						[
							"item_name" => "红烧肉",
							"item_value" => "-5",
							"item_amount" => "1",
							"item_total" => "-5"
						]
					],
					"total" => "19"
				],
				[
					"shop_id" => "123",
					"deal_id" => "123",
					"deal_statue" => "0",
					"same_again" => "##",
					"deal_is_retrun" => "0",
					"deal_return" => "##",
					"deal_is_pre" => "1",
					"deal_pre_time" => "2014-11-17 11:45:00",
					"deal_again" => "##",
					"shop_name" => "臭脚丫",
					"deal_number" => "1234567345678",
					"deal_time" => "2014-11-18 11:11:27",
					"deal_phone" => "15340525659 15340525659",
					"deliver_address" => "邮电大学太极操场西6门",
					"deliver_phone" => "18716625394",
					"deliver_remark" => "吃吃吃！",
					"deal_speed" => "75分钟",
					"deal_satisfied" => "0",
					"good" => [
						[
							"goods_id" => "123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						],
						[
							"goods_id" => "123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						]
					],
					"others" => [
						[
							"item_name" => "减减减",
							"item_value" => "-5",
							"item_amount" => "1",
							"item_total" => "-5"
						]
					],
					"total" => "19"
				],
				[
					"shop_id" => "123",
					"deal_id" => "123",
					"deal_statue" => "1",
					"same_again" => "##",
					"deal_is_retrun" => "1",
					"deal_return" => "##",
					"deal_is_pre" => "1",
					"deal_pre_time" => "2014-11-17 11:45:00",
					"deal_again" => "##",
					"shop_name" => "臭脚丫",
					"deal_number" => "1234567345678",
					"deal_time" => "2014-11-18 11:11:27",
					"deal_phone" => "15340525659 15340525659",
					"deliver_address" => "邮电大学太极操场西6门",
					"deliver_phone" => "18716625394",
					"deliver_remark" => "吃吃吃！",
					"deal_speed" => "5分钟",
					"deal_satisfied" => "0",
					"good" => [
						[
							"goods_id" => "123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						],
						[
							"goods_id" => "123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						]
					],
					"others" => [
						[
							"item_name" => "红烧肉",
							"item_value" => "-5",
							"item_amount" => "1",
							"item_total" => "-5"
						]
					],
					"total" => "19"
				],
				[
					"shop_id" => "123",
					"deal_id" => "123",
					"deal_statue" => "2",
					"same_again" => "##",
					"deal_is_retrun" => "1",
					"deal_return" => "##",
					"deal_is_pre" => "1",
					"deal_pre_time" => "2014-11-17 11:45:00",
					"deal_again" => "##",
					"shop_name" => "臭脚丫",
					"deal_number" => "1234567345678",
					"deal_time" => "2014-11-18 11:11:27",
					"deal_phone" => "15340525659 15340525659",
					"deliver_address" => "邮电大学太极操场西6门",
					"deliver_phone" => "18716625394",
					"deliver_remark" => "吃吃吃！",
					"deal_speed" => "5分钟",
					"deal_satisfied" => "1",
					"good" => [
						[
							"goods_id" => "123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						],
						[
							"goods_id" => "123",
							"goods_name" => "红烧肉",
							"goods_value" => "12",
							"goods_amount" => "1",
							"goods_total" => "12",
							"good_atisfied" => "0"
						]
					],
					"others" => [
						[
							"item_name" => "红烧肉",
							"item_value" => "-5",
							"item_amount" => "1",
							"item_total" => "-5"
						]
					],
					"total" => "19"
				]
			]
		]
	];

	return View::make("template.success.success")->with($data);
});
*/
/*
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
*/

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


//main 测试
/*
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
*/

/*
//修改公告
Route::post("/announce", function(){
    return Redirect::to('/announce')->with('announceMsg', '修改成功!');
});
*/
/*
//添加商品
Route::post("/good", function(){
    return Redirect::to('/good')->with('goodMsg', '添加成功!');
});
*/

/*
//添加分类
Route::post("category", function(){
    return Redirect::to('/category')->with('catMsg', '添加分类成功!');
});
*/
/*
//添加商店基本信息
Route::post("shop_info", function(){
	return Redirect::to('/shop_info')->with('infoMsg', '修改基本信息!');
});
*/

#dliver测试
Route::get("/deliver_goods",function(){
    $res = [
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
                "good_total" => "103460元",     // 价格总计
            ]
        ]
    ];

    return Response::json($res);
});

/*
Route::post("map", function(){
    return Redirect::to('/map')->with('mapMsg', '成功!');
});
*/


# 商家管理主页面
Route::get('/', array('before' => 'loginCheck', 'uses' => 'HomeController@index'));
Route::post('goodsChart', array('before' => 'loginCheck', 'uses' => 'HomeController@getChart'));	// 获取图表

# 登录与注册
Route::get('geohashSet', 'ShopController@geoHashSet');
Route::get('geohashGet', 'ShopController@geoHashGet');
Route::post('register', 'UserAccessController@register');
Route::post('login', 'UserAccessController@login');
Route::post('registerAjax', 'UserAccessController@register');
Route::post('loginAjax','UserAccessController@login');
Route::get('logout','UserAccessController@logout');                      // 退出登录

Route::get("/register", function(){
    $data = [
        "auth_image" => "http://t11.baidu.com/it/u=254287606,1076184673&fm=58"        //验证码
    ];

    return View::make("template.login_register.register")->with($data);

});
Route::get("/login", function(){
    $data = [
        "find_password" => "#",
        "auth_image" => url('captcha')
    ];

    return View::make("template.login_register.login")->with($data);
});


# 商家的基本操作
Route::get('announce', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@getAnnounce'));	
Route::post('announce', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@modifyAnnounce')); // 修改公告
Route::get('category', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@getGroup'));
Route::post('category', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@addGroup'));		// 添加分组/分类
//Route::get('shop_info', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@getShopInfo'));	// 获取店铺基本信息
Route::post('shop_info', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@modifyInfo'));	// 添加/修改店铺的基本信息
Route::get('good', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@getGood'));		// 获取商品分类
Route::post('good', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@addMenu'));	// 添加商品
Route::post('map', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@mapUpload'));	// 上传位置地图
Route::get('success', array('before' => 'loginCheck', 'uses' => 'HomeController@getSuccess'));	// 获取成功的订单
Route::get('getGoods', array('before' => 'loginCheck', 'uses' => 'HomeController@getGoods'));	// 获取代送订单信息


Route::post('addshop', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@addShop'));	// 添加店铺
Route::post('delmenu', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@delMenu'));          // 删除菜单
Route::post('modifymenu', array('before' => 'loginCheck', 'uses'=>'ShopAdminController@modifyMenu'));	// 修改菜单
Route::post('modifyorder', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@modifyOrder'));	// 修改订单状态
Route::post('logoUpload', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@logoUpload'));	// 店铺logo上传
Route::post('menuImageUpload', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@menuImageUpload'));	// 菜单图片上传
Route::get('getshoplogo', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@getShopLogo'));	// 添加活动之后获取图片

# 验证码
Route::post("/sms_auth",function(){
    $data = [
        'success' => true
    ];

    return Response::json($data);
});

#登录验证
Route::filter('loginCheck', function()
{
    if (!Auth::check())
    {
        return Redirect::to('login');
    }
});

Route::get('test/{shop_id}', 'HomeController@getChart');
