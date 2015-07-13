define([ "jquery", "bootstrap" ], function($) {
    function checker() {
        var value = $(".min_price_input").val();
        return value ? !0 : (alert("请填写分类名称."), $(".min_price_input").parents(".form-group").addClass("has-error"), 
        !1);
    }
    $("#catForm").on("submit", checker), console.log("category loaded");
});