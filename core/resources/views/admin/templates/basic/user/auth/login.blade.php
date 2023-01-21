@extends($activeTemplate.'layouts.frontend')

@php
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
                    <form method="POST" action="{{ route('user.login')}}" class="card-body" >
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <label>Email*</label>
                                <input type="email" class="form-control form--control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label>Password*</label>
                                <input type="password" class="form-control form--control" name="password" value="">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label>New Here?<a href="{{ route('user.register') }}" class="text--base ps-2"> Click here to Sign Up</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100 text-center">Login Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

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

        $('#rc-anchor-container').css({
            width: '100% !important'
        });
    </script>
@endpush
