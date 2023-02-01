@extends('frontend.layout.main')
@push('custom_css')
    <style>
        .product-single-item .product-wishlist {
            position: absolute;
            top: 8px;
            right: -210px;
            z-index: 9;
        }
    </style>
@endpush
@section('content')
    <!--~~~~~~~~~~~~~~Start Category~~~~~~~~~~~~~~~~-->
    @include('frontend.partials._category')
    <!--~~~~~~~~~~~End Category~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Help banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="help-banner bg_img" data-background="assets/images/banner/help-banner.svg">
        <div class="container">
            <div class="help-banner-search-area">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Call" class="form--control">
                        <span class="search-icon"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Help banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        start Help btn section
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="help-btn-section pt-60">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">Legal and privacy information</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="about.html" class="btn--base active w-100">about us</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">Announcements</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">Your account</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">using haraj</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">Possible problems</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">Safety and security</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">Messaging</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">sell on haraj</a>
                    </div>
                </div>
                <div class="col-xl-12 mb-30">
                    <div class="help-btn-item">
                        <a href="#0" class="btn--base active w-100">buy on haraj</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Help btn section
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var _token = $('input[name="_token"]').val();
            load_data('', _token);

            function load_data(id = "", _token) {
                $.ajax({
                    url: "{{ route('frontend.ads.load.more') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_more_button').remove();
                        $('#post_data').append(data);
                    }
                })
            }
            $(document).on('click', '#load_more_button', function() {
                var id = $(this).data('id');
                $('#load_more_button').html('<b>Loading...</b>');
                load_data(id, _token);
            });
        });
    </script>
@endsection
