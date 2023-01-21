@extends('frontend.layout.main')
@section('content')
    <section class="seller-profile-section pt-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="seller-profile-area">
                        <div class="seller-profile-wrapper">
                            <div class="info-area">
                                <div class="thumb-area">
                                    <div class="thumb">
                                        <img src="@if($seller->image) {{URL::asset('core/public/storage/user/' . $seller->image)}} @else {{asset('assets/images/default.png')}} @endif"
                                            alt="img">
                                    </div>
                                    @if ($seller->status != 0)
                                        <div class="badge">
                                            <svg fill="#A3CE71" viewBox="0 0 24 24" width="30px" height="30px"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 ggSWTD">
                                                <path
                                                    d="M12.8896 21.437C12.3283 21.1515 11.6717 21.1515 11.1104 21.437L10.4254 21.7855C9.44377 22.2848 8.25852 21.884 7.74643 20.8797L7.38904 20.1788C7.09621 19.6045 6.56507 19.2029 5.94967 19.0906L5.1986 18.9535C4.12245 18.7571 3.38992 17.7079 3.54294 16.5822L3.64973 15.7966C3.73723 15.1528 3.53435 14.5031 3.09994 14.0358L2.56975 13.4655C1.81008 12.6484 1.81008 11.3516 2.56975 10.5345L3.09994 9.96418C3.53435 9.4969 3.73723 8.84718 3.64973 8.20345L3.54294 7.41779C3.38992 6.29208 4.12245 5.24294 5.1986 5.04651L5.94967 4.90941C6.56507 4.79708 7.09621 4.39553 7.38904 3.82122L7.74643 3.12029C8.25852 2.11599 9.44377 1.71525 10.4254 2.21454L11.1104 2.56301C11.6717 2.84853 12.3283 2.84853 12.8896 2.56301L13.5746 2.21454C14.5562 1.71525 15.7415 2.11598 16.2536 3.12029L16.611 3.82122C16.9038 4.39553 17.4349 4.79708 18.0503 4.90941L18.8014 5.04651C19.8776 5.24294 20.6101 6.29208 20.4571 7.41779L20.3503 8.20345C20.2628 8.84718 20.4656 9.4969 20.9001 9.96417L21.4302 10.5345C22.1899 11.3516 22.1899 12.6484 21.4302 13.4655L20.9001 14.0358C20.4656 14.5031 20.2628 15.1528 20.3503 15.7966L20.4571 16.5822C20.6101 17.7079 19.8776 18.7571 18.8014 18.9535L18.0503 19.0906C17.4349 19.2029 16.9038 19.6045 16.611 20.1788L16.2536 20.8797C15.7415 21.884 14.5562 22.2848 13.5746 21.7855L12.8896 21.437Z">
                                                </path>
                                                <path
                                                    d="M14.2365 8.51842C14.6406 7.95869 15.4219 7.83251 15.9817 8.2366C16.5414 8.64069 16.6676 9.42203 16.2635 9.98176L11.9319 15.9818C11.4814 16.6058 10.5793 16.6784 10.0348 16.1343L7.3664 13.4676C6.87809 12.9796 6.87783 12.1881 7.36583 11.6998C7.85382 11.2115 8.64528 11.2113 9.1336 11.6993L10.7639 13.3285L14.2365 8.51842Z"
                                                    fill="white"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="content-area">
                                    <h2 class="title">{{ $seller->full_name }}</h2>
                                    <ul class="reating-list">
                                        <li>
                                            <svg fill="#FFD200" viewBox="0 0 24 24" width="18px" height="18px"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M15.072 8.545l5.073-.02c.274 0 .553.03.819.112.582.18 1.036.593 1.036 1.293 0 .662-.37 1.093-.891 1.47l-4.16 3.178 1.555 5.087c.11.277.153.569.153.885 0 .758-.362 1.45-1.29 1.45-.438 0-.75-.147-1.127-.415l-.142-.103-4.109-3.12-4.068 3.088c-.41.346-.796.55-1.309.55-.854 0-1.311-.694-1.311-1.427 0-.292.057-.572.149-.837l1.6-5.16-4.137-3.16C2.37 11.023 2 10.592 2 9.93c0-.69.445-1.108 1.018-1.29a2.68 2.68 0 0 1 .816-.115l5.092.02 1.576-5.143c.088-.263.16-.443.28-.644.262-.444.638-.758 1.208-.758.569 0 .945.314 1.208.758.119.2.191.38.287.666l1.587 5.12z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg fill="#FFD200" viewBox="0 0 24 24" width="18px" height="18px"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M15.072 8.545l5.073-.02c.274 0 .553.03.819.112.582.18 1.036.593 1.036 1.293 0 .662-.37 1.093-.891 1.47l-4.16 3.178 1.555 5.087c.11.277.153.569.153.885 0 .758-.362 1.45-1.29 1.45-.438 0-.75-.147-1.127-.415l-.142-.103-4.109-3.12-4.068 3.088c-.41.346-.796.55-1.309.55-.854 0-1.311-.694-1.311-1.427 0-.292.057-.572.149-.837l1.6-5.16-4.137-3.16C2.37 11.023 2 10.592 2 9.93c0-.69.445-1.108 1.018-1.29a2.68 2.68 0 0 1 .816-.115l5.092.02 1.576-5.143c.088-.263.16-.443.28-.644.262-.444.638-.758 1.208-.758.569 0 .945.314 1.208.758.119.2.191.38.287.666l1.587 5.12z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg fill="#FFD200" viewBox="0 0 24 24" width="18px" height="18px"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M15.072 8.545l5.073-.02c.274 0 .553.03.819.112.582.18 1.036.593 1.036 1.293 0 .662-.37 1.093-.891 1.47l-4.16 3.178 1.555 5.087c.11.277.153.569.153.885 0 .758-.362 1.45-1.29 1.45-.438 0-.75-.147-1.127-.415l-.142-.103-4.109-3.12-4.068 3.088c-.41.346-.796.55-1.309.55-.854 0-1.311-.694-1.311-1.427 0-.292.057-.572.149-.837l1.6-5.16-4.137-3.16C2.37 11.023 2 10.592 2 9.93c0-.69.445-1.108 1.018-1.29a2.68 2.68 0 0 1 .816-.115l5.092.02 1.576-5.143c.088-.263.16-.443.28-.644.262-.444.638-.758 1.208-.758.569 0 .945.314 1.208.758.119.2.191.38.287.666l1.587 5.12z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg fill="#FFD200" viewBox="0 0 24 24" width="18px" height="18px"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M15.072 8.545l5.073-.02c.274 0 .553.03.819.112.582.18 1.036.593 1.036 1.293 0 .662-.37 1.093-.891 1.47l-4.16 3.178 1.555 5.087c.11.277.153.569.153.885 0 .758-.362 1.45-1.29 1.45-.438 0-.75-.147-1.127-.415l-.142-.103-4.109-3.12-4.068 3.088c-.41.346-.796.55-1.309.55-.854 0-1.311-.694-1.311-1.427 0-.292.057-.572.149-.837l1.6-5.16-4.137-3.16C2.37 11.023 2 10.592 2 9.93c0-.69.445-1.108 1.018-1.29a2.68 2.68 0 0 1 .816-.115l5.092.02 1.576-5.143c.088-.263.16-.443.28-.644.262-.444.638-.758 1.208-.758.569 0 .945.314 1.208.758.119.2.191.38.287.666l1.587 5.12z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg fill="#FFD200" viewBox="0 0 24 24" width="18px" height="18px"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M15.072 8.545l5.073-.02c.274 0 .553.03.819.112.582.18 1.036.593 1.036 1.293 0 .662-.37 1.093-.891 1.47l-4.16 3.178 1.555 5.087c.11.277.153.569.153.885 0 .758-.362 1.45-1.29 1.45-.438 0-.75-.147-1.127-.415l-.142-.103-4.109-3.12-4.068 3.088c-.41.346-.796.55-1.309.55-.854 0-1.311-.694-1.311-1.427 0-.292.057-.572.149-.837l1.6-5.16-4.137-3.16C2.37 11.023 2 10.592 2 9.93c0-.69.445-1.108 1.018-1.29a2.68 2.68 0 0 1 .816-.115l5.092.02 1.576-5.143c.088-.263.16-.443.28-.644.262-.444.638-.758 1.208-.758.569 0 .945.314 1.208.758.119.2.191.38.287.666l1.587 5.12z">
                                                </path>
                                            </svg>
                                        </li>
                                    </ul>
                                    <span class="sub-title">{{ $seller->city->title }}</span>
                                </div>
                                <div class="opsition-area">
                                    <div class="left">
                                        <span class="title">Verified with:</span>
                                        <div class="thumb">
                                            @if ($seller->status == 3)
                                                <svg style="color: #4285F4" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-google"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                                                        fill="#4285F4"></path>
                                                </svg>
                                            @endif
                                            @if ($seller->status == 2)
                                                <svg style="color: #204186" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-facebook"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                                        fill="#204186"></path>
                                                </svg>
                                            @endif
                                            @if ($seller->status == 1)
                                                <svg style="color: #d33f3a" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="21"
                                                    zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="21"
                                                    preserveAspectRatio="xMidYMid meet" version="1.0">
                                                    <defs>
                                                        <clipPath id="id1">
                                                            <path
                                                                d="M 3.460938 6.5625 L 26.539062 6.5625 L 26.539062 24.707031 L 3.460938 24.707031 Z M 3.460938 6.5625 "
                                                                clip-rule="nonzero" fill="#d33f3a"></path>
                                                        </clipPath>
                                                    </defs>
                                                    <g clip-path="url(#id1)">
                                                        <path fill="#c71610"
                                                            d="M 24.230469 11.101562 L 15 16.769531 L 5.769531 11.101562 L 5.769531 8.832031 L 15 14.503906 L 24.230469 8.832031 Z M 24.230469 6.5625 L 5.769531 6.5625 C 4.492188 6.5625 3.472656 7.578125 3.472656 8.832031 L 3.460938 22.441406 C 3.460938 23.695312 4.492188 24.707031 5.769531 24.707031 L 24.230469 24.707031 C 25.507812 24.707031 26.539062 23.695312 26.539062 22.441406 L 26.539062 8.832031 C 26.539062 7.578125 25.507812 6.5625 24.230469 6.5625 "
                                                            fill-opacity="1" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="sharethis-inline-share-buttons share-icon-bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-section pt-30 mb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
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
                                    @forelse ($seller->ads as $item)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                                            <div class="product-single-item">
                                                <a href="#">
                                                    <div class="product-wishlist" data-ad_id="{{ $item->id }}"
                                                        href="javascript:void(0)">
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
                                                        <img src="{{ asset('core/storage/app/public/advertisement_images/' . $item->image) }}"
                                                            alt="product">
                                                    </div>
                                                    <div class="content">
                                                        <span class="sub-title">{{ $item->city->title }}</span>
                                                        <h5 class="title">{{ $item->title }}</h5>
                                                        <span class="inner-sub-title">{{ $item->category->title }}</span>
                                                        <h5 class="inner-title">{{ $item->price }}
                                                            {{ $currency->currency_code }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                        @lang('No ad found')
                                    @endforelse
                                </div>

                            </div>
                            <div class="tab-pane fade" id="apps" role="tabpanel" aria-labelledby="apps-tab">
                                <div class="row mt-30 mb-20-none">
                                    @foreach ($soldAds as $ad)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-20">
                                            <div class="product-single-item">
                                                <a href="#">
                                                    <div class="product-wishlist" data-ad_id="{{ $item->id }}"
                                                        href="javascript:void(0)">
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
                                                        <img src="{{ URL::asset('core/public/storage/image/' . $ad->image) }}"
                                                            alt="product">
                                                    </div>
                                                    <div class="content">
                                                        <span class="sub-title">{{ $ad->city->title }}</span>
                                                        <h5 class="title">{{ $ad->title }}</h5>
                                                        <span class="inner-sub-title">{{ $ad->category->title }}</span>
                                                        <h5 class="inner-title">{{ $ad->price }} TL</h5>
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
    </section>
@endsection
@section('scripts')
@endsection
