$(document).ready(function(){

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}

	});


	//load giá thay đổi theo sl
	$(document).on('click','button[type="button"]',function(){
		var value = $('#increase').val();
		var id = $('#increase').attr('data-id');
		console.log(id);

		$.ajax({
			url:'/user/showPrice',
			type:'post',
			dataType:'json',
			data:{
				'id':id,
				'quantity': value
			},
			success:function(data){
				console.log(data);
				$('#price').html(data);
			}
		});
	});

	// $("#addToCart").click(function(){
	// 	console.log('alo');
	// });
});
