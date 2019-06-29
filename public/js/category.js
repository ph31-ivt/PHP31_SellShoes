$(document).ready(function(){
	// fetchData();
	$.ajaxSetup({

		headers:
		{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
		}
	});

	$('.notification').hide();

	$('#save').click(function(e){
		// e.preventDefault();
		console.log('alo');
		$('.notification').show();
		$.ajax({
			url:'/admin/category',
			type:"POST",
			dataType:'json',
			data:{
				'name':$('input[name="name"]').val()
			},
			success:function(data){

				





				console.log(data);
				var mess = data['message'];
				$('.mess').html(mess);
				
			},
			error:function(error){
				$('.mess').html("ERROR!!!");
			}


		})
		.done(function(){
			$("#table_Cate").load(' #table_Cate');
			$("#pageAdd").load(" #pageAdd");
		});

	});  
	// end add

	function fetch(curent){
		
	}

	$('.delete_Cate').click(function(e){
		e.preventDefault();
		var curent =$(this);
		if(confirm("Bạn có muốn xóa?")){
			var id=curent.attr("data-id");
			$.ajax({
				url:'/admin/category/'+id,
				type: 'DELETE',
				dataType:'json',
				data:{},
				success:function(data){
					// var out='<table class="table" id="table_Cate"><thead><tr><td width="25%">#</td><td width="25%">Name</td><td width="25%">Delete</td><td width="25%">Update</td> </tr></thead><tbody>';
					// var dl=data['data'];
					
					// for (var i = 0; i < dl.length; i++) {
					// 	out+='<tr><td>'+dl[i]["id"]+'</td><td>'+dl[i]["name"]+'</td><td><a class="btn btn-danger delete_Cate" data-id="'+dl[i]["id"]+'">Delete</a></td><td><a href=""  data-id="'+dl[i]["id"]+'" data-name="'+dl[i]["name"]+'" data-target="#myModal2" data-toggle="modal" class="btn btn-info rounded-pill edit_Cate">Edit</a></td></tr>';
					// }

     //       			 out+='</tbody> </table>';



					// console.log(data);
					var mess = data['message'];
					// $('.mess').html(mess);
					alert(mess);
					$("#table_Cate").load(" #table_Cate");
					// $("#table_Cate").load(" #tableCateBody");
					// $(".delete_Cate").load(" .delete_Cate");
					$("#pageAdd").load(" #pageAdd");
					// $('.category').html(out);




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

	function fetchData(){
		console.log('al;o');
		$.ajax({
			url:'/admin/category/show',
			type:"GET",
			dataType:'json',
			data:{
				// 'name':$('input[name="name"]').val()
			},
			success:function(data){
				console.log(data);
				$('.category').html(data['content']);
				
			},
			error:function(error){
				$('.mess').html("ERROR!!!");
			}


		});
	};

		





		$('.edit_Cate').on("click", function(){
			var id = $(this).attr("data-id");
			console.log(id);
			var name = $(this).attr("data-name");

			$('input[name="name"]').val(name);

			$('#save_Edit_Cate').on("click", function(){
			// var form_data = $(this).serialize();
			// console.log(form_data);
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

