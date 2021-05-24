@extends('layouts.app')
@section('css')
<style type="text/css">
    .cat_menu_container ul {
        display: block;
        position: absolute;
        top: 100%;
        left: 0;
        visibility: hidden;
        opacity: 0;
        min-width: 100%;
        background: #FFFFFF;
        box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
        -webkit-transition: opacity 0.3s ease;
        -moz-transition: opacity 0.3s ease;
        -ms-transition: opacity 0.3s ease;
        -o-transition: opacity 0.3s ease;
        transition: all 0.3s ease;
    }
    .cat_menu_container:hover .cat_menu {
        visibility: visible;
        opacity: 1;
    }

    .select2-container{
        width: 100% !important;
    }

    .select2-container--default .select2-selection--single{
        padding: 5px;
        height: 39px;
    }

    .nice-select{
        display: none;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="profile-content">
        <div class="container-box">
            <form method="POST" action="{{ route('register') }}" id="register-form">
                @csrf
                <h3 align="center" class="header-login">Create an account</h3>
                <br>
                <div class="register-page">
                    <div class="form-group">
                        @if($errors->any())
                          <div class="alert alert-danger">{!! implode('<br/>', $errors->all(':message')) !!}</div>
                        @endif
                        <input type="hidden" name="role" value="1">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <input type="text" class="form-control required-feild" placeholder="First Name" name="f_name" value="{{ old('f_name') }}">
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="form-control required-feild" placeholder="Last Name" name="l_name" value="{{ old('l_name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control required-feild" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <select class="form-control select2 country_code" name="country_code" id="country_code" data-live-search="true">
                                    <!-- @foreach($countries as $country)
                                    <option value="{{ $country->country_contact }}">(+{{ $country->country_contact }}) {{ $country->country_name }} </option>
                                    @endforeach -->
                                    <option value="60">(+60) Malaysia</option>
                                    <option value="65">(+65) Singapore</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" placeholder="Example: 0171234567" name="phone" value="{{ old('phone') }}"  onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control required-feild"  placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control required-feild"  placeholder="Confirm Password" name="password_confirmation">
                    </div>
                 
                    <div class="form-group">
                        <div id="action-return-message"></div>
                    </div>

                    @if(!empty(request('p')))
                        <div class="form-control" style="background-color: gray;">
                            {{ request('p') }}
                            <input type="hidden" name="master_id" value="{{ request('p') }}">
                        </div>
                    @else
                        <input type="hidden" name="master_id" value="">
                    @endif

                    <div class="form-group">
                        <b id="error-message" class="important-text error-message"></b>
                    </div>
                   
                    
                    <div class="form-group" style="font-size: 10px;">
                      <label>
                          <input name="policy" class="policy" type="checkbox" class="ace" />
                          <span class="lbl"> </span>
                      </label>
                      <a href="#" data-toggle="modal" data-target="#policy">
                        By signing up, I agree to the {{ $data['admin']->website_name }}'s Privacy Policy.
                      </a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block login-submit-button register-btn">
                            SIGN UP
                        </button>
                    </div>

                    <div class="form-group" align="center">
                       Already Have an account?<a href="{{ route('login') }}">Login</a>
                    </div>

                 
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="policy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ isset($data['lang']['lang']['Private Policy']) ? $data['lang']['lang']['Private Policy'] : '私人政策'}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="overflow: auto; max-height: 800px; padding-bottom: 20px;">
        {!! htmlspecialchars_decode($data['web_setting']->privacy_policy_description) !!}
      </div>
    </div>
  </div>
</div>
<br>
@endsection

@section('js')
<script type="text/javascript">
    $('.button-inside').on('click', '.get-verify-code-btn', function(e){
        e.preventDefault();
        var ele = $(this);
        var phone = $('input[name="phone"]').val();
        var country_code = $('.country_code').val();
        
        if(phone.length < 10){
            alert("Please enter a valid mobile phone number");
            return false;
        }

        var fd = new FormData();
        fd.append('phone', phone);
        fd.append('country_code', country_code);
        fd.append('register', '1');

        $.ajax({
            url: '{{ route("getVerifyCode") }}',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response == '1'){
                    alert('Phone number does not exist');
                    return false;
                }else{
                    ele.prop('disabled', true);
                    
                    $('#action-return-message').html('The verification code has been sent to your mobile phone, the input is valid within 10 minutes, please do not leak');

                    $('#action-return-message').addClass('important-text');

                    var timer2 = response[1];
                    // var timer2 = "0:03";
                    var interval = setInterval(function() {


                    var timer = timer2.split(':');
                    //by parsing integer, I avoid all extra string processing
                    var minutes = parseInt(timer[0], 10);
                    var seconds = parseInt(timer[1], 10);
                    --seconds;
                    minutes = (seconds < 0) ? --minutes : minutes;
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;
                    //minutes = (minutes < 10) ?  minutes : minutes;
                    if (minutes == '0' && seconds == '00'){
                        clearInterval(interval);
                        var fd = new FormData();
                        fd.append('phone', phone);
                        $.ajax({
                            url: '{{ route("resetVerifyCode") }}',
                            type: 'post',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response){
                                ele.html("Get Verify Code");
                                ele.prop('disabled', false);
                                $('#action-return-message').html('The verification code has been refreshed! Please click "Get Verification Code" to get the latest verification code!');
                            }
                        });
                    }

                    ele.html(minutes + ':' + seconds);

                    timer2 = minutes + ':' + seconds;
                    }, 1000);                            
                }
            },
        });
    });

    $('#register-form .required-feild').change( function(){
        if($(this).val()){
            $(this).removeClass('required-feild-error');
        }
    });

    $('.register-btn').click( function(e){
       e.preventDefault();

       // $('input[name="password"]').val(phone);
       if($('.policy').prop('checked') == true){
          $('#register-form').submit();        
       }else{
          alert('Please check on the {{ $data["admin"]->website_name }} Privacy Policy');
       }
   
    });
</script>
@endsection