<?php



# 商家管理主页面
Route::get('admin/{shop_id}', array('before' => 'loginCheck', 'uses' => 'HomeController@index'));	// 商家店铺管理页面
Route::get('admin/{shop_id}/getchart', array('before' => 'loginCheck', 'uses' => 'HomeController@getChart'));	// 获取图表

# 登录与注册
Route::get('geohashSet', 'ShopController@geoHashSet');
Route::get('geohashGet', 'ShopController@geoHashGet');
Route::post('register', 'UserAccessController@register');
Route::post('login', 'UserAccessController@login');

# 商家的基本操作
Route::post('addgroup', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@addGroup'));		// 添加分组
Route::post('addmenu', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@addMenu'));          // 添加菜单
Route::post('addshop', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@addShop'));			// 添加店铺
Route::post('delmenu', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@delMenu'));          // 删除菜单
Route::post('modifymenu', array('before' => 'loginCheck', 'uses'=>'ShopAdminController@modifyMenu'));	// 修改菜单
Route::post('modifyorder', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@modifyOrder'));	// 修改订单状态
Route::post('logoUpload', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@logoUpload'));	// 店铺logo上传
Route::post('menuImageUpload', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@menuImageUpload'));	// 菜单图片上传
Route::get('getshoplogo', array('before' => 'loginCheck', 'uses' => 'ShopAdminController@getShopLogo'));	// 添加活动之后获取图片

#登录验证
Route::filter('loginCheck', function()
{
    if (!Auth::check())
    {
        return Redirect::to('login');
    }
});

Route::get('test/{shop_id}', 'HomeController@getChart');