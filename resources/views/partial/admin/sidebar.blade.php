<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>


	@php
		$permission_level = (!empty(Auth::guard($data['userGuardRole'])->user()->permission_lvl)) ? Auth::guard($data['userGuardRole'])->user()->permission_lvl : '1';

	@endphp

	<ul class="nav nav-list">
		
		@foreach($data['permission'] as $key => $value)
			@if(Auth::guard('admin')->check())
				<li class="{{ (Request::segment(1) == 'dashboards') ? 'active open' : '' }}">
					<a href="{{ route('dashboard.dashboards.index') }}">
						<i class="menu-icon fa fa-tachometer"></i>
						
						<span class="menu-text"> Dashboard</span>
					</a>

					<b class="arrow"></b>
				</li>
			@endif
			@if(isset($value[$permission_level]['profile']) && $value[$permission_level]['profile'] == 1)
		
				<li class="{{ (Request::segment(1) == 'admins') ? 'active open' : '' }}">
					<a href="{{ route('admin.admins.index') }}">
						<i class="menu-icon fa fa-user"></i>
						@if(Auth::guard('admin')->check())
						<span class="menu-text">Company Profile</span>
						@else
						<span class="menu-text"> Profile</span>
						@endif
					</a>

					<b class="arrow"></b>
				</li>
			@endif


			<li class="{{ (Request::segment(1) == 'members' || Request::segment(1) == 'tree' || Request::segment(1) == 'tree_details') ? 'active open' : '' }}">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-users"></i>
					<span class="menu-text">
						Member Manage
						
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="{{ (Request::segment(1) == 'members' && (Request::segment(2) == '' || Request::segment(3) == 'edit' || Request::segment(1) == 'tree' || Request::segment(1) == 'tree_details')) ? 'active' : '' }}">
						<a href="{{ route('member.members.index') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Member List
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>

			@if((isset($value[$permission_level]['product-list']) && $value[$permission_level]['product-list'] == 1) || 
			    (isset($value[$permission_level]['product-add']) && $value[$permission_level]['product-add'] == 1))
			<li class="{{ (Request::segment(1) == 'products' || Request::segment(1) == 'point_malls') ? 'active open' : '' }}">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-cubes"></i>
					<span class="menu-text">
						Product Manage
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					@if(isset($value[$permission_level]['product-list']) && $value[$permission_level]['product-list'] == 1)
					<li class="{{ (Request::segment(1) == 'products' && (Request::segment(2) == '' || Request::segment(3) == 'edit' || Request::segment(3) == 'stock')) ? 'active' : '' }}">
						<a href="{{ route('product.products.index') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Product List
						</a>

						<b class="arrow"></b>
					</li>
					@endif

					@if(isset($value[$permission_level]['product-add']) && $value[$permission_level]['product-add'] == 1)
					<li class="{{ (Request::segment(1) == 'products' && Request::segment(2) == 'create') ? 'active' : '' }}">
						<a href="{{ route('product.products.create') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Add New Product
						</a>

						<b class="arrow"></b>
					</li>
					@endif
				</ul>
			</li>
			@endif

			@if((isset($value[$permission_level]['category-list']) && $value[$permission_level]['category-list'] == 1) || 
				(isset($value[$permission_level]['category-list']) && $value[$permission_level]['category-add'] == 1))
			<li class="{{ (Request::segment(1) == 'categories') ? 'active open' : '' }}">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-tags"></i>
					<span class="menu-text">
						Category Manage
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					@if(isset($value[$permission_level]['category-list']) && $value[$permission_level]['category-list'] == 1)
					<li class="{{ (Request::segment(1) == 'categories' && (Request::segment(2) == '' || Request::segment(3) == 'edit' || Request::segment(3) == 'stock')) ? 'active' : '' }}">
						<a href="{{ route('category.categories.index') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Category List
						</a>

						<b class="arrow"></b>
					</li>
					@endif

					@if(isset($value[$permission_level]['category-add']) && $value[$permission_level]['category-add'] == 1)
					<li class="{{ (Request::segment(1) == 'categories' && Request::segment(2) == 'create') ? 'active' : '' }}">
						<a href="{{ route('category.categories.create') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Add New Category
						</a>

						<b class="arrow"></b>
					</li>
					@endif
				</ul>
			</li>
			@endif
			<li class="{{ (Request::segment(1) == 'sub_categories') ? 'active open' : '' }}">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-tags"></i>
					<span class="menu-text">
						Sub Category
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					@if(isset($value[$permission_level]['category-list']) && $value[$permission_level]['category-list'] == 1)
					<li class="{{ (Request::segment(1) == 'sub_categories' && (Request::segment(2) == '' || Request::segment(3) == 'edit' || Request::segment(3) == 'stock')) ? 'active' : '' }}">
						<a href="{{ route('sub_category.sub_categories.index') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Sub Category List
						</a>

						<b class="arrow"></b>
					</li>
					@endif

					@if(isset($value[$permission_level]['category-add']) && $value[$permission_level]['category-add'] == 1)
					<li class="{{ (Request::segment(1) == 'sub_categories' && Request::segment(2) == 'create') ? 'active' : '' }}">
						<a href="{{ route('sub_category.sub_categories.create') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Add New Sub Category
						</a>

						<b class="arrow"></b>
					</li>
					@endif
				</ul>
			</li>
			
			@if((isset($value[$permission_level]['brand-list']) && $value[$permission_level]['brand-list'] == 1) || 
			    (isset($value[$permission_level]['brand-add']) && $value[$permission_level]['brand-add'] == 1))
			<li class="{{ (Request::segment(1) == 'brands') ? 'active open' : '' }}">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-cube"></i>
					<span class="menu-text">
						Brand Manage
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					@if(isset($value[$permission_level]['brand-list']) && $value[$permission_level]['brand-list'] == 1)
					<li class="{{ (Request::segment(1) == 'brands' && (Request::segment(2) == '' || Request::segment(3) == 'edit')) ? 'active' : '' }}">
						<a href="{{ route('brand.brands.index') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Brand List
						</a>

						<b class="arrow"></b>
					</li>
					@endif
					@if(isset($value[$permission_level]['brand-add']) && $value[$permission_level]['brand-add'] == 1)
					<li class="{{ (Request::segment(1) == 'categories' && Request::segment(2) == 'create') ? 'active' : '' }}">
						<a href="{{ route('brand.brands.create') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Add New Brand
						</a>

						<b class="arrow"></b>
					</li>
					@endif
				</ul>
			</li>
			@endif

			@if((isset($value[$permission_level]['transaction-list']) && $value[$permission_level]['transaction-list'] == 1) ||
				(isset($value[$permission_level]['withdrawal-list']) && $value[$permission_level]['withdrawal-list'] == 1))
			<li class="{{ (Request::segment(1) == 'transactions' || Request::segment(1) == 'withdrawal_list') ? 'active open' : '' }}">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-list"></i>
					<span class="menu-text">
						Transaction Manage
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<ul class="submenu">
					@if(isset($value[$permission_level]['transaction-list']) && $value[$permission_level]['transaction-list'] == 1)
					<li class="{{ (Request::segment(1) == 'transactions' && (Request::segment(2) == '' || Request::segment(3) == 'edit')) ? 'active' : '' }}">
						<a href="{{ route('transaction.transactions.index') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Transaction List
						</a>

						<b class="arrow"></b>
					</li>
					@endif
				</ul>
			</li>
			@endif

			
			

			

			@if(isset($value[$permission_level]['shipping-fee']) && $value[$permission_level]['shipping-fee'] == 1 || 
				isset($value[$permission_level]['setting-uom']) && $value[$permission_level]['setting-uom'] == 1)
				

			<li class="{{(Request::segment(1) == 'setting_shipping_fee' ||
					   Request::segment(1) == 'setting_recommend_bonus' || 
					   Request::segment(1) == 'setting_uom') ? 'active open' : '' }}">
					   

				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-cogs"></i>
					<span class="menu-text">
						Settings
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<ul class="submenu">
					
					<li class="{{ (Request::segment(1) == 'setting_banner') ? 'active' : '' }}">
						<a href="{{ route('setting_banner') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Banner Settings
						</a>

						<b class="arrow"></b>
					</li>
					@if(isset($value[$permission_level]['shipping-fee']) && $value[$permission_level]['shipping-fee'] == 1)
					<li class="{{ (Request::segment(1) == 'setting_shipping_fee') ? 'active' : '' }}">
						<a href="{{ route('setting_shipping_fee') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Shipping Fees
						</a>

						<b class="arrow"></b>
					</li>
					@endif

					
					<li class="{{ (Request::segment(1) == 'setting_uom') ? 'active' : '' }}">
						<a href="{{ route('setting_uom') }}">
							<i class="menu-icon fa fa-caret-right"></i>
							Setting UOM
						</a>

						<b class="arrow"></b>
					</li>
					
				</ul>
			</li>
			@endif
		@endforeach
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>