<?php

/**
 * 菜单总表
 *
 * getClassify()	获取某个店铺菜单的分类
 */
 
 class Menu extends Eloquent{

	public $timestamps = false;

	protected $table = 'menu';

	protected $fillable = array('b_uid', 'shop_id', 'group_id', 'title', 'price', 'original_price', 'pic', 'state');

}