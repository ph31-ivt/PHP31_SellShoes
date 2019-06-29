@extends('layouts.admin')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <script type="text/javascript" src="/js/createUser.js"></script> -->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>

<script src="/js/app.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Create User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Create User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


<div class="col-sm-12">
	<div class="container createUser">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 border">
					<div class="container">
						<h4>Create Upload Form</h4>
						<form method="post">
							@csrf
							<fieldset class="form-group">
								@if($errors->has('name'))
									<p>{{$errors}}</p>
									<p>{{$errors['name']}}</p>
								@endif
								<label for="username">User Name<small>*</small></label>
								<input type="text" class="form-control" id="username" name="name" placeholder="User Name">
								
							</fieldset>
							<fieldset class="form-group">
								<label for="username">Email<small>*</small></label>
								@if($errors->has('email'))
									<p>{{$errors['email']}}</p>
								@endif
								<input type="email" class="form-control" id="username" name="email" placeholder="Email">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput2">Password<small>*</small></label>
								<input type="text" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
							</fieldset>
							<fieldset class="form-group">
								<label for="role">Role_Id<small>*</small></label>
								<select name="role_id" class="form-control" id="role">
									<option value="2">User</option>
									<option value="1">Admin</option>
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label for="address">Address<small>*</small></label>
								<input type="text" class="form-control" name="address" id="address" placeholder="Address">
							</fieldset>
							<fieldset class="form-group">
								<label for="tel">Tel<small>*</small></label>
								<input type="text" class="form-control" name="tel" id="tel" placeholder="Tel">
							</fieldset>
							<fieldset class="form-group">
								<input type="radio" name="gender" id="nam" value="1" checked>
								<label for="nam">Nam</label>
								<input type="radio" name="gender" value="2" id="nu">
								<label for="nu">Nữ</label>
							</fieldset>
							<fieldset class="form-group">
								<label for="day">Day Of Birth<small>*</small></label>
								<input type="date" class="form-control" name="dayofbirth" id="day" placeholder="Day Of Birth">
							<fieldset class="form-group mt-4">
								<input type="button" id="button" class="form-control btn btn-danger rounded-pill" value="Create User" >
							</fieldset>
						</form>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row notification">
						<div class="container-fluid">
							<h4 class="text-center mb-3">Create User</h4>
							<div class="alert alert-primary rounded-pill text-center alertCreate"></div>
						</div>
					</div>
					<div class="row">
						<div class="container-fluid">
							<h4 class="text-center mb-2">List of 5 New Users Created</h4>
							<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">

								<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
								  
								  <thead class="thead-dark|thead-light">
								    <tr>
								      <th scope="col">NAME</th>
								      <th scope="col">EMAIL</th>
								      <th scope="col">TEL</th>
								      <th scope="col">ADDRESSS</th>
								    </tr>
								  </thead>
								  <tbody class="tableCreate">
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="{{asset('/js/createUser.js')}}"></script>
@endsection