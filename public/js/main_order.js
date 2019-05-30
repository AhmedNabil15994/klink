$(function(){

	function next(){
		$('html, body').animate({scrollTop : 0},600);
		$('.step_item.active').fadeOut(500, function (){
		    $('#'+$(this).attr('data-list')).removeClass('active').addClass('compelete').next().addClass('active');
		    $(this).removeClass('active').next('.step_item').addClass('active').fadeIn(500);
		    
		});

		$(document).on('change',".step__four select.form-control",function(){
            $('.step__four .next').removeAttr('disabled');     
            $('.step_item.active').fadeOut(500, function (){
			    $('#'+$(this).attr('data-list')).removeClass('active').addClass('compelete').next().addClass('active');
			    $(this).removeClass('active').next('.step_item').addClass('active').fadeIn(500);
			    
			});    
   	 	});

	}

	function check_valid(element){
        if(!element.val().length == 0){
            element.parents('.custom-input-order').addClass('filled');
        }else if(element.val().length == 0){
            element.parents('.custom-input-order').removeClass('filled');
        }
    }

    function checkTimer(input){
    	var typingTimer;                
		var doneTypingInterval = 2000;  

		input.unbind('keyup');
		input.on('keyup', function () {
		  clearTimeout(typingTimer);
		  typingTimer = setTimeout(doneTyping, doneTypingInterval);
		});

		input.unbind('keydown');
		input.on('keydown', function () {
		  clearTimeout(typingTimer);
		});

		function doneTyping () {
			checkData();
		}

    }

    function checkData(){
    	if($('#weight').val() == '' || $('#items').val() == '' || $('#length').val() == ''  || 
			$('#height').val() == '' || $('#width').val() == '' ){

		}else{
			$.ajaxSetup({
		        headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $.ajax({
		        url: "/order/check",
		        type: 'POST',
		        data: {
		           	'_token': $('input[name="_token"]').val(),
		           	'weight': $('#weight').val(),
		           	'items': $('#items').val(),
		           	'length': $('#length').val(),
		           	'height': $('#height').val(),
		           	'width': $('#width').val(),
		           	'distance': $('#distance').val(),
		           	'from':$('#from').val(),
		           	'to':$('#to').val(),
		           	'description': $('#description').val(),
		           	'person':$(".rating").rate("getValue"),
					'time':$("#myRange").val(),
					'duration':$("#duration").val(),
		        } ,
		        success: function (data) {
		         	

		        	if (isNaN(data)){
	                    $.each(data['errors'], function(i, item) { 
			                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
			            });      
	                }	
	                if(typeof(data) == 'string' || data instanceof String){

				        //$('.test').toggle();
						$('.car-loads').empty();
				        $('.car-loads').prepend(data);
				        $('.toggles').toggle();
				        $('#cost').val($('.distance_cost').text().replace(',','.'));
				        $('.det_det.cost').html($('.distance_cost').text()+" Euro");
				        $('.data_det').slideDown(500);
    					$("input[type=checkbox]").iCheck({
					        checkboxClass: 'icheckbox_square-orange',
					        radioClass: 'iradio_minimal-orange'
					    }); 
	                }
		         	
		         	
		         	
		        },        
		        error: function(data){
		            $.notify("Whoops \n No Shipping Corresponds For Given Information !",{ position:"top right" ,className:"error"});
		        }

		    });
		}
    }
    
    $('#weight , #length , #height , #width').unbind('focus');
    $('#weight , #length , #height , #width').focus(function(){
    	checkTimer($(this));
    });

    

	$(".rating, #myRange").unbind('change');
	$(".rating, #myRange").on("change", function(ev){
	   checkData();
	});

	var test = 0;
	$(document).on('ifChecked','input[type=checkbox]', function(event){
		test = 1;
	});

	$(document).on('ifUnchecked','input[type=checkbox]', function(event){
		test = 0;
	});

	$('#submit_one').unbind('click');
	$(document).on('click','#submit_one',function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		$(this).attr("disabled", "disabled");
		if($('#items').val() == 0){
			$.notify("Whoops \n Please Correct Items Count !!",{ position:"top right" ,className:"error"});
		}else{
			
			$.ajaxSetup({
		        headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $.ajax({
		        url: "/order/store",
		        type: 'POST',
		        data: {
		           	'_token': $('input[name="_token"]').val(),
		           	'weight': $('#weight').val(),
		           	'items': $('#items').val(),
		           	'length': $('#length').val(),
		           	'height': $('#height').val(),
		           	'width': $('#width').val(),
		           	'distance': $('#distance').val(),
		           	'source':$('#from').val(),
		           	'destination':$('#to').val(),
					'duration': $('#duration').val(),
		           	'cost':$('#cost').val(),
		           	'description': $('#description').val(),
		           	'ship_id':$('#ship_id').val(),
		           	'person':$(".rating").rate("getValue"),
					'time':$("#myRange").val(),
					'source_location':$('#from_lat').val()+','+$('#from_lng').val(),
					'destination_location':$('#to_lat').val()+','+$('#to_lng').val(),
					'test':test,

		        } ,
		        success: function (data) {
		         	
	                	setTimeout(function(){
				         	$('.test').toggle();
				        },1000);
				        $('.test').toggle();
				        $('.order_id').html(data[0]);
				        $('input[name="order_id"]').val(data[0]);
				        $('input[name="encrypted"]').val(data[1]);
				        $.notify("Success \n Payload Details Stored Successfully",{ position:"top right" ,className:"success"});
	                	next();
	                	$('.step__two input').on('blur',function(){
					        check_valid($(this));
					    });
	                	$('.step__two input[type=text]').each(function(){
					        check_valid($(this));
					    });

		        },        
		        error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		        }

		    });
		}    
	});

	$('.step__two .submit_button.next').unbind('click');
	$('.step__two .submit_button.next').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();

		var bill_to = $('.cargo.selectpicker3 option:selected').attr('val');
		var value = '';
		if(bill_to == 'sender'){
	        value = $('#home').val()+','+ $('#street').val()+"<br>"+ $('#postcode').val() +" " + $('#town').val()+"<br>"+$('#country').val();
		}else if (bill_to == 'receiver') {
	        value = $('#home2').val()+','+ $('#street2').val()+"<br>"+ $('#postcode2').val() +" " + $('#town2').val()+"<br>"+$('#country2').val();
		}else if (bill_to == 'other') {
	        value = $('#home3').val()+','+ $('#street3').val()+"<br>"+ $('#postcode3').val() +" " + $('#town3').val()+"<br>"+$('#country3').val();
		}

		//$('.order_id').html("1994");
		if($('.cargo.selectpicker3 option:selected').attr('val') == 'other'){
			$.ajaxSetup({
		        headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $.ajax({
		        url: "/order/storeThree",
		        type: 'POST',
		        async: true,
		        data: {
		           	'_token': $('input[name="_token"]').val(),
		           	'country1': $('#country').val(),
		           	'postal_code1': $('#postcode').val(),
		           	'street1': $('#street').val(),
		           	'home1': $('#home').val(),
		           	'gender1': $('#selectpicker option:selected').val(),
		           	'nickname1': $('#nickname').val(),
		           	'firstname1':$('#firstname').val(),
		           	'company1':$('#company').val(),
		           	'phone1':$('#phone').val(),
		           	'email1': $('#email').val(),
		           	'town1':$('#town').val(),

		           	'country2': $('#country2').val(),
		           	'postal_code2': $('#postcode2').val(),
		           	'street2': $('#street2').val(),
		           	'home2': $('#home2').val(),
		           	'gender2': $('#selectpicker2 option:selected').val(),
		           	'nickname2': $('#nickname2').val(),
		           	'firstname2':$('#firstname2').val(),
		           	'company2':$('#company2').val(),
		           	'phone2':$('#phone2').val(),
		           	'email2': $('#email2').val(),
		           	'town2':$('#town2').val(),

		           	'country3': $('#country3').val(),
		           	'postal_code3': $('#postcode3').val(),
		           	'street3': $('#street3').val(),
		           	'home3': $('#home3').val(),
		           	'gender3': $('#selectpicker4 option:selected').val(),
		           	'nickname3': $('#nickname3').val(),
		           	'firstname3':$('#firstname3').val(),
		           	'company3':$('#company3').val(),
		           	'phone3':$('#phone3').val(),
		           	'email3': $('#email3').val(),
		           	'town3':$('#town3').val(),

		           	'order_id': $('.order_id').html(),
		           	'bill_to' : $('.cargo.selectpicker3 option:selected').attr('val'),
		        } ,
		        success: function (data) {
		         	
		        	if (isNaN(data)){
	                    $.each(data['errors'], function(i, item) { 
			                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
			            });      
	                }else{	
	                	setTimeout(function(){
				         	$('.test').toggle();
				        },1000);
				        $('.test').toggle();
				        $.notify("Success \n Sender & Receiver & Other Buyer Details Stored Successfully",{ position:"top right" ,className:"success"});
	                	next();
	                }
		         	
		         	
		         	
		        },        
		        error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		        }

		    });
		}else{
			$.ajaxSetup({
		        headers: {
		          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $.ajax({
		        url: "/order/storeTwo",
		        type: 'POST',
		        data: {
		           	'_token': $('input[name="_token"]').val(),
		           	'country1': $('#country').val(),
		           	'postal_code1': $('#postcode').val(),
		           	'street1': $('#street').val(),
		           	'home1': $('#home').val(),
		           	'gender1': $('#selectpicker option:selected').val(),
		           	'nickname1': $('#nickname').val(),
		           	'firstname1':$('#firstname').val(),
		           	'company1':$('#company').val(),
		           	'phone1':$('#phone').val(),
		           	'email1': $('#email').val(),
		           	'town1':$('#town').val(),

		           	'country2': $('#country2').val(),
		           	'postal_code2': $('#postcode2').val(),
		           	'street2': $('#street2').val(),
		           	'home2': $('#home2').val(),
		           	'gender2': $('#selectpicker2 option:selected').val(),
		           	'nickname2': $('#nickname2').val(),
		           	'firstname2':$('#firstname2').val(),
		           	'company2':$('#company2').val(),
		           	'phone2':$('#phone2').val(),
		           	'email2': $('#email2').val(),
		           	'town2':$('#town2').val(),
		           	'order_id': $('.order_id').html(),
		           	'bill_to' : $('.cargo.selectpicker3 option:selected').attr('val'),
		        } ,
		        success: function (data) {
		         	
		        	if (isNaN(data)){
	                    $.each(data['errors'], function(i, item) { 
			                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
			            });      
	                }else{	
	                	setTimeout(function(){
				         	$('.test').toggle();
				        },1000);
				        $('.test').toggle();
				        $.notify("Success \n Sender & Receiver Details Stored Successfully",{ position:"top right" ,className:"success"});
	                	next();
	                }
		         	
		         	
		         	
		        },        
		        error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		        }

		    });
		}

		$('.step__five .billing-content .row').html(value);

	});



	$(document).on('click','.step__four .submit_button.next',function(e){
		$('.step_item.active').fadeOut(500, function (){
		    $('#'+$(this).attr('data-list')).removeClass('active').addClass('compelete').next().addClass('active');
		    $(this).removeClass('active').next('.step_item').addClass('active').fadeIn(500);
		    
		});
	});



		

		$(document).on('click','.comment',function(){
            var comment = $(this).siblings('.com').val();
            var profile = $(this).siblings('.value.profile').html();
            $('.offer_name').text(profile);
            $('textarea.form-control').val(comment);
        });

});