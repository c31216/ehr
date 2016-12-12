$(function(){
	var status;
	var addrecord = $("#add-record");
	addrecord.click(function(e){
		e.preventDefault();
		status = 1;
		$("#p_list").prepend('<tr id="active"><td id="1"><input type="text" id="daterange" data-toggle="datepicker" class="col-xs-12 docs-date" ></input></td>'+
								'<td id="2"><input type="text" name="pat_bdate" data-toggle="datepicker" value="2016-12-20" id="daterange" class="col-xs-12 docs-date"></input></td>'+
								'<td id="3"><input type="text" name="pat_lname" class="col-xs-12"></input></td>'+
								'<td id="4"><input type="text" name="pat_fname" class="col-xs-12""></input></td>'+
								'<td id="5"><input type="number" name="weight" value="0" class="col-xs-12"></input></td>'+
								'<td id="6"><input type="number" name="height" value="0" class="col-xs-12"></input></td>'+
								'<td id="7"><input type="number" name="age" value="0" class="col-xs-12"></input></td>'+
								'<td id="8"><input type="text" name="sex" maxlength="1" class="col-xs-12"></input></td>'+
								'<td id="9"><input type="text" name="mother_name" class="col-xs-12"></input></td>'+
								'<td id="10"><input type="text" name="address" class="col-xs-12"></input></td>'+ csrf+
							'</tr>');
		event.stopPropagation();

		addrecord.hide();
	  	$('[data-toggle="datepicker"]').datepicker({
	  		format: 'yyyy-mm-dd'
	  	});


	});	
	
	$(window).click(function(e)
	{
		if (status==1) {

			if ( e.target.nodeName=="INPUT" ) {
			    return;
			}

			pat_bdate = $("input[name=pat_bdate]").val();
			var pat_lname = $("input[name=pat_lname]").val();
			var pat_fname = $("input[name=pat_fname]").val();
			var weight = $("input[name=weight]").val();
			var height = $("input[name=height]").val();
			var age = $("input[name=age]").val();
			var sex = $("input[name=sex]").val();
			var mother_name = $("input[name=mother_name]").val();
			var address = $("input[name=address]").val();

			var pat_bdate = pat_bdate.replace(/\//g, "-");
			var dateAr = pat_bdate.split('-');
			var pat_bdate = dateAr[0] + '-' + dateAr[1] + '-' + dateAr[2].slice(-2);

			
			$('tr td input').filter(function() {
			    return !this.value;
			    alert('filter');
			}).attr("placeholder", "Required").addClass("required");

			$.ajax({
	          type: 'POST',
	          url: add,
	          data: {pat_bdate:pat_bdate,pat_lname:pat_lname,pat_fname:pat_fname,weight:weight,height:height,age:age,sex:sex,mother_name:mother_name,address:address,_token:token},
	          success: function(data){
	          	$("tr#active td input").remove();

	          	$("tr td#2").append(pat_bdate);
	          	$("tr td#3").append(pat_lname);
	          	$("tr td#4").append(pat_fname);
	          	$("tr td#5").append(weight);
	          	$("tr td#6").append(height);
	          	$("tr td#7").append(age);
	          	$("tr td#8").append(sex);
	          	$("tr td#9").append(mother_name);
	          	$("tr td#10").append(address);
	          	$("tr#active td").removeAttr('id');
	          	addrecord.show();
	          	status = 0;
	          	alert(data);
	          }
	           
	        });
       	}
	});


     

 $(".edit").editable(edit, { 
 	name : 'newvalue'
	});
	// $(this).click(function(){
	// 	  var domElement = $(event.target).get( 0 );
	// 	  $(domElement.nodeName).append('input');

	// 	  alert(domElement.nodeName);
	// });

});