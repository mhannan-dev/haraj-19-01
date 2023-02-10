@extends('frontend.layout.main')
@push('page_meta')
    <meta name="keywords" content="{{ $details->meta_tags }}">
    <meta name="title" Content="{{ $details->meta_title }}">
@endpush
@push('custom_css')
    <link href="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />
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

        .seller-profile-card-bottom-wrapper .send-chat-btn button,
        .seller-profile-card-bottom-wrapper .send-chat-btn input[type=button],
        .seller-profile-card-bottom-wrapper .send-chat-btn input[type=reset],
        .seller-profile-card-bottom-wrapper .send-chat-btn input[type=submit] {
            background-color: rgba(0, 170, 255, 0.5);
            cursor: text;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    </style>
@endpush
@php
    $advertiser = Auth::guard('advertiser')->user();
    if (isset($advertiser)) {
        $advertiser = $advertiser->id;
    } else {
        $advertiser = null;
    }
    if ($advertiser) {
        $checkFavourite = DB::table('advertisement_advertiser')
            ->where('advertiser_id', $advertiser)
            ->where('advertisement_id', $details->id)
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
                            @foreach ($details->images as $item)
                                <div class="swiper-slide">
                                    <div class="item-details-thumb">
                                        <a class="img-popup" data-rel="lightcase:myCollection" href="{{ asset('core/storage/app/public/advertisement_images/' . $item->images) }}">
                                            <img
                                            src="{{ asset('core/storage/app/public/advertisement_images/' . $item->images) }}"
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
                                        <img src="{{ asset('core/storage/app/public/advertisement_images/' . $item->images) }}"
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
                                            <div class="opsition-item">
                                                <a class="fav-select" data-ad_id="{{ $details->id }}"
                                                    href="javascript:void(0)">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            class="sc-AxjAm dJbVhz fav-icon"
                                                            style="fill:{{ $color }}">
                                                            <path
                                                                d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>

                                            <button class="opsition-item" data-bs-toggle="modal"
                                                data-bs-target="#shareModal">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz">
                                                    <path
                                                        d="M8.93 11.353a3.01 3.01 0 0 1 .013 1.232l3.949 3.1a3 3 0 1 1-1.035 1.73l-3.949-3.1a3 3 0 1 1-.042-4.665l4.004-3.003a3 3 0 1 1 1.064 1.702L8.93 11.353zM14.8 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM6 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                                                    </path>
                                                </svg>
                                            </button>

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
                                        {{ $details->description }} <br> <br>
                                        @if (!empty($details->details_informations) && $details->details_informations != null)
                                            <ul class="product-details-list proudct_info">
                                                @foreach (json_decode($details->details_informations) as $key => $details_info)
                                                    <h5 class="title">{{ $details_info->label }}</h5>
                                                    @if ($details_info->type == 'text')
                                                        <p>{{  str_replace('_',' ', $details_info->value) }}</p>
                                                    @endif
                                                    @if ($details_info->type == 'number')
                                                        <p>{{  str_replace('_',' ', $details_info->value) }}</p>
                                                    @endif
                                                    @if ($details_info->type == 'textarea')
                                                        <p>{{  str_replace('_',' ', $details_info->value) }}</p>
                                                    @endif
                                                    @if ($details_info->type == 'checkbox')
                                                        @foreach ($details_info->value as $details_info)
                                                            <li>
                                                                {{ ucfirst($details_info) }}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="bottom-area">
                                        <div class="title-wrapper">
                                            <h4 class="title">
                                                @lang('Condition'): @if ($details->condition == 'Like New')
                                                    <img src="{{ URL::asset('assets/frontend') }}/images/icon/1.png"
                                                        alt="👍">
                                                @endif
                                                {{ $details->condition }}
                                            </h4>
                                        </div>
                                        @if (isset($details->location_embeded_map))
                                            <h4 class="title">@lang('Location')</h4>
                                            <div class="map-area">
                                                {!! $details->location_embeded_map !!}
                                            </div>
                                        @endif
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
                                                <img src="{{ asset('core/public/storage/user/' . $details->advertiser->image) }}"
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

                                                        <a href="#" class="text-warning">{{ count($user_rating) }}
                                                            &nbsp; @lang('Rating')</a>
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
                                                placeholder="@lang('Send message to seller')" name="message" required>
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
                    <span class="title">@lang('Share this listing'), "{{ $details->title }}", @lang('with your friends')</span>
                    <ul class="social-list">
                        <li>
                            <a target="_blank"
                                href="{{ 'https://www.facebook.com/sharer/sharer.php?u=' . URL::current() }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                    <path
                                        d="M13.213 5.22c-.89.446-.606 3.316-.606 3.316h3.231v2.907h-3.23v10.359H8.773V11.444H6.39V8.536h2.423c-.221 0 .12-2.845.146-3.114.136-1.428 1.19-2.685 2.544-3.153 1.854-.638 3.55-.286 5.385.17l-.484 2.504s-2.585-.455-3.191.277z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank"
                                href="{{ 'https://twitter.com/intent/tweet?text=' . $details->title . ';url=' . URL::current() }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                    <path
                                        d="M21.744 6.236a7.945 7.945 0 0 1-1.383.466 4.313 4.313 0 0 0 1.138-1.813.226.226 0 0 0-.33-.263 7.982 7.982 0 0 1-2.116.874.56.56 0 0 1-.502-.125 4.325 4.325 0 0 0-2.862-1.08c-.457 0-.918.07-1.37.211a4.19 4.19 0 0 0-2.825 3.02 4.614 4.614 0 0 0-.102 1.592.16.16 0 0 1-.174.175 11.342 11.342 0 0 1-7.795-4.165.226.226 0 0 0-.37.029 4.322 4.322 0 0 0-.587 2.175 4.32 4.32 0 0 0 1.29 3.083 3.876 3.876 0 0 1-.987-.382.226.226 0 0 0-.336.195 4.33 4.33 0 0 0 2.527 3.99 3.873 3.873 0 0 1-.821-.069.226.226 0 0 0-.258.291 4.335 4.335 0 0 0 3.424 2.949 7.982 7.982 0 0 1-4.47 1.358h-.5c-.155 0-.285.1-.325.249a.343.343 0 0 0 .165.379 11.872 11.872 0 0 0 5.965 1.608c1.834 0 3.549-.364 5.098-1.081a11.258 11.258 0 0 0 3.73-2.795 12.254 12.254 0 0 0 2.284-3.826c.508-1.356.776-2.804.776-4.186v-.066c0-.222.1-.43.276-.573a8.55 8.55 0 0 0 1.72-1.888c.126-.188-.073-.424-.28-.332z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank"
                                href="{{ 'https://mail.google.com/mail/u/0/?view=cm&fs=1&to&su=Buy - "' . $details->title . ' from ' . $general->sitename . '"&body=Hey, Click on this URL : ' . URL::current() . '&ui=1&tf=1&pli=1?' }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 0 0-2 2v11.25a2 2 0 0 0 2 2h16.333a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4zm14.065 2.97a.924.924 0 0 1 1.143 1.454l-3.781 2.97 3.78 2.97a.924.924 0 0 1-1.142 1.454l-4.134-3.249-1.194.938a.92.92 0 0 1-1.142 0l-1.192-.938-4.134 3.249a.924.924 0 0 1-1.143-1.454l3.781-2.97-3.781-2.97A.923.923 0 1 1 6.269 6.97l5.898 4.634 5.898-4.634z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
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

                    @foreach ($related_products as $item)
                        @php
                            if ($advertiser) {
                                $checkFavourite = DB::table('advertisement_advertiser')
                                    ->where('advertiser_id', $advertiser)
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
    {{-- Share Modal --}}
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="rating_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @lang('Share this with your friends')
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="twitter"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-twitter"></i>
                                @lang('Twitter')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="facebook" data-url="{{ URL::current() }}">
                                <i class="lab la-facebook-square"></i>
                                @lang('Facebook')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="linkedin" data-url="{{ URL::current() }}">
                                <i class="lab la-linkedin-in"></i>
                                @lang('Linkedin')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="googleplus" data-url="{{ URL::current() }}">
                                <i class="lab la-google-plus"></i>
                                @lang('Google Plus')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="email" data-title="" data-to=""
                                data-subject="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="las la-envelope"></i>
                                @lang('Email')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="whatsapp"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-whatsapp"></i>
                                @lang('WhatsApp')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="telegram"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-telegram"></i>
                                @lang('Telegram')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="viber"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-viber"></i>
                                @lang('Viber')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="pinterest" data-url="{{ URL::current() }}">
                                <i class="lab la-pinterest"></i>
                                @lang('Pinterest')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn"
                                data-caption="{{ 'Hey, Click on this URL : ' . URL::current() }}" data-sharer="tumblr"
                                data-tags="html,javascript,css,php,ios,android" data-title="Merida Design">
                                <i class="lab la-tumblr"></i>
                                @lang('Tumblr')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="hackernews"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-hacker-news"></i>
                                @lang('Hacker News')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="reddit" data-url="{{ URL::current() }}">
                                <i class="lab la-reddit"></i>
                                @lang('Reddit')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn"
                                data-caption="{{ 'Hey, Click on this URL : ' . URL::current() }}" data-sharer="vk"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-vk"></i>

                                @lang('Vk')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="buffer"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-twitter-url="meridadesign" data-url="{{ URL::current() }}">
                                <i class="lab la-buffer"></i>
                                @lang('Buffer')
                            </button>
                        </div>
                        <div class="col-4 mt-2">
                            <button class="sharer social_btn" data-sharer="xing"
                                data-title="{{ 'Buy - "' . $details->title . '" from ' . $general->sitename }}"
                                data-url="{{ URL::current() }}">
                                <i class="lab la-xing"></i>
                                @lang('Xing')
                            </button>
                        </div>
                    </div>
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
    <script src="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript">
        < /scrip>

        <
        script src = "//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js" >
    </script>

    <script src="//cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sharer.js/0.2.6/sharer.min.js"
        integrity="sha512-xk5eEidlsrX83GN/H68Wa+kXe8dNImrtotgfcHFt0koTddEjVeUd7Yx0bCKOn2xx7YnIDJXHL6D12GnQxNpPQg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
