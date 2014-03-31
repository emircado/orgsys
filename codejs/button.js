$(window).load(function (){
	$('#add').click(function(){
		$('form').append('<input type="text" name="req['+whatever+']">');
		$('form').append('<input type="text" name="desc['+whatever+']">');
		whatever++;
	})
})