----------------------------
### 商家注册
商家的注册使用统一登录账号.

-----------------------------
### 首页

	type : "blade"
	output : {
		shop_name : "" // 商家名称
		shop_logo : "" // 商家logo地址
		shop_type : "" // 商家类型
		shop_address : "" // 商家地址
	}


	//首页图表
	type : "get"
    url  : "",
    input : {


    }
    output:{
        success : "true"                                // 成功返回true, 失败返回false
        state   : 200                                   // HTTP 状态码
        errMsg  : ""                                    // 如果出现错误, 错误信息就出现在这, 如果没有, 那内容为空.
        no      : 0                                     // 错误号 ,错误号就出现在这, 如果没有, 那内容为空.
        data    : {
        	month : ["" "" "" "" "" ""]					// 用于比较的六个月份
			goods : [   								// 按菜系类别返回多组数据
				{
					goods_id : ""       		// 商品id
					goods_name : ""    			// 商品名称
					goods_sails : ["" "" "" "" "" ""] 	    // 前六个月的销量商品销量
				}
			]
        }
    }

### 添加公告

	type : "blade"
	output : {
		"announcement" => "买买买"				//餐厅公告
		"min_price" => "58"						//起送价
	}

### 商家基本信息添加页面

	type : "form"
	input : {
		shop_img : "" //商家logo地址
		shop_name : "" // 商家名称
		shop_logo : "" // 商家logo
		shop_type : "" // 商家类型
		shop_address : "" // 商家地址
		price_begin : "" // 起送价
		deliver_begin : "" // 送餐开始时间
		shop_time : "09:50 - 13:30 / 16:00 - 19:30" // 商家开门时间. 单输入框
		shop_statement : "" // 商家简介
		shop_open : "" // 开门时间
		shop_close : "" // 关门时间
	}
商家类型的所有情况： `全部 中式 西式 港式 奶茶 烧烤 日式 韩式 甜点 汉堡` 前端使用select


#### 上传商家logo， 跟个人中心的logo上传一个方式
	type : "upload"
	url  : "" 



###上传成功之后获取图片

	type : "get"
	output : {
		success : "true"                // 成功返回true, 失败返回false
	    state   : 200                   // HTTP 状态码
	    nextSrc : ""                    // 登录成功后的跳转地址
	    errMsg  : ""                    // 如果出现错误, 错误信息就出现在这, 如果没有, 那内容为空.
	    no      : 0                     // 错误号 ,错误号就出现在这, 
	    data : {
			image_url : "" //图片地址
		}
	}





### 添加分类

	type : "form"
	input : {
		classify_name : "10元管饱" // 类别名称
	}

### 添加公告

	type : "form"
	input : {
		announce_content : ""              // 餐厅公告内容
        start_price      : ""              // 起送价
	}


### 添加位置地图
type : "upload"
url  : "" 


### 上传成功之后获取图片
	type : "get"
	output : {
		success : "true"                // 成功返回true, 失败返回false
	    state   : 200                   // HTTP 状态码
	    nextSrc : ""                    // 登录成功后的跳转地址
	    errMsg  : ""                    // 如果出现错误, 错误信息就出现在这, 如果没有, 那内容为空.
	    no      : 0                     // 错误号 ,错误号就出现在这, 
	    data : {
			image_url : "" //图片地址
		}
	}

### 添加商品

	type : "form"
	output : {
		category : [
			{
				classify_name : "10元管饱" // 类别名称
				classify_id : "" // 类别id
			}
		]
	}

	input : {
		classify_sec : [
			{
				good_name :    "" // 商品名称
				good_price :   "" // 商品价格
				good_style_id :   "" // 商品类别
			}
		]
	}



### 获取待送订单信息
   url: "deliver_goods"
	type : "get"
	second : "" // 轮询间隔  1s
	output : {
		success : "true"                // 成功返回true, 失败返回false
	    state   : 200                   // HTTP 状态码
	    errMsg  : ""                    // 如果出现错误, 错误信息就出现在这, 如果没有, 那内容为空.
	    no      : 0                     // 错误号 ,错误号就出现在这, 
		data : {
			deal_id : "" // 订单id
			deal_number : "" // 订单号
			deal_time : "" // 订单时间
			deliver_address : "" // 订单送往地址
			deliver_phone : ""  // 订单联系电话
			deliver_remark : "" // 订单备注
			sure_href   :: ""  // 点击确认时发送的链接
			goods : [
				{
					good_name : "红烧肉" // 商品名称
					good_value : "12"   // 商品价格
					good_amount : ""    // 商品数量
					good_total : ""     // 价格总计
				}
			]
		}
	}

type : "get"
url : sure_href  // 从上面sure_href 获取的链接， 商家点击按钮之后发送这个请求， 用来判断商铺已经确认订单
output : {
	
}


### 获取成功的订单

	type : "blade"
	output : {
		widge_success : {
			deal_count :  ""        // 订单数量
			deal : [
				{
					deal_id     :  ""  // 订单id
					deal_statue :  ""  // 交易状态 0 付款失败 1 无效订单 3 交易已完成
					deal_again  :  ""  // 商品的地址
					shop_name   :  ""  // 商店的名称
					deal_number :  ""  // 订单号
					deal_time   :  ""  // 订单时间
					deal_phone  :  ""  // 餐厅电话
					deliver_address : "" // 订单送往地址
					deliver_phone : "" // 订单联系电话
					deliver_remark :  "" // 订单备注
					deal_speed  :  "" // 送餐速度 0 没有评论 1小时15分钟 送餐时间
					deal_satisfied : "" // 订单满意度 0 没有评价 1 不满意 2 一般般 3 满意
					goods : [  // 购买的所有商品
						{
							goods_id    : ""       // 商品id
							goods_name : "红烧肉"  // 商品名称
							goods_value : ""       // 商品价格
							goods_amount : ""      // 商品数量
							goods_total  : ""      // 商品价格总计
							good_atisfied: ""      // 商品评价
						}
					]
					others : [  // 其他费用
						{
							item_name  : "11元管饱又管好（重庆）"        // 其他费用名称
							item_value : ""                              // 其他费用单价
							item_amount : ""                             // 其他费用数量
							item_total : ""                              // 其他费用小计
						}
					]

					total : ""         // 价格总计
				}
			]
		}
	}







