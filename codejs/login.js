$(window).load(function (){
	var userErrorMsg = $("#user_loginerror")
	var orgErrorMsg = $("#org_loginerror")

	function clear_errors() {
		userErrorMsg.html('').show()
		orgErrorMsg.html('').show()
	}

	$("#user_loginbutton").click(function(e){
		e.preventDefault()
		clear_errors()

		var username = $("#input_username").val().trim()
		var password = $("#input_password").val().trim()

		if(username.length == 0 || password.length == 0) {
			userErrorMsg.html("Invalid login.").show()
		
		// check if username - password is in database
		} else {
			$.post('/index.php/main/login', 
				{'username': username, 'password': password},
				function(isvalid) {
					if (isvalid) {
						$("#user_login").submit();
					} else {
						userErrorMsg.html("Invalid username-password combination").show()
					}
				}
			)
		}
	})

	$("#org_loginbutton").click(function(e){
		e.preventDefault()
		clear_errors()

		var key = $("#input_key").val().trim()

		if(key.length == 0) {
			orgErrorMsg.html("Invalid key.").show()
		
		// check if key is in database
		} else {
			$.post('/index.php/main/org_login',
				{'key': key},
				function(isvalid) {
					if(isvalid) {
						$("#org_login").submit()
					} else {
						orgErrorMsg.html("Invalid key.").show()
					}
				}
			)
		}
	})

	
})