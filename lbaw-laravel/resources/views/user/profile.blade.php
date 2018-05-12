@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<img class="profile-user-pic" src="{{ URL::asset("images/default.png") }}" alt="Profile picture">
				<div class="profile-user-title">
					<div class="profile-user-name">
						{{$user->username}}
					</div>
				</div>
				<div class="profile-user-menu">
					<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
					<li class="active"><a data-toggle="pill" href="#overview"><i class="fa fa-user"></i> Personal Info</a></li>
					<li><a data-toggle="pill" href="#favorites"><i class="fa fa-heart"></i> Favorites</a></a></li>
					<li><a data-toggle="pill" href="#history"><i class="fa fa-history"></i> History </a></li>
					@if(Auth::id() == $user->id)
					<li><a data-toggle="pill" href="#settings"><i class="fa fa-cogs"></i> Settings </a></li>
					@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="profile-tabs tab-content col-md-9">
			<div id="overview" class="tab-pane fade show active">
				<div class="card fav-card">
             		<div class="card-header bg-dark text-light">Personal Info</div>
					<div class="card-body">
						<a> Username </a> <p>{{$user->username}}</p>
						<a> Email </a> <p>{{$user->email}} </p>
						<a> Address </a> <p>{{$user->address}}</p>
						<a> City </a> <p>{{$user->city}}</p>
						<a> Zip </a> <p>{{$user->zip}}</p>
						<a> Password</a> <p> ********** </p>
					</div>
				</div>
			</div>
			@if(Auth::id() == $user->id)
			<div id="settings" class="tab-pane fade show">
				<div class="card fav-card">
             		<div class="card-header bg-dark text-light">Settings</div>
					<div class="card-body">
						<form form class="form-horizontal" method="POST" action="{{ route('update_user', ['id' => Auth::user()->id])}}">
							{{ csrf_field() }}
				
							<div class="form-group">
								<a> Username </a>
								<input  id="name" type="text" class="form-control" name="username" value="{{ $user->username  }}" required autofocus>
							</div>
				
							<div class="form-group">
								<a> Address </a>
								<input  id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required>
							</div>
				
							<div class="form-row">
								<div class="form-group col-md-8 ">
									<a> City </a>
									<input  id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required>
								</div>
								<div class="form-group col-md-4">
									<a> Zip </a>
									<input  id="zip" type="text" class="form-control" name="zip" value="{{ $user->zip }}" required>
								</div>
							</div>

							<div class="form-group">
								<a> Email </a>
								<input  id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required>
							</div>

							<div class="form-group float-left">
								<button type="submit" class="btn btn-dark ">Save Changes</button>
							</div>

						</form>
						<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteAccount">
						Delete Account
						</button>

						<!-- Modal -->
						<div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								By deleting your account all your personal data will be lost and you will no longer be able to make purchases at Tech4U website.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<form action="{{ route('delete_user', ['id' => Auth::user()->id]) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
							</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
				
@endsection