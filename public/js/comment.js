$(document).ready(function(){

	$.ajaxSetup({

		headers:
		{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
		}
	});

	// start delete
	$(document).on('click', '.deleteComment', function(e){
		e.preventDefault();
		console.log('alo');
		var curent =$(this);
		console.log(curent);
		if(confirm("Bạn có muốn xóa?")){
			var id=curent.attr("data-id");
			$.ajax({
				url:'/admin/comments/'+id,
				type: 'DELETE',
				dataType:'json',
				data:{},
				success:function(data){
					alert(data['dataSuccess']);
					$("#table_Cate").load(" #table_Cate");
					$("#pageAdd").load(" #pageAdd");
				},
				error:function(error){
					alert("ERROR!!!");
				}
			});
		}else{
			return false;
		}

	});


	var out ="";

	$('#add').click(function(){
		$.ajax({
			url:'/admin/comments/approve',
			type:'POST',
			dataType:'json',
			data:{},
			success:function(data){
				var dl =data['data'];
				var user =data['user'];
				for (var i = 0; i < dl.length; i++) {
					out+='<tr>';
					out+='<td>'+dl[i]['id']+'</td>';
					out+='<td>'+user[i]+'</td>';
					out+='<td>'+dl[i]['rate']+'</td>';
					out+='<td>'+dl[i]['content']+'</td>';
					out+='<td><a href="" class="btn btn-success agree" data-id="'+dl[i]['id']+'">Agree</a><a href="" class="btn btn-danger cancel mt-1" data-id="'+dl[i]['id']+'">Cancel</a></td>';
					out+='</tr>';
				}
				$('#approve').append(out);
			}

		});


	});

	// start approve
	$(document).on('click','.agree',function(){
		var id = $(this).attr("data-id");
		$.ajax({
			url:'/admin/comments/'+id,
			type:'PUT',
			dataType:'json',
			data:{},
			success:function(data){
				alert(data);
				$("#table_Cate").load(" #table_Cate");
				$("#pageAdd").load(" #pageAdd");
			}

		});

	});


	// start cancel
	$(document).on('click','.cancel',function(){
		var id = $(this).attr("data-id");
		$.ajax({
				url:'/admin/comments/'+id,
				type: 'DELETE',
				dataType:'json',
				data:{},
				success:function(data){
				},
				error:function(error){
					alert("ERROR!!!");
				}
			});
	});


	// start popover
	// $('.hover').popover({
	// 	content:fetchData,
	// 	html:true,
	// 	trigger:'hover',
	// 	placement:'right'
	// });

	// function fetchData(){
	// 	var dataShow = "";
	// 	var id = $(this).attr('productID');
	// 	console.log(id);
	// 	$.ajax({
	// 		url:'/admin/product/popover/'+id,
	// 		dataType:'json',
	// 		async:false,
	// 		type:'GET',
	// 		data:{},
	// 		success:function(data){
	// 			dataShow=data;
	// 		}
	// 	});
	// 	return dataShow;
	// }s

	

	// start search
	// fetchDataSearch();
	// function fetchDataSearch(value=''){
	// 	$.ajax({
	// 		url:'/admin/product/searchPoduct',
	// 		type:'post',
	// 		dataType:'json',
	// 		data:{
	// 			'value':value
	// 		},
	// 		success:function(data){
	// 			console.log(data);
	// 		}
	// 	});

	// }

	// $(document).on('keyup','#search',function(){
	// 	var value = $(this).val();
	// 	console.log(value);
	// 	// fetchDataSearch(value);
	// 	$.ajax({
	// 		url:'/admin/product/searchPoduct',
	// 		type:'post',
	// 		dataType:'json',
	// 		data:{
	// 			'value':value
	// 		},
	// 		success:function(data){
	// 			console.log(data);
	// 			$('#searchProduct').fadeIn();
	// 			$('#searchProduct').html(data);
	// 		}
	// 	});
	// });


});



