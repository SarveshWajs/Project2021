@if(Request::segment(1) != 'Profile' && Request::segment(1) != 'MyWallet' && Request::segment(1) != 'MyVoucher' && 
    Request::segment(1) != 'MyWishList' && Request::segment(1) != 'AddressBook' && Request::segment(1) != 'MySetting' && Request::segment(1) != 'PendingOrder' && Request::segment(1) != 'PendingShipping' &&
    Request::segment(1) != 'PendingReceive' && Request::segment(1) != 'OrderDetails' && Request::segment(1) != 'CompletedOrder' && Request::segment(1) != 'CancelledOrder')
    <style>
.dropbtn {
  background-color:transparent;
  color: black;
  font-size: 16px;
  border: none;
}



.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 140px;
  border-radius: 10px 10px 10px 10px;
  border: 1px solid rgba(0,0,0,.15);
  border: 1px solid #ccc;
 z-index: 160

}

.dropdown-content a {
  color: black;
  padding: 1.5px;
  text-decoration: none;
  display: block;
  border-radius: 10px 10px 10px 10px;
}

.dropdown-content a:hover {background-color:  #d1d1e0;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: transparent;}
</style>
<header class="header">
  <div class="header__top">
    <div class="container-fluid">
      <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
              <p>{{ $data['admin']->contact_email }}  -  {!! $data['admin']->phone !!}</p>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
              <div class="header__actions">
                @if(Auth::guard($data['userGuardRole'])->check())
                  <a href="{{ route('profile') }}">
                    <i class="fa fa-user"></i> 
                    &nbsp;&nbsp;
                    {{ Auth::guard($data['userGuardRole'])->user()->f_name }} {{ Auth::guard($data['userGuardRole'])->user()->l_name }}
                  </a>
                @else
                  <a href="{{ route('login') }}">
                    Login & Regiser
                  </a>
                @endif
              </div>
            </div>
      </div>
    </div>
  </div>
  <nav class="navigation">
    <div class="container-fluid">
      <div class="navigation__column left">
        <div class="header__logo">
          <a class="ps-logo" href="{{ route('home') }}">
             <img src="images/Logo2.png" alt="" >
          </a>
        </div>
      </div>
      <div class="navigation__column center">
            <ul class="main-menu menu">
              <li class="menu-item">
                  <a href="{{ route('home') }}" class="{{ (Request::segment(1) == '') ? 'active' : '' }}">
                     Home
                  </a>
                   
              </li>

              <li class="menu-item menu-item-has-children dropdown">
              <a href="{{ route('listing') }}" class="{{ (Request::segment(1) == 'Listing') ? 'active' : '' }}">Shop</a> 
              
              </li>

              <li class="menu-item">
              <a href="{{ route('faqs') }}" class="{{ (Request::segment(1) == 'faqs') ? 'active' : '' }}">FAQs</a>

              
              </li>
              <li class="menu-item">
                <a href="{{ route('about') }}" class="{{ (Request::segment(1) == 'About') ? 'active' : '' }}">ABOUT US</a>
              </li>

              <li class="menu-item">
                <a href="{{ route('Contact') }}" class="{{ (Request::segment(1) == 'Contact') ? 'active' : '' }}">CONTACT US</a>
              </li>

            </ul>
      </div>
    <div class="navigation__column right">
        <form class="ps-search--header" action="{{ route('listing') }}" method="get">
          <input class="form-control" type="text" name="result" placeholder="Search Product">
          <button><i class="ps-icon-search"></i></button>
        </form>
        <div class="ps-cart">
            <a class="ps-cart__toggle" href="#">
              <span><i>{{ (!empty($data['totalCart'])) ? $data['totalCart'] : '0'  }}</i></span>
              <i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
               
                  
                  
                
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="ps-cart__content">    
                      @php
                        $headerTotalCart = 0;
                        $headerTotalQty = 0;
                      @endphp
                      @foreach($data['top_carts'] as $top_cart)
                      @php
                      if($top_cart->variation_enable == '1'){
                          if(Auth::guard('merchant')->check() || Auth::guard('admin')->check()){
                            $price = !empty($top_cart->variation_agent_special_price) ? $top_cart->variation_agent_special_price : $top_cart->variation_agent_price;
                          }else{
                            $price = !empty($top_cart->variation_special_price) ? $top_cart->variation_special_price : $top_cart->variation_agent_price;
                          }
                      }else{
                          if(Auth::guard('merchant')->check() || Auth::guard('admin')->check()){
                            $price = !empty($top_cart->agent_special_price) ? $top_cart->agent_special_price : $top_cart->agent_price;
                          }else{
                            $price = !empty($top_cart->special_price) ? $top_cart->special_price : $top_cart->price;
                          }
                      }

                      @endphp
                      <div class="ps-cart-item"><a class="ps-cart-item__close delete-cart" data-id="{{ md5($top_cart->cid) }}" href="#"></a>
                        <div class="ps-cart-item__thumbnail">
                          <a href="{{ route('details', [str_replace('/', '-', $top_cart->product_name), md5($top_cart->pid)]) }}"></a>
                            <img src="{{ url(!empty($top_cart->image) ? $top_cart->image : 'images/no-image-available-icon-61.jpg') }}" alt="">
                        </div>
                        <div class="ps-cart-item__content">
                          <a class="ps-cart-item__title" href="{{ route('details', [str_replace('/', '-', $top_cart->product_name), md5($top_cart->pid)]) }}">
                              {{ $top_cart->product_name }}
                              @if($top_cart->variation_enable == '1')
                                <br>
                                Variation: {{ $top_cart->variation_name }}
                              @endif  
                          </a>
                          <p>
                            <span style="margin-right: 0;">Quantity:<i>{{ $top_cart->qty }}</i></span>
                            <br>
                            @if($top_cart->variation_enable == '1')
                              @if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @else
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @endif
                            @else
                              @if(Auth::guard('merchant')->check() || Auth::guard('admin')->check())
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @else
                                <span style="margin-right: 0;">Total:<i>RM {{ $price }}</i></span></p>
                              @endif
                            @endif
                        </div>
                      </div>
                      @php
                        $headerTotalCart += $price * $top_cart->qty;
                        $headerTotalQty += $top_cart->qty;
                      @endphp
                      @endforeach
                    </div>
                    <div class="ps-cart__total">
                      <p>Number of items:<span>{{ $headerTotalQty  }}</span></p>
                      <p>Item Total:<span>RM {{ number_format($headerTotalCart, 2) }}</span></p>
                    </div>
                    <div class="ps-cart__footer"><a class="ps-btn" href="{{ route('checkout') }}"> Checkout<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
                  
        </div>
        <div class="menu-toggle"><span></span></div>
      </div>
    </div>
  </nav>
</header>
@endif