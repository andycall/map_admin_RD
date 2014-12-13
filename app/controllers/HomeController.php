<?php

// 商家管理页面

class HomeController extends BaseController {

	/**
	 * 商家管理首页
	 */
	public function index($shop_id){
		$shop = Shop::find($shop_id);

		$output['shop_name'] = $shop->name;
		$output['shop_logo'] = $shop->pic;
		$output['shop_type'] = $shop->type;
		$output['shop_address'] = $shop->address;

		return $output;
	}

	/**
	 * 获取首页图表数据
	 */
	public function getChart($shop_id){
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
		//var_dump($output);
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
