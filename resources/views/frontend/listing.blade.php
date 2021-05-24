@extends('layouts.app')
<style type="text/css">
  .container-name {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
</style>
@section('content')
<div class="container">
    <div class="row">
       <div class="col-xs-6">
            <h3 class="ps-section__title" data-mask="SHOP">- SHOP</h3>
        </div>
    </div>
</div>
<div class="ps-products-wrap pt-80 pb-80">
    
         
          <div class="container-name">
  <div class="row">
          <div class="col-lg-12 col-lg-12">
            @if(!$products->isEmpty())
                @foreach($products as $product)
                @php
                    $discount_percentage = 0;
                    if(Auth::guard('merchant')->check() || Auth::guard('admin')->check()){
                    }else{
                        if(!empty($product->special_price)){
                            $discount_percentage = (($product->price - $product->special_price)*100) / $product->price;
                        }
                    }
                @endphp
                <div class="col-lg-3 col-lg-3 ">
                  <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail">
                        @if($product->packages == '1')
                        <div class="ps-badge ">
                            <span>Packages</span>
                        </div>
                        @endif
                        @if(!empty($discount_percentage))
                        <div class="ps-badge ">
                            <span>-{{ number_format($discount_percentage) }}%</span>
                        </div>
                        @endif
                        
                      
                       <div style="background-image: url({{(!empty($product->image))? url($product->image)  : 'images/no-image-available-icon-61.jpg' }}); min-height: 350px; background-position: center; background-size: cover; "></div>
                        <a class="ps-shoe__overlay" href="{{ route('details', [str_replace('/', '-', $product->product_name), md5($product->id)]) }}"></a>
                    </div>
                    <div class="ps-shoe__content">
                      <div class="ps-shoe__variants">
                        <div class="ps-shoe__variant normal">
                            @if(!$productImages[$product->id]->isEmpty())
                            @foreach($productImages[$product->id] as $small_image)
                                <img src="{{ url($small_image->image) }}" alt="">
                            @endforeach
                            @endif
                        </div>
                      </div>
                      <br>
                      <div class="ps-shoe__detail" style="max-height: 70px; min-height: 70px;">
                            <a class="ps-shoe__name" href="#">
                                {{ $product->product_name }}
                            </a>
                          <p class="ps-shoe__categories">
                            
                          </p>
                            <span class="ps-shoe__price">
                                @if($product->variation_enable == '1')
                                    @if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
                                        @if($priceV[$product->id][3] == $priceV[$product->id][2])
                                            RM {{ number_format($priceV[$product->id][3], 2) }}    
                                        @else
                                            RM {{ number_format($priceV[$product->id][3], 2) }} - {{ number_format($priceV[$product->id][2], 2) }}
                                        @endif
                                    @else
                                        @if($priceV[$product->id][1] == $priceV[$product->id][0])
                                            RM {{ number_format($priceV[$product->id][1], 2) }}
                                        @else
                                            RM {{ number_format($priceV[$product->id][1], 2) }} - {{ number_format($priceV[$product->id][0], 2) }}
                                        @endif
                                    @endif
                                    @else

                                        @if(!empty($product->special_price))
                                            <del>RM {{ number_format($product->price, 2) }}</del> 
                                            RM {{ number_format($product->special_price, 2) }}
                                        @else
                                            RM {{ number_format($product->price, 2) }}
                                        @endif
                                    @endif
                                
                            </span>
                            <div align="right" style="font-size:15px " class="form-group" >
                                <b> {{ !empty($product->sold_count ) ? $product->sold_count ." sold" : '' }}</b>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                @endforeach

                
            @else
                <div class="form-group" align="center">
                    <p>No Result Found!</p>
                    <p>We’re sorry. We couldn’t find anything that matched your search term</p>
                    <i class="fa fa-search fa-5x"></i> 
                </div>
            @endif
          </div>
           </div>
</div>
          <div class="ps-product-action" align="right">
            <div class="ps-pagination">
              <ul class="pagination">
                {{ $products->links() }}
              </ul>
            </div>
          </div>
        </div>
       
      </div>
@endsection

@section('js')
<script type="text/javascript">
  $('.has-sub-category').click( function(e){
      e.preventDefault();
      var ele = $(this);

      ele.parent().find('.arrow-right').toggleClass('fa-angle-down');
      ele.parent().find('.sub-category-child').slideToggle('fast', function(){});
  });
</script>

@if(!empty(request('category')))
<script type="text/javascript">
    var categoryS = "{{ urldecode(request('category')) }}";
    categoryS = categoryS.replace('&amp;', '&');
    $(document).ready(function() {
        $(window).on('load', function() {
            $('.has-sub-category').filter(function(){return $(this).data('filter')==categoryS}).click();
        });
    });
</script>
@endif
@endsection