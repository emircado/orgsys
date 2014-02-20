$(window).load(function (){
	var user_valform = {
		username: {
			identifier	: 'username',
			rules: [{
					type	: 'empty',
					prompt	: 'Please enter a username'
			}]
		},
		password: {
			identifier	: 'password',
			rules: [{
					type	: 'empty',
					prompt	: 'Please enter a password'
			}] 
		}
	}
	var user_login_form = $("#user_login")

	$("#user_loginbutton").click(function (e) {
		// user_login_form.form(user_valform, onSuccess: thing)
		// alert(user_login_form.form('get field', 'username').val())
		var asdf = $("#user_login").form('get field', 'username').val()
		alert('asdf')
	})

	function thing() {
		alert('sup')
	}
})