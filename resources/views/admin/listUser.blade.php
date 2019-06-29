@extends('layouts.admin')

@section('header')
<link rel="stylesheet" href="/css/admin.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>

<script src="/js/app.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" href="/css/admin.css">

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="breadcrumbs d-flex align-items-center">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>List User</h1>
                    </div>
                </div>
            </div>
			<div class="col-sm-4">
				<div class="row">
					<div class="container">
						<form>
							@csrf
							<input type="text" class="rounded-pill" name="name" id="search">
							<input type="button" name="submit" value="Tìm">
						</form>
					</div>
				</div>
			</div>
            <div class="col-sm-4">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        	
                        		<div class="container">
                        			<li class="row">
                        			<i class="fas fa-users"></i>
                        			<p id="numberUser"><?php echo $numberUser; ?></p>
                        			<!-- echo "<pre>"; print_r($numberUser); echo "</pre>" -->
                        		</li>
                        	</div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div class="col-sm-12 listUser">
		<div class="container text-center">
			<table class="table" id="tableUser">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Address</th>
						<!-- <th>Gender</th> -->
						<th>Date Of Birth</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user as $value)
						<tr id="tableUser">
							<td>{{$value['name']}}</td>
							<td>{{$value['email']}}</td>
							<td>{{$value['tel']}}</td>
							<td>{{$value['address']}}</td>
							<?php $day= isset($value['dayofbirth'])?$value['dayofbirth'] : '-----------'; ?>
							<td>{{$day}}</td>
							<td>
							<a href="" class="btn btn-danger col-sm-10 rounded-pill" id="delete"data-url="{{route('user.destroy',$value->id)}}" data="{{$value->id}}"><i class="fas fa-times"></i></a>
						</td>
						</tr>	
					@endforeach
				</tbody>
			</table>
			<div class="row">
				<div class="container-fluid text-center">
					<p class="text-center">
						{{ $user->links()}}
					</p>			
				</div>
			</div>
			
			
		</div>
	</div>

<script src="{{asset('/js/createUser.js')}}"></script>
@endsection
