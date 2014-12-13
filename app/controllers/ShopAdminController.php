<?php

/**
 * 商铺管理中心
 *
 * addGroup()				添加分组
 * addMenu()				添加菜单
 * addShop()				添加店铺
 * delMenu()				删除菜单
 * getSucceed()				获取成功的订单
 * getShopLogo()			获取LOGO
 * logoUpload()				LOGO上传
 * menuImageUpload()		菜单图片上传
 * modifyAnnounce()			修改公告
 * modifyMenu()				修改菜单
 * modifyOrder()			修改订单状态:0用户已提交未付款,2用户已付款未配送,3正在配送,4配送完成，店家确认收获
 */
class ShopAdminController extends BaseController {

	/**
	 * 添加分组
	 * 请求类型：POST
	 */
	public function addGroup(){		
		$record = array(
			'shop_id'     => Auth::user()->shop_id,
			//'activity_id' => Input::get('activity_id'),
			'name'        => Input::get('classify_name'),
			'icon'        => ''//Input::file('icon'),
			//'name_abbr'   => Input::get('name_abbr')
		);
		$rules = array(
			//'shop_id'     => 'required | integer | exists:shop,id',
			//'activity_id' => 'required | integer | exists:activity,aid',
			'name'        => 'required | max:50',
			//'icon'        => 'image | max:1024',
			//'name_abbr'   => 'max:100'
		);
		var_dump($record);

		
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}

		$group = new Menugroup($record);
		if( $group->save() ){
			return Redirect::to('category')->with('catMsg', '添加分类成功!');
			
			//return json_encode(array(	'status' => '200', 'msg'    => 'add finished'));
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'add failed'
			));
		}
	}

	/**
	 * good那个接口
	 * @return [type] [description]
	 */
	public function getGood(){
		$data = array(
			'main' => url('/'),
			'announce' => url('/announce'),
			'category' => url('/category'),
			'deliver' => url('/deliver'),
			'good' => url('/good'),
			'map' => url('/map'),
			'shop_info' => url('/shop_info'),
			'success' => url('/success'),
			'data' => array('message' => Session::get('goodMsg')),
			'widge_category' => array()
		);
		$classify = Shop::find(Auth::user()->shop_id)->groups;
		foreach($classify as $group){
			array_push($data['widge_category'], array(
				'classify_name' => $group->name,
				'classify_id' => $group->id
			));
		}
		return View::make("template.good.good")->with($data);
	}

	/**
	 * 添加一个菜单
	 * 商铺
	 */
	public function addMenu(){
		$user = Auth::user();

		$record = array(
			'b_uid'         => 4,		// 这个应该由Auth获得
			'shop_id'       => Input::get('shop_id'),
			'group_id'      => Input::get('classify_id'),
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
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}
		array_shift($record);

		$menu = new Menu($record);
		if( $menu->save() ){			// 成功后返回的是分类列表
			return $this->getCategory();
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'add failed'
			));
		}


		    return Redirect::to('/good')->with('goodMsg', '添加成功!');

	}

	/**
	 * 添加店铺
	 *
	 * 请求类型：POST
	 */
	public function addShop(){		
		$user = Auth::user();	

		$record = array(
			'b_uid'            => $user->uid,
			'name'             => Input::get('shop_name'),			// 店铺名称
			'addtime'          => time(),							// 添加时间
			'address'          => Input::get('shop_address'),
			'intro'            => Input::get('shop_statement'),		// 商家简介
			'type'             => Input::get('shop_type'),			// 商家类型，指口味
			'pic'              => Input::file('shop_logo'),			// 店铺logo
			'deliver_price'    => Input::get('price_begin'), 		// 起送价
			'begin_time'       => Input::get('deliver_begin'), 		// 起送时间
			'operation_time'   => Input::get('shop_time'),		// 商家开门时间
			/*
			'linkname'         => Input::get('linkname'),			// 联系人
			'tel'              => Input::get('tel'),				// 联系电话
			'ticket'           => Input::get('ticket'),				// 是否提供发票
			'interval'         => Input::get('interval'),			// 送货时间间隔/送货速度
			'begin_price'      => Input::get('begin_price'),		// 起送价描述
			'reserve'          => Input::get('reserve'),			// 是否接受预定
			'support_activity' => Input::get('support_activity'),	// 支持的活动
			'is_online'        => Input::get('is_online'),			// 是否营业
			'announcement'     => Input::get('announcement'), 		// 商家公告
			*/
		);
		$rules = array(
			'name'             => 'required | max:50',
			'address'          => 'required | max:100',
			'intro'            => 'required | max:2048',
			'pic'              => 'required | image| max:2048',
			//'linkname'         => 'required | max:50',
			//'tel'              => 'required | max:20',
			//'ticket'           => 'required | in:0,1',
			//'interval'         => 'required | integer | max:3600',
			//'begin_price'      => 'required | max:50',
			'deliver_price'    => 'numeric',
			'operation_time'   => 'required | max:50',
			'begin_time'       => 'required | max:5',
			'type'             => 'required | max:45',
			//'reserve'          => 'required | in:0,1',
			//'support_activity' => 'max:45',
			//'is_online'        => 'required | in:0,1',
			//'announcement'     => 'required | max:2048'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}
		var_dump($record);
		$shop = new Shop($record);
		if( $shop->save() ){
			return json_encode(array(
				'status' => '200',
				'msg'    => 'add finished'
			));
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'add failed'
			));
		}
	}

	/**
	 * 删除一个菜单
	 * 请求类型：POST
	 */
	public function delMenu(){
		if( !Auth::check() ){
			return json_encode(array(
				'status' => '400',
				'msg'    => 'login failed'
			));		}

		$record = array(
			'menu_id' => Input::get('menu_id')
		);

		$rules = array(
			'menu_id' => 'required | integer | exists:menu,id'
		);
		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}

		if( (Menu::find(Input::get('menu_id'))->delete() )){
			return json_encode(array(
				'status' => '200',
				'msg'    => 'del finished'
			));
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'del failed'
			));
		}		
	}

	/**
	 * Announce的get请求
	 */
	public function getAnnounce(){
		$data = array(
			'main' => url('/'),
			'announce' => url('/announce'),
			'category' => url('/category'),
			'deliver' => url('/deliver'),
			'good' => url('/good'),
			'map' => url('/map'),
			'shop_info' => url('/shop_info'),
			'success' => url('success'),
			'data' => array(
				'message' => Session::get('announceMsg'),
				'announcement' => Session::get('announcement'),
				'min_price' => '58'
			)
		);
		return View::make('template.announce.announce')->with($data);
	}

	/**
	 * 获取分类列表
	 */
	public function getCategory($shop_id){
		$groups = Shop::find($shop_id)->groups;
		$category = array();
		foreach($groups as $group){
			array_push($category, array(
				'classify_name' => $group->title,
				'classify_name_abbr' => (mb_strlen($group->name, 'utf8') > 10) ? mb_substr($group->name, 0, 3, 'utf8').'...' : $group->name,
				'classify_id' => $group->id,
				'classify_count' => $group->menus->count(),
				'classify_icon' => $group->icon
			));
		}
		return $category;
	}



	/**
	 * category的get请求
	 */
	public function getGroup(){
		$data = array(
			'main' => url('/'),
			'announce' => url('/announce'),
			'category' => url('/category'),
			'deliver' => url('/deliver'),
			'good' => url('/good'),
			'map' => url('/map'),
			'shop_info' => url('/shop_info'),
			'success' => url('success'),
			'data' => array('message' => Session::get('catMsg'))
		);
		return View::make("template.category.category")->with($data);
	}

	/**
	 * 获取店铺基本信息
	 */
	public function getShopInfo(){
		$shop = Shop::find(Auth::user()->shop_id);
		$info = array(
			'shop_name' => $shop->name,
			'shop_logo' => $shop->pic,
			'shop_type' => $shop->type,
			'shop_address' => $shop->address,
			'price_begin' => $shop->deliver_price,
			'deliver_begin' => $shop->begin_time,
			'shop_time' => $shop->operation_time,
			'shop_statement' => $shop->intro
		);
		$data = array(
			'main' => url('/'),
			'announce' => url('/announce'),
			'category' => url('/category'),
			'deliver' => url('/deliver'),
			'good' => url('/good'),
			'map' => url('/map'),
			'shop_info' => url('shop_info'),
			'success' => url('/success'),
			'widge_shop_info' => $info,
			'data' => array('message' => Session::get('infoMsg'))
		);
		return View::make("template.shop_info.shop_info")->with($data);
	}

	/**
	 * 获取成功的订单
	 */
	public function getSucceed($shop_id){
		$menus = order::where('shop_id', $shop_id)->where('state_of_shop', 4)->get();
		
		var_dump($menus);	
	}

	/**
	 * 获取店铺logo图片
	 */
	public function getShopLogo($shop_id){
		$b_uid = Auth::user()->uid;
		$directoryName = $b_uid % 100;
		$savePath = public_path().'/uploads/businessUser/'.$directoryName.'/logo';

		return json_encode(array(
			'success' => 'true',
			'state' => 200,
			'nextSrc' => '',
			'errMsg' => '',
			'no' => 0,
			'data' => array('image_url' => $savePath)
		));
	}

	/**
     * 店铺logo上传
     **/
    public function logoUpload(){
        $file = Input::file('photo');
        $shop_id = Input::get('shop_id');

        if($file && $file->isValid()) {
			$filename  = $file->getClientOriginalName();//获取初始文件名
			
			//获取文件类型并进行验证
			$filetype  = $file->getMimeType();
			$typeArray = explode('/', $filetype, 2);
            if($typeArray['0'] != 'image'){
                echo json_encode(array(
					'status' =>'400',
					'msg'    =>'文件格式或类型违法!'
                ));
                exit();
            }
            $typeName =  $file->getClientOriginalExtension();//获取文件后缀名

			$b_uid         = Auth::user()->uid;
			$newFileName   = $this->fileNameMake($filename,$typeName);
			$directoryName = $b_uid%100;//根据用户id和100的模值，生成对应存储目录地址
			$savePath      = public_path().'/uploads/businessUser/'.$directoryName.'/logo';

            $fileSave = $file -> move($savePath,$newFileName);

            if($fileSave){
            	$pic = asset('uploads/businessUser/'.$directoryName.'/logo/'.$newFileName);
            	if( Shop::where('id', $shop_id)->update(array('pic' => $pic)) ){
            		echo json_encode(array(
						'status' => '200',
						'msg'    => 'upload finished'
            		));
            	}else{
            		echo json_encode(array(
						'status' => '400',
						'msg'    => 'save failed'
            		));
            	}
            }else{
            	echo json_encode(array(
					'status' => '400',
					'msg'    => 'move failed'
            	));
            }
        }else{
            echo json_encode(array(
				'status' =>'400',
				'msg'    =>'invalid file'
            ));
        }
    }

    /**
     * 菜单图片的上传
     */
    public function menuImageUpload(){
    	if( !Auth::check() ){
			return json_encode(array(
				'status' => '400',
				'msg'    => 'login failed'
			));
    	}
		$file    = Input::file('photo');
		$menu_id = Input::get('menu_id');

        if($file && $file->isValid()) {
			$filename  = $file->getClientOriginalName();//获取初始文件名
			
			//获取文件类型并进行验证
			$filetype  = $file->getMimeType();
			$typeArray = explode('/', $filetype, 2);
            if($typeArray['0'] != 'image'){
                echo json_encode(array(
					'status' =>'400',
					'msg'    =>'文件格式或类型违法!'
                ));
                exit();
            }
			$typeName      =  $file->getClientOriginalExtension();//获取文件后缀名
			
			$b_uid         = Auth::user()->uid;
			$newFileName   = $this->fileNameMake($filename,$typeName);
			$directoryName = $b_uid%100;//根据用户id和100的模值，生成对应存储目录地址
			$savePath      = public_path().'/uploads/businessUser/'.$directoryName.'/menuphoto';
			
			$fileSave      = $file -> move($savePath,$newFileName);

            if($fileSave){
            	$pic = asset('uploads/businessUser/'.$directoryName.'/menuphoto/'.$newFileName);
            	if( Menu::where('id', $menu_id)->update(array('pic' => $pic)) ){
            		echo json_encode(array(
						'status' => '200',
						'msg'    => 'upload finished'
            		));
            	}else{
            		echo json_encode(array(
						'status' => '400',
						'msg'    => 'save failed'
            		));
            	}
            }else{
            	echo json_encode(array(
					'status' => '400',
					'msg'    => 'move failed'
            	));
            }
        }else{
            echo json_encode(array(
				'status' =>'400',
				'msg'    =>'invalid file'
            ));
        }
    }

    /**
     * 修改公告
     */
    public function modifyAnnounce(){
    	$shop_id = Auth::user()->shop_id;

    	$record = array( 'announcement' => Input::get('announcement') );
    	$rules = array( 'announcement' => 'required | max:255');
   		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}

		$shop = Shop::find($shop_id);
		if( Shop::find($shop_id)->update($record) ){
			return Redirect::to('/announce')->with('announceMsg', '修改成功!')->with('announcement', $record['announcement']);
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'modify failed'
			));
		}
    }

    /**
     * 修改店铺基本信息
     */
    public function modifyInfo(){
		$record = array(
			'name' => Input::get('shop_name'),
			//'shop_logo' => $shop->pic,
			'type' => Input::get('shop_type'),
			'address' => Input::get('shop_address'),
			'deliver_price' => Input::get('price_begin'),
			'begin_time' => Input::get('deliver_begin'),
			'operation_time' => Input::get('shop_time'),
			'intro' => Input::get('shop_statement')
		);
		$rules = array(
			'name' => 'required | max:50',
			'type' => 'required | max:45', 
			'address' => 'required | max:255',
			'deliver_price' => 'required | numeric',
			'begin_time' => 'required | max:10',
			'operation_time' => 'required | max:100',
			'intro' => 'required | max:255'
		);
   		$v = Validator::make($record, $rules);
		if( $v->fails() ){
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}

		if( Shop::find(Auth::user()->shop_id)->update($record) ){
			return Redirect::to('/shop_info')->with('infoMsg', '修改基本信息!');		
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'modify failed'
			));
		}
    }

	/**
	 * 修改某个菜单
	 * 修改菜单的时候应该也是一整个表单一起传送过来，而不是单个的传过来，所以还是需要完整的数据
	 * 请求类型：POST
	 */
	public function modifyMenu(){
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
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}

		$menu_id = $record['menu_id'];
		array_shift($record);	// 去掉不需要的两个字段
		array_shift($record);
		if( Menu::find($menu_id)->update($record) ){
			return json_encode(array(
				'status' => '200',
				'msg'    => 'modify faile'
			));
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'modify failed'
			));
		}
	}

	/**
	 * 修改订单状态
	 * 请求类型：POST
	 */
	public function modifyOrder(){		
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
			$message         = $v->messages();	
			$error['msg']    = $message->toArray();
			$error['status'] = '400';
			return $error;
		}

		if( Order::where('id', $record['order_id'])->update(array('state_of_shop' => $record['state'])) ){
			return json_encode(array(
				'status' => '200',
				'msg'    => 'modify faile'
			));
		}else{
			return json_encode(array(
				'status' => '400',
				'msg'    => 'modify failed'
			));
		}
	}

    /**
     * 生成服务器端存储的新文件名
     **/
    private function fileNameMake($fileName,$fileType){
        $string = '';
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

		$max    = strlen($strPol)-1;
		$length = strlen($fileName);
        for($i=0;$i<$length;$i++){
            $string.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        $newFileName = md5($fileName.time().$string).'.'.$fileType;

        return $newFileName;
    }
}