$(document).ready(function(){

	$.ajaxSetup({

		headers:
		{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
		}
	});

	$('.notification').hide();

	$('#save').click(function(e){
		e.preventDefault();
		console.log('alo');
		$('.notification').show();
		$.ajax({
			url:'/admin/brand',
			type:"POST",
			dataType:'json',
			data:{
				'name':$('input[name="name"]').val(),
				'description':$('input[name="description"]').val()
			},
			success:function(data){
				// console.log(data);
				var mess = data['message'];
				$('.mess').html(mess);
				$("#brandCreate").load(' #brandCreate');
				$("#pageAdd").load(" #pageAdd");
			},
			error:function(error){
				$('.mess').html("ERROR!!!");
			}


		});

	});  
	// end add



	// $('.delete_Cate').click(function(e){
	// 	e.preventDefault();
	// 	var id =$(this).attr("data-id");
	// 	console.log(id);
	// 	if(confirm("Bạn có muốn xóa?")){
	// 		$.ajax({
	// 			url:'/admin/category/'+id,
	// 			type: 'DELETE',
	// 			dataType:'json',
	// 			data:{},
	// 			success:function(data){
	// 				var mess = data['message'];
	// 				// $('.mess').html(mess);
	// 				alert(mess);
	// 				$("#table_Cate").load(" #table_Cate");
	// 				$(".delete_Cate").load(" .delete_Cate");
	// 			},
	// 			error:function(error){
	// 				$('.mess').html(error);
	// 			}
	// 		});
	// 	}else{
	// 		return false;
	// 		id=null;
	// 		console.log("id"+id);
	// 	};


	// });

	// end delete
	

		$('.edit_Cate').on("click", function(){
			var id = $(this).attr("data-id");
			console.log(id);
			var name = $(this).attr("data-name");
			// console.log(name)
			$('input[name="name"]').val(name);
			// $('input[name="description"]').val(name);

			$('#save_Edit_Cate').on("click", function(){
			// var form_data = $(this).serialize();
			// console.log(form_data);
				$.ajax({
					url:'/admin/brand/'+id,
					type:'PUT',
					dataType:'json',
					data:{
						'name': $('#form_edit input[name="name"]').val(),
						'description':$('#form_edit input[name="description"]').val()
					},
					success:function(data){
						$('.notification').show();
						console.log(data);
						var mess = data['message'];
						$('.mess').html(mess);
						$("#brandCreate").load(' #brandCreate');
						// location.reload()
					}
				});

		});

		$("#close_Edit").on("click", function(){
			id=null;
		});


	});


	

});






$(document).ready(function(){
	$.ajaxSetup({

		headers:
		{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
		}
	});

	$('.notification').hide();

	$('.delete_Cate').click(function(e){
		e.preventDefault();
		console.log('alo');
		// $('.notification').show();
		var id =$(this).attr("data-id");
		console.log(id);
		if(confirm("Bạn có muốn xóa?")){
			$.ajax({
				url:'/admin/brand/'+id,
				type: 'DELETE',
				dataType:'json',
				data:{},
				success:function(data){
					
					// var mess = data['message'];
					// $('.mess').html(mess);
					// alert(mess);
					// $("#table_Cate").load("  #table_Cate");
				},
				error:function(error){
					$('.mess').html(error);
				}
			}).done(function(data){
				// console.log(data);
				alert(data['message']);
				var dl = data['data'];
				var info="";
				for (var i = 0; i < dl.length; i++) {
					info+="<tr>";
					info+='<td width="10%">'+dl[i]["id"]+'</td>';
					info+='<td width="25%">'+dl[i]["name"]+'</td>';
					info+='<td width="40%">'+dl[i]["description"]+'</td>';
					info+='<td width="25%">';
					info+='<a class="btn btn-danger delete_Cate" data-id="'+dl[i]["id"]+'">Delete</a>';
					info+='<a href=""  data-id="{{$value->id}}" data-name="'+dl[i]["name"]+'" data-target="#myModal2" data-toggle="modal" class="btn btn-info rounded-pill edit_Cate">Edit</a>';
					info+='</td>';
					info+="</tr>";
				}
				$('#bodyTable').html(info);
			});
		}

	});
});

