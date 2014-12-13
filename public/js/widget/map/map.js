define([ "jquery", "bootstrap" ], function($) {
    function checker() {
        var val = $(".form-control").val();
        if (!val) return alert("请选择图片!"), !1;
        var extArr = val.split("."), ext = extArr[extArr.length - 1].toLowerCase();
        return -1 === [ "jpg", "png", "gif" ].indexOf(ext) ? (alert("文件类型不合法!"), !1) : !0;
    }
    $("#mapForm").on("submit", checker), console.log("map loaded");
});