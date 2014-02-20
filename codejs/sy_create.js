$(window).load(function (){
	var add_dept = $("#adder")

	var dept_html = '<label for="deptname[]">Name</label><input type="text" name="deptname[]">'
	var dept_html2 = '<label for="deptcode[]">Code</label><input type="text" name="deptcode[]">'
	var dept_html3 = '<input type="text" class="dh" name="depthead[]"><br/>'

	var year2 = $("#year2disp")
	var createSYErrorMsg = $("#sy_createerror")
	var sy_select = $("#chooseyear")

	$("#add_dept_button").click(function (e){
		e.preventDefault()
		add_dept.before(dept_html+dept_html2+dept_html3)
	})

	sy_select.val('----')
	sy_select.change(function (e) {
		var chosen = $(this).val()

		if (chosen == '----') {
			year2.html('').show()
		} else {
			year2.html(parseInt(chosen)+1).show()
		}
	})

	// FORM VALIDATION UPON CLICKING SUBMIT BUTTON
	$("#sy_createbutton").click(function (e){
		e.preventDefault()

		var sy_chosen = sy_select.val()

		// check if schoolyear is chosen
		if (sy_chosen == '----') {
			createSYErrorMsg.html('Please choose a schoolyear').show()
		} else {
			b = ''
			$("input[name='deptname[]']").each(function() {
				b += $(this).val()
			})
			createSYErrorMsg.html(b).show()	
		}
	})

	// $("input[name='deptcode[]']").focus(function (){
	// 	//$("input[name='depthead[]']").val('asd')

	// 	//$("div.unitheader").html('asdf').show()
	// 	createSYErrorMsg.html('asdf').show()
	// })

	$("input[name='deptcode[]']").keypress(function(){
		$("input[name='depthead[]']").val($(this).val())
	})

})