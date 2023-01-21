@extends('frontend.layout.main')
@push('custom_css')
    <link href="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
    <link href="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all"
        rel="stylesheet" type="text/css" />

    <style type="text/css">
        #st-1.st-hidden {
            opacity: 1;
        }
    </style>
    <style>
        .proudct_info {
            padding-left: .4rem;
        }

        .btn-primary {
            background-color: rgba(0, 170, 255, 0.5) border-color: rgba(0, 170, 255, 0.5) border-radius: 50px !important;
        }
    </style>
@endpush
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">@lang('Home')</a>
                </li>
                <li>
                    <a href="#"><i class="las la-angle-right"></i> {{ $details->title }}</a>
                </li>
                <li>
                    <a href="#"><i class="las la-angle-right"></i>@lang('Details')</a>
                </li>
            </ul>
        </div>
    </div>
    @if (count($details->images))
        <section class="product-details-galary-section pt-20">
            <div class="container">
                <div class="product-details-galary-wrapper">
                    <div class="item-details-slider">
                        <div class="swiper-wrapper">
                            {{-- @dd($details->images) --}}
                            @foreach ($details->images as $item)
                                <div class="swiper-slide">
                                    <div class="item-details-thumb">
                                        <a class="img-popup" data-rel="lightcase:myCollection" href="">
                                            <img src="{{ URL::asset('core/public/advertisement_images/' . $item->images) }}"
                                                alt="item-banner">
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="slider-prev">
                            <i class="las la-angle-left"></i>
                        </div>
                        <div class="slider-next">
                            <i class="las la-angle-right"></i>
                        </div>
                    </div>
                    <div thumbsSlider="" class="item-small-slider">
                        <div class="swiper-wrapper">
                            @foreach ($details->images as $item)
                                <div class="swiper-slide">
                                    <div class="item-small-thumb">
                                        <img src="{{ URL::asset('core/public/advertisement_images/' . $item->images) }}"
                                            alt="Item Banner">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--~~~~~~~~~End product details galary section~~~~~~~~~~~~~~~~~~~~-->

    <!--~~~~Start Product details section~~~~~~~~~~~~~~~~~-->
    <section class="product-details-sction">
        <div class="container">
            <div class="product-details-wrapper">
                <div class="row mb-20-none">
                    <div class="col-xl-9 col-lg-8 col-md-8 mb-20 pe-xl-5">
                        <div class="product-details-left">
                            <div class="product-details-content">
                                <div class="top-area">
                                    <div class="top-wrapper">
                                        <h2 class="price-title">{{ $details->price }} {{ $currency->currency_code }}</h2>
                                        <div class="opsition-wrapper">
                                            <a class="product-wishlist" data-ad_id="{{ $details->id }}"
                                                href="javascript:void(0)">
                                                <svg width="36" height="36" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz"
                                                    @if ($checkFavourite != null) style="fill: red" @endif>
                                                    <path
                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                    </path>
                                                </svg>

                                            </a>

                                            {{-- <button class="opsition-item" data-aut-id="btnShare">
                                                 <svg width="24" height="24" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz">
                                                    <path
                                                        d="M8.93 11.353a3.01 3.01 0 0 1 .013 1.232l3.949 3.1a3 3 0 1 1-1.035 1.73l-3.949-3.1a3 3 0 1 1-.042-4.665l4.004-3.003a3 3 0 1 1 1.064 1.702L8.93 11.353zM14.8 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM6 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                                    </path>
                                                </svg>
                                            </button> --}}
                                            <!-- ShareThis BEGIN -->
                                            <div class="sharethis-inline-share-buttons"></div>
                                            <!-- ShareThis END -->
                                            <!-- Button trigger modal -->
                                            <button class="opsition-item-reoprt" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                @lang('Report')
                                            </button>

                                        </div>
                                    </div>
                                    <h1 class="top-sub-title">{{ $details->title }}</h1>
                                </div>
                                <div class="center-area">
                                    <div class="meta-post">
                                        <a>
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                                <path fill="#ff3f55"
                                                    d="M20.803 13.786c.198 2.348-.552 3.951-2.231 5.777-1.538 1.672-3.667 2.64-5.698 2.64h-1.687c-2.005 0-4.036-.943-5.574-2.642-1.444-1.597-1.892-2.805-1.45-5.068.206-1.056.658-2.014 1.096-2.941.523-1.11 1.018-2.159 1.09-3.318l.078-1.289.595 1.145c.464.894.635 1.609.722 2.446 2.229-3.088 3.2-5.763 2.89-7.961L10.553 2l.547.182c.151.05 3.582 1.251 5.21 6.715.315-.792.185-1.892-.104-2.562l-.55-1.274 1.096.845c.928.716 3.726 4.046 4.05 7.88zM12.48 18c1.369 0 2.475-1.124 2.518-2.559.027-.946-.18-2.208-.846-2.91A1.642 1.642 0 0 0 12.937 12a.419.419 0 0 0-.362.213.437.437 0 0 0-.004.426c.298.54.039 1.15-.142 1.465-.412.72-1.202 1.304-1.763 1.304a.64.64 0 0 1-.15-.017.415.415 0 0 0-.385.106.433.433 0 0 0-.124.387C10.222 17.11 11.262 18 12.48 18z">
                                                </path>
                                            </svg>{{ diffForHumans($details->created_at) }}
                                        </a>
                                        <span><svg width="24" height="24" viewBox="0 0 24 24"
                                                class="sc-AxjAm dJbVhz">
                                                <path fill="#757575"
                                                    d="M12.186 8.106a3.733 3.733 0 0 1 3.727 3.728 3.733 3.733 0 0 1-3.727 3.728 3.733 3.733 0 0 1-3.727-3.728 3.733 3.733 0 0 1 3.727-3.728zm0 5.966a2.24 2.24 0 0 0 2.236-2.238 2.237 2.237 0 0 0-4.472 0 2.24 2.24 0 0 0 2.236 2.238zm9.67-2.802c-3.113-4.254-6.476-6.379-9.997-6.266-5.697.165-9.577 6.05-9.74 6.3a.752.752 0 0 0 .02.84c3.152 4.424 6.491 6.661 9.928 6.661.122 0 .244-.004.365-.009 5.645-.258 9.313-6.445 9.466-6.708a.75.75 0 0 0-.042-.818">
                                                </path>
                                            </svg>{{ $details->view_count }}</span>
                                    </div>
                                    <div class="product-details-list-area">
                                        @if (!empty($details->details_informations) && $details->details_informations != null)
                                            <ul class="product-details-list proudct_info">
                                                @foreach (json_decode($details->details_informations) as $key => $details_info)
                                                    <li>{{ str_replace('_', ' ', ucfirst($key)) }}</strong>
                                                        &nbsp;{{ $details_info }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            {{ $details->description }}
                                        @endif
                                        @if (isset($details->fuel_type) && $details->fuel_type != null)
                                            <ul class="product-details-list proudct_info">
                                                <li>@lang('Fuel Type'): {!! str_replace('"', ' ', (string) $details->fuel_type) !!} </li>
                                            </ul>
                                        @endif
                                    </div>
                                    @if (!empty($details->details_informations) && $details->details_informations != null)
                                        <div class="product-type-wrapper">
                                            @foreach (json_decode($details->details_informations) as $key => $details_info)
                                                <div class="product-type-item">
                                                    <div class="product-type-icon">
                                                        <i class="las la-list"></i>
                                                    </div>
                                                    <div class="product-type-content">
                                                        <span
                                                            class="sub-title">{{ str_replace('_', ' ', ucfirst($key)) }}</span>
                                                        <h5 class="title">{{ $details_info }}</h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if (isset($details->fuel_type) && $details->fuel_type != null)
                                                <div class="product-type-item">
                                                    <div class="product-type-icon">
                                                        <i class="las la-list"></i>
                                                    </div>
                                                    <div class="product-type-content">
                                                        <span class="sub-title">@lang('Fuel Type')</span>
                                                        <h5 class="title">{!! str_replace('"', ' ', (string) $details->fuel_type) !!}</h5>

                                                    </div>

                                                </div>
                                            @endif

                                        </div>
                                    @endif
                                    <div class="bottom-area">
                                        <div class="title-wrapper">
                                            <h4 class="title">
                                                @lang('Condition'): @if ($details->condition == 'Like New')
                                                    <img src="{{ URL::asset('assets/frontend') }}/images/icon/1.png"
                                                        alt="👍">
                                                    {{ $details->condition }}
                                                @else
                                                    {{ $details->condition }}
                                                @endif
                                            </h4>
                                            <p>{!! $details->description !!} </p>
                                            <h4 class="title">@lang('Location')</h4>
                                        </div>
                                        <div class="map-area">
                                            {!! $details->location_embeded_map !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-4 mb-20">
                        <div class="product-details-right">
                            <div class="seller-profile-card-area">
                                <div class="seller-profile-card">
                                    <div class="seller-profile-card-top-wrapper">
                                        <div class="thumb-area">
                                            <div class="thumb">
                                                <img src="@if($details->advertiser->image) {{URL::asset('core/public/storage/user/' . $details->advertiser->image)}} @else {{asset('assets/images/default.png')}} @endif"
                                                    alt="img">
                                            </div>
                                            <div class="thumb-content-area">
                                                <div class="thumb-content">
                                                    <a href="{{ route('frontend.user.public.profile', $details->advertiser_id) }}"
                                                        class="seller-profile-card-top-link">
                                                        <span class="title">{{ $details->advertiser->full_name }}</span>
                                                    </a>
                                                    <ul class="reating-list" data-bs-toggle="modal"
                                                        data-bs-target="#rating_modal">
                                                        {{-- @php $rating = 5; @endphp

                                                        @foreach (range(1, 5) as $i)
                                                            <span class="fa-stack" style="width:1em">
                                                                <i class="far fa-star fa-stack-1x"></i>
                                                                @if ($rating > 0)
                                                                    @if ($rating > 0.5)
                                                                        <i class="fas fa-star fa-stack-1x"></i>
                                                                    @else
                                                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                                                    @endif
                                                                @endif
                                                                @php $rating--; @endphp
                                                            </span>
                                                        @endforeach --}}
                                                        <a href="#" class="text-warning">{{ count($user_rating) }}
                                                            &nbsp; Rating</a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="arrow-area">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#BDBDBD"
                                                class="sc-AxjAm dJbVhz">
                                                <path
                                                    d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="seller-profile-card-bottom-wrapper">
                                        <span class="title">@lang('Message the seller'):</span>
                                        <form action="{{ url('user/msg/template') }}" method="POST">
                                            @csrf
                                            <div class="seller-profile-bottom-btn">
                                                <input type="hidden" name="recever_id"
                                                    value="{{ $details->advertiser_id }}">
                                                <input type="hidden" name="advertisement_id"
                                                    value="{{ $details->id }}">
                                                <input type="hidden" name="advertisement_title"
                                                    value="{{ $details->title }}">
                                                <input type="hidden" name="advertisement_price"
                                                    value="{{ $details->price }}">
                                                <input type="hidden" name="advertiser_id"
                                                    value="{{ $details->advertiser_id }}">

                                                <input type="submit" name="message" class="btn--base btn-sm mb-2"
                                                    value="@lang('Is it still available')?">
                                                <input type="submit" name="message" class="btn--base btn-sm mb-2"
                                                    value="@lang('What condition is it in')?">
                                                <input type="submit" name="message" class="btn--base btn-sm"
                                                    value="@lang('Is the price negotiable')?">
                                            </div>
                                        </form>
                                        <form class="chat-with-seller-form"
                                            action="{{ route('frontend.detailsSendMessage') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="recever_id"
                                                value="{{ $details->advertiser_id }}">
                                            <input type="hidden" name="advertisement_id" value="{{ $details->id }}">
                                            <input type="hidden" name="advertisement_title"
                                                value="{{ $details->title }}">
                                            <input type="hidden" name="advertisement_price"
                                                value="{{ $details->price }}">
                                            <input type="hidden" name="advertiser_id"
                                                value="{{ $details->advertiser_id }}">
                                            <input type="text" class="form--control mb-2 write_message"
                                                placeholder="@lang('Send message to seller')" name="message">
                                            <div class="send-chat-btn">
                                                <button type="submit" class="btn--base w-100">@lang('Send') <i
                                                        class="las la-paper-plane ms-1"></i></button>
                                            </div>
                                        </form>
                                        @if (isset(Auth::guard('advertiser')->user()->id))
                                            <input type="button" class="btn--base"
                                                value="{{ $details->advertiser->mobile_no }}">
                                        @else
                                            <a href="#"
                                                class="btn btn-light btn-sm btn-block">@lang('Login to see mobile no')</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-area">
                    <span class="title">@lang('Share this listing')</span>
                    {{-- <ul class="social-list">
                        <li>
                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                <path
                                    d="M13.213 5.22c-.89.446-.606 3.316-.606 3.316h3.231v2.907h-3.23v10.359H8.773V11.444H6.39V8.536h2.423c-.221 0 .12-2.845.146-3.114.136-1.428 1.19-2.685 2.544-3.153 1.854-.638 3.55-.286 5.385.17l-.484 2.504s-2.585-.455-3.191.277z">
                                </path>
                            </svg>
                        </li>
                        <li>
                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                <path
                                    d="M21.744 6.236a7.945 7.945 0 0 1-1.383.466 4.313 4.313 0 0 0 1.138-1.813.226.226 0 0 0-.33-.263 7.982 7.982 0 0 1-2.116.874.56.56 0 0 1-.502-.125 4.325 4.325 0 0 0-2.862-1.08c-.457 0-.918.07-1.37.211a4.19 4.19 0 0 0-2.825 3.02 4.614 4.614 0 0 0-.102 1.592.16.16 0 0 1-.174.175 11.342 11.342 0 0 1-7.795-4.165.226.226 0 0 0-.37.029 4.322 4.322 0 0 0-.587 2.175 4.32 4.32 0 0 0 1.29 3.083 3.876 3.876 0 0 1-.987-.382.226.226 0 0 0-.336.195 4.33 4.33 0 0 0 2.527 3.99 3.873 3.873 0 0 1-.821-.069.226.226 0 0 0-.258.291 4.335 4.335 0 0 0 3.424 2.949 7.982 7.982 0 0 1-4.47 1.358h-.5c-.155 0-.285.1-.325.249a.343.343 0 0 0 .165.379 11.872 11.872 0 0 0 5.965 1.608c1.834 0 3.549-.364 5.098-1.081a11.258 11.258 0 0 0 3.73-2.795 12.254 12.254 0 0 0 2.284-3.826c.508-1.356.776-2.804.776-4.186v-.066c0-.222.1-.43.276-.573a8.55 8.55 0 0 0 1.72-1.888c.126-.188-.073-.424-.28-.332z">
                                </path>
                            </svg>
                        </li>
                        <li>
                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                <path clip-rule="evenodd"
                                    d="M4 4a2 2 0 0 0-2 2v11.25a2 2 0 0 0 2 2h16.333a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4zm14.065 2.97a.924.924 0 0 1 1.143 1.454l-3.781 2.97 3.78 2.97a.924.924 0 0 1-1.142 1.454l-4.134-3.249-1.194.938a.92.92 0 0 1-1.142 0l-1.192-.938-4.134 3.249a.924.924 0 0 1-1.143-1.454l3.781-2.97-3.781-2.97A.923.923 0 1 1 6.269 6.97l5.898 4.634 5.898-4.634z">
                                </path>
                            </svg>
                        </li>
                    </ul> --}}
                    <div class="sharethis-inline-share-buttons share-icon-bottom"></div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~End Product details section~~~~~~~~~~~~~~~~~-->

    @if (count($related_products))
        <section class="product-section pt-30 mb-2">
            <div class="container">
                <h2 class="product-section-header-title pb-10">@lang('You may also like')</h2>
                <div class="row justify-content-center mb-20-none">
                    {{-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                            <div class="product-single-item">
                                <a href="#">
                                    <div class="product-wishlist">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                class="sc-AxjAm dJbVhz">
                                                <path
                                                    d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="thumb">
                                        <img src="assets/images/product/product-1.webp" alt="product">
                                    </div>
                                    <div class="content">
                                        <span class="sub-title">İstanbul</span>
                                        <h5 class="title">TV ÜNİTESİ+ORTA SEHPA TAKIMI</h5>
                                        <span class="inner-sub-title">Home and Garden</span>
                                        <h5 class="inner-title">1,700 TL</h5>
                                    </div>
                                </a>
                            </div>
                        </div> --}}
                    @foreach ($related_products as $item)
                        @php
                            $r_checkFavourite = DB::table('advertisement_advertiser')
                                ->where('advertiser_id', '=', $item->advertiser_id)
                                ->where('advertisement_id', '=', $item->id)
                                ->first();
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                            <span class="plan-badge-top">Featured</span>
                            <div class="product-single-item active">
                                <a href="{{ route('frontend.user.favourite', $item->id) }}">
                                    <div class="product-wishlist">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                class="sc-AxjAm dJbVhz"
                                                @if ($r_checkFavourite != null) style="fill: red" @endif>
                                                <path
                                                    d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                                {{-- <div class="product-badge">
                                        <svg width="79" height="24" viewBox="0 0 79 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="OtoPlusFeedBadgestyles__OtoPlusFeedBadgeSVG-sc-1x1dudp-0 fVIvXp">
                                            <path
                                                d="M78.55 7.62646V0H0V24H63.5215C67.5073 24 71.3298 22.275 74.1482 19.2043C76.9666 16.1337 78.55 11.969 78.55 7.62646Z"
                                                fill="#ff3f55"></path>
                                            <path
                                                d="M66.7654 15.5873C66.4786 15.5873 66.2313 15.3089 66.2313 14.5747C66.2313 13.7645 66.7259 12.6405 67.4479 12.6405C67.7842 12.6405 67.9425 12.9848 67.9425 13.4304C67.9425 14.3013 67.4479 15.5873 66.7902 15.5873H66.7654ZM63.9069 14.9089C63.9069 14.9089 63.9069 14.9342 63.9069 14.9443C63.8314 15.0777 63.7279 15.1923 63.6039 15.2799C63.4799 15.3674 63.3385 15.4258 63.1898 15.4506C62.9722 15.4506 62.6952 15.2177 62.6952 14.7924C62.6952 14.0177 63.1008 12.6253 63.9712 12.6253C64.059 12.6232 64.1464 12.6386 64.2284 12.6709C64.2492 12.6776 64.2673 12.6911 64.2798 12.7094C64.2924 12.7278 64.2986 12.7498 64.2976 12.7721L63.9069 14.9089ZM62.7249 18.276C62.6248 18.276 62.5287 18.2356 62.4574 18.1636C62.3861 18.0915 62.3454 17.9937 62.3441 17.8911C62.3441 17.4557 62.7793 17.1468 63.4074 16.8025C63.4213 16.7927 63.438 16.7876 63.455 16.7882C63.4719 16.7887 63.4883 16.7949 63.5016 16.8056C63.5148 16.8164 63.5244 16.8313 63.5288 16.848C63.5333 16.8648 63.5323 16.8826 63.5261 16.8987C63.2986 17.8101 63.1156 18.276 62.7249 18.276ZM58.8526 12.6557C59.0009 12.6557 59.0652 12.8228 59.0652 12.9747C59.0652 13.481 58.6201 14.0228 57.9376 14.4937C57.9232 14.5024 57.9066 14.5068 57.8899 14.5064C57.8731 14.5059 57.8568 14.5006 57.8429 14.4911C57.8289 14.4816 57.8179 14.4682 57.811 14.4525C57.8041 14.4369 57.8018 14.4195 57.8041 14.4025C57.8832 13.7696 58.1651 12.6506 58.8526 12.6506V12.6557ZM56.9535 10.5696C57.0375 10.5696 57.1167 10.6709 57.1167 10.8025C56.8548 11.6849 56.4965 12.5342 56.0484 13.3342C56.0376 13.3509 56.0217 13.3636 56.0032 13.3702C55.9847 13.3767 55.9645 13.3769 55.9459 13.3705C55.9273 13.3642 55.9113 13.3517 55.9003 13.335C55.8893 13.3184 55.884 13.2985 55.8852 13.2785C56.1918 11.7595 56.7111 10.5696 56.9535 10.5696ZM67.2748 12.0025C66.0434 12.0025 65.1878 13.5823 65.1878 14.838C65.1858 14.9909 65.199 15.1435 65.2274 15.2937C65.2274 15.324 65.2274 15.3595 65.1977 15.3797C65.0691 15.4709 64.9257 15.5721 64.7823 15.6582C64.7686 15.6673 64.7527 15.672 64.7364 15.672C64.7202 15.6719 64.7043 15.6671 64.6907 15.6579C64.6771 15.6488 64.6663 15.6359 64.6598 15.6207C64.6532 15.6054 64.6511 15.5886 64.6537 15.5721C64.6493 15.5318 64.6493 15.491 64.6537 15.4506L65.2521 12.2152C65.257 12.197 65.2552 12.1777 65.247 12.1608C65.2388 12.144 65.2247 12.1309 65.2076 12.124C65.1219 12.0734 65.0246 12.0472 64.9257 12.0481C64.7638 12.048 64.6081 12.1114 64.4905 12.2253C64.4742 12.2402 64.453 12.2485 64.4311 12.2485C64.4092 12.2485 64.3881 12.2402 64.3718 12.2253C64.1833 12.0747 63.9478 11.9992 63.7091 12.0126C62.72 12.0126 61.8149 13.4911 61.805 14.8582C61.805 14.9595 61.805 15.0709 61.805 15.1924C61.8058 15.2254 61.7953 15.2576 61.7754 15.2835C61.583 15.4317 61.3528 15.5196 61.1127 15.5367C60.905 15.5367 60.7714 15.3949 60.8703 14.9291L61.3055 12.6911C61.3102 12.6711 61.3218 12.6534 61.3381 12.6413C61.3544 12.6292 61.3745 12.6235 61.3946 12.6253H62.0128C62.0626 12.6265 62.1122 12.6166 62.158 12.5963C62.2037 12.576 62.2447 12.5459 62.2781 12.5079C62.3114 12.4699 62.3364 12.425 62.3512 12.3762C62.366 12.3274 62.3703 12.276 62.3639 12.2253C62.3626 12.202 62.3527 12.1801 62.3361 12.1641C62.3196 12.1481 62.2976 12.1392 62.2749 12.1392H61.533C61.5199 12.1388 61.507 12.1354 61.4953 12.1293C61.4836 12.1232 61.4733 12.1145 61.4653 12.1039C61.4573 12.0932 61.4516 12.0809 61.4488 12.0677C61.446 12.0546 61.446 12.041 61.449 12.0278L61.6567 11.0152C61.6597 10.9957 61.6571 10.9757 61.6492 10.9577C61.6413 10.9397 61.6284 10.9245 61.6122 10.9139C61.5103 10.864 61.3987 10.838 61.2858 10.838C61.1313 10.826 60.9776 10.8702 60.8519 10.9628C60.7261 11.0554 60.6363 11.1905 60.5983 11.3443L60.4599 12.0228C60.4552 12.0428 60.4436 12.0605 60.4273 12.0726C60.411 12.0847 60.3909 12.0904 60.3708 12.0886H60.2818C60.2321 12.0873 60.1827 12.0972 60.1371 12.1175C60.0915 12.1378 60.0508 12.1681 60.0178 12.2062C59.9849 12.2443 59.9604 12.2893 59.9462 12.3381C59.932 12.3869 59.9284 12.4382 59.9356 12.4886C59.9368 12.5124 59.9466 12.5348 59.963 12.5517C59.9795 12.5685 60.0014 12.5785 60.0246 12.5797H60.2422C60.2554 12.5801 60.2683 12.5835 60.28 12.5896C60.2917 12.5958 60.3019 12.6045 60.31 12.6151C60.318 12.6258 60.3237 12.6381 60.3265 12.6512C60.3293 12.6644 60.3293 12.678 60.3263 12.6911L59.906 14.7164C59.9089 14.7298 59.9089 14.7436 59.906 14.757C59.7237 14.9837 59.498 15.1698 59.2429 15.3039C58.9877 15.438 58.7085 15.5172 58.4223 15.5367C58.3436 15.5444 58.2643 15.536 58.1888 15.5121C58.1134 15.4882 58.0432 15.4492 57.9826 15.3975C57.9219 15.3457 57.8718 15.2821 57.8352 15.2104C57.7986 15.1387 57.7763 15.0603 57.7695 14.9797C57.7665 14.9603 57.7691 14.9403 57.777 14.9223C57.7849 14.9043 57.7977 14.8891 57.814 14.8785C59.2977 14.0228 59.629 13.481 59.6537 12.7569C59.6537 12.3772 59.5004 11.9569 58.8031 11.9569C57.5321 11.9569 56.8249 13.6937 56.7903 14.7671C56.7903 14.9038 56.7903 15.0253 56.7903 15.1367C56.7915 15.1533 56.7885 15.17 56.7816 15.1851C56.7747 15.2002 56.764 15.2132 56.7507 15.2228C56.5371 15.357 56.2938 15.4336 56.0435 15.4456C55.7566 15.4456 55.5489 15.2785 55.5934 14.8481C55.5934 14.757 55.5934 14.6456 55.6281 14.5595C55.6627 14.4734 55.6281 14.5342 55.6281 14.524C56.6716 12.8886 57.5123 11.3443 57.5123 10.6911C57.5101 10.5184 57.4441 10.3529 57.3276 10.228C57.2111 10.1031 57.0527 10.0279 56.8842 10.0177C55.8209 10.0177 54.995 12.043 54.6142 15.081C54.5054 15.962 54.9505 16.3165 55.5143 16.3165C56.023 16.2937 56.5115 16.1057 56.9089 15.7797C56.9164 15.7711 56.9255 15.7642 56.9357 15.7595C56.946 15.7548 56.9571 15.7523 56.9683 15.7523C56.9795 15.7523 56.9906 15.7548 57.0009 15.7595C57.0111 15.7642 57.0202 15.7711 57.0276 15.7797C57.1445 15.9463 57.3005 16.0799 57.4811 16.1684C57.6618 16.2569 57.8613 16.2974 58.0613 16.2861C58.6679 16.2582 59.2427 16.0001 59.6735 15.562C59.6843 15.5495 59.6985 15.5407 59.7143 15.5368C59.7301 15.5329 59.7467 15.5341 59.7618 15.5402C59.777 15.5463 59.7899 15.557 59.7989 15.5708C59.8078 15.5847 59.8124 15.6011 59.812 15.6177C59.808 15.7096 59.8234 15.8013 59.857 15.8867C59.8907 15.972 59.9418 16.0489 60.007 16.1123C60.0721 16.1756 60.1498 16.2239 60.2348 16.2539C60.3197 16.2839 60.41 16.2949 60.4994 16.2861C61.0053 16.2466 61.4815 16.0261 61.8446 15.6633C61.8891 15.6177 61.9534 15.6633 61.988 15.6987C62.0489 15.8685 62.1584 16.0154 62.3023 16.1202C62.4461 16.225 62.6176 16.2828 62.7942 16.2861C62.9521 16.2715 63.1053 16.2235 63.2441 16.1451C63.3828 16.0666 63.5041 15.9594 63.6003 15.8304C63.612 15.8139 63.629 15.8022 63.6484 15.7973C63.6677 15.7925 63.6881 15.7949 63.7059 15.804C63.7237 15.8131 63.7378 15.8284 63.7456 15.8471C63.7534 15.8659 63.7545 15.8868 63.7486 15.9063C63.7486 15.9722 63.719 16.043 63.7091 16.1089C63.6992 16.1747 63.7091 16.1544 63.6646 16.1646C63.0414 16.4987 61.8693 17.076 61.8693 18.0279C61.8693 18.2848 61.9687 18.5313 62.1457 18.7135C62.3227 18.8957 62.563 18.9987 62.8139 19C64.0009 19 64.1987 17.7646 64.5251 16.2304C64.526 16.2183 64.5302 16.2066 64.5372 16.1968C64.5442 16.187 64.5537 16.1793 64.5647 16.1747C64.8123 16.0338 65.0518 15.8783 65.2818 15.7089C65.2892 15.6994 65.2986 15.6917 65.3093 15.6864C65.32 15.6812 65.3317 15.6784 65.3436 15.6784C65.3555 15.6784 65.3672 15.6812 65.3779 15.6864C65.3886 15.6917 65.398 15.6994 65.4054 15.7089C65.503 15.8863 65.6477 16.0319 65.8228 16.1286C65.9978 16.2254 66.196 16.2695 66.3945 16.2557C67.6655 16.2557 68.5458 14.6759 68.5458 13.4405C68.5458 12.6304 68.1749 11.9519 67.2847 11.9519"
                                                fill="white"></path>
                                            <path
                                            d="M16.9538 6.6557C16.9538 6.4677 16.8809 6.2874 16.751 6.15446C16.6212 6.02152 16.4451 5.94684 16.2614 5.94684H16.034V5.70886C16.0326 5.5204 15.9586 5.3401 15.828 5.20731C15.6973 5.07452 15.5207 5 15.3366 5H14.6443V5.94684H13.7244V6.6557C13.7244 6.8437 13.7973 7.02401 13.9272 7.15694C14.057 7.28988 14.2331 7.36456 14.4168 7.36456H14.6443V7.60254C14.6443 7.69563 14.6622 7.78781 14.697 7.87381C14.7318 7.95981 14.7828 8.03796 14.847 8.10378C14.9769 8.23672 15.153 8.3114 15.3366 8.3114H16.034V7.36456H16.9538V6.6557Z"
                                            fill="white"></path>
                                            <path
                                            d="M13.1309 16.357C12.7278 16.3657 12.327 16.2929 11.9514 16.1429C11.5758 15.9928 11.2328 15.7684 10.942 15.4825C10.6512 15.1965 10.4184 14.8547 10.2568 14.4765C10.0952 14.0983 10.0081 13.6912 10.0004 13.2785C10.0081 12.8658 10.0952 12.4587 10.2568 12.0805C10.4184 11.7023 10.6512 11.3604 10.942 11.0745C11.2328 10.7885 11.5758 10.5641 11.9514 10.4141C12.327 10.264 12.7278 10.1913 13.1309 10.2C13.534 10.1913 13.9348 10.264 14.3104 10.4141C14.686 10.5641 15.029 10.7885 15.3198 11.0745C15.6106 11.3604 15.8434 11.7023 16.005 12.0805C16.1666 12.4587 16.2537 12.8658 16.2614 13.2785C16.2537 13.6912 16.1666 14.0983 16.005 14.4765C15.8434 14.8547 15.6106 15.1965 15.3198 15.4825C15.029 15.7684 14.686 15.9928 14.3104 16.1429C13.9348 16.2929 13.534 16.3657 13.1309 16.357ZM13.1309 11.6633C12.8181 11.6593 12.5111 11.7506 12.2491 11.9256C11.9871 12.1006 11.7818 12.3514 11.6593 12.6462C11.5369 12.941 11.5028 13.2663 11.5614 13.581C11.62 13.8956 11.7687 14.1853 11.9885 14.4132C12.2084 14.6412 12.4894 14.797 12.796 14.861C13.1025 14.925 13.4208 14.8942 13.7102 14.7726C13.9996 14.6509 14.2472 14.4439 14.4214 14.1779C14.5957 13.9119 14.6887 13.5988 14.6887 13.2785C14.6907 13.0675 14.6519 12.8582 14.5745 12.6627C14.4972 12.4671 14.3828 12.2892 14.238 12.1391C14.0932 11.9889 13.9209 11.8696 13.7309 11.788C13.5409 11.7063 13.337 11.6639 13.1309 11.6633Z"
                                            fill="white"></path>
                                            <path
                                            d="M23.8083 16.357C23.4052 16.3657 23.0044 16.293 22.6288 16.1429C22.2532 15.9929 21.9102 15.7684 21.6194 15.4825C21.3286 15.1965 21.0958 14.8547 20.9342 14.4765C20.7726 14.0983 20.6855 13.6912 20.6778 13.2785C20.7228 12.4596 21.0722 11.6894 21.6543 11.126C22.2365 10.5625 23.0072 10.2486 23.8083 10.2486C24.6094 10.2486 25.3802 10.5625 25.9623 11.126C26.5445 11.6894 26.8939 12.4596 26.9389 13.2785C26.9312 13.6912 26.844 14.0983 26.6824 14.4765C26.5209 14.8547 26.288 15.1965 25.9972 15.4825C25.7065 15.7684 25.3634 15.9929 24.9878 16.1429C24.6122 16.293 24.2114 16.3657 23.8083 16.357ZM23.8083 11.6633C23.4955 11.6593 23.1885 11.7506 22.9265 11.9256C22.6645 12.1006 22.4592 12.3515 22.3368 12.6462C22.2143 12.941 22.1802 13.2664 22.2389 13.581C22.2975 13.8957 22.4462 14.1853 22.666 14.4133C22.8858 14.6412 23.1669 14.797 23.4734 14.861C23.78 14.925 24.0982 14.8942 24.3876 14.7726C24.6771 14.651 24.9246 14.444 25.0989 14.1779C25.2731 13.9119 25.3662 13.5988 25.3662 13.2785C25.3681 13.0675 25.3293 12.8583 25.252 12.6627C25.1746 12.4672 25.0603 12.2892 24.9155 12.1391C24.7707 11.989 24.5983 11.8697 24.4083 11.788C24.2183 11.7063 24.0144 11.664 23.8083 11.6633Z"
                                            fill="white"></path>
                                            <path
                                            d="M33.8577 13.2784C33.8421 14.1102 33.5047 14.9016 32.9196 15.4788C32.3344 16.056 31.5495 16.3718 30.7371 16.3569C30.1581 16.3568 29.6023 16.1241 29.1891 15.7088V18.119H27.6115V13.2784C27.6436 12.4524 27.9867 11.6712 28.5689 11.0984C29.151 10.5256 29.9271 10.2057 30.7346 10.2057C31.542 10.2057 32.3181 10.5256 32.9003 11.0984C33.4825 11.6712 33.8256 12.4524 33.8577 13.2784ZM32.2801 13.2784C32.2801 12.959 32.1875 12.6467 32.0142 12.3811C31.8408 12.1155 31.5944 11.9084 31.3062 11.7862C31.0179 11.6639 30.7007 11.632 30.3947 11.6943C30.0886 11.7566 29.8075 11.9104 29.5869 12.1363C29.3662 12.3622 29.216 12.65 29.1551 12.9633C29.0942 13.2766 29.1255 13.6014 29.2449 13.8965C29.3643 14.1917 29.5665 14.4439 29.8259 14.6214C30.0854 14.7989 30.3904 14.8936 30.7024 14.8936C31.1208 14.8936 31.5221 14.7235 31.818 14.4206C32.1139 14.1176 32.2801 13.7068 32.2801 13.2784Z"
                                            fill="white"></path>
                                            <path
                                            d="M38.7192 10.3721V13.2784C38.7192 14.1696 39.1544 14.8936 40.0248 14.8936C40.8952 14.8936 41.3255 14.1696 41.3255 13.2784V10.3721H42.9031V13.2784C42.9261 13.6799 42.8687 14.082 42.7345 14.46C42.6002 14.838 42.3919 15.1839 42.1224 15.4765C41.8529 15.7691 41.5278 16.0023 41.1671 16.1616C40.8064 16.3209 40.4177 16.4031 40.0248 16.4031C39.632 16.4031 39.2433 16.3209 38.8825 16.1616C38.5218 16.0023 38.1967 15.7691 37.9272 15.4765C37.6577 15.1839 37.4494 14.838 37.3151 14.46C37.1809 14.082 37.1235 13.6799 37.1465 13.2784V10.3721H38.7192Z"
                                            fill="white"></path>
                                            <path
                                            d="M48.2839 14.3772C48.2839 15.6228 47.1909 16.357 45.9743 16.357C44.7577 16.357 43.6598 15.6329 43.6598 14.3772H45.2375C45.2375 14.8836 45.6281 15 45.9743 15C46.3205 15 46.7063 14.8177 46.7063 14.4431C46.7063 14.1696 46.3601 13.9367 45.8903 13.8608C44.7874 13.719 43.7241 13.0304 43.7241 12.119C43.7241 10.9342 44.7528 10.2 45.9743 10.2C47.1959 10.2 48.2196 10.9342 48.2196 12.1798H46.6469C46.6469 11.6734 46.3205 11.557 45.9743 11.557C45.6281 11.557 45.3017 11.6836 45.3017 12.0633C45.3017 12.4431 45.9941 12.676 46.6024 12.7519C47.4333 12.8481 48.2839 13.3848 48.2839 14.3671"
                                            fill="white"></path>
                                            <path
                                            d="M18.566 11.7494H20.0794C20.0794 11.7494 20.109 11.7494 20.109 11.7139V10.4025C20.109 10.3945 20.1059 10.3868 20.1003 10.3811C20.0948 10.3754 20.0872 10.3722 20.0794 10.3722H19.2287C19.0468 10.3722 18.8722 10.2989 18.7426 10.1681C18.613 10.0374 18.539 9.85967 18.5364 9.67343V8.3114H16.9538V13.2734C16.939 13.6758 17.0043 14.077 17.1458 14.4527C17.2873 14.8284 17.502 15.1706 17.7768 15.4586C18.0517 15.7466 18.3809 15.9743 18.7444 16.1279C19.1079 16.2815 19.4982 16.3577 19.8914 16.3519H20.0991V14.8886C19.8922 14.8886 19.6873 14.8468 19.4962 14.7656C19.305 14.6844 19.1314 14.5653 18.9853 14.4153C18.8392 14.2652 18.7235 14.0871 18.6448 13.8912C18.566 13.6952 18.5258 13.4853 18.5265 13.2734V11.7798C18.5265 11.7717 18.5296 11.764 18.5352 11.7583C18.5407 11.7526 18.5483 11.7494 18.5561 11.7494"
                                            fill="white"></path>
                                            <path
                                            d="M35.4749 8.3114H34.5699V16.357H36.1475V9.02026C36.1476 8.83572 36.0774 8.65842 35.9518 8.52605C35.8262 8.39368 35.6551 8.31667 35.4749 8.3114Z"
                                            fill="white"></path>
                                        </svg>
                                    </div> --}}
                                <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                    <div class="product-thumb-slider">
                                        <div class="swiper-wrapper">
                                            @foreach ($item->images as $gallery)
                                                <div class="swiper-slide">
                                                    <div class="thumb">
                                                        <img src="{{ URL::asset('core/public/advertisement_images/' . $gallery->images) }}"
                                                            alt="product">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="slider-nav-area">
                                            <div class="slider-prev slider-nav">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz" style="fill:red">
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
                                    @if (empty($item->images))
                                        <div class="thumb">
                                            <img src="{{ URL::asset('core/public/storage/image/' . $item->image) }}"
                                                alt="product">
                                        </div>
                                    @endif
                                    <div class="content">
                                        <span class="sub-title">{{ $item->city->title }}</span>
                                        <h5 class="title">{{ $item->title }}</h5>
                                        <span class="inner-sub-title">{{ $item->category->title }}</span>
                                        <h5 class="inner-title">{{ $item->price }} TL</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--~~~~~~End Product~~~~~~~~~~~~~-->
    @endif



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog two modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header two justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body two">
                    <h1 class="report-title">@lang('Product Complain')</h1>
                    <form class="report-form-area" action="{{ route('frontend.ads.complain') }}" method="post">
                        <input type="hidden" value="{{ $details->id }}" name="advertisement_id">
                        @csrf
                        <div class="radio-wrapper">
                            <div class="radio-item">
                                <input type="radio" id="test1" name="complain" value="shouldn't be on your site">
                                <label for="test1">@lang('should not be on your site')</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="test2" name="complain" value="illegal product">
                                <label for="test2">@lang('illegal product')</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="test3" name="complain" value="I think it's fraud">
                                <label for="test3">@lang('I think it is fraud')</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="test4" name="complain" value="More than one posting">
                                <label for="test4">@lang('More than one posting')</label>
                            </div>
                        </div>
                        <textarea class="report-text-area" placeholder="If you have any other notes to help us fix this issue, add"
                            name="complain_details"></textarea>
                        <div class="report-btn mt-4">
                            <button type="submit" class="btn--base w-100">@lang('Submit complaint')</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    {{-- Rating Modal --}}
    <div class="modal fade" id="rating_modal" tabindex="-1" aria-labelledby="rating_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('rating') }}" method="post"> @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="rating_modalLabel">
                            @lang('Rate this seller')
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <input id="input-9" name="input-9" required class="rating-loading">
                            <hr>
                            <button type="submit" class="btn btn-primary">@lang('Submit')</button>&nbsp;
                            <button type="reset" class="btn btn-outline-secondary">@lang('Reset')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></scrip>
<script src = "//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>
<script src="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>

    <script>
        var swiper = new Swiper(".item-small-slider", {
            loop: false,
            spaceBetween: 20,
            slidesPerView: 8,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            breakpoints: {
                1400: {
                    slidesPerView: 8,
                },
                1199: {
                    slidesPerView: 6,
                },
                991: {
                    slidesPerView: 4,
                },
                767: {
                    slidesPerView: 3,
                },
                575: {
                    slidesPerView: 3,
                },
                480: {
                    slidesPerView: 3,
                },
                320: {
                    slidesPerView: 2,
                },
            }
        });
        var swiper2 = new Swiper(".item-details-slider", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: '.slider-next',
                prevEl: '.slider-prev',
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#input-3').rating({
                displayOnly: true,
                step: 0.5
            });
            $('#input-5').rating({
                clearCaption: 'No stars yet'
            });
            $('#input-8').rating({
                rtl: true,
                containerClass: 'is-star'
            });
            $('#input-9').rating();
        });
    </script>
    <script>
        $(document).on('click', '.prebuildSms', function(e) {
            e.preventDefault();
            var sms = $(this).text();
            $('.write_message').val(sms);
        });
    </script>
@endsection
