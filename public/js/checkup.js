$('[data-toggle="datepicker"]').datepicker({
	  		format: 'yyyy-mm-dd'
	  	});

var addrecord = $("#add-record");
addrecord.click(function(e){
e.preventDefault();
status = 1;
$("#p_list").prepend('<tr id="active"><td><input type="text" name="registration_date" value="'+output+'" data-toggle="datepicker" class="col-xs-12" ></input></td>'+
						'<td><input type="text" name="pat_bdate" data-toggle="datepicker" value="'+output+'" id="daterange" class="col-xs-12 docs-date"></input></td>'+
						'<td><input type="text" name="pat_lname" class="col-xs-12"></input></td>'+
						'<td><input type="text" name="pat_fname" class="col-xs-12""></input></td>'+
						'<td><input type="number" name="weight" value="0" class="col-xs-12"></input></td>'+
						'<td><input type="number" name="height" value="0" class="col-xs-12"></input></td>'+
						'<td><input type="number" name="age" value="0" class="col-xs-12"></input></td>'+
						'<td><input type="text" name="sex" maxlength="1" class="col-xs-12"></input></td>'+
						'<td><input type="text" name="mother_name" class="col-xs-12"></input></td>'+
						'<td><input type="text" name="address" class="col-xs-12"></input></td>'+ csrf+
					'</tr>');
event.stopPropagation();
});	