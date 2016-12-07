$(function(){
	

	$("form").submit(function(event){

		p_id = $("#p_id").val();
		v_id = $("#v_id").val();
		v_date = $("#v_date").val();
		var csrf = '{{ csrf_field() }}';
		$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}

		});
		// alert();
		$.ajax({
          type: 'POST',
          url: url,
          data: {p_id:p_id,v_id:v_id,v_id:v_id,_token:token},
          success: function(data){
          	alert(data);
          }
           
        });


	});

	

	 $('input[name="daterange"]').daterangepicker({
        singleDatePicker: true,
	    timePicker: true,
	    locale: {
	            format: 'MM/DD/YYYY h:mm A'
	        }
		}, function(start, end, label) {
	  		
	    });
	});