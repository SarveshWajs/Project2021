@extends('layouts.admin_app')
@section('content')
<div class="page-header">
    <h1>
     Shipping Fee Setting
       
    </h1>
</div>
<form method="POST" action="{{ route('save_setting_shipping_fee') }}" id="setting-merchant-form">
@csrf
<h3 class="important-text">
	
</h3>
<div class="row">
	<div class="col-sm-6">
		<h3>West Malaysia (shipping)</h3>
		<hr>
		<div class="form-group">
			<div class="row">
				<div class="col-md-5">
				Weight (kg)
				</div>

				<div class="col-md-5">
					Shipping fee (MYR)
				</div>
			</div>
		</div>
		<hr>
		<div class="west row-parent">
			@if(!$settingShippingFees->isEmpty())
			@foreach($settingShippingFees as $settingShippingFee)
				@if($settingShippingFee->area == 'west')

					<div class="form-group">
						<input type="hidden" name="sid[]" value="{{ $settingShippingFee->id }}">
						<input type="hidden" name="type[]" value="West Malaysia (shipping)">
						<div class="row">
							<div class="col-xs-5">
								<input type="text" name="weight[]" class="form-control" placeholder="Weight (kg)" value="{{ $settingShippingFee->weight }}">
							</div>
							<div class="col-xs-5">
								<input type="text" name="shipping_fee[]" class="form-control" placeholder="Shipping fee (MYR)" value="{{ $settingShippingFee->shipping_fee }}">
							</div>
							<div class="col-xs-2" align="center">
								<a href="#"  class="important-text del">
									<i class="fa fa-trash fa-2x"></i>
								</a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
			@endif
			<div class="form-group">
				<input type="hidden" name="sid[]" value="">
				<input type="hidden" name="type[]" value="west">
				<div class="row">
					<div class="col-xs-5">
						<input type="text" name="weight[]" class="form-control" placeholder="Weight (kg)">
					</div>
					<div class="col-xs-5">
						<input type="text" name="shipping_fee[]" class="form-control" placeholder="Shipping fee (MYR)">
					</div>
					<div class="col-xs-2" align="center">
						<a href="#"  class="important-text del">
							<i class="fa fa-trash fa-2x"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="row">
				<div class="col-md-6 col-md-offset-3" align="center">
					<a href="#" class="add-shipping-btn" id="add-west">
						<i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<h3>East Malaysia (shipping)</h3>
		<hr>
		<div class="form-group">
			<div class="row">
				<div class="col-md-5">
					Weight (kg)
				</div>

				<div class="col-md-5">
					Shipping fee (MYR)
				</div>
			</div>
		</div>
		<hr>
		<div class="east row-parent">
			@if(!$settingShippingFees->isEmpty())
			@foreach($settingShippingFees as $settingShippingFee)
				@if($settingShippingFee->area == 'east')
					<div class="form-group">
						<input type="hidden" name="sid[]" value="{{ $settingShippingFee->id }}">
						<input type="hidden" name="type[]" value="east">
						<div class="row">
							<div class="col-xs-5">
								<input type="text" name="weight[]" class="form-control" placeholder="Weight (kg)" value="{{ $settingShippingFee->weight }}">
							</div>
							<div class="col-xs-5">
								<input type="text" name="shipping_fee[]" class="form-control" placeholder="Shipping fee (MYR)" value="{{ $settingShippingFee->shipping_fee }}">
							</div>
							<div class="col-xs-2" align="center">
								<a href="#" class="important-text del">
									<i class="fa fa-trash fa-2x"></i>
								</a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
			@endif
			<div class="form-group">
				<div class="row">
					<input type="hidden" name="sid[]" value="">
					<input type="hidden" name="type[]" value="east">
					<div class="col-xs-5">
						<input type="text" name="weight[]" class="form-control" placeholder="Weight (kg)">
					</div>
					<div class="col-xs-5">
						<input type="text" name="shipping_fee[]" class="form-control" placeholder="Shipping fee (MYR)">
					</div>
					<div class="col-xs-2" align="center">
						<a href="#" class="important-text del">
							<i class="fa fa-trash fa-2x"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="row">
				<div class="col-md-6 col-md-offset-3" align="center">
					<a href="#" class="add-shipping-btn" id="add-east">
						<i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
	</div>


</div>
</form>

<div class="submit-form-btn">
	<div class="form-group wizard-actions" align="right">
		<button class="btn btn-primary">
			<i class="fa fa-check">SAVE CHANGES</i>
		</button>

	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$('.submit-form-btn .btn-primary').click( function(e){
    	e.preventDefault();
    	$('.loading-gif').show();
    	$('#setting-merchant-form').submit();
    });
	var west_item = '<div class="form-group">\
						<input type="hidden" name="sid[]" value="">\
						<input type="hidden" name="type[]" value="west">\
						<div class="row">\
							<div class="col-xs-5">\
								<input type="text" name="weight[]" class="form-control" placeholder="Weight (kg)">\
							</div>\
							<div class="col-xs-5">\
								<input type="text" name="shipping_fee[]" class="form-control" placeholder="Shipping fee (MYR)">\
							</div>\
							<div class="col-xs-2" align="center">\
								<a href="#"  class="important-text del">\
									<i class="fa fa-trash fa-2x"></i>\
								</a>\
							</div>\
						</div>\
					</div>';
    $('#add-west').click(function (e){
    	e.preventDefault();
    	$('.west').append(west_item);
    });

    var east_item = '<div class="form-group">\
    					<input type="hidden" name="sid[]" value="">\
    					<input type="hidden" name="type[]" value="east">\
						<div class="row">\
							<div class="col-xs-5">\
								<input type="text" name="weight[]" class="form-control" placeholder="Weight (kg)">\
							</div>\
							<div class="col-xs-5">\
								<input type="text" name="shipping_fee[]" class="form-control" placeholder="Shipping fee (MYR)">\
							</div>\
							<div class="col-xs-2" align="center">\
								<a href="#" class="important-text del">\
									<i class="fa fa-trash fa-2x"></i>\
								</a>\
							</div>\
						</div>\
					</div>';
    $('#add-east').click(function (e){
    	e.preventDefault();
    	$('.east').append(east_item);
    });


    $('.row-parent').on('click', '.del', function (e){
    	e.preventDefault();
    	$(this).closest('.row-parent .form-group').remove();
    });
</script>
@endsection