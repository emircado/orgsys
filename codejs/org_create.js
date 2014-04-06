$(window).load(function (){
	var createOrgErrorMsg = $("#org_createerror")

	function clear_errors() {
		createOrgErrorMsg.html('').show()
	}

	$("#org_createbutton").click(function (e) {
		e.preventDefault()
		clear_errors()
		var name = $("#input_createoname").val().trim()
		var code = $("#input_createocode").val().trim()
		var role = $("#input_createodept").val()

		if (name.length == 0) {
			createOrgErrorMsg.html("Please input an org name.")
		} else if (code.length == 0) {
			createOrgErrorMsg.html("Please input an org code.")
		} else if (role == -1) {
			createOrgErrorMsg.html("Please choose a department.")
		} else {
			$.ajax({
				type: 'POST',
				url: BASE_URL+'index.php/organizations/submit_org',
				data: {
					'name': name,
					'code': code,
					'userid': role
				},
				success: function(result) {
					if (result == 'good') {
						$("#org_create").submit()
					} else if (result == 'bad') {
						//createUserErrorMsg.html('Username already taken.').show()
					}
				}
			})
		}
	})
	
})