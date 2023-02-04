@extends('frontend.layout.main')
@push('custom_css')
@endpush
@section('content')
    <!--~~~~~~~~~~~~~~Start Category~~~~~~~~~~~~~~~~-->
    @include('frontend.partials._category')
    <!--~~~~~~~~~~~End Category~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~Start Product~~~~~~~~~~~~~~~-->
    <section class="product-section pt-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-header">
                        <h3 class="section-title">@lang('Popular items')</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-20-none">
                @foreach ($sub_category as $item)
                    @if (count($item['sub_category_ads']) > 0)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                            <div class="product-item">
                                <a href="{{ route('frontend.ads.subcategorywise', $item->id) }}">
                                    <div class="thumb">
                                        <div class="popular-item-image-wrapper">
                                            <img data-original={{ asset('core/storage/app/public/category/' . $item->image) }}
                                                src="{{ asset('core/storage/app/public/category/' . $item->image) }}"
                                                alt="product">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <span>{{ $item->title }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
    @if (isset($featured_ads) && count($featured_ads) > 0)
        <section class="product-section pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-header-wrapper">
                            <div class="section-header">
                                <h3 class="section-title">@lang('Featured Products')</h3>
                            </div>
                            <div class="all-btn">
                                <a href="{{ route('frontend.sort') }}" class="custom-btn">@lang('See all')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-20-none">
                    @foreach ($featured_ads as $item)
                        @php
                            $advertiser = Auth::guard('advertiser')->user();

                            if ($advertiser) {
                                $checkFavourite = DB::table('advertisement_advertiser')
                                    ->where('advertiser_id', $advertiser->id)
                                    ->where('advertisement_id', $item->id)
                                    ->first();
                                // dd($checkFavourite);
                                if ($checkFavourite != null) {
                                    $color = 'red';
                                } else {
                                    $color = '';
                                }
                            } else {
                                $color = '';
                            }
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                            <div class="product-single-item-main-wrapper">
                                <span class="plan-badge-top">@lang('Featured')</span>
                                <div class="product-single-item active">
                                    <div class="product-wishlist">
                                        <a class="fav-select" data-ad_id="{{ $item->id }}" href="javascript:void(0)">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz fav-icon" style="fill:{{ $color }}">
                                                    <path
                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                        <div class="product-thumb-slider">
                                            <div class="swiper-wrapper">
                                                @foreach ($item->images as $gallery)
                                                    <div class="swiper-slide">
                                                        <div class="thumb">
                                                            <img src="{{ asset('core/storage/app/public/advertisement_images/' . $gallery->images) }}"
                                                                alt="product">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-pagination"></div>
                                            <div class="slider-nav-area">
                                                <div class="slider-prev slider-nav">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        class="sc-AxjAm dJbVhz">
                                                        <path
                                                            d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="slider-next slider-nav">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        class="sc-AxjAm dJbVhz">
                                                        <path
                                                            d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="sub-title">{{ $item->city ? $item->city->title : '' }}</span>
                                            <h5 class="title">
                                                @if ($item->title == null)
                                                    {{ $item->getCustomTitle }}
                                                @else
                                                    {{ $item->title }}
                                                @endif
                                            </h5>
                                            <span class="inner-sub-title">{{ $item->category->title ?? '' }}</span>
                                            <h5 class="inner-title">{{ $item->price }} {{ $currency->currency_code }}
                                            </h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if (isset($recent_viewed_ads) && count($recent_viewed_ads) > 0)
        <section class="product-section pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-header-wrapper">
                            <div class="section-header">
                                <h3 class="section-title">@lang('Recently Viewed')</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-20-none">
                    @foreach ($recent_viewed_ads as $item)
                        @php
                            $advertiser = Auth::guard('advertiser')->user();

                            if ($advertiser) {
                                $checkFavourite = DB::table('advertisement_advertiser')
                                    ->where('advertiser_id', $advertiser->id)
                                    ->where('advertisement_id', $item->id)
                                    ->first();
                                // dd($checkFavourite);
                                if ($checkFavourite != null) {
                                    $color = 'red';
                                } else {
                                    $color = '';
                                }
                            } else {
                                $color = '';
                            }
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                            <div class="product-single-item-main-wrapper">
                                <span class="plan-badge-top">@lang('Featured')</span>
                                <div class="product-single-item active">
                                    <div class="product-wishlist">
                                        <a class="fav-select" data-ad_id="{{ $item->id }}" href="javascript:void(0)">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz fav-icon" style="fill:{{ $color }}">
                                                    <path
                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                        <div class="product-thumb-slider">
                                            <div class="swiper-wrapper">
                                                @foreach ($item->images as $gallery)
                                                    <div class="swiper-slide">
                                                        <div class="thumb">
                                                            <img src="{{ asset('core/storage/app/public/advertisement_images/' . $gallery->images) }}"
                                                                alt="product">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-pagination"></div>
                                            <div class="slider-nav-area">
                                                <div class="slider-prev slider-nav">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        class="sc-AxjAm dJbVhz">
                                                        <path
                                                            d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="slider-next slider-nav">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        class="sc-AxjAm dJbVhz">
                                                        <path
                                                            d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="sub-title">{{ $item->city ? $item->city->title : '' }}</span>
                                            <h5 class="title">
                                                @if ($item->title == null)
                                                    {{ $item->getCustomTitle }}
                                                @else
                                                    {{ $item->title }}
                                                @endif
                                            </h5>
                                            <span class="inner-sub-title">{{ $item->category->title ?? ''}}</span>
                                            <h5 class="inner-title">{{ $item->price }} {{ $currency->currency_code }}
                                            </h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--~~~~~~~~~~~~~~~~~End Product~~~~~~~~~~~~~-->
    <section class="product-section pt-30 pb-80">
        <div class="justify-content-center d-flex loader" id="">
            <img src="{{ asset('assets/images/loader.gif') }}" width="100" />
        </div>
        <div class="container code_field">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-header-wrapper">
                        <div class="section-header">
                            <h3 class="section-title">@lang('Selected for you')</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-20-none" id="post_data">
                @csrf
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var _token = $('input[name="_token"]').val();
            load_data('', _token);
            $('.code_field').addClass('d-none');

            function load_data(id = "", _token) {
                $.ajax({
                    url: "{{ route('frontend.ads.load.more') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('.code_field').removeClass('d-none');
                        $('.loader').addClass('d-none');
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
