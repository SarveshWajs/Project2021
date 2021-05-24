@extends('layouts.app')

@section('content')
<div class="profile-own-bg">
	<div class="personal-header-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-4" align="left">
						<a href="{{ route('AddressBook.AddressBook.index') }}">
							<p  style="color: white;"><i class="fa fa-chevron-left"></i> Back</p>
						</a>
					</div>
					<div class="col-xs-4" align="left">
						<p align="center" class="header-title">Address book</p>
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
								
								<div style="background-image: url({{ url(Auth::user()->profile_logo) }}); width: 50px; height: 50px; border-radius: 100%; background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
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
						<small class="profile-code">Code</small>
						
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

<div class="container">
	<div class="profile-content">
		<div class="container-box mb-80">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<h4>Add New Address Book</h4>
					</div>
					<form method="POST" action="{{ route('AddressBook.AddressBook.store') }}" id="new-address-form">
					@csrf
						@include('frontend.address_book_form')
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$('#new-address-form .required-feild').change( function(){
    	if($(this).val()){
    		$(this).removeClass('required-feild-error');
    	}
    });

	$('.submit-address').click( function(e){
		e.preventDefault();
		var empty_fill;
	    $('#new-address-form .required-feild').each( function(){
	    	if(!$(this).val()){
	    		$(this).addClass('required-feild-error');
	    		empty_fill = 1;
	    	}
	    });
	    if(empty_fill == 1){
	    	$('#error-message').html('Please Fill In All Required Field.');
	    	return false;
	    }

	    $('#new-address-form').submit();
	});
</script>
@endsection