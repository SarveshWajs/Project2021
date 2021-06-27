<div class="ps-footer bg--cover" data-background="{{ url('frontend/images/background/parallax.jpg') }}">
  <div class="ps-footer__content">
    <div class="ps-container">
      <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--info">
                <header>
                  <a class="ps-logo" href="{{ route('home') }}">
                    <img src="images/Logo2.png" alt="">
                  </a>
                  <h3 class="ps-widget__title"> ADDRESS OFFICE</h3>
                </header>
                <footer>
                  <p>
                    <strong>
                      {!! $data['web_setting']->address !!}
                    </strong>
                  </p>
                  <p>Email:
                      {{ $data['admin']->contact_email }}
                  </p>
                  <p>Phone:
                   {{ $data['admin']->phone }}</p>
                </footer>
              </aside>
            </div>
           
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--link">
                <header>
                  <h3 class="ps-widget__title">MENU
                  
                  </h3>
                </header>
                <footer>
                  <ul class="ps-list--line">
                    <li><a href="{{ route('home') }}">Home
                   </a></li>
                    <li><a href="{{ route('about') }}">ABOUT US
                   </a></li>
                  </ul>
                </footer>
              </aside>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--link">
                <header>
                  <h3 class="ps-widget__title">GET HELP
                 </h3>
                </header>
                <footer>
                  <ul class="ps-list--line">
                    <li><a href="{{ route('faqs') }}">FAQs</a></li>
                    <li><a href="{{ route('Contact') }}">CONTACT</a></li>
                  </ul>
                </footer>
              </aside>
            </div>

            
      </div>
    </div>
  </div>

</div>
