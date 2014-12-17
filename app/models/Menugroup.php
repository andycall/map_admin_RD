<?php

/*
	收藏的菜单
	表结构：(id, user_id, menu_id)
 */
class MenuGroup extends Eloquent{

	public $timestamps = false;

	protected $table = 'menu_group';

	protected $fillable = array('shop_id', 'name', 'icon');

	public function menus(){
        return $this->hasMany('Menu', 'group_id', 'id');
    }
    
}