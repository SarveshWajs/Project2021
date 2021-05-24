@extends('layouts.app')

@section('content')
<div class="profile-own-bg">
	<div class="personal-header-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-4" align="left">
						<a href="{{ route('home') }}">
							<p style="color: white;"><i class="fa fa-chevron-left"></i>Home</p>
						</a>
					</div>
					<div class="col-xs-4" align="left">
						<p align="center" class="header-title">My Account</p>
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
						<a href="{{ route('profile') }}">
							@if(!empty(Auth::user()->profile_logo))
								
								<div style="background-image: url({{ url(Auth::user()->profile_logo) }}); width: 50px; height: 50px; border-radius: 100%; background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
							@else
								<img src="{{ url('images/images.png') }}" width="50" class="profile-logo">
							@endif							
						</a>
					</div>
					<div class="col-xs-6">
						<a href="{{ route('profile') }}">
							&nbsp;
							<b class="profile-name">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</b>
							<br>
							&nbsp;
							<small class="profile-code">Code</small>
						</a>
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

<div class="profile-content">
	<div class="container">
		<div class="form-group container-box">
			<div class="row">
				<div class="col-xs-6" align="left">
					<b>My Orders</b>
				</div>
				<div class="col-xs-6" align="right">
					<a href="{{ route('pending_shipping') }}">
						<small>View all orders<i class="fa fa-angle-right" aria-hidden="true"></i></small>
					</a>
				</div>
			</div>
			<br>
			<div class="row">

				<div class="col-xs-3" align="center">
					<a href="{{ route('pending_shipping') }}" style="position: relative;">
						@if($countToShip > 0)
						<span class="badge badge-pill badge-danger" style="position: absolute; right: -10px; top: -10px;">
							{{ $countToShip }}
						</span>
						@endif
						<img src="{{ url('images/profile/shipment_pending_1017207.png') }}" width="30">
						<br>
						<span class="profile-word">To Ship
					</span>
					</a>
				</div>

				<div class="col-xs-3" align="center">
					<a href="{{ route('pending_receive') }}" style="position: relative;">
						@if($countToReceive > 0)
						<span class="badge badge-pill badge-danger" style="position: absolute; right: -10px; top: -10px;">
							{{ $countToReceive }}
						</span>
						@endif
						<img src="{{ url('images/profile/Pending-Truck-Delivery-Commerce-Logistic-Transportation-512.png') }}" width="30">
						<br>
						<span class="profile-word">To Receive
						</span>
					</a>
				</div>

				<div class="col-xs-3" align="center">
					<a href="{{ route('completed_order') }}" style="position: relative;">
						@if($countCompleted > 0)
						<span class="badge badge-pill badge-danger" style="position: absolute; right: -10px; top: -10px;">
							{{ $countCompleted }}
						</span>
						@endif
						<img src="{{ url('images/profile/Box_Package_Delivery_Shipping_Complete_Check_Done-512.png') }}" width="30">
						<br>
						<span class="profile-word">Completed
						</span>
					</a>
				</div>

					<div class="col-xs-2" align="center">
					<a href="{{ route('cancelled_order') }}" style="position: relative;">
						@if($countCancelled > 0)
						<span class="badge badge-pill badge-danger" style="position: absolute; right: -10px; top: -10px;">
							{{ $countCancelled }}
						</span>
						@endif
						<img src="{{ url('images/profile/online_shop_ecommerce_shopping-46-512.png') }}" width="30">
						<br>
						<span class="profile-word">Cancelled</span>
					</a>
				</div>
			</div>
		</div>

		<div class="form-group">
			<a class="btn btn-info btn-block btn-sm profile-word" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="fa fa-sign-out" aria-hidden="true"></i> 
			Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
		</div>
	</div>
</div>
@endsection