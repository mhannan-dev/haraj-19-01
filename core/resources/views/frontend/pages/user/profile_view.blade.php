@extends('frontend.layout.main')
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">@lang('Home')</a>
                </li>
                <li>
                    <a href="{{ route('frontend.user.view.profile', $userDetails->id) }}"><i
                            class="las la-angle-right"></i>@lang('User profile')</a>
                </li>
                <li>
                    <a href="#"><i class="las la-angle-right"></i>@lang('Profile')</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="view-profile-section pt-30">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-xl-3 col-lg-3 col-md-4 mb-30">
                    <div class="profile-view-left-area">
                        <div class="profile-view-thumb">
                            <img src="@if ($userDetails->image) {{ URL::asset('core/storage/app/public/user/' . $userDetails->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                alt="profile">
                        </div>
                        <div class="profile-view-left-content">
                            <div class="profile-view-left-content-wrapper">
                                <div class="profile-view-left-item">
                                    <h4 class="title">Linked accounts</h4>
                                    <ul class="profile-view-left-content-list">
                                        <li>GOOGLE
                                            <span><svg width="20px" height="20px"
                                                    style="@if ($userDetails->status == 3) fill: green; @endif"
                                                    viewBox="0 0 1024 1024" data-aut-id="icon" class=""
                                                    fill-rule="evenodd">
                                                    <path class="rui-2Xn3A"
                                                        d="M938.667 511.998C938.667 747.64 747.642 938.665 512.001 938.665C276.359 938.665 85.334 747.64 85.334 511.998C85.334 276.357 276.359 85.3315 512.001 85.3315C747.642 85.3315 938.667 276.357 938.667 511.998ZM673.363 328.26C649.481 311.019 616.144 316.402 598.903 340.284L450.739 545.516L381.178 476C360.343 455.178 326.575 455.19 305.753 476.024C284.932 496.859 284.943 530.628 305.778 551.449L419.63 665.227C442.86 688.441 481.349 685.347 500.572 658.72L685.387 402.72C702.628 378.838 697.245 345.501 673.363 328.26Z">
                                                    </path>
                                                </svg></span>
                                        </li>
                                        <li>E-MAIL
                                            <span><svg width="20px" height="20px" viewBox="0 0 1024 1024"
                                                    style="@if ($userDetails->status == 1) fill: green; @endif"
                                                    data-aut-id="icon" class="" fill-rule="evenodd">
                                                    <path class="rui-2Xn3A"
                                                        d="M938.667 511.998C938.667 747.64 747.642 938.665 512.001 938.665C276.359 938.665 85.334 747.64 85.334 511.998C85.334 276.357 276.359 85.3315 512.001 85.3315C747.642 85.3315 938.667 276.357 938.667 511.998ZM673.363 328.26C649.481 311.019 616.144 316.402 598.903 340.284L450.739 545.516L381.178 476C360.343 455.178 326.575 455.19 305.753 476.024C284.932 496.859 284.943 530.628 305.778 551.449L419.63 665.227C442.86 688.441 481.349 685.347 500.572 658.72L685.387 402.72C702.628 378.838 697.245 345.501 673.363 328.26Z">
                                                    </path>
                                                </svg></span>
                                        </li>
                                        <li>FACEBOOK
                                            <span><svg width="20px" height="20px" viewBox="0 0 1024 1024"
                                                    style="@if ($userDetails->status == 2) fill: green; @endif"
                                                    data-aut-id="icon" class="" fill-rule="evenodd">
                                                    <path class="rui-2Xn3A"
                                                        d="M938.667 511.998C938.667 747.64 747.642 938.665 512.001 938.665C276.359 938.665 85.334 747.64 85.334 511.998C85.334 276.357 276.359 85.3315 512.001 85.3315C747.642 85.3315 938.667 276.357 938.667 511.998ZM673.363 328.26C649.481 311.019 616.144 316.402 598.903 340.284L450.739 545.516L381.178 476C360.343 455.178 326.575 455.19 305.753 476.024C284.932 496.859 284.943 530.628 305.778 551.449L419.63 665.227C442.86 688.441 481.349 685.347 500.572 658.72L685.387 402.72C702.628 378.838 697.245 345.501 673.363 328.26Z">
                                                    </path>
                                                </svg></span>
                                        </li>
                                    </ul>
                                </div>
                                <h5 class="joined-date-text text-center">Member since
                                    {{ $userDetails->created_at->format('M Y') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 mb-30">
                    <div class="profile-view-right-area">
                        <div class="profile-view-right-header">
                            <h1 class="title">{{ $userDetails->first_name . ' ' . $userDetails->last_name }}</h1>
                            <div class="profile-view-right-header-btn">
                                <a href="{{ route('frontend.user.update.profile', $userDetails->id) }}"
                                    class="btn--base active">Edit profile</a>
                            </div>
                        </div>
                        <div class="product-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="category-tab" data-bs-toggle="tab"
                                        data-bs-target="#category" type="button" role="tab" aria-controls="category"
                                        aria-selected="true">Selling</button>
                                    <button class="nav-link" id="apps-tab" data-bs-toggle="tab" data-bs-target="#apps"
                                        type="button" role="tab" aria-controls="apps"
                                        aria-selected="false">Sold</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="category" role="tabpanel"
                                    aria-labelledby="category-tab">
                                    <div class="row mt-30 mb-20-none">
                                        @foreach ($advertisements as $advertisement)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                                                <div class="product-single-item">
                                                    <a
                                                        href="{{ route('frontend.ads.details', [$advertisement->slug, $advertisement->id]) }}">
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
                                                            <img src="{{ asset('core/storage/app/public/advertisement_images/' . $advertisement->image) }}"
                                                                alt="product">
                                                        </div>
                                                        <div class="content">
                                                            <span class="sub-title">{{ $advertisement->city->title }}</span>
                                                            <h5 class="title">{{ $advertisement->title }}</h5>
                                                            <span
                                                                class="inner-sub-title">{{ $advertisement->category->title }}</span>
                                                            <h5 class="inner-title">{{ $advertisement->price }}
                                                                {{ $currency->currency_code }}</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="apps" role="tabpanel"
                                    aria-labelledby="apps-tab">
                                    <div class="row mt-30 mb-20-none">
                                        @foreach ($soldAdvertisements as $advertisement)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                                                <div class="product-single-item">
                                                    <a
                                                        href="{{ route('frontend.ads.details', [$advertisement->slug, $advertisement->id]) }}">
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
                                                            <img src="{{ asset('core/storage/app/public/advertisement_images/' . $advertisement->image) }}"
                                                                alt="product">
                                                        </div>
                                                        <div class="content">
                                                            <span class="sub-title">{{ $advertisement->city->title }}</span>
                                                            <h5 class="title">{{ $advertisement->title }}</h5>
                                                            <span
                                                                class="inner-sub-title">{{ $advertisement->category->title }}</span>
                                                            <h5 class="inner-title">{{ $advertisement->price }}
                                                                {{ $currency->currency_code }}</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
