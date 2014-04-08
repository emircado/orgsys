$(window).load(function (){
	var userErrorMsg = $("#user_loginerror")
	var orgErrorMsg = $("#org_loginerror")

	function clear_errors() {
		userErrorMsg.html('').show()
		orgErrorMsg.html('').show()
	}

	$("#user_loginbutton").click(function (e){
		e.preventDefault()

		var username = $("#input_username").val().trim()
		var password = $("#input_password").val().trim()

		if(username.length == 0 || password.length == 0) {
			clear_errors()
			userErrorMsg.html("Invalid login.").show()
		
		// check if username - password is in database
		} else {
			$.ajax({
				type: 'POST',
				url: BASE_URL+"index.php/main/login",
				data: {
					'username': username,
					'password': password
				},
				success: function(result) {
					if (result == 'good') {
						$("#user_login").submit()
					} else if (result == 'bad') {
						clear_errors()
						userErrorMsg.html("Invalid username-password combination").show()
					}
				}
			})
		}
	})

	// $("#user_loginbuttonz").click(function (e){
	// 	alert('asdf')
	// })

	$("#org_loginbutton").click(function (e) {
		e.preventDefault()

		var key = $("#input_key").val().trim()

		if(key.length == 0) {
			clear_errors()
			orgErrorMsg.html("Invalid key.").show()
		
		// check if key is in database
		} else {
			$.ajax({
				type: 'POST',
				url: BASE_URL+"index.php/main/org_login",
				data: {
					'key': key
				},
				success: function(result) {
					if (result == 'good') {
						$("#org_login").submit()
					} else if (result == 'bad') {
						clear_errors()
						orgErrorMsg.html("Bad key").show()
					}
				}
			})
		}
	})
})