define(['jquery', 'bootstrap'], function($){
    $('#catForm').on('submit', checker);
    function checker(){
        var value = $('.min_price_input').val();
        if(!value){
            alert('请填写分类名称.');
            $('.min_price_input').parents('.form-group').addClass('has-error');
            return false;
        }

        return true;
    }
    console.log("category loaded");
});

