
$(function(){
	$('#search').keyup(function(){
		var value = $(this).val();
		// url1 = url + '/' + value;
		$.ajax({
          type: 'GET',
          url: url,
          data: {search:value},
          success: function(data){
          	if (value == '') {
          		$("#p_list").show();
          		$("tr#search").html('');
          	}else if (data.no!=="") {
              $("#p_list").hide();
            	$("tr#search").html(data);
              
          	}
          	
          }
           
        });
        return false;

	});

});