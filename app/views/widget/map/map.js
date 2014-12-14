define(['jquery', 'bootstrap'], function($){
    $('#mapForm').on('submit', checker);
    function checker (){
        var val = $('.form-control').val();
        if(!val){
            alert('请选择图片!');
            return false;
        }
        var extArr = val.split('.'),
            ext = extArr[extArr.length-1].toLowerCase();

        if(['jpg', 'png', 'gif'].indexOf(ext) === -1){
            alert('文件类型不合法!');
            return false;
        }
        return true;
    }
	console.log("map loaded");
});
