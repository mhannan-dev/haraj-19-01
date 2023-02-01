@extends('frontend.layout.main')
@push('custom_css')
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
@endpush
@section('content')
    <section class="payment-sell-faster-section ptb-30">
        <div class="container">
            <div class="payment-sell-faster-area">
                <div class="row justify-content-center mb-30-none">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <h3 class="panel-title display-td mb-2">@lang('Payment Details')</h3>
                        </div>
                        <div class="panel-body mb-2">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                            <form role="form" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"
                                action="{{ route('frontend.payment.stripe.post') }}" method="post">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label>@lang('Name on Card')</label> <span class="text-danger">*</span>
                                        <input class='form-control form--control' size='4' type='text'
                                            placeholder='E.g: My Test Card'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label>@lang('Card Number')</label> <span class="text-danger">*</span>
                                        <input autocomplete='off' class='form-control form--control card-number'
                                            size='20' type='text' placeholder='4242 4242 4242 4242'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label>@lang('CVC')</label> <span class="text-danger">*</span> <input
                                            autocomplete='off' class='form-control form--control card-cvc'
                                            placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label>@lang('Expiration Month')</label> <span class="text-danger">*</span> <input
                                            class='form-control form--control card-expiry-month' placeholder='MM'
                                            size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label>@lang('Expiration Year')</label> <span class="text-danger">*</span><input
                                            class='form-control form--control card-expiry-year' placeholder='YYYY'
                                            size='4' type='text'>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">@lang('Pay Now')
                                            {{ $feature_ad->price }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript" src="//js.stripe.com/v2/"></script>
@endsection
