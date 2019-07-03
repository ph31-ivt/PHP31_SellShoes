$(document).ready(function(){

	$.ajaxSetup({

		headers:
		{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
		}
	});

	$('.notification').hide();

	$('#save').click(function(e){
		// e.preventDefault();
		// console.log('alo');
		$('.notification').show();
		// var data = $('#addPromotion').serialize();
		// console.log(data.name);
		$.ajax({
			url:'/admin/promotion',
			type:"POST",
			dataType:'json',
			data:{
				'name':$('#addPromotion input[name="name"]').val(),
				'code':$('#addPromotion input[name="code"]').val(),
				'unit':$('#addPromotion input[name="unit"]').val(),
				'end':$('#addPromotion input[name="end"]').val(),
				'start':$('#addPromotion input[name="start"]').val(),
				'product_id':$('#addPromotion select[name="product_id"]').val(),
			},
			success:function(data){
				console.log(data);
				// var mess = data['message'];
				// $('.mess').html(mess);
				
			},
			error:function(error){
				$('.mess').html("ERROR!!!");
			}


		}).done(function(){
			$("#table_Cate").load(' #table_Cate');
			$("#pageAdd").load(" #pageAdd");
		});

	});  
	// end add



	$('.delete_Cate').click(function(e){
		e.preventDefault();
		var curent =$(this);
		console.log(curent);
		if(confirm("Bạn có muốn xóa?")){
			var id=curent.attr("data-id");
			$.ajax({
				url:'/admin/promotion/'+id,
				type: 'DELETE',
				dataType:'json',
				data:{},
				success:function(data){
					console.log(data);
					var mess = data['message'];
					// $('.mess').html(mess);
					alert(mess);
					$("#table_Cate").load(" #table_Cate");
					// $("#table_Cate").load(" #tableCateBody");
					// $(".delete_Cate").load(" .delete_Cate");
					$("#pageAdd").load(" #pageAdd");




					// location.reload('#table_Cate');
					// $(".delete_Cate").load(" .delete_Cate");
					// $("#table_Cate").load();
				},
				error:function(error){
					// $('.mess').html(error);
					alert("ERROR!!!");
				}
			});
		}else{
			return false;
			id=null;
			console.log("id"+id);
		};



	});

	// end delete
	

		function SaveEdit(){
			$.ajax({
					url:'/admin/category/'+id,
					type:'PUT',
					dataType:'json',
					data:{
						'name': $('#ediCate').val(),
					},
					success:function(data){
						$('.notification').show();
						// console.log(data);
						var mess = data['message'];
						$('.mess').html(mess);
						$("#table_Cate").load(' #table_Cate');
						// location.reload()
					}
				});
		}





		$('.edit_Cate').on("click", function(){
			var id = $(this).attr("data-id");
			console.log(id);
			var name = $(this).attr("data-name");

			
			$.ajax({
				url:'/admin/promotion/show/'+id,
				type:'GET',
				dataType:'json',
				data:{},
				success:function(data){
					$('#editPromotion input[name="name"]').val(data['name']);
					$('#editPromotion input[name="code"]').val(data['code']);
					$('#editPromotion input[name="unit"]').val(data['unit']);
					$('#editPromotion input[name="start"]').val(data['start']);
					$('#editPromotion input[name="end"]').val(data['end']);
					$('#editPromotion select[name="product_id"]').val(data['product_id']);
				}
			});





			$('#saveEditPromotion').on("click", function(){
			// var form_data = $(this).serialize();
			// console.log(form_data);
				$.ajax({
					url:'/admin/promotion/'+id,
					type:'PUT',
					dataType:'json',
					data:{
						'name':$('#editPromotion input[name="name"]').val(),
						'code':$('#editPromotion input[name="code"]').val(),
						'unit':$('#editPromotion input[name="unit"]').val(),
						'end':$('#editPromotion input[name="end"]').val(),
						'start':$('#editPromotion input[name="start"]').val(),
						'product_id':$('#editPromotion select[name="product_id"]').val(),
					},
					success:function(data){
						// $('.notification').show();
						console.log(data);
						// var mess = data['message'];
						// $('.mess').html(mess);
						$("#table_Cate").load(' #table_Cate');
						// location.reload()
					}
				});

		});

		$("#close_Edit").on("click", function(){
			id=null;
		});


	});


	

});
