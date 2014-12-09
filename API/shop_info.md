----------------------------
### 商家注册
商家的注册使用统一登录账号.

-----------------------------
### 商家基本信息添加页面

	type : "form"
	input : {
		shop_name : "" // 商家名称
		shop_logo : "" // 商家logo
		shop_type : "" // 商家类型
		shop_address : "" // 商家地址
		price_begin : "" // 起送价
		deliver_begin : "" // 送餐开始时间
		shop_time : "09:50 - 13:30 / 16:00 - 19:30" // 商家开门时间. 单输入框
		shop_statement : "" // 商家简介
	}
商家类型的所有情况： `全部 中式 西式 港式 奶茶 烧烤 日式 韩式 甜点 汉堡` 前端使用select


#### 上传商家logo， 跟个人中心的logo上传一个方式
type : "upload"


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



 
### 添加活动
	
	type : "form"
	input : {
		activity_name : "1元秒杀", // 活动名称
		activity_icon : "" //  活动图标 （暂时不弄）
		activity_statement : "" // 活动简介
	}

### 添加分类

	type : "form"
	input : {
		classify_name : "10元管饱" // 类别名称
		classify_name_abbr : "点餐就有红包拿！没办…" // 类别名称简写
	}

### 添加公告

	type : "form"
	input : {
		announce_content : ""              // 餐厅公告内容
        start_price      : ""              // 起送价
        activities       : ['1','2','3']   // 支持的活动id
	}


### 添加位置地图

	type : "upload"
	input : {

	}


### 添加商品

	type : "form"
	output : {
		activities : [  // 这里获取活动用户在添加商品的时候， 选择支持的活动
			{
				activity_id : ""   // 活动id
				activity_name : "1元秒杀", // 活动名称
				activity_icon : "" //  活动图标 （暂时不弄）
				activity_statement : "" // 活动简介
			}
		],
		category : [
			{
				classify_name : "10元管饱" // 类别名称
				classify_name_abbr : "点餐就有红包拿！没办…" // 类别名称简写
				classify_id : "" // 类别id
				classify_count : "" // 类别中有多少商品
				classify_icon : "" // 类别图标地址
			}
		]
	}

	input : {
		classify_sec : [
			{
				classify_id   : ['1','2'] // 支持的类别id
				activity_id   : ['1','2'] // 支持的活动id
				good_name :    "" // 商品名称
				good_price :   "" // 商品价格
			}
		]
	}



