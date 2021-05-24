@extends('layouts.app')

@section('content')
<div class="profile-own-bg">
	<div class="personal-header-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-4" align="left">
						<a href="{{ route('profile') }}">
							<p style="color:white;"><i class="fa fa-chevron-left"></i> Back</p>
						</a>
					</div>
					<div class="col-xs-4" align="left">
						<p align="center" class="header-title">Account Setting</p>
					</div>
					<div class="col-xs-4" align="right">
						<a href="{{ route('my_setting') }}" class="setting-btn">
							<i class="fa fa-cog" style="font-size: 20px;"></i>
						</a>
					</div>
				</div>
			</div>

		<div class="container">
			<div class="form-group">
				<div class="row">
					<div class="col-xs-2">
						<a href="{{ route('my_setting') }}">
							@if(!empty(Auth::user()->profile_logo))
								<!-- <img src="{{ url(Auth::user()->profile_logo) }}" width="50" class="profile-logo"> -->
								<div style="background-image: url({{ url(Auth::user()->profile_logo) }}); width: 50px; height: 50px; border-radius: 100%; background-size: cover; background-position: center; background-repeat: no-repeat;">
								</div>
							@else
								<img src="{{ url('images/images.png') }}" width="50" class="profile-logo">
							@endif							
						</a>
					</div>
					<div class="col-xs-6">
						&nbsp;
						<b class="profile-name">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</b>
						<br>
						&nbsp;
						<small class="profile-code">Code: {{ Auth::user()->code }}</small>
						
					</div>
					
				</div>
			</div>
			
			<div class="form-group container-box sl-personal-header">
				<div class="row">
					<div class="col-xs-4" align="center">
						<a href="{{ route('AddressBook.AddressBook.index') }}" class="profile-word">
							<img src="{{ url('images/profile/address-book-2190068-1840518.png') }}" width="30">
							<br>
							<span class="profile-word">'My Address Book</span>
						</a>
					</div>

					<div class="col-xs-4" align="center">
						<a href="{{ route('my_setting') }}" class="profile-word">
							<img src="{{ url('images/profile/585e4d1ccb11b227491c339b.png') }}" width="30">
							<br>
							<span class="profile-word">Account Setting</span>
						</a>
					</div>

					<div class="col-xs-4" align="center">
						<a href="{{ route('wish_list') }}" class="profile-word">
							<img src="{{ url('images/profile/2310834.png') }}" width="30">
							<br>
							<span class="profile-word">My Favoutite</span>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

		
			
<form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
	@csrf
	<div class="profile-content">
		<div class="container">
			<div class="container-box">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>First Name:
							</label>
							<input type="text" name="f_name" value="{{ Auth::user()->f_name }}" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Last Name:</label>
							<input type="text" name="l_name" value="{{ Auth::user()->l_name }}" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Phone:
                  </label>
							<input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Gender</label>
							<select class="form-control" name="gender">
							<option {{ Auth::user()->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
							<option {{ Auth::user()->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<label>Profile logo</label>
							<input type="file" class="form-control" name="profile_logo">
							@if(!empty(Auth::user()->profile_logo))
							<img src="{{ url(Auth::user()->profile_logo) }}" width="100px">
							@endif
						</div>
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-sm">
						<i class="fa fa-check"></i> Save Changes
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
<br>
@endsection
