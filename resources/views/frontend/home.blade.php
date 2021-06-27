@extends('layouts.app')
@section('content')
<style type="text/css">
  .ps-product__columns .ps-product__column {
    float: left;
    width: 20%;
    padding: 25px;
}
</style>
<!-- Categories Section Begin -->
<div class="ps-banner">
    <div class="rev_slider fullscreenbanner" id="home-banner">
      <ul>
        @foreach($banners as $key => $banner)
        <li class="ps-banner" data-index="rs-{{ $key }}" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0">
            <img class="rev-slidebg" src="{{ url($banner->image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

<div class="ps-section ps-section--top-sales ps-owl-root ">
    <div class="ps-container">
      <div class="ps-section__header mb-50">
        <div class="row">
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <h3 class="ps-section__title" data-mask="Our Category">- Our Category</h3>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">NEXT<i class="ps-icon-arrow-left"></i></a></div>
              </div>
        </div>
      </div>

      <div class="ps-section__content">
        <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach($categories as $category)
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                  
                    <img src="{{ (!empty($category->image)) ? url($category->image)  : 'images/no-image-available-icon-61.jpg' }}" alt="">
                    <a class="ps-shoe__overlay" href="{{ route('listing', ['category='.urlencode($category->category_name)]) }}"></a>
                  </div>
                  <div class="ps-shoe__content">

                    <div class="ps-shoe__detail" style="max-height: 70px; min-height: 70px;">
                        <a class="ps-shoe__name" href="{{ route('listing', ['category='.urlencode($category->category_name)]) }}">
                         {{ $category->category_name }}
                        </a>
                     
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
@if(!$products_featured->isEmpty())
<div class="ps-section--features-product ps-section masonry-root ">
    <div class="ps-container">
      <div class="ps-section__header mb-50">
        <h3 class="ps-section__title" data-mask="FEATURES PRODUCTS">-FEATURES PRODUCTS</h3>
        <ul class="ps-masonry__filter">
          <li class="current">
            <a href="#" data-filter="*">
              ALL
            </a>
          </li>
          @foreach($featured_categories as $fcKey => $fc)
          <li>
                <a href="#" data-filter=".{{ preg_replace('/[^A-Za-z0-9\-]/', '', $fc->category_name) }}">
                         {{ $fc->category_name }}
                </a>
          </li>
          @endforeach
        </ul>
      </div>

      <div class="ps-section__content pb-50">
        <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
          <div class="ps-masonry">
            <div class="grid-sizer"></div>
            @foreach($products_featured as $featured)
                @php
                    $discount_percentage = 0;
                    if(Auth::guard('merchant')->check() || Auth::guard('admin')->check()){
              
                    }else{
                        if(!empty($featured->special_price)){
                            $discount_percentage = (($featured->price - $featured->special_price)*100) / $featured->price;
                        }
                    }
                @endphp
                <div class="grid-item {{ preg_replace('/[^A-Za-z0-9\-]/', '', $featured->category_name) }}">
                  <div class="grid-item__content-wrapper">
                    <div class="ps-shoe mb-30">
                      <div class="ps-shoe__thumbnail">
                        
                        @if($featured->variation_enable != '1' && !empty($discount_percentage))
                        <div class="ps-badge ">
                            <span>-{{ number_format($discount_percentage) }}%</span>
                        </div>
                        @endif
                        <!-- <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a> -->
                          <div style="background-image: url({{(!empty($featured->image))? url($featured->image)  : 'images/no-image-available-icon-61.jpg' }}); min-height: 350px; background-position: center; background-size: cover; "></div>
                        <a class="ps-shoe__overlay" href="{{ route('details', [str_replace('/', '-', $featured->product_name), md5($featured->id)]) }}"></a>
                      </div>
                      <div class="ps-shoe__content" >
                        <div class="ps-shoe__variants">
                          <div class="ps-shoe__variant normal">
                            @if(!$productImages[$featured->id]->isEmpty())
                            @foreach($productImages[$featured->id] as $small_image)
                                <img src="{{ url($small_image->image) }}" alt="">
                            @endforeach
                            @endif
                          </div>
                         
                        </div>
                        <div class="ps-shoe__detail" style="max-height: 70px; min-height: 70px;">
                            <a class="ps-shoe__name" href="#">
                                {{ $featured->product_name }}
                            </a>
                          <p class="ps-shoe__categories">
                           
                          </p>
                            <span class="ps-shoe__price">
                                @if($featured->variation_enable == '1')
                                    @if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
                                        @if($priceV[$featured->id][3] == $priceV[$featured->id][2])
                                            RM {{ number_format($priceV[$featured->id][3], 2) }}    
                                        @else
                                            RM {{ number_format($priceV[$featured->id][3], 2) }} - {{ number_format($priceV[$featured->id][2], 2) }}
                                        @endif
                                    @else
                                        @if($priceV[$featured->id][1] == $priceV[$featured->id][0])
                                            RM {{ number_format($priceV[$featured->id][1], 2) }}
                                        @else
                                            RM {{ number_format($priceV[$featured->id][1], 2) }} - {{ number_format($priceV[$featured->id][0], 2) }}
                                        @endif
                                    @endif
                                    @else

                                        @if(!empty($featured->special_price))
                                            <del>RM {{ number_format($featured->price, 2) }}</del> 
                                            RM {{ number_format($featured->special_price, 2) }}
                                        @else
                                            RM {{ number_format($featured->price, 2) }}
                                        @endif
                                    @endif
                                 
                            </span>
                            <div align="right" style="font-size:15px " class="form-group" >
                                 <b> {{ !empty($featured->sold_count ) ? $featured->sold_count ." Product Sold" : '' }}</b>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endif


@endsection


@section('js')
<script type="text/javascript">
$('.add-to-cart-btn').click( function(e){
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
        fd.append('product_id', ele.data('id'));
        fd.append('quantity', '1');

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
                    $.ajax({
                        url: '{{ route("CountCart") }}',
                        type: 'get',
                        success: function(response){
                            $('.cart_count span').html(response[0]);
                            $('.cart_price').html('RM '+parseFloat(response[1]).toFixed(2));
                            
                        }
                    });
                    
                    toastr.success('Items Add To Cart. <a href="{{ route("checkout") }}" class="view-cart-button pull-right"><i class="fa fa-shopping-cart"></i> View Cart</a>');
                }else{
                    toastr.error('Error Please Contact Admin');
                }
            },
        });
    }else{
        window.location.href = "{{ route('login') }}";
    }
});




</script>
@endsection
