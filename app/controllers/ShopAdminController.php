<?php

/**
 * 商铺管理中心
 *
 * addGroup()				添加分组
 * addMenu()				添加菜单
 * addShop()				添加店铺
 * delMenu()				删除菜单
 * modifyMenu()				修改菜单
 * modifyOrder()			修改订单状态:0用户已提交未付款,2用户已付款未配送,3正在配送,4配送完成，店家确认收获
 */
class ShopAdminController extends BaseController {

	/**
	 * 添加分组
	 * 请求类型：POST
	 */
	public function addGroup(){
		if( !Auth::check() ){
			return Redirect::to('http://weibo.com');
		}
		$user   = Auth::user();
		
		$record = array(
			'shop_id'     => Input::get('shop_id'),
			'activity_id' => Input::get('activity_id'),
			'name'        => Input::get('name'),
			'icon'        => Input::file('icon'),
			'name_abbr'   => Input::get('name_abbr')
		);
		$rules = array(
			'shop_id'     => 'required | integer | exists:shop,id',
			'activity_id' => 'required | integer | exists:activity,aid',
			'name'        => 'required | max:50',
			'icon'        => 'image | max:1024',
			'name_abbr'   => 'max:100'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			echo $v->messages();
		}

		$group = new Menugroup($record);
		if( $group->save() ){
			echo 'OKOK';
		}else{
			echo 'error';
		}
	}

	/**
	 * 添加一个菜单
	 * 商铺
	 * 请求类型：POST
	 */
	public function addMenu(){
		if( !Auth::check() ){
			return Redirect::to('http://weibo.com');
		}
		$user = Auth::user();

		$record = array(
			'b_uid'         => 4,		// 这个应该由Auth获得
			'shop_id'       => Input::get('shop_id'),
			'group_id'      => Input::get('group_id'),
			'title'	        => Input::get('title'),
			'price'         => Input::get('price'),
			'orignal_price' => Input::get('orignal_price'),
			'pic'           => Input::file('pic'),
			'state'         => Input::get('state')
		);

		$record['pic_small'] = 'wahgoih';

		$rules = array(
			'b_uid'          => 'required | integer | exists:business_user,b_uid',
			'shop_id'        => 'required | integer | exists:shop,id',
			'group_id'       => 'required | integer | exists:menu_group,id',
			'title'          => 'required | between:1,100',
			'price'          => 'required | numeric',
			'original_price' => 'numeric',				// 原价，可不用
			'pic'            => 'image | max:2048',		// 菜单的图片，可不用
			'state'          => 'digits:1'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			echo $v->messages();
		}
		array_shift($record);

		$menu = new Menu($record);
		if( $menu->save() ){
			echo 'OKOK';
		}else{
			echo 'error';
		}
	}

	/**
	 * 添加店铺
	 *
	 * 请求类型：POST
	 */
	public function addShop(){
		if( !Auth::check() ){
			return Redirect::to('http://baidu.com');
		}
		
		$user = Auth::user();		

		$record = array(
			'b_uid'            => $user->uid,
			'name'             => Input::get('name'),
			'addtime'          => time(),
			'address'          => Input::get('address'),
			'intro'            => Input::get('intro'),
			'pic'              => Input::file('pic'),				// 店铺logo
			'linkname'         => Input::get('linkname'),			// 联系人
			'tel'              => Input::get('tel'),				// 联系电话
			'ticket'           => Input::get('ticket'),				// 是否提供发票
			'interval'         => Input::get('interval'),			// 送货时间间隔/送货速度
			'begin_price'      => Input::get('begin_price'),		// 起送价描述
			'deliver_price'    => Input::get('deliver_price'), 		// 起送价
			'operation_time'   => Input::get('operation_time'),		// 运营时间
			'begin_time'       => Input::get('begin_time'), 		// 起送时间
			'type'             => Input::get('type'),				// 商家类型，指口味
			'reserve'          => Input::get('reserve'),			// 是否接受预定
			'support_activity' => Input::get('support_activity'),	// 支持的活动
			'is_online'        => Input::get('is_online'),			// 是否营业
			'announcement'     => Input::get('announcement'), 		// 商家公告
		);
		$rules = array(
			'name'             => 'required | max:50',
			'address'          => 'required | max:100',
			'intro'            => 'required | max:2048',
			'pic'              => 'required | image| max:2048',
			'linkname'         => 'required | max:50',
			'tel'              => 'required | max:20',
			'ticket'           => 'required | in:0,1',
			'interval'         => 'required | integer | max:3600',
			'begin_price'      => 'required | max:50',
			'deliver_price'    => 'numeric',
			'operation_time'   => 'required | max:50',
			'begin_time'       => 'required | max:5',
			'type'             => 'required | max:45',
			'reserve'          => 'required | in:0,1',
			'support_activity' => 'max:45',
			'is_online'        => 'required | in:0,1',
			'announcement'     => 'required | max:2048'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			echo $v->messages();
		}
		var_dump($record);
		$shop = new Shop($record);
		if( $shop->save() ){
			echo 'OKOK';
		}else{
			echo 'error';
		}
	}

	/**
	 * 删除一个菜单
	 * 请求类型：POST
	 */
	public function delMenu(){
		if( !Auth::check() ){
			return Redirect::to('http://baidu.com');
		}

		$record = array(
			'menu_id' => Input::get('menu_id')
		);

		$rules = array(
			'menu_id' => 'required | integer | exists:menu,id'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			echo $v->messages();
		}

		if( (Menu::find(Input::get('menu_id'))->delete() )){
			echo 'OKOK';
		}else{
			echo 'error';
		}		
	}

	/**
	 * 修改某个菜单
	 * 修改菜单的时候应该也是一整个表单一起传送过来，而不是单个的传过来，所以还是需要完整的数据
	 * 请求类型：POST
	 */
	public function modifyMenu(){
		
		if( !Auth::check() ){
			return Redirect::to('http://weibo.com');
		}
		$user = Auth::user();
		
		$record = array(
			'b_uid'         => $user->uid,						// 这个应该由Auth获得
			'menu_id'		=> Input::get('menu_id'),	// 商品的id必须有撒
			'shop_id'		=> Input::get('shop_id'),
			'group_id'      => Input::get('group_id'),
			'title'	        => Input::get('title'),
			'price'         => Input::get('price'),
			'orignal_price' => Input::get('orignal_price'),
			'pic'           => Input::file('pic'),
			'state'         => Input::get('state')
		);
		$record['pic_small'] = 'wanghao';
		$rules = array(
			'b_uid'          => 'required |integer | exists:business_user,b_uid',
			'menu_id'		 => 'required | integer | exists:menu,id',
			'shop_id'		 => 'required | integer | exists:menu_group,id',
			'group_id'       => 'integer | exists:menu_group,id',
			'title'          => 'between:1,100',
			'price'          => 'numeric',
			'original_price' => 'numeric',				// 原价，可不用
			'pic'            => 'image | max:2048',		// 菜单的图片，可不用
			'state'          => 'digits:1'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			echo $v->messages();
		}

		$menu_id = $record['menu_id'];
		array_shift($record);	// 去掉不需要的两个字段
		array_shift($record);
		if( Menu::find($menu_id)->update($record) ){
			return 'OKOK';
		}else{
			echo 'error';
		}
	}

	/**
	 * 修改订单状态
	 * 请求类型：POST
	 */
	public function modifyOrder(){
		if( !Auth::check() ){
			return Redirect::to('http://baidu.com');
		}
		
		$record = array(
			'order_id'      => Input::get('order_id'),
			'state_of_shop' => Input::get('state')
		);
		$rules = array(
			'order_id'      => 'required | integer | exists:order,id',
			'state_of_shop' => 'required | integer | between:0,5'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			echo $v->messages();
		}

		if( Order::where('id', $record['order_id'])->update(array('state_of_shop' => $record['state'])) ){
			echo 'OKOK';
		}else{
			echo 'error';
		}
	}
}