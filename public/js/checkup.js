$('[data-toggle="datepicker"]').datepicker({
	  		format: 'yyyy-mm-dd'
	  	});

var checkup = $("#check-up");
checkup.click(function(e){
e.preventDefault();
$("#checklist").prepend('<tr id="active"><td><input type="text" name="checkup_date" value="" data-toggle="datepicker" class="col-xs-12" ></input></td>'+
								'<td><input type="text" name="doctor" class="col-xs-12"></input></td>'+
								'<td><input type="text" name="symptoms" class="col-xs-12""></input></td>'+
								'<td><input type="text" name="prescription" class="col-xs-12"></input></td>'+								
								'<td><input type="text" name="description" class="col-xs-12"></input></td>'+
								'<td><input type="number" name="weight" value="0" class="col-xs-12"></input></td>'+csrf +
							'</tr>');
checkup.hide();

$('#active input').keypress(function(event){
  if(event.keyCode == 13){
    alert();
    
  }
});

event.stopPropagation();
});	