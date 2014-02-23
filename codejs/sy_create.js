$(window).load(function (){
	var add_dept = $("#adder")

	// var dept_html = '<label for="deptname[]">Name</label><input type="text" name="deptname[]">'
	// var dept_html2 = '<label for="deptcode[]">Code</label><input type="text" name="deptcode[]">'
	// var dept_html3 = '<input type="text" class="dh" name="depthead[]"><br/>'

	var year2 = $("#year2disp")
	var createSYErrorMsg = $("#sy_createerror")
	var sy_select = $("#chooseyear")

	var deptcount = 3
	var deptnames = $("input[name='deptname[]']")
	var deptcodes = $("input[name='deptcode[]']")
	var deptheads = $("input[name='depthead[]']")

	// $("#add_dept_button").click(function (e){
	// 	e.preventDefault()
	// 	add_dept.before(dept_html+dept_html2+dept_html3)
	
	// })

	// for (var i = 0; i < deptcount; i+=1) {

		// deptcodes[0].keypress(function (){
		// 	deptheads[0].val('asdf')

		// 	alert(deptheads.indexOf(deptheads[2]))
		// })
	// }

	sy_select.val('----')
	sy_select.change(function (e) {
		var chosen = $(this).val()

		if (chosen == '----') {
			year2.html('').show()
		} else {
			year2.html(parseInt(chosen)+1).show()
		}
	})

	deptcodes.keyup(function (e){
		var ind = jQuery.inArray(e.target, deptcodes)
		$(deptheads[ind]).val($(this).val())
	})

	// FORM VALIDATION UPON CLICKING SUBMIT BUTTON
	// $("#sy_createbutton").click(function (e){
	// 	e.preventDefault()

		// var sy_chosen = sy_select.val()

		// // check if schoolyear is chosen
		// if (sy_chosen == '----') {
		// 	createSYErrorMsg.html('Please choose a schoolyear').show()
		// } else {
		// 	b = ''
		// 	$("input[name='deptname[]']").each(function() {
		// 		b += $(this).val()
		// 	})
		// 	createSYErrorMsg.html(b).show()	
		// }
	// })
})