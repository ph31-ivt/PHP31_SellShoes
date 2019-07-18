$(document).ready(function(){

	
	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}

	});
	// load giá thay đổi theo sl
	$(document).on('click','button[type="button"]',function(e){
		e.preventDefault();
		var value = $('#increase').val();
		var id = $('#increase').attr('data-id');
		$.ajax({
			url:'/user/showPrice',
			type:'post',
			dataType:'json',
			data:{
				'id':id,
				'quantity': value
			},
			success:function(data){
				$('#price').html(data);
			}
		});
	});


	// Start add to cart
	$(document).on('click','#addToCart',function(e){
			e.preventDefault();
			var id = $('#increase').attr('data-id');
			var quantity = $('input[type="text"]').val();
			var nameProduct = $('.nameProduct').text();
			var price = $('#price').text();
			var size = $('input[name="size"]:checked').val();
			if(size.length != 0){
				$.ajax({
					url:'/user/cartShopping',
					type:'POST',
					dataType:'json',
					data:{
						'id':id,
						'quantity':quantity,
						'product':nameProduct,
						'size':size
					},
					success:function(data){
						$('.count').html(data);
						alert('Đã thêm vào giỏ hàng');
					}
				});
			}else{
				alert('bạn cần phải chọn size');
			}
	});
});
