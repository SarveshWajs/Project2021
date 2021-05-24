@php
if(!empty($Pimage->image))
  $Fimage = file_exists($Pimage->image) ? url($Pimage->image) : url('images/no-image-available-icon-6.jpg');
else
  $Fimage = url('images/no-image-available-icon-6.jpg');
@endphp@extends('layouts.app')
@section('content')

<div class="ps-product--detail pt-60">
    <div class="ps-container">
      <div class="row">
        <div class="col-lg-10 col-md-12 col-lg-offset-1">
          <div class="ps-product__thumbnail">
            <div class="ps-product__preview">
              <div class="ps-product__variants">
                @if(!$images->isEmpty())
                  @foreach($images as $key => $image)
                    <div class="item"><img src="{{ url($image->image) }}" alt=""></div>
                  @endforeach
                @endif
              </div>
            
            </div>
            <div class="ps-product__image">
              @if(!$images->isEmpty())
                @foreach($images as $key => $image2)
                  <div class="item">
                      <img class="zoom" src="{{ url($image2->image) }}" alt="" data-zoom-image="{{ url($image2->image) }}">
                  </div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="ps-product__thumbnail--mobile">
            <div class="ps-product__main-img">
                <img src="{{ url($Fimage) }}" alt="">
            </div>
            <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
              @foreach($images as $key => $image4)
                <img src="{{ url($image4->image) }}" alt="" class="small-image">
              @endforeach
            </div>
          </div>
          <div class="ps-product__info">
            
             
            <h1>{{ $product->product_name }} {{ !empty($product->uom_name) ? '/ '.$product->uom_name : '' }}</h1>

            <h3 class="ps-product__price">
            	@if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
  
               
                    @if(!empty($product->special_price))
                        RM {{ number_format($product->special_price, 2) }}
                        <del>RM {{ number_format($product->price, 2) }}</del> 
                    @else
                        RM {{ number_format($product->price, 2) }}
                    @endif
                @endif
            </h3>
            @if(!empty($product->brand_name))
            <div class="form-group">
              <p>BRAND: {{ $product->brand_name }}</p>
            </div>  
            @endif
            @if(!empty($product->uom_name))
            <div class="form-group">
              <p>UOM:{{ $product->uom_name }}</p>
            </div>
            @endif
            <div class="row">
                <div class="col-xs-5" align="left">
                    <h4>QUICK REVIEW </h4>      
                </div>
                <div class="col-xs-7">
                    <div class="" align="right">
                       <h4>  <b> {{ !empty($product->sold_count ) ? $product->sold_count ." sold" : '' }}</b></h4>

                    </div>
                </div>
            </div>
            <hr>
            <p>{{ $product->short_description }}</p>       
         
         
                                           
                                   
            @if($product->variation_enable == '1')
      				@if(!$variations->isEmpty())
  		            <div class="ps-product__block ps-product__style">
  		              <h4>CHOOSE YOUR VARIATION</h4>
  		              <ul>
  		              	@foreach($variations as $variationsKey => $variation)
  		                <li>
  		                	<a href="#" class="variation_option {{ ($variationsKey == 0) ? 'active' : '' }} {{ ($vStock[$variation->id] <= 0) ? 'out-of-stock' : '' }}" data-id="{{ $variation->id }}">
                         {{ $variation->variation_name }}
  		                	</a>
  		                </li>
  		                @endforeach
  		              </ul>
  		            </div>
      		    @endif
      		  @endif

            <div class="ps-product__block ps-product__size">
            
              <div class="form-group">
                <input class="form-control quantity" type="number" value="1" name="quantity">
                @if($product->packages == 1)
                @else
                  @if($stockBalance <= 0)
                  <span class="quantity-balance important-text">Out of stock</span>
                  @else
                  <span class="quantity-balance">Only {{ $stockBalance }} product</span>
                  @endif
                @endif
              </div>
            </div>
            <div class="ps-product__shopping">
              <a class="ps-btn mb-10 add-to-cart-button" href="#">
               Add to cart<i class="ps-icon-next"></i>
              </a>
              <div class="ps-product__actions">
                @if(!empty($favourite->id))
                  <a href="#" class="mr-10 add-favourite-btn" style="background-color: #2AC37D;">
                      <i class="ps-icon-heart"></i>
                  </a>
                @else
                  <a href="#" class="mr-10 add-favourite-btn">
                      <i class="ps-icon-heart"></i>
                  </a>
                @endif
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          @if(!$Ppackages->isEmpty())
            <hr>
            <h3 class="gold-word">
            Whats in the box: </h3>
            <br>
            <div class="form-group" style="overflow: auto;">
              <table class="table table-bordered table-free-gift">
                <tr style="background-color: #2ac37d;">
                  <td>Product Description</td>
                  <td>Unit Price</td>
                  <td>Quantity</td>
                  <td>Total Price</td>
                </tr>
                @php
                $totalPrice = 0;
                @endphp
                @foreach($Ppackages as $Ppackage)
                <tr style="color: white;">
                  <td>
                    <p>
                      <img src="{{ url($Ppackage->image) }}" style="width: 90px;">
                      {{ $Ppackage->product_name }}
                    </p>
                  </td>
                  <td>
                    <p>{{ number_format($Ppackage->unit_price, 2) }}</p>
                  </td>
                  <td>
                    <p>{{ $Ppackage->qty }}</p>
                  </td>
                  <td>
                    <p>{{ number_format($Ppackage->unit_price * $Ppackage->qty, 2) }}</p>
                  </td>
                </tr>

                @php
                $totalPrice += $Ppackage->unit_price * $Ppackage->qty;
                @endphp
                @endforeach
                <tr>
                  <td colspan="3" align="right">Subtotal</td>
                  <td>
                    <p>{{ number_format($totalPrice, 2) }}</p>
                  </td>
                </tr>
                @if(!empty($product->free_gift))
                <tr style="color: white;">
                  <td colspan="4">
                    <h4><b>Free Gift:</b></h4>
                    <br>
                    {!! $product->free_gift !!}
                  </td>
                </tr>
                @endif
              </table>
            </div>
            @endif

          <div class="ps-product__content mt-50">
            <ul class="tab-list" role="tablist">
              <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab"> Overview</a></li>

            </ul>
          </div>
          <div class="tab-content mb-60">
            <div class="tab-pane active" role="tabpanel" id="tab_01">
              
              {!! htmlspecialchars_decode($product->description) !!}
                     </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
<script type="text/javascript">

  
  var variation_enable = '{{ $product->variation_enable }}';

  $('.add-to-cart-button').click( function(e){

  	e.preventDefault();
	

  	$('.loading-gif').show();
  	var mall = '{{ $product->mall }}';
  	var isAdmin = '{{ Auth::guard("admin")->check() }}';
  	var isMerchant = '{{ Auth::guard("merchant")->check() }}';
  	var isUser = '{{ Auth::guard("web")->check() }}';
  	var isGuest = "{{ !empty($_COOKIE['new_guest']) ? $_COOKIE['new_guest'] : $data['new_guest'] }}";
  	var option = $('.variation_option.active').data('id');

  	if(variation_enable == 1 && !option){
  		alert('Please select product variation first');
  		$('.loading-gif').hide();
  		return false;
  	}

  	if(isAdmin){
  		auth_check = '{{ !empty(Auth::guard("admin")->user()->code) ? Auth::guard("admin")->user()->code : '' }}';
  	}else if(isMerchant){
  		auth_check = '{{ !empty(Auth::guard("merchant")->user()->code) ? Auth::guard("merchant")->user()->code : '' }}';
  	}else if(isUser){
  		auth_check = '{{ !empty(Auth::guard("web")->user()->code) ? Auth::guard("web")->user()->code : '' }}';
  	}else{
  		auth_check = "";
  	}
  	
  	if(auth_check){
	  	var fd = new FormData();
	  	fd.append('product_id', '{{ $product->id }}');
	  	fd.append('quantity', $('input[name="quantity"]').val());
	  	fd.append('sub_category_id', option);
	  	fd.append('second_sub_category_id', $('.second_sub_category_id').val());
	  	


	  	$.ajax({
	        url: '{{ route("AddToCart") }}',
	        type: 'post',
	        data: fd,
	        contentType: false,
	        processData: false,
	        success: function(response){
	        	// alert(response);
	        	// return false;
	        	$('.loading-gif').hide();

	        	if(response == 'wallet not enough balance'){
	        		toastr.error('Wallet Balance Not Enough');
	        		return false;
	        	}

	        	if(response == 'quantity error'){
	        		toastr.error('Please Add Quantity At least 1');
	        		return false;
	        	}

	        	if(response == 'quantity exceed error'){
	        		toastr.error('Product Balance Quantity Not Enough');
	        		return false;
	        	}

	       

	        	if(response == 'ok'){
              location.reload();
	        		$.ajax({
				        url: '{{ route("CountCart") }}',
				        type: 'get',
				        success: function(response){
				        	$('.ps-cart .ps-cart__toggle span i').html(response[0]);
				        }
				      });

              $.ajax({
                url: '{{ route("SelectHeaderCart") }}',
                type: 'get',
                success: function(response){
                  $('.ps-cart__listing').html(response);
                }
              });

	            	toastr.success('Items Add To Cart. <a href="{{ route("checkout") }}" class="view-cart-button pull-right"><i class="fa fa-shopping-cart"></i> View Cart</a>');
	            }else{
                // toastr.error('Error Please Contact Admin');
	            	toastr.error(response);
	            }
	        },
	    });
  	}else{
  		window.location.href = "{{ route('login') }}";
  	}
  });

  $('.add-favourite-btn').click( function(e){
  		e.preventDefault();
  		$('.loading-gif').show();
  		var ele = $(this);
	  	var isAdmin = '{{ Auth::guard("admin")->check() }}';
	  	var isMerchant = '{{ Auth::guard("merchant")->check() }}';
	  	var isUser = '{{ Auth::check() }}';

	  	if(isAdmin){
	  		auth_check = isAdmin;
	  	}else if(isMerchant){
	  		auth_check = isMerchant;
	  	}else if(isUser){
	  		auth_check = isUser;
	  	}else{
	  		auth_check = "";
	  	}
	  	
	  	if(auth_check){
	  		var fd = new FormData();
		  	fd.append('product_id', '{{ $product->id }}');

		  	$.ajax({
		        url: '{{ route("Favourite") }}',
		        type: 'post',
		        data: fd,
		        contentType: false,
		        processData: false,
		        success: function(response){
		        	
		        	$('.loading-gif').hide();
              
		        	if(response[1] == 1){
		        		ele.css('background-color', '#2AC37D');
		        	}else{
		        		ele.css('background-color', '#999999');
		        	}
		        }
		    });
	  	}else{
	  		window.location.href = "{{ route('login') }}";
	  	}
  });

  $('.add-to-wish-btn').click( function(e){
  		e.preventDefault();
  		$('.loading-gif').show();
  		var ele = $(this);
	  	var isAdmin = '{{ Auth::guard("admin")->check() }}';
	  	var isMerchant = '{{ Auth::guard("merchant")->check() }}';
	  	var isUser = '{{ Auth::check() }}';

	  	if(isAdmin){
	  		auth_check = isAdmin;
	  	}else if(isMerchant){
	  		auth_check = isMerchant;
	  	}else if(isUser){
	  		auth_check = isUser;
	  	}else{
	  		auth_check = "";
	  	}
	  	
	  	if(auth_check){
	  		var fd = new FormData();
		  	fd.append('product_id', '{{ $product->id }}');

		  	$.ajax({
		        url: '{{ route("add_to_wish") }}',
		        type: 'post',
		        data: fd,
		        contentType: false,
		        processData: false,
		        success: function(response){
		        	$('.loading-gif').hide();
		        	if(response == 1){
		        		$('.wishlist_count').html(response);
		        		$('.add-favourite-btn').html('<i class="fa fa-heart fa-2x" aria-hidden="true"></i>')
		        	}else{
		        		toastr.info('Already In Wishlist');
		        	}
		        }
		    });
	  	}else{
	  		window.location.href = "{{ route('login') }}";
	  	}
  });

  $('.sub-category-list').click( function(){
  	  var ele = $(this);
  	  $('.sub-category-list').removeClass('active');
  	  $(this).addClass('active');
  	  ele.parent().find('input[name="sub_category_id"]').prop("checked", true);
  });

  $('.add-qty-button').click( function(e){

		e.preventDefault();
		
		var ele = $(this);
		var quantity = ele.parent().find('input[name="quantity"]').val();
		var balance = ele.closest('ul').find('input[name="balance_quantity"]').val();
		quantity = Number(quantity) + 1;
		if(quantity > balance){
			alert('The maximum quantity available for this item is '+balance);
			$('.loading-gif').hide();
			return false;
		}else{
			ele.parent().find('input[name="quantity"]').val(quantity);			
		}
		
	});

	$('.deduct-qty-button').click( function(e){
		e.preventDefault();
		
		var ele = $(this);
		var quantity = ele.parent().find('input[name="quantity"]').val();
		if(quantity != 1){
			quantity = Number(quantity) - 1;
			ele.parent().find('input[name="quantity"]').val(quantity);
		}		
	});

	
	if(variation_enable == 1){
		$('.variation_option').click( function(e){
			e.preventDefault();

			$('.loading-gif').show();
			var ele = $(this);
			var vid = ele.data('id');

			$('.variation_option').removeClass('active');
			ele.addClass('active');

			var fd = new FormData();
			  	fd.append('vid', vid);

			$.ajax({
		        url: '{{ route("getVariation") }}',
		        type: 'post',
		        data: fd,
		        contentType: false,
		        processData: false,
		        success: function(response){
		        	$('.loading-gif').hide();
		        	if(response[0] != 0){
			        	$('.ps-product__price').html('RM '+response[0]);
						$('.has-special-price').html('RM '+response[1]);
		        	}else{
		        		$('.ps-product__price').html('RM '+response[1]);
						$('.has-special-price').hide();
		        	}

		        	if(response[2] <= 0){
		        		$('.quantity-balance').html('Out of stock');
		        	}else{
		        		$('.quantity-balance').html('Only '+ response[2] +' Items Left');
		        	}
		        }
		    });
		});

		$.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		$('.variation_option.active').trigger('click');		
	}

  $('.ps-product__preview').on('click', '.owl-stage-outer .owl-item.active .small-image', function(e){
      e.preventDefault();

      var ele = $(this);

      $('.ps-product__thumbnail--mobile .ps-product__main-img').find('img').attr('src', ele.attr('src'));
  });
	
</script>
@endsection