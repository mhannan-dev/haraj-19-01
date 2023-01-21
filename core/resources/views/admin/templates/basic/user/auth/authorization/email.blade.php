@extends($activeTemplate .'layouts.frontend')

@php
    $bgImage = getContent('authentication.content', true);
@endphp

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
                    <form action="{{route('user.verify.email')}}" method="POST" class="card-body" >
                        @csrf
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <label>Confirmation Code*</label>
                                <input type="text" class="form-control form--control" name="email_verified_code" maxlength="7" id="code">
                            </div>

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label><a href="{{route('user.send.verify.code')}}?type=email" class="text--base ps-2"> Resend Code</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100 text-center">Verify Now</button>
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
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;

              $(this).val(function (index, value) {
                 value = value.substr(0,7);
                  return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
              });

      });
    })(jQuery)
</script>
@endpush
