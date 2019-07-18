$(document).ready(function(){

	$.ajaxSetup({

		headers: {

			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}

	});


	// start search products
	$(document).on('keyup','#search',function(e){
		e.preventDefault();
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

	// search category
	$(document).on('click','.category',function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url:'/user/searchCategory/'+id,
			type:'get',
			dataType:'json',
			success:function(data){
				$('#showProduct').html(data);
			}
		});
	});


	

	//search prices
	$(document).on('change','#amount',function(){
		var number = $(this).val();
		console.log(number);
	});

	// search size
	$(document).on('click','.size',function(){
		var id =$('input[name="checkSize"]:checked').attr('data-id');
		console.log(id);
		$.ajax({
			url:'/user/searchSize/'+id,
			type:'get',
			dataType:'json',
			success:function(data){
				$('#showProduct').html(data);
			}
		});
	});

});