$(function(){

	$('a.lang').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();

		var locale = $(this).attr('value');
		var _token = $('input[name="_token"]').val();

		$.ajax({

			url : '/language-chooser',
			type : 'POST',
			data:{
				"locale": locale,
				"_token" : _token,
			},
			datatype: "json",
			success:function(data){

			},
			error:function(data){

			},
			beforeSend:function(){

			},
			complete:function(data){
				window.location.reload(true);
			}

		});
	});


	$('#select_lang').on('change',function(e){

		e.preventDefault();
		e.stopPropagation();

		var locale = $('#select_lang option:selected').val();
		var _token = $('input[name="_token"]').val();
		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
		$.ajax({

			url : '/language-chooser',
			type : 'POST',
			data:{
				"locale": locale,
				"_token" : _token,
			},
			datatype: "json",
			success:function(data){

			},
			error:function(data){

			},
			beforeSend:function(){

			},
			complete:function(data){
				window.location.reload(true);
			}

		});
	});

});