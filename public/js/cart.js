$(document).ready(function(){

	
	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}

	});
	// load giá thay đổi theo sl
	$(document).on('click','button[type="button"]',function(){
		var value = $(this).attr('data-click');
		var value2 = $('.'+value+'').val();
		$.ajax({
			url:'/user/showPrice',
			type:'post',
			dataType:'json',
			data:{
				'id':value,
				'quantity': value2
			},
			success:function(data){
				$('.'+value+'money').html(data);
			}
		});
		var price = $('.'+value+'price').text();
		var money= $('.'+value+'money').text();
		var total = price*value2;
		

	});

	//xóa sản phẩm khỏi giỏ hàng
	$(document).on('click','.delete',function(){
		var value = $(this).attr('data-id');
		if(confirm('Bạn có muốn xóa?')){
		$.ajax({
			url:'/user/deleteCart',
			type:'post',
			dataType:'json',
			data:{
				'id':value,
			},
			success:function(data){
				$('.count').html(data);
				$('#tableCart').load(' #tableCart')
			}
		});
	}else{
		return false;
	}
		

	});


});
