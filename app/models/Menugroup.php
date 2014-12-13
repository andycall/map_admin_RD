<?php

/*
	收藏的菜单
	表结构：(id, user_id, menu_id)
 */
class Menugroup extends Eloquent{

	public $timestamps = false;

	protected $table = 'menu_group';

	protected $fillable = array('shop_id', 'activity_id', 'name', 'icon', 'name_abbr');

	public function menus(){
        return $this->hasMany('Menu', 'group_id', 'id');
    }
}