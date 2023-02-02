@php
    $ad_type_id = session()->get('ad_type_id');
    $ad_type = \DB::table('ad_types')
        ->where('id', '=', $ad_type_id)
        ->first();
@endphp
@extends('frontend.layout.main')
@section('content')
    <section class="payment-sell-faster-section ptb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="payment-form-area">
                        <h3 class="title">@lang('Payment ')</h3>
                        <p>@lang('Choose payment method below')</p>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <div class="payment-account-check text-center" id="stripe-box">
                                    {{-- <input class="form-check-input" type="radio" value="credit"
                                            name="accountRadioCheck" id="creditAccount" checked="" autocomplete="off"> --}}
                                    <label class="form-check-label" for="creditAccount">
                                        <i class="las la-id-card"></i>
                                        <span>@lang('Pay with credit card')</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 mb-30">
                                <a href="{{ url('payment/handle-payment') }}">
                                    <div class="payment-account-check text-center">
                                        {{-- <input class="form-check-input" type="radio" value="paypal" --}}
                                        {{-- name="accountRadioCheck" id="paypalAccount" autocomplete="off"> --}}
                                        <label class="form-check-label" for="paypalAccount">
                                            <img src="{{ URL::asset('assets/frontend') }}/images/paypal.png" alt="paypal">
                                            <span>Pay with paypal</span>
                                        </label>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <form role="form" class="payment-form require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"
                            action="{{ route('frontend.payment.stripe.post') }}" method="post">
                            @csrf
                            <input type="hidden" name="feature_ad_price" value="{{ $feature_ad_price->price }}">
                            <input type="hidden" name="feature_ad_id" value="{{ $feature_ad_price->id }}">
                            <div class="payment-card" id="payment-card" style="display: none">
                                <div class="row mb-10-none">
                                    <div class='col-lg-12 form-group required'>
                                        <label>Name on Card</label>
                                        <input class='form-control form--control' name="card_name" type='text'
                                            placeholder='E.g: My Test Card'>
                                    </div>
                                    <div class='col-lg-12 form-group required'>
                                        <label>Card Number</label>
                                        <input autocomplete='off' class='form-control form--control card-number'
                                            size='16' type='text' name="card_number" placeholder='4242 4242 4242 4242'>
                                    </div>
                                    <div class='col-lg-12 form-group cvc required'>
                                        <label>CVC</label>
                                        <input autocomplete='off'
                                            class='form-control form--control card-cvc' name="card_cvc" placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-lg-6 form-group expiration required'>
                                        <label>Expiration Month</label>
                                        <input
                                            class='form-control form--control card-expiry-month' name="card_expiry_month" placeholder='MM'
                                            size='2' type='text'>
                                    </div>
                                    <div class='col-lg-6 form-group expiration required'>
                                        <label>Expiration Year</label>
                                        <input class='form-control form--control card-expiry-year' name="card_expiry_year" placeholder='YYYY'
                                            size='4' type='text'>
                                    </div>
                                    @if (Session::has('error'))
                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>Please correct the errors and try
                                                    again.</div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn--base w-100">Pay Now
                                                ({{ $currency->currency_code }} {{ $feature_ad_price->price }})</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('scripts')
    <script>
        $("#stripe-box").on("click", function() {
            $("#payment-card").show();
        });
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

            });
        });
    </script>
@endsection
