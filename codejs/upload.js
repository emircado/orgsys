$(window).load(function (){
	$("#upload_button").click(function (e) {
		e.preventDefault()
		var dept = $("#shirts").val()
		if (dept == 0) {
		} 
		else {
			$.ajax({
				type: 'POST',
				url: BASE_URL+'index.php/requirements/do_upload',
				data: {
					'name': dept
				},
				/*success: function(result) {
					if (result == 'good') {
						$("#shirt").submit()
					} 
					else if (result == 'bad') {
						//createUserErrorMsg.html('Username already taken.').show()
					}
				}*/
			})
		}
	})
})