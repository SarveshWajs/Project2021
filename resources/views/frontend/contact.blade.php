@extends('layouts.app')

@section('content')
<div class="ps-contact ps-section">
    <div class="row">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1988.017353759923!2d100.92930125821304!3d4.76395567207909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cabc558ce410c5%3A0x572c9a771f5bd617!2sTaman%20Mayang%20Sari%2C%2033000%20Kuala%20Kangsar%2C%20Perak!5e0!3m2!1sen!2smy!4v1618586935587!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
 </div>
 <div class="ps-container">
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
              <div class="ps-section__header mb-50">
                <h2 class="ps-section__title" data-mask="GET IN TOUCH">- GET IN TOUCH</h2>
                <form method="POST" action="{{ route('Contact') }}">
                  @csrf
                  <div class="row">   
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                          <div class="form-group">
                            <label>Name<sub>*</sub></label>
                            <input type="text" class="form-control" name="user_name"  placeholder="Your Name" required>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                          <div class="form-group">
                            <label>Email<sub>*</sub></label>
                            <input type="text"class="form-control"  name="user_mail" placeholder="Your Email" required>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                          <div class="form-group mb-25">
                            <label>YOUR MESSAGE <sub>*</sub></label>
                            <textarea class="form-control" name="user_feedback"  rows="6" required></textarea>
                          </div>
                          <div class="form-group">
                            <button class="ps-btn" type="submit">SEND</button>
                          </div>
                        </div>
                  </div>
                </form>
              </div>
            </div>
<br>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
              <div class="ps-section__content">
                <div class="row">
                      <div class="col-xs-12 ">
                        <div class="ps-contact__block" data-mh="contact-block">
                          <header>
                            <h3>Malaysia</h3>
                          </header>
                          <footer>
                          	<p>
                                <i class="fa fa-building"></i> 
                                Sarveh August Wajs
                            </p>
                            <p>
                                <i class="fa fa-map-marker"></i> 
                                {!! $data['web_setting']->address !!}
                            </p>
                            <p><i class="fa fa-envelope-o"></i>
                                <a href="mailto@supportShoes@shoes.net">
                                    {{ $data['admin']->contact_email }}
                                </a>
                            </p>
                            <p>
                                <i class="fa fa-phone"></i> 
                                {{ $data['admin']->phone }}
                            </p>
                          </footer>
                        </div>
                      </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>

@endsection

