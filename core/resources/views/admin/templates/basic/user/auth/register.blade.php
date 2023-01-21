@extends($activeTemplate.'layouts.frontend')

@php
    $policyPages = getContent('policy_pages.element');
    $bgImage = getContent('authentication.content', true);
@endphp
@push('style')
<style>
    /*-------------------------------------------------
    [ ### account block ]
*/
.account-logo-area {
  position: relative;
  margin-bottom: 40px;
}
.account-logo-area .account-logo img {
  height: 100px;
}

.account-header {
  margin-bottom: 30px;
}
.account-header .title {
  font-weight: 600;
  font-size: 18px;
  text-transform: uppercase;
  position: relative;
}
.account-header .title::before {
  content: "";
  height: 1px;
  position: absolute;
  top: 10px;
  width: 35%;
  background: -webkit-linear-gradient(right, rgba(255, 255, 255, 0.2) 0%, rgba(96, 105, 117, 0.3) 100%);
  left: 0;
}
.account-header .title::after {
  content: "";
  height: 1px;
  position: absolute;
  top: 10px;
  width: 35%;
  background: -webkit-linear-gradient(right, rgba(96, 105, 117, 0.3) 0%, rgba(255, 255, 255, 0.2) 100%);
  right: 0;
}
@media only screen and (max-width: 991px) {
  .account-header .title {
    font-size: 16px;
  }
}

.account-form-area {
  position: relative;
  padding: 30px;
  border-radius: 3px;
  background: #fff;
  border: 1px solid #7a7a7a;
}
@media only screen and (max-width: 767px) {
  .account-form-area {
    padding: 20px;
  }
}
.account-form-area::before {
  background: #fff;
  border: 1px solid #7a7a7a;
  border-radius: 3px;
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#f8f8f8", endColorstr="#f9f9f9",GradientType=0 );
  content: "";
  display: block;
  height: 100%;
  left: -1px;
  position: absolute;
  width: 100%;
  -webkit-transform: rotate(-3deg);
  transform: rotate(-3deg);
  top: 0;
  z-index: -2;
}
@media only screen and (max-width: 991px) {
  .account-form-area::before {
    display: none;
  }
}
.account-form-area::after {
  background: #fff;
  border: 1px solid #7a7a7a;
  border-radius: 3px;
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#f8f8f8", endColorstr="#f9f9f9",GradientType=0 );
  content: "";
  display: block;
  height: 100%;
  left: -1px;
  position: absolute;
  width: 100%;
  -webkit-transform: rotate(2deg);
  transform: rotate(2deg);
  top: 0;
  z-index: -1;
}
@media only screen and (max-width: 991px) {
  .account-form-area::after {
    display: none;
  }
}
</style>
@endpush
@section('content')



<section class="body-wrapper pt-150">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="account-form-area">
                    <div class="account-logo-area text-center">
                        <div class="account-logo">
                            <a href="{{ url("/") }}"><img src="{{asset($activeTemplateTrue.'kitocard/images/logo.png')}}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="account-header text-center">
                        <h3 class="title">{{ $pageTitle }}</h3>
                    </div>
                    <form action="{{ route('frontend.register') }}" method="POST" class="card-body">
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <label>Name*</label>
                                <input type="text" class="form-control form--control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Email*</label>
                                <input type="email" class="form-control form--control" name="email" value="{{ old('email')  }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Password*</label>
                                <input type="password" class="form-control form--control" name="password" value="{{  old('password')  }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label>Already Have an account?<a href="{{ route('user.login') }}" class="text--base ps-2"> Login</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100 text-center">Create Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection

@push('style')
<style>
    .country-code .input-group-prepend .input-group-text{
        background: #fff !important;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }
    .hover-input-popup {
        position: relative;
    }
    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
    }
    .input-popup {
        position: absolute;
        bottom: 130%;
        left: 50%;
        width: 280px;
        background-color: #1a1a1a;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }
    .input-popup::after {
        position: absolute;
        content: '';
        bottom: -19px;
        left: 50%;
        margin-left: -5px;
        border-width: 10px 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #1a1a1a transparent;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .input-popup p {
        padding-left: 20px;
        position: relative;
    }
    .input-popup p::before {
        position: absolute;
        content: '';
        font-family: 'Line Awesome Free';
        font-weight: 900;
        left: 0;
        top: 4px;
        line-height: 1;
        font-size: 18px;
    }
    .input-popup p.error {
        text-decoration: line-through;
    }
    .input-popup p.error::before {
        content: "\f057";
        color: #ea5455;
    }
    .input-popup p.success::before {
        content: "\f058";
        color: #28c76f;
    }
</style>
@endpush

@push('script-lib')
<script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush

@push('script')
    <script>
      "use strict";
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }
        (function ($) {
            @if($mobile_code)
            $(`option[data-code={{ $mobile_code }}]`).attr('selected','');
            @endif

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            @if($general->secure_password)
                $('input[name=password]').on('input',function(){
                    secure_password($(this));
                });
            @endif

            $('.checkUser').on('focusout',function(e){
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {mobile:mobile,_token:token}
                }
                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }
                $.post(url,data,function(response) {
                  if (response['data'] && response['type'] == 'email') {
                    $('#existModalCenter').modal('show');
                  }else if(response['data'] != null){
                    $(`.${response['type']}Exist`).text(`${response['type']} already exist`);
                  }else{
                    $(`.${response['type']}Exist`).text('');
                  }
                });
            });

        })(jQuery);

    </script>
@endpush
