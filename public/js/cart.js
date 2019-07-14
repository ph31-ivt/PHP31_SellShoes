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
				var total=0;
				$('#tableCart tr').each(function(){
					$(this).find('.total').each(function(){
						var price = $(this).text();
						if(price.length !=0){
							total+=parseFloat(price);
						}
					});
				});
				console.log(total);
				 $('#total').html(total+' VNĐ');
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
				url:'/user/cartDetail',
				type:'post',
				dataType:'json',
				data:{
					'id':value,
				},
				success:function(data){
					$('.count').html(data);
					$('table').load(' table');
					var total=0;
					$('#tableCart tr').each(function(){
						$(this).find('.total').each(function(){
							var price = $(this).text();
							if(price.length !=0){
								total+=parseFloat(price);
							}
						});
					});
					 $('#total').html(total+' VNĐ');
				}
			});
		}
		else{
			return false;
		}
	});



	//tính tổng total
		var total=0;
		$('#tableCart tr').each(function(){
			$(this).find('.total').each(function(){
				var price = $(this).text();
				if(price.length !=0){
					total+=parseFloat(price);
				}
			});
		});
		console.log(total);
		 $('#total').html(total+' VNĐ');

});
