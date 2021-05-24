<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="{{ route('admin.admins.index') }}" class="navbar-brand">
				<small>
					@if(!empty($data['website_logo']))
					<img src="{{ url($data['website_logo']) }}" style="width: 30px;">
					@else
					<img src="{{ url('images/logo/Vesson_Enterprise_Trans_Gold.png') }}" style="width: 30px;">
					@endif
					@if(!empty($data['website_name']))
					{{ $data['website_name'] }} Backend
					@else
					SarveshWajs Backend
					@endif
				</small>
			</a>
	</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						@if(!empty(Auth::user()->profile_logo))
						<img class="nav-user-photo" src="{{ url(Auth::user()->profile_logo) }}"/>
						@else
						<img class="nav-user-photo" src="{{ url('images/images.png') }}" />
						@endif
						<span class="user-info">
							<small>Welcome</small>
							{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


						<li>
							<a href="#" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
								<form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
	                                @csrf
	                            </form>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>