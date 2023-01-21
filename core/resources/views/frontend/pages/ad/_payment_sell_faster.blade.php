
@php
    $ad_type_id = session()->get('ad_type_id');
    $ad_type = \DB::table('ad_types')->where('id', '=', $ad_type_id)->first();
@endphp
@extends('frontend.layout.main')
@section('content')
    <section class="payment-sell-faster-section ptb-30">
        <div class="container">
            <div class="payment-sell-faster-area">
                <div class="row justify-content-center mb-30-none">
                    <div class="col-xxl-8 col-xl-12 mb-30">
                        <div class="sell-faster-payment-item">
                            <div class="sell-faster-withdraw-form-area">
                                <form class="sell-faster-withdraw-form">
                                    <div class="row">
                                        @foreach ($payment_gateways as $item)
                                            <div class="col-lg-3 form-group">
                                                @if ($item->name == 'Paypal')
                                                    <a href="{{ url('payment/handle-payment') }}">
                                                        <img height="100" width="100"
                                                            src="{{ URL::to('/assets/images/gateway/') . '/' . $item->image, imagePath()['gateway']['size'] }}"
                                                            alt="@lang('image')">
                                                    </a>
                                                @elseif($item->name == 'PayStack')
                                                    <a href="{{ route('frontend.payment.paystack.form') }}">
                                                        <img height="100" width="100"
                                                            src="{{ URL::to('/assets/images/gateway/') . '/' . $item->image, imagePath()['gateway']['size'] }}"
                                                            alt="@lang('image')">
                                                    </a>
                                                @elseif($item->name == 'Stripe')
                                                    <a href="{{ route('frontend.payment.stripe.form') }}">
                                                        <img height="100" width="100"
                                                            src="{{ URL::to('/assets/images/gateway/') . '/' . $item->image, imagePath()['gateway']['size'] }}"
                                                            alt="@lang('image')">
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                        <div class="col-lg-3 form-group">
                                            <div class="sell-faster-payment-content">
                                                <ul class="sell-faster-payment-list">
                                                    <li><span> Payable Amount</span> - USD</li>
                                                    <li><span> Fees</span> : {{ $ad_type->price }} USD</li>
                                                    {{-- <li><span> Charge</span> - 1 USD + 1%</li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
