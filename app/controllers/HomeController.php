<?php

// 商家管理页面

class HomeController extends BaseController {

	/**
	 * 商家管理首页
	 */
	public function index(){
		
		$shop = Shop::find(Auth::user()->shop_id);

		$data = array(
			'main' => url('/'),
			'announce' => url('/announce'),
			'category' => url('/category'),
			'deliver' => url('/deliver'),
			'good' => url('/good'),
			'map' => url('/map'),
			'shop_info' => url('/shop_info'),
			'success' => url('/success'),
			'widge_main' => array(
				'shop_img' => $shop->pic,
				'shop_name' => $shop->name,
				'shop_logo' => $shop->pic,
				'shop_type' => $shop->type,
				'shop_address' => $shop->address
			)
		);
		//var_dump($data);
		return View::make("template.main.main")->with($data);
		
	}

	/**
	 * 获取代送订单信息
	 */
	public function getGoods(){
		$order = Order::where('state_of_shop', 2)->first();	// 前段要求只要一个
		
		$data = array(
			'success' => true,
			'deal_id' => $order->id,
			'deal_time' => date('Y-m-d', $order->ordertime),
			'deal_number' => $order->number,
			'deliver_address' => $order->receive_address,
			'deliver_phone' => $order->receive_phone,
			'deliver_remark' => $order->beta,
			'sure_href' => url('confirmOrder'),	// 确认订单
			'goods' => array()
		);
		$menu_ids = array_count_values(explode(',', $order->order_menus));
		foreach($menu_ids as $menu_id => $amount){
			$good = Menu::find($menu_id);
			array_push($data['goods'], array(
				'good_name' => $good->title,
				'good_value' => $good->price,
				'good_amount' => $amount,
				'good_total' => $good->price * $amount
			));
		}

		//var_dump($data);
		return Response::json($data);
	}

	/**
	 * 确认订单
	 */
	public function confirmOrder(){
		echo 'hehe';
	}

	/**
	 * 获取成功的订单
	 * @return [type] [description]
	 */
	public function getSuccess(){
		$data = array(
			'main' => url('/'),
			'announce' => url('/announce'),
			'category' => url('/category'),
			'deliver' => url('/deliver'),
			'good' => url('/good'),
			'map' => url('/map'),
			'shop_info' => url('/shop_info'),
			'success' => url('/success'),
			'widge_success' => array()
		);

		$shop_id = Auth::user()->shop_id;

		$orders = Order::where('shop_id', $shop_id)->where('state_of_shop', 3)->get();
		$data['widge_success']['deal_count'] = count($orders);
		$data['widge_success']['deal'] = array();
		$shop = Shop::find($shop_id);

		foreach($orders as $order){
			$comment = CommentOrder::where('order_id', $order->id)->get();
			
			$one = array(
				'deal_id' => $order->id,
				'deal_statue' => $order->state,
				'same_again' => '##',
				'deal_again' => '##',
				'shop_name' => $shop->name,
				'deal_number' => $order->number,
				'deal_time' => date('Y-m-d', $order->ordertime),
				'deal_phone' => $shop->linktel,
				'deliver_address' => $order->receive_address,
				'deliver_phone' => $order->receive_phone,
				'deliver_remark' => $order->beta,
				'deal_speed' => isset($comment[0]) ? $comment[0]->speed : 0,
				'deal_satisfied' => isset($comment[0]) ? $comment[0]->value : 0,
				'good' => array(),
				'others' => array(array(
					'item_name' => '不知道',
					'item_value' => '-5',
					'item_amount' => '1',
					'item_total' => '0'
				))
			); 
			$one['total'] = $order->total;
			$menu_ids = array_count_values(explode(',', $order->order_menus));
			
			foreach($menu_ids as $menu_id => $amount){
				$menuComment = CommentMenu::where('order_id', $order->id)
											->where('menu_id', $menu_id)
											->get();
				$menu = Menu::find($menu_id);
				//var_dump($menuComment);
				$onemenu = array(
					'goods_id' => $menu_id,
					'goods_name' => $menu->title,
					'goods_value' => $menu->price,
					'goods_amount' => $amount,
					'goods_total' => $amount * $menu->price,
					'good_atisfied' => isset($menuComment[0]) ? $menuComment[0]->value : 0
				);

				array_push($one['good'], $onemenu);
			}
			
			array_push($data['widge_success']['deal'], $one);
		}
		return View::make("template.success.success")->with($data);

		//var_dump($data);
	}

	/**
	 * 获取首页图表数据
	 */
	public function getChart(){
		$shop_id = Auth::user()->shop_id;
		$output = array(
			'success' => 'true',
			'state' => 200,
			'errMsg' => '',
			'no' => 0,
			'data' => array()
		);
		$monStr = array('一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月');
		$output['data']['month'] = array_slice($monStr, date('m', strtotime('now')) - 6, 6);
		$output['data']['goods'] = array();

		$menus = Shop::find($shop_id)->menus;
		
		foreach($menus as $menu){
			$key = 'laravel:menu:'.$menu->id.':sold:month';

			array_push($output['data']['goods'], array(
				'goods_id' => $menu->id,
				'goods_name' => $menu->title,
				'goods_sails' => Redis::lrange($key, 0, 5)
			));
		}
		return Response::json($output);
	}

	/**
	 * 获取每件商品名称以及其对应的销量
	 * @return 键值对
	 */
	public function getSoldNum($shop_id){
		$menus = Shop::find($shop_id)->menus;
		$soldNum = array();
		foreach($menus as $menu){
			$soldNum[$menu->title] = $menu->sold_num;
		}
		//var_dump($soldNum);
		return $soldNum;
	}
}
