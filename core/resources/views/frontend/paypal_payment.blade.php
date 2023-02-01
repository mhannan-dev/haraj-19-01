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
            <div class="container">
                <div class="row justify-content-center mb-30">
                    <div class="col-xl-6 mb-30">
                        <form action="{{ route('frontend.payment.paypal.charge') }}" method="post">
                            @csrf
                            <input type="text" name="amount" class="form--control mb-2" value="{{ $feature_ad->price }}" readonly />
                            <input type="submit" name="submit"
                                value="Pay Now {{ $currency->currency_code }}" class="btn--base w-100">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
