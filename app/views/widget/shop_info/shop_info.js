define(['jquery', 'bootstrap'], function(){
	$('#shopInfoForm').on('submit', checker);
	function checker(){
		var value = $('.shop_name_input').val();
		if(!value){
			alert('请填写商家名称.');
			$('.shop_name_input').parents('.form-group').addClass('has-error');
			return false;
		}

		return true;
	}
	console.log("shop info  loaded");
});
