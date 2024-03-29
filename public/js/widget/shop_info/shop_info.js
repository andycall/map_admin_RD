define([ "jquery", "bootstrap", "jquery.uploadify" ], function() {
    function checker() {
        var value = $(".shop_name_input").val();
        if (!value) return alert("请填写商家名称."), $(".shop_name_input").parents(".form-group").addClass("has-error"), 
        !1;
        var val = $(".shop_time_input").val(), condition = val.replace(/ /g, "").split("/").map(function(self) {
            return /^(\d{1,2}):(\d{1,2})-(\d{1,2}):(\d{1,2})/.test(self);
        }).reduce(function(self, ori) {
            return ori && self;
        }, !0);
        return condition ? !0 : ($(".shop_time").addClass("has-error").children(".error").css("display", "block"), 
        !1);
    }
    $("#shopInfoForm").on("submit", checker), $("#upload_btn").uploadify({
        swf: "/js/lib/uploadify.swf",
        //FLash文件路径
        uploader: "/upload/uploadify.php",
        //处理ASHX页面
        formData: {},
        //传参数
        width: "75",
        height: "75",
        buttonText: "上传头像",
        queueID: "fileQueue",
        //队列的ID
        queueSizeLimit: 10,
        //队列最多可上传文件数量，默认为999
        auto: !0,
        //选择文件后是否自动上传，默认为true
        multi: !0,
        //是否为多选，默认为true
        removeCompleted: !0,
        //是否完成后移除序列，默认为true
        fileSizeLimit: "10MB",
        //单个文件大小，0为无限制，可接受KB,MB,GB等单位的字符串值
        fileTypeDesc: "person image",
        //文件描述
        fileTypeExts: "*.gif; *.jpg; *.png; *.bmp",
        //上传的文件后缀过滤器
        onQueueComplete: function() {
            //所有队列完成后事件
            history.go(0);
        },
        onUploadError: function(event, queueId, fileObj, errorObj) {
            alert(errorObj.type + "：" + errorObj.info);
        }
    }), console.log("shop info  loaded");
});