define(['jquery', 'bootstrap'], function($){
	console.log("announce loaded");


	var announcement = $("#announcement textarea").val();

	$(".announcement_save").on("click",function() {

		var new_announcement = $("#announcement textarea").val();

		if (new_announcement != announcement) {

			var post = {};

			post.announcement = new_announcement;

			$.ajax({
				url: "/announcement",
				type: "POST",
				data: post,
				success: function (res) {

					if (res.success == 'true') {

						announcement = $("#announcement textarea").val();

					} else {
						alert(res.errMsg);
					}
				}
			});
		}
	});



	var price = $("#announcement input").val();

	$(".min_price_save").on("click",function() {

		var new_price = $("#announcement input").val();

		if (new_price != price) {

			var post = {};

			post.price = new_price;

			$.ajax({
				url: "/new_price",
				type: "POST",
				data: post,
				success: function (res) {

					if (res.success == 'true') {

						price = $("#announcement input").val();

					} else {
						alert(res.errMsg);
					}
				}
			});
		}
	});

});


