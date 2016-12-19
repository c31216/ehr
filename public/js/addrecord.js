$(document).ready(function(){

	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
	    ((''+month).length<2 ? '0' : '') + month + '-' +
	    ((''+day).length<2 ? '0' : '') + day;

	var status;
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
			var registration_date = $("input[name=registration_date]").val();

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
	          data: {registration_date:registration_date,pat_bdate:pat_bdate,pat_lname:pat_lname,pat_fname:pat_fname,weight:weight,height:height,age:age,sex:sex,mother_name:mother_name,address:address,_token:token},
	          success: function(id){

	          	$("tr#active td").addClass('edit');

	          	$("tr#active td input").each(function(){
	          		$(this).closest('td').append($(this).val()).addClass($(this).attr('name')).attr('id', id);
	          	});
	          	$("tr#active").append('<td><a href="posts/'+id+'"><p>View Profile</p></a></td>');
	          	$("tr#active").append('<td><a href="checkup/'+id+'"><p>Check Up</p></a></td>');
	          	$("tr#active").addClass('success');
	          	// $("tr td#1").append(registration_date).addClass('edit');
	          	// $("tr td#2").append(pat_bdate).addClass('edit');
	          	// $("tr td#3").append(pat_lname).addClass('edit');
	          	// $("tr td#4").append(pat_fname).addClass('edit');
	          	// $("tr td#5").append(weight).addClass('edit');
	          	// $("tr td#6").append(height).addClass('edit');
	          	// $("tr td#7").append(age).addClass('edit');
	          	// $("tr td#8").append(sex).addClass('edit');
	          	// $("tr td#9").append(mother_name).addClass('edit');
	          	// $("tr td#10").append(address).addClass('edit');
	          	$("tr#active td input").remove();
	          	
	          	addrecord.show();
	          	status = 0;
	          }
	           
	        });
       	}
	});

// $('body').on('click', function(e){
//     alert(e.target.id);    
// });
$(document).on('click', ".edit", function () { 

    $('.edit').editable('posts/update', {
     // type     : 'textarea',
     // onblur   : 'submit',
     // event: 'dblclick',
     select : true,
     submitdata : function(value, settings) {
       return {_method: "PUT",_token:token,col:$(this).attr("class").split(' ')[1]};


   }
 });

});

$(document).on('click', ".date", function () { 

   $('.date').editable('posts/update', {
     select : true,
     type: 'datepicker',
     data: function(value, settings) {
      return value;
    },
     submitdata : function(value, settings) {
       return {_method: "PUT",_token:token,col:$(this).attr("class").split(' ')[1]};
   }
 });

});

 $('.edit').editable('posts/update', {
     // type     : 'textarea',
     // onblur   : 'submit',
     event: 'click',
     indicator : 'saving ...',
     select : true,
     submitdata : function(value, settings) {
       return {_method: "PUT",_token:token,col:$(this).attr("class").split(' ')[1]};
   	},callback : function(value, settings) {
         $(this).addClass('success');
     }
 });
 $.editable.addInputType('datepicker', {
    element: function(settings, original) {
        var input = $('<input/>');
        $(this).append(input);
        return (input);
    },
    plugin: function(settings, original) {
        settings.onblur = 'ignore';
        $(this).find('input').datepicker({
             autoclose: true,
            format: 'yyyy-mm-dd',
        });
    },
});


$('.date').editable('posts/update', {

    event: 'click',
    type: 'datepicker',
    data: function(value, settings) {
      return value;
    },
     submitdata : function(value, settings) {
       return {_method: "PUT",_token:token,col:$(this).attr("class").split(' ')[1]};
	},callback : function(value, settings) {
         $(this).addClass('success');
    }
 });

 $(document).on("keyup", "input", function(){
    $(this).removeClass("required");
});

 


	

});