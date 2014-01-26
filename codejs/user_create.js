$(window).load(function (){
	var createUserErrorMsg = $("#user_createerror")

	function clear_errors() {
		createUserErrorMsg.html('').show()
	}

	$("#user_createbutton").click(function (e) {
		e.preventDefault()
		clear_errors()

		var name = $("#input_createname").val().trim()
		var username = $("#input_createusername").val().trim()
		var role = $("#input_createrole").val()

		if(name.length == 0) {
			createUserErrorMsg.html('Please input name.').show()
		} else if (role == 0) {
			createUserErrorMsg.html('Please choose a role.').show()
		} else if (username.length == 0) {
			createUserErrorMsg.html('Please input username.').show()
		} else {
			//check if username is in db
			$.ajax({
				type: 'POST',
				url: BASE_URL+'index.php/users/submit_user',
				data: {
					'name': name,
					'username': username,
					'role': role
				},
				success: function(result) {
					if (result == 'good') {
						$("#user_create").submit()
					} else if (result == 'bad') {
						createUserErrorMsg.html('Username already taken.').show()
					}
				}
			})
		}
	})
	
})