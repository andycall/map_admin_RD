define(["jquery", "register/port", 'registerPort'], function($, port, registerPort){
	console.log("register loaded");
    //注册表单
    /*
     *@include 验证
     *@include ajax
     *@inclde 点击验证码切换/发送验证码
    */

    var $smsBtn = $(".sms-btn");

    //短信验证码
    $smsBtn.on("click",function(){
        if( !/^[\d]{11}$/.test($("#register-user-mobile-input").val() ) ){
            $("#register-user-mobile").find(".u-error-tip").show();
            return ;
        }
        getAuth({
            'auth_port' : port.sms_auth,     //短信验证port
            'auth_way'  : 'sms',
            'timestemp' : new Date().getTime(),   //时间戳
            'telNumber' : $("#register-user-mobile-input").val()
        });
    });

    //验证码ajax请求
    function getAuth(data,callback){
        $.post(data.auth_port, data, function(res){
            if( typeof res != 'object' ){
                try{
                    res = $.parseJSON(res);
                }catch(err){
                    alert("服务器数据异常，稍后再试");
                    return ;
                }
            }

            if(res.success){
                alert("短信已经发送，请注意接收验证码");
                    
                //计时禁止连续发送30秒
                $smsBtn.attr("disabled","disabled");

                var count     = 30,
                    orginText = $smsBtn.text();

                var authTimer = setInterval(function(){
                    $smsBtn.text( (count--) + "秒后可再发送");

                    if(count < 1 ){
                        $smsBtn.text(orginText).removeAttr("disabled");
                        clearInterval(authTimer);
                    }
                },1000);
            }else if( !res.success && res.errMsg){
                alert(res.errMsg);
            }else{
                alert("发送错误");
            }
        });
    }

    //输入框绑定事件,每次获得焦点时隐藏提示
    $("#register-form input").on('focus',function(){
        $(".u-error-tip").hide();
    });

    var $divUserMobile  = $("#register-user-mobile"),
        $divUserPwd     = $("#user-pwd"),
        $divUserRePwd   = $("#user-re-pwd"),
        $divUserEmail   = $("#register-user-email"),
        $divAuth        = $("#register-user-auth");
  
    //验证所填数据4
    function checkRegister(data){
        //先隐藏原来的errtip
        $(".u-error-tip").hide();

        //normal err tip
        var $errPwd     = $divUserPwd.find(".u-error-tip"),
              $errMobile = $divUserMobile.find(".u-error-tip"),
              $errRePwd  = $divUserRePwd.find(".u-error-tip"),
              $errAuth     = $divAuth.find(".u-error-tip"),
              $errEmail    = $divUserEmail.find(".u-error-tip");

        //验证正则
        var regEmail   = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/, //邮箱验证
            regAuth    = /^[a-z0-9A-Z]+$/,  //验证码 0-9，a-z
            regTel     = /^[\d]{11}$/, //电话号码目前仅支持11位
            regPwd     = /^[\w]{6,20}$/;    //密码 大于六位 0-9a-zA-Z_

         console.log(data.user_phone);
        //验证电话号码
        if( !regTel.test(data.user_phone) ){
            $errMobile.show();
            return false;
        }else{
            $errMobile.hide();
        }

        //验证邮箱
        if( !regEmail.test(data.user_email) ){
            $errEmail.show();
            return false;
        }else{
            $errEmail.hide();
        }

        //验证验证密码
        if( !regPwd.test(data.user_psw) ){
            $errPwd.show();
            return false;
        }else{
            $errPwd.hide();
        } 

        //验证验证密码是否相同
        if( data.user_psw != $divUserRePwd.find("input").val() ){
            $errRePwd.show();
            return false;
        }else{
            $errRePwd.hide();
        }

        //验证码
        if( !regAuth.test(data.user_auth) ){
            $errAuth.show();
            return false;
        }else{
            $errAuth.hide();
        }

        return true;

    }

    //显示表单的错误
    function showInputError($id,msg){
        var $tip = $id.find(".u-error-tip");

        if(msg){
            $tip.text(msg);
        }

        $tip.show();
    }

    //ajax
    function ajaxForm(data){
        $.ajax({
            url            : port["register"], 
            type          :  'post',
            dataType   :  'json',
            data          :  data,

            success  : function(res){
                if( typeof res != 'object' ){
                    try{
                        res = $.parseJSON(res);
                    }catch(err){
                        alert("服务器异常，稍后再试");
                        return;
                    }
                }
                if( res.success ){
                    alert("注册成功");
	                location.href = registerPort['jump_port'];
                }else if( res.inutMsg){
                    alert(res.inputMsg);
                }else if(res.otherMsg){
                    alert(res.otherMsg);
                }else{
                    alert("注册失败!!!");
                }

            }

        });
    }
    
    //提交表单
    $("#register-form").on("submit",function(ev){
        ev.preventDefault();

        var data = {
            'user_phone' : $divUserMobile.find("input").val(),   //电话号码
            'user_psw'   : $divUserPwd.find("input").val(),    //密码
            'user_email' : $divUserEmail.find("input").val(),  //邮箱
            'user_auth'  : $divAuth.find("input").val()        //验证码
        };

        if( !checkRegister(data) ){
            return false;
        }

        ajaxForm(data);
        
        //保险起见
        return false;
    });
});

