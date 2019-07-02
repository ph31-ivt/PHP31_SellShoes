@extends('layouts.admin')

@section('header')
	<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('contentLeft')
<div class="col-sm-2 border">
			<div class="row">
				<div class="container-fluid col-sm-12">
						<div class="card d-flex flex-row border-0">
							<img class="card-img-top rounded-circle avatar" src="../images/giay.png" alt="Card image cap">
							<div class="card-block ml-1">
								<h4>Trung Lê</h4>
								<a href="#" class="btn btn-primary">Edit Profile</a>
							</div>
						</div>
				</div><!-- end profile -->
			</div>
				<div class="container-fluid bottom">
					<div class="row mt-2">
						<div class="container-fluid text-white">
							<a href="">Dashboard</a>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container">
							 <form method="" action="">
							 	<div class="row">
                                    <input class="form-control col-sm-9 mr-1" name="search" type="text" placeholder="Search">
                                    <button class="btn btn-info col-sm-2" type="submit"><i class="fas fa-search icon"></i></button>
                                   </div>
                                </form>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container">
							<a href="{{ROUTE('OrderList')}}">Order List</a>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container-fluid">
							<div class="dropdown open">
								<a href="" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">User</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<a class="dropdown-item" href="#">Create User</a>
									<a class="dropdown-item" href="#">List User</a>
									<a class="dropdown-item" href="#">Delete User</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container-fluid">
							<div class="dropdown open">
								<a href="" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">Categories</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<a class="dropdown-item" href="#">Create Category</a>
									<a class="dropdown-item" href="#">List Category</a>
									<a class="dropdown-item" href="#">Delete Category</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container-fluid">
							<div class="dropdown open">
								<a href="" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">Product</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<a class="dropdown-item" href="#">Create Product</a>
									<a class="dropdown-item" href="#">List Product</a>
									<a class="dropdown-item" href="#">Delete Product</a>
								</div>
							</div>
						</div>
					</div>
					

					<div class="row mt-2">
						<div class="container-fluid">
							<div class="dropdown open">
								<a href="" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">Comment</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<a class="dropdown-item" href="#">Create comment</a>
									<a class="dropdown-item" href="#">List comment</a>
									<a class="dropdown-item" href="#">Delete comment</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container">
							<a href="">Favourlit</a>
						</div>
					</div>
					<div class="row mt-2">
						<div class="container">
							<a href="">Data</a>
						</div>
					</div>

					<div class="row mt-2">
						<div class="container">
							<a href="">login</a>
						</div>
					</div>

				</div>
			
		</div>
@endsection


@section('contentRight')
<div class="col-sm-12">
		<div class="container orderList">
			<h3>Order List</h3>
			<table class="table ">
				<thead>
					<tr class="">
						<th>Customer</th>
						<th>Order ID</th>
						<th>Products</th>
						<th>Prices</th>
						<th>Quanity</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Lê Văn Trung</td>
						<td>01</td>
						<td>Giày</td>
						<td>200</td>
						<td>2</td>
						<td>
							<div class="row">
								<a href="" class="btn btn-success rounded-pill  col-sm-5">Approve</a>
								<a href="" class="btn btn-danger rounded-pill col-sm-5">Cancle</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Lê Văn Trung</td>
						<td>01</td>
						<td>Giày</td>
						<td>200</td>
						<td>2</td>
						<td>
							<div class="row">
								<a href="" class="btn btn-success rounded-pill  col-sm-5">Approve</a>
								<a href="" class="btn btn-danger rounded-pill col-sm-5">Cancle</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>Lê Văn Trung</td>
						<td>01</td>
						<td>Giày</td>
						<td>200</td>
						<td>2</td>
						<td>
							<div class="row">
								<a href="" class="btn btn-success rounded-pill  col-sm-5">Approve</a>
								<a href="" class="btn btn-danger rounded-pill col-sm-5">Cancle</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection