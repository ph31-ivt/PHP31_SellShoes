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
		
		$.ajax({
			url:'/admin/size',
			type:"POST",
			dataType:'json',
			data:{
				'name':$('input[name="name"]').val()
			},
			success:function(data){
				
				
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
				url:'/admin/size/'+id,
				type: 'DELETE',
				dataType:'json',
				data:{},
				success:function(data){
					// console.log(data);
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
		}


	});

	// end delete
	

		// function SaveEdit(){
		// 	$.ajax({
		// 			url:'/admin/category/'+id,
		// 			type:'PUT',
		// 			dataType:'json',
		// 			data:{
		// 				'name': $('#ediCate').val(),
		// 			},
		// 			success:function(data){
		// 				$('.notification').show();
		// 				// console.log(data);
		// 				var mess = data['message'];
		// 				$('.mess').html(mess);
		// 				$("#table_Cate").load(' #table_Cate');
		// 				// location.reload()
		// 			}
		// 		});
		// }





		$('.edit_Cate').on("click", function(){
			var id = $(this).attr("data-id");
			console.log(id);
			var name = $(this).attr("data-name");

			$('input[name="name"]').val(name);

			$('#save_Edit_Cate').on("click", function(){
			// var form_data = $(this).serialize();
			// console.log(form_data);
				$.ajax({
					url:'/admin/size/'+id,
					type:'PUT',
					dataType:'json',
					data:{
						'name': $('#ediCate').val(),
					},
					success:function(data){
						$('.notification').show();
						console.log(data);
						var mess = data['message'];
						$('.mess').html(mess);
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






// $(document).ready(function(){
// 	$.ajaxSetup({

// 		headers:
// 		{
// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
// 		}
// 	});

// 	$('.notification').hide();

// 	$('.delete_Cate').click(function(e){
// 		e.preventDefault();
// 		console.log('alo');
// 		// $('.notification').show();
// 		var id =$(this).attr("data-id");
// 		console.log(id);
// 		if(confirm("Bạn có muốn xóa?")){
// 			$.ajax({
// 				url:'/admin/category/'+id,
// 				type: 'DELETE',
// 				dataType:'json',
// 				data:{},
// 				success:function(data){
// 					console.log(data);
// 					// var mess = data['message'];
// 					// $('.mess').html(mess);
// 					// alert(mess);
// 					// $("#table_Cate").load("  #table_Cate");
// 				},
// 				error:function(error){
// 					$('.mess').html(error);
// 				}
// 			});
// 		}

// 	});
// });

