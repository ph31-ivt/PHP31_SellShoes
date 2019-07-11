$(document).ready(function(){

	$.ajaxSetup({

		headers: {

			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}

	});


	// start search products
	$(document).on('keyup','#search',function(){
		var value = $(this).val();
		// console.log(value);
		$.ajax({
			url:'/user/search',
			type:"post",
			dataType:'json',
			data:{
				'value':value
			},
			success:function(data){
				$('#showProduct').html(data);
			}
		});

	});


	















});