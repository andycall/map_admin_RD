<?php
/*
**Author:tianling
**createTime:14-11-30 上午3:13
*/

class UserAccessController extends BaseController{

    public function register(){

        $mobile = Input::get('mobile');
        $email = Input::get('email');

        $password = Input::get('password');
        //对密码进行hash加密
        $password = Hash::make($password);

        $user = new User;
        $user->password = $password;
        $user->last_login_time = time();
        $user->last_login_ip = $this->getIP();
        $user->lock = 0;
        $user->user_type = 'business';
        $user->add_time = time();


        if($user->save()){
            $uid = $user->uid;
        }else{
            echo "user base Error";
            exit;
        }

        $Buser = new BUser();
        $Buser->uid = $uid;
        $Buser->email = $email;
        $Buser->mobile = $mobile;
        $Buser->email_passed = 0;
        $Buser->mobile_passed = 1;

        if($Buser->save()){
            echo "ok";
        }
    }


    //登录接口
    public function login(){

        if(Auth::check()){
            echo json_encode(array(
                'succcess'=>false,
                'state'=>200,
                'errMsg'=>array(
                    'inputMsg'=>'该用户已登录，请不要重复登录'
                ),
                'no'=>2
            ));
            exit;
        }

        $account = Input::get('user_email');
        $password = Input::get('user_psw');

        $accountCheck = $this->accountCheck($account);
        if(!is_object($accountCheck)){
            echo json_encode(array(
                'acccount' => $account,
                'success'=>false,
                'state'=>200,
                'errMsg'=>array(
                    'inputMsg'=>'用户不存在'
                ),
                'no'=>1
            ));
            exit();
        }

        $passwordCheck = Hash::check($password,$accountCheck->user->password);

        if($passwordCheck){
            Auth::login($accountCheck);
        }else{
            echo json_encode(array(
                'succcess'=>false,
                'state'=>200,
                'errMsg'=>array(
                    'inputMsg'=>'密码验证失败'
                ),
                'no'=>2
            ));
        }

       echo json_encode(array(
            'success'=>true,
            'state'=>200,
            'nextSrc'=>url('/'),
       ));

    }

    //退出接口
    public function logout(){
        Auth::logout();

        return Redirect::to('login');
    }

    //账号查询,支持邮箱和手机
    private function accountCheck($account){

        $accountData = BUser::where('email' ,'=', $account)->orWhere('mobile','=',$account)->first();


        if(!$accountData){
            return 400;//若账户不存在，返回错误码400
        }else{
            return $accountData;
        }
    }


    //获取客户端ip地址
    private function getIP(){
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif(!empty($_SERVER["REMOTE_ADDR"])){
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else{
            $cip = "无法获取！";
        }
        return $cip;
    }
}

