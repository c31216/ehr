$(function(){
	var vaccine_name;
	var option_id;
	$("a.v_dropdown").click(function(){
		var clicked = $(this).attr('id');
		vaccine_name = $("#"+clicked+" span").text();
		
	});

	$("ul.dropdown-menu a").click(function(){
		option_id = $(this).attr('id');
	
	});



});