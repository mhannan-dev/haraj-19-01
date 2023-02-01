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
                <div class="row">
                    <form id="paymentForm">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" placeholder="@lang('First name')" />
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" placeholder="@lang('Last name')" />
                        </div>


                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email-address" required placeholder="@lang('Email')" />
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="tel" id="amount" required placeholder="@lang('Amount')" />
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="payWithPaystack()"> Pay
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.paystack.co/v1/inline.js"></script>
    <script type="text/javascript">
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            if (e) {
                e.preventDefault();
            }
            let handler = PaystackPop.setup({
                key: 'pk_test_82a2f59d71807ef5dcd861047138d6c1c1d04d32',
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: '' + Math.floor((Math.random() * 1000000000) +
                    1),
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;

                    $.ajax({
                        type: 'get',
                        url: '{{ URL::to('payment/verify/paystack') }}',
                        data: {
                            reference
                        },
                        success: function(response) {
                            console.log(response)
                        }
                    });
                }
            });

            handler.openIframe();
        }
    </script>
@endsection
