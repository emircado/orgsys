$(window).load(function (){
	var editUserErrorMsg = $("#user_editerror")

	function clear_errors() {
		editUserErrorMsg.html('').show()
	}

	$("#user_editbutton").click(function (e) {
		e.preventDefault()
		clear_errors()

		var name = $("#input_editname").val().trim()
		var email = $("#input_editemail").val().trim()
		var oldpass = $("#input_editoldpass").val()
		var newpass = $("#input_editnewpass").val()
		var retypepass = $("#input_editretypepass").val()

		if (name.length == 0) {
			editUserErrorMsg.html("Name is required").show()
		} else {
			//has input in password fields
			if (oldpass.length != 0 || newpass.length != 0 || retypepass.length != 0) {
				//check for empty field
				if (oldpass.length == 0) {
					editUserErrorMsg.html('Please enter old password').show()
				} else if (newpass.length == 0) {
					editUserErrorMsg.html('Please enter new password').show()
				} else if (retypepass.length == 0) {
					editUserErrorMsg.html('Please retype new password').show()
				} else {
					$.ajax({
						type: 'POST',
						url: BASE_URL+'index.php/users/change_profile',
						data: {
							'name': name,
							'email': email,
							'pass': 1,
							'oldpass': oldpass,
							'newpass': newpass,
							'retypepass': retypepass
						},
						success: function(result) {
							if (result == 'good') {
								$("#user_edit").submit()
							//check if old password is correct
							} else if (result == 'bad1') {
								editUserErrorMsg.html('Your old password is incorrect').show()
							//check if new passwords match
							} else if (result == 'bad2') {
								editUserErrorMsg.html('New password doesn\'t match with confirmation').show()
							}
						}
					})
				}

			//password not changed
			} else {
				$.ajax({
					type: 'POST',
					url: BASE_URL+'index.php/users/change_profile',
					data: {
						'name': name,
						'email': email,
						'pass': 0
					},
					success: function(result) {
						if (result == 'good') {
							$("#user_edit").submit()
						}
					}
				})
			}
		}
	})
	
})