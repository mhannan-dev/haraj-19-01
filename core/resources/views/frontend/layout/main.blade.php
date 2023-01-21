<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if (session()->get('lang') == 'ar') dir="rtl" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $general->sitename($pageTitle ?? '') }}</title>
    @include('partials.seo')
    <link rel="preconnect" href="//fonts.googleapis.com">
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
    <link
        href="//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/fontawesome-all.min.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/bootstrap.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ getImage(imagePath()['logoIcon']['path'] . '/favicon.png', '?' . time()) }}"
        type="image/x-icon">
    <!-- swipper css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/swiper.min.css">
    <!-- odometer css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/odometer.css">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/line-awesome.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/animate.css">
    <!-- nice-select css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/nice-select.css">
    <!-- lightcase css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/lightcase.css">
    <link href="{{ URL::asset('assets/frontend') }}/css/jquery.skeleton.css" rel="stylesheet">
    <!-- main style css link -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/app.css"> --}}
    <link href="{{ asset('core/public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/style.css">
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    @if (session()->get('lang') == 'ar')
        <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/rtl.css">
    @endif

    <style>
        a {
            text-decoration: none;
        }

        .header-search-area .header-search-form {
            background-color: transparent;
            padding: 0;
        }

        .header-search-area .header-search-form .search-icon {
            position: relative;
            left: 40px;
        }

        .header-search-area .header-search-form input {
            background-color: #F5F5F5;
            padding: 25px 45px;
        }
    </style>
    <script type='text/javascript'
        src='//platform-api.sharethis.com/js/sharethis.js#property=633927585a306f001995daca&product=sticky-share-buttons'
        async='async'></script>
    <script src="{{ asset('core/public/js/app.js') }}" defer></script>
    @stack('custom_css')
</head>

<body>
    <div class="cursor"></div>
    <div class="cursor-follower"></div>

    <div class="page-body-wrapper-area">
        <div class="page-body-wrapper">

            <!--~~~~~Start Header~~~~~~-->
            <header class="header-section">
                <div class="header">
                    <div class="header-bottom-area">
                        <div class="container">
                            <div class="header-menu-content">
                                <div class="header-logo">
                                    <a href="{{ url('/') }}">
                                        <img width="125" height="auto"
                                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                            alt="Logo" class="Headerstyle__LogoStyled-x7dkhw-2 jTcymi">
                                    </a>
                                </div>
                                <div class="header-search-area">
                                    <form id="search-form" class="header-search-form" action="{{ url('ads/search') }}"
                                        method="get">
                                        <label class="search-icon"><i class="fas fa-search"></i></label>
                                        <input type="text" name="search" id="search_text" class="form--control"
                                            placeholder="@lang('Search')" />
                                    </form>


                                </div>
                                <div class="header-action">

                                    <a href="{{ route('frontend.user.post.ad') }}" class="btn--base"><i
                                            class="fas fa-camera"></i>
                                        @lang('Sell')</a>
                                    @if (!Auth::guard('advertiser')->check())
                                        <a href="#" class="btn--base active" data-bs-toggle="modal"
                                            data-bs-target="#accountModal">@lang('Log In')</a>
                                    @endif
                                </div>
                                @if (isset(Auth::guard('advertiser')->user()->id))
                                    @php
                                        $user = Auth::guard('advertiser')->user();
                                    @endphp
                                    <div class="header-after-login-btn">
                                        <a href="{{ route('frontend.user.chat') }}">
                                            <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                                data-aut-id="icon" fill="#757575" fill-rule="evenodd">
                                                <path class="rui-2Xn3A"
                                                    d="M370.341 929.721C347.913 952.149 309.533 936.446 309.283 904.719V823.559C309.283 798.807 289.217 778.741 264.5 778.741C165.564 778.741 85.334 698.547 85.334 599.61V349.586C85.334 250.792 165.456 170.67 264.25 170.67H764.871C863.701 170.67 943.787 250.792 943.787 349.586V599.861C943.787 698.654 863.701 778.741 764.871 778.741H551.009C532.052 778.741 513.845 786.288 500.432 799.702L370.341 929.721ZM281.924 474.453C281.924 504.142 305.996 528.035 335.613 528.035C365.23 528.035 389.23 504.142 389.23 474.453C389.23 444.765 365.23 420.872 335.613 420.872C305.996 420.872 281.924 444.765 281.924 474.453ZM693.302 528.035C663.685 528.035 639.613 504.142 639.613 474.453C639.613 444.765 663.685 420.872 693.302 420.872C722.918 420.872 746.919 444.765 746.919 474.453C746.919 504.142 722.918 528.035 693.302 528.035ZM460.768 474.453C460.768 504.142 484.84 528.035 514.457 528.035C544.073 528.035 568.074 504.142 568.074 474.453C568.074 444.765 544.073 420.872 514.457 420.872C484.84 420.872 460.768 444.765 460.768 474.453Z">
                                                </path>
                                            </svg>
                                        </a>
                                        {{-- <a href="#">
                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                            fill="#757575" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M612.13 213.181C709.297 254.087 778.018 352.424 778.018 467.543V606.995C778.018 633.835 788.564 658.152 805.588 675.711C815.821 686.221 809.688 704.006 795.261 704.006H228.749C214.323 704.006 208.189 686.221 218.391 675.711C235.477 658.152 246.023 633.835 246.023 606.995V467.543C246.023 352.424 314.619 254.087 411.818 213.181C416.481 211.241 419.673 207.069 420.862 202.025C430.845 159.534 467.865 128.006 512.021 128.006C556.176 128.006 593.072 159.534 603.086 202.025C604.275 207.069 607.467 211.241 612.13 213.181Z M641.423 803.922C644.093 792.018 633.795 780.805 620.405 780.805H413.317C399.927 780.805 389.63 792.018 392.299 803.922C404.122 856.491 455.311 896.005 516.882 896.005C578.326 896.005 629.6 856.491 641.423 803.922Z">
                                            </path>
                                        </svg>
                                    </a> --}}
                                    </div>
                                    <div class="menu-toggler">
                                        <div class="profile-toggler-btn">
                                            <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                alt="profile">
                                        </div>
                                    </div>
                                @endif
                                <div class="menu-toggler">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--~~~End Header~~~~~~~~~-->
            <!--~~~Start Responsive Sell Btn~~~~~~~~~~~-->
            @if (Illuminate\Support\Facades\Route::currentRouteName() != 'frontend.user.chat')
                <div class="res-sell-btn">
                    <a href="{{ url('/') }}" class="btn--base"><i class="fas fa-camera"></i> @lang('Sell Your Stuff')</a>
                </div>
            @endif
            <!--~~~~~End Responsive Sell Btn~~~~~~~~~-->
            <!--~~~~~~~~Start Menu~~~~~~~~~-->
            <div class="menu-overlay"></div>
            <div class="menu-container">
                @if (Auth::guard('advertiser')->check())
                    <div class="menu-account-wrapper">
                        <div class="thumb">
                            <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                alt="Image" srcset="">
                        </div>
                        <div class="content">
                            <span class="hello-text">@lang('Hello') .</span>
                            <h5 class="title">
                                <a
                                    href="{{ route('frontend.user.view.profile', Auth::guard('advertiser')->user()->id) }}">{{ Auth::guard('advertiser') ? Auth::guard('advertiser')->user()->first_name : '' }}</a>
                            </h5>
                            <span class="sub-title"><a href="">@lang('You are logged in now')</a></span>
                        </div>
                    </div>
                @else
                    <div class="menu-account-wrapper">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/default.png') }}" alt="Image" srcset="">
                        </div>
                        <div class="content">
                            <span class="hello-text">@lang('Hello') .</span>
                            <h5 class="title">Guest</h5>
                            <span class="sub-title"><a href="#" data-bs-toggle="modal"
                                    data-bs-target="#accountModal">@lang('Login your account')</a></span>
                        </div>
                    </div>
                @endif
                @if (isset(Auth::guard('advertiser')->user()->id))
                    <div class="menu-wrapper">
                        <nav class="menu-nav">
                            <ul class="header-menu">
                                <li class="active"><a href="{{ url('/') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                            class="sc-AxjAm dJbVhz">
                                            <path
                                                d="M2 10.442V20a2 2 0 0 0 2 2h3.56a2 2 0 0 0 1.962-2.392L9 17a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-8.664a3 3 0 0 0-.993-2.23l-7.114-6.403a3 3 0 0 0-3.881-.112L3.126 8.099A3 3 0 0 0 2 10.442z">
                                            </path>
                                        </svg>
                                        @lang('Discover')</a>
                                </li>
                                <li><a href="{{ route('frontend.user.my_ads') }}">
                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                            data-aut-id="icon" class="" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M712.252 170.666C640.945 170.666 575.243 201.641 531.987 255.662L512.011 280.593L492.036 255.662C448.768 201.641 383.067 170.666 311.77 170.666C186.917 170.666 85.334 267.226 85.334 385.907C85.334 628.106 392.029 895.999 512.52 895.999C633.011 895.999 938.667 646.348 938.667 385.907C938.667 267.216 837.106 170.666 712.252 170.666Z">
                                            </path>
                                        </svg>
                                        @lang('My Ads')</a>
                                </li>
                                <li><a href="{{ route('frontend.helps') }}">
                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                            data-aut-id="icon" class="" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M512.001 938.664C747.642 938.664 938.667 747.639 938.667 511.997C938.667 276.356 747.642 85.3306 512.001 85.3306C276.359 85.3306 85.334 276.356 85.334 511.997C85.334 747.639 276.359 938.664 512.001 938.664ZM499.2 661.331C466.227 661.331 439.467 688.082 439.467 721.043C439.467 754.004 466.227 780.755 499.2 780.755C532.173 780.755 558.933 754.004 558.933 721.043C558.933 688.082 532.173 661.331 499.2 661.331ZM568.033 409.251C568.033 371.481 537.442 341.331 498.918 341.331C461.454 341.331 429.803 373.881 429.803 412.715C429.803 436.279 410.7 455.382 387.136 455.382C363.572 455.382 344.469 436.279 344.469 412.715C344.469 327.279 413.782 255.997 498.918 255.997C584.296 255.997 653.366 324.073 653.366 409.251C653.366 479.296 606.695 537.747 542.647 556.329C542.647 566.36 541.584 566.36 541.584 566.36C541.584 589.924 522.482 609.027 498.918 609.027C475.354 609.027 456.251 589.924 456.251 566.36V519.838C456.251 496.274 475.354 477.171 498.918 477.171C537.457 477.171 568.033 447.043 568.033 409.251Z">
                                            </path>
                                        </svg>
                                        @lang('Help')</a>
                                </li>
                                <li><a
                                        href="{{ route('frontend.user.setting', Auth::guard('advertiser')->user()->id) }}">
                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                            data-aut-id="icon" class="" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M936.855 385.331C933.068 399.464 923.628 411.464 910.721 418.451C836.375 458.664 836.375 565.331 910.721 605.544C923.628 612.531 933.068 624.531 936.855 638.664C940.641 652.851 938.455 667.944 930.775 680.424L873.868 772.851C859.041 796.904 828.001 805.224 803.095 791.784L779.255 778.824C708.375 740.477 622.188 791.837 622.188 872.424V885.331C622.188 914.771 598.348 938.664 568.855 938.664H455.148C425.655 938.664 401.815 914.771 401.815 885.331V872.424C401.815 791.837 315.628 740.477 244.748 778.824L220.908 791.784C196.001 805.224 164.961 796.904 150.135 772.851L93.228 680.424C85.548 667.944 83.3613 652.851 87.148 638.664C90.9346 624.531 100.375 612.531 113.281 605.544C187.628 565.331 187.628 458.664 113.281 418.451C100.375 411.464 90.9346 399.464 87.148 385.331C83.3613 371.144 85.548 356.051 93.228 343.571L150.135 251.144C164.961 227.091 196.001 218.771 220.908 232.211L244.748 245.171C315.628 283.517 401.815 232.157 401.815 151.571V138.664C401.815 109.224 425.655 85.3306 455.148 85.3306H568.855C598.348 85.3306 622.188 109.224 622.188 138.664V151.571C622.188 232.157 708.375 283.517 779.255 245.171L803.095 232.211C828.001 218.771 859.041 227.091 873.868 251.144L930.775 343.571C938.455 356.051 940.641 371.144 936.855 385.331ZM352.001 511.997C352.001 600.371 423.628 671.997 512.001 671.997C600.375 671.997 672.001 600.371 672.001 511.997C672.001 423.624 600.375 351.997 512.001 351.997C423.628 351.997 352.001 423.624 352.001 511.997Z">
                                            </path>
                                        </svg>
                                        @lang('Settings')</a>
                                </li>
                                {{-- <li><a href="#">
                                    <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                        class="" fill-rule="evenodd">
                                        <path class="rui-2Xn3A"
                                            d="M512.001 938.665C747.642 938.665 938.667 747.64 938.667 511.999C938.667 276.357 747.642 85.332 512.001 85.332C276.359 85.332 85.334 276.357 85.334 511.999C85.334 747.64 276.359 938.665 512.001 938.665ZM682.667 565.332C712.122 565.332 736.001 541.454 736.001 511.999C736.001 482.544 712.122 458.665 682.667 458.665H565.334V341.332C565.334 311.877 541.456 287.999 512.001 287.999C482.545 287.999 458.667 311.877 458.667 341.332V458.665H341.334C311.879 458.665 288.001 482.544 288.001 511.999C288.001 541.454 311.879 565.332 341.334 565.332H458.667V682.665C458.667 712.121 482.545 735.999 512.001 735.999C541.456 735.999 565.334 712.121 565.334 682.665V565.332H682.667Z">
                                        </path>
                                    </svg>
                                    @lang('install') {{ $general->sitename($pageTitle ?? '') }} @lang('app')</a>
                            </li> --}}
                                <li>
                                    <a href="{{ url('user/logout') }}">
                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                            data-aut-id="icon" class="" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M712.533 337.067C733.866 315.734 772.266 315.734 793.599 337.067L942.933 486.4C947.199 490.667 951.466 499.2 955.733 503.467C959.999 507.734 959.999 516.267 959.999 524.8C959.999 533.334 959.999 541.867 955.733 546.134C951.466 554.667 947.199 558.934 942.933 563.2L793.599 712.534C772.266 733.867 733.866 733.867 712.533 712.534C691.199 691.2 691.199 652.8 712.533 631.467L759.466 580.267H422.399C392.533 580.267 362.666 554.667 362.666 524.8C362.666 494.934 388.266 465.067 422.399 465.067H759.466L712.533 418.134C691.199 392.534 691.199 358.4 712.533 337.067Z M593.066 819.2C593.066 785.067 567.466 759.467 533.333 759.467H238.933C234.666 759.467 230.399 759.467 226.133 755.2C221.866 750.934 221.866 746.667 221.866 742.4V302.934C221.866 298.667 221.866 294.4 226.133 290.134C230.399 285.867 234.666 285.867 238.933 285.867H533.333C567.466 285.867 593.066 260.267 593.066 226.134C593.066 192 567.466 170.667 533.333 170.667H238.933C204.799 170.667 170.666 183.467 145.066 209.067C119.466 234.667 106.666 268.8 106.666 302.934V746.667C106.666 780.8 119.466 814.934 145.066 840.534C170.666 866.134 204.799 878.934 238.933 878.934H533.333C567.466 874.667 593.066 849.067 593.066 819.2Z">
                                            </path>
                                        </svg>
                                        @lang('Exit')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @else
                    <div class="menu-wrapper">
                        <nav class="menu-nav">
                            <ul class="header-menu">
                                <li class="active"><a href="{{ url('/') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                            class="sc-AxjAm dJbVhz">
                                            <path
                                                d="M2 10.442V20a2 2 0 0 0 2 2h3.56a2 2 0 0 0 1.962-2.392L9 17a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-8.664a3 3 0 0 0-.993-2.23l-7.114-6.403a3 3 0 0 0-3.881-.112L3.126 8.099A3 3 0 0 0 2 10.442z">
                                            </path>
                                        </svg>
                                        @lang('Discover')</a>
                                </li>
                                <li><a href="{{ route('frontend.user.my_ads') }}">
                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                            data-aut-id="icon" class="" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M712.252 170.666C640.945 170.666 575.243 201.641 531.987 255.662L512.011 280.593L492.036 255.662C448.768 201.641 383.067 170.666 311.77 170.666C186.917 170.666 85.334 267.226 85.334 385.907C85.334 628.106 392.029 895.999 512.52 895.999C633.011 895.999 938.667 646.348 938.667 385.907C938.667 267.216 837.106 170.666 712.252 170.666Z">
                                            </path>
                                        </svg>
                                        @lang('See Ads')</a>
                                </li>
                                <li><a href="{{ route('frontend.cms.section', 'about-us') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                        </svg>
                                        @lang('About Us')</a>
                                </li>
                                <li><a href="{{ route('frontend.helps') }}">
                                        <svg width="26px" height="26px" viewBox="0 0 1024 1024"
                                            data-aut-id="icon" class="" fill-rule="evenodd">
                                            <path class="rui-2Xn3A"
                                                d="M512.001 938.664C747.642 938.664 938.667 747.639 938.667 511.997C938.667 276.356 747.642 85.3306 512.001 85.3306C276.359 85.3306 85.334 276.356 85.334 511.997C85.334 747.639 276.359 938.664 512.001 938.664ZM499.2 661.331C466.227 661.331 439.467 688.082 439.467 721.043C439.467 754.004 466.227 780.755 499.2 780.755C532.173 780.755 558.933 754.004 558.933 721.043C558.933 688.082 532.173 661.331 499.2 661.331ZM568.033 409.251C568.033 371.481 537.442 341.331 498.918 341.331C461.454 341.331 429.803 373.881 429.803 412.715C429.803 436.279 410.7 455.382 387.136 455.382C363.572 455.382 344.469 436.279 344.469 412.715C344.469 327.279 413.782 255.997 498.918 255.997C584.296 255.997 653.366 324.073 653.366 409.251C653.366 479.296 606.695 537.747 542.647 556.329C542.647 566.36 541.584 566.36 541.584 566.36C541.584 589.924 522.482 609.027 498.918 609.027C475.354 609.027 456.251 589.924 456.251 566.36V519.838C456.251 496.274 475.354 477.171 498.918 477.171C537.457 477.171 568.033 447.043 568.033 409.251Z">
                                            </path>
                                        </svg>
                                        @lang('Help')</a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#accountModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26px" height="26px"
                                            fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                        </svg>
                                        @lang('Login')
                                    </a>
                                </li>
                                {{-- <li><a href="#">
                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                    class="" fill-rule="evenodd">
                                    <path class="rui-2Xn3A"
                                        d="M512.001 938.665C747.642 938.665 938.667 747.64 938.667 511.999C938.667 276.357 747.642 85.332 512.001 85.332C276.359 85.332 85.334 276.357 85.334 511.999C85.334 747.64 276.359 938.665 512.001 938.665ZM682.667 565.332C712.122 565.332 736.001 541.454 736.001 511.999C736.001 482.544 712.122 458.665 682.667 458.665H565.334V341.332C565.334 311.877 541.456 287.999 512.001 287.999C482.545 287.999 458.667 311.877 458.667 341.332V458.665H341.334C311.879 458.665 288.001 482.544 288.001 511.999C288.001 541.454 311.879 565.332 341.334 565.332H458.667V682.665C458.667 712.121 482.545 735.999 512.001 735.999C541.456 735.999 565.334 712.121 565.334 682.665V565.332H682.667Z">
                                    </path>
                                </svg>
                                @lang('install') {{ $general->sitename($pageTitle ?? '') }} @lang('app')</a>
                        </li> --}}
                            </ul>
                        </nav>
                    </div>
                @endif
            </div>
            <!--~~~~~~~~End Menu~~~~~~~~~~~-->
            @if (isset($pageTitle) && $pageTitle == 'Home')
                <!--~~~~~~~~~~Start Banner~~~~~~~~~~-->
                <div class="banner-section">
                    <div class="container">
                        <div class="banner-area">
                            <div class="banner-wrapper">
                                <div class="left">
                                    <div class="content">
                                        <span>@lang('Buy your car from us')</span>
                                        <a href="#" class="btn--base active">@lang('See our cars')</a>
                                    </div>
                                    <div class="thumb">
                                        <img src="{{ URL::asset('assets/frontend') }}/images/banner/banner-1.webp"
                                            alt="banner">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="content">
                                        <span>@lang('Sell your car to us, get paid instantly')</span>
                                        <a href="#" class="btn--base active">@lang('Get an initial quote')</a>
                                    </div>
                                    <div class="thumb">
                                        <img src="{{ URL::asset('assets/frontend') }}/images/banner/banner-2.webp"
                                            alt="banner">
                                    </div>
                                </div>
                            </div>
                            <div class="banner-logo-area">
                                <div class="banner-logo">
                                    <img src="{{ URL::asset('assets/frontend') }}/images/banner/banner-2.webp"
                                        alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~End Banner~~~~~~~~~~~-->
            @endif
            <!--~~~~~~~~~~~~~~~Start Scroll-To-Top~~~~~~~~~~~~~-->
            <a href="#" class="scrollToTop">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" class="sc-AxjAm iTMiVy">
                    <path
                        d="M12.01 10.666l-5.414 5.793c-.57.61-1.494.61-2.064 0a1.64 1.64 0 0 1 0-2.21l6.446-6.896a1.408 1.408 0 0 1 1.032-.457c.393.001.768.167 1.033.457l6.446 6.897a1.64 1.64 0 0 1 0 2.208c-.57.61-1.495.61-2.065 0l-5.414-5.792z">
                    </path>
                </svg>
            </a>
            <!--~~~~~~~End Scroll-To-Top~~~~~~~~~~~~-->
            @yield('content')


        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <footer class="footer-section bg--base mt-40 pt-40">
            <div class="container">
                <div class="footer-wrapper">
                    <div class="left">
                        <div class="row align-items-center mb-20-none">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="footer-widget">
                                    <div class="footer-logo">
                                        <img src="{{ getImage(imagePath()['logoIcon']['path'] . '/whiteLogo.png', '?' . time()) }}"
                                            alt="logo">
                                    </div>
                                    <ul class="footer-list">
                                        <li><a href="{{ route('frontend.cms.section', 'buy-from-us') }}">Buy from
                                                us</a>
                                        </li>
                                        <li><a href="{{ route('frontend.cms.section', 'sell-to-us') }}">Sell to us</a>
                                        </li>
                                        <li><a href="{{ route('frontend.cms.section', 'Why-choose-haraj') }}">Why
                                                choose
                                                haraj?</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="footer-widget">
                                    <ul class="footer-list">
                                        <li><a href="{{ route('frontend.cms.section', 'about-us') }}">About Us</a>
                                        </li>
                                        <li><a href="{{ route('frontend.helps') }}">Help and Support</a></li>
                                        <li><a href="{{ route('frontend.cms.section', 'safety-tips') }}">Safety
                                                Tips</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="footer-widget">
                                    <h4 class="title">Download the app</h4>
                                    <ul class="footer-app-list">
                                        <li><a href="#"><img
                                                    src="{{ URL::asset('assets/frontend') }}/images/footer/footer_app_store.svg"
                                                    alt="footer"></a></li>
                                        <li><a href="#0"><img
                                                    src="{{ URL::asset('assets/frontend') }}/images/footer/footer_google_play.svg"
                                                    alt="footer"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <select class="footer-language-select langSel">
                            @foreach ($languages as $item)
                                <option value="{{ $item->code }}"
                                    @if (session('lang') == $item->code) selected @endif>
                                    {{ __($item->name) }}</option>
                            @endforeach
                        </select>
                        <div class="social-area text-end">
                            <ul class="footer-social pb-10">
                                <li><a href="#0"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper">
                <div class="container">
                    <div class="copyright-area">
                        <p>© {{ $general->sitename($pageTitle ?? '') }} {{ Carbon\Carbon::now()->format('Y') }}</p>
                        <ul class="copyright-list">
                            <li><a href="{{ route('frontend.cms.section', 'terms-conditions') }}">Terms &
                                    Conditions</a>
                            </li>
                            <li><a href="{{ route('frontend.cms.section', 'ad-policy') }}">Ad Policy</a></li>
                            <li><a href="{{ route('frontend.cms.section', 'legal-and-privacy-information') }}">Privacy
                                    Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <!--~~~~~~~~Start Modal~~~~~~~-->
    <div class="modal account-modal" data-bs-backdrop="static" id="accountModal" tabindex="-1"
        aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="account-form">
                    <div class="account-area">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title">@lang('Help')</h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body-wrapper">
                                <div class="modal-logo">
                                    <a href="{{ url('/') }}">
                                        <img width="150" height="100"
                                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                            alt="Logo" class="">
                                    </a>
                                </div>
                                <div class="modal-wrapper-content">
                                    <p>@lang('Buy and sell quickly, safely and locally'). @lang('It’s time to haraj!')</p>
                                </div>
                                <div class="modal-account-wrapper">
                                    <h6 class="title">@lang('QUICKLY CONNECT WITH')</h6>
                                    <div class="modal-account-btn">
                                        <a href="#0" class="btn--base w-100 facebook">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M13.213 5.22c-.89.446-.606 3.316-.606 3.316h3.231v2.907h-3.23v10.359H8.773V11.444H6.39V8.536h2.423c-.221 0 .12-2.845.146-3.114.136-1.428 1.19-2.685 2.544-3.153 1.854-.638 3.55-.286 5.385.17l-.484 2.504s-2.585-.455-3.191.277z">
                                                </path>
                                            </svg>
                                            @lang('Continue with Facebook')
                                        </a>
                                        <a href="{{ url('login/google') }}" class="btn--base w-100 google">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M15.303 8.287l2.26-2.206C16.174 4.791 14.368 4 12.206 4a8 8 0 0 0-7.151 4.412l2.588 2.01c.65-1.93 2.446-3.326 4.563-3.326 1.504 0 2.518.649 3.096 1.191zm4.59 3.897c0-.659-.054-1.139-.17-1.637h-7.516v2.97h4.412c-.089.74-.569 1.851-1.636 2.598l2.526 1.957c1.512-1.396 2.384-3.451 2.384-5.888zm-12.24 1.405a4.928 4.928 0 0 1-.267-1.583c0-.552.098-1.086.258-1.584l-2.588-2.01a8.013 8.013 0 0 0-.854 3.594c0 1.29.311 2.508.854 3.593l2.597-2.01zm4.554 6.422c2.162 0 3.976-.711 5.302-1.939l-2.526-1.957c-.676.472-1.584.8-2.776.8-2.117 0-3.914-1.396-4.554-3.326l-2.588 2.01c1.316 2.615 4.011 4.412 7.142 4.412z">
                                                </path>
                                            </svg>
                                            @lang('Continue with Google')
                                        </a>
                                        {{-- <a href="#0" class="btn--base w-100 apple">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M19.6437 17.5861C19.3385 18.2848 18.9772 18.928 18.5586 19.5193C17.9881 20.3255 17.5209 20.8835 17.1609 21.1934C16.6027 21.702 16.0048 21.9625 15.3644 21.9773C14.9047 21.9773 14.3504 21.8477 13.705 21.5847C13.0576 21.323 12.4626 21.1934 11.9186 21.1934C11.348 21.1934 10.7361 21.323 10.0815 21.5847C9.42601 21.8477 8.89793 21.9847 8.49417 21.9983C7.88012 22.0242 7.26806 21.7563 6.65713 21.1934C6.2672 20.8563 5.77947 20.2786 5.1952 19.4601C4.56832 18.586 4.05294 17.5725 3.64918 16.417C3.21677 15.1689 3 13.9603 3 12.7902C3 11.4498 3.29226 10.2938 3.87766 9.32509C4.33773 8.54696 4.94978 7.93315 5.71581 7.48255C6.48185 7.03195 7.30955 6.80232 8.20091 6.78763C8.68863 6.78763 9.32822 6.93713 10.123 7.23095C10.9156 7.52576 11.4245 7.67526 11.6476 7.67526C11.8144 7.67526 12.3798 7.50045 13.3382 7.15194C14.2445 6.82874 15.0094 6.69492 15.636 6.74763C17.334 6.88343 18.6097 7.54675 19.4581 8.74177C17.9395 9.6536 17.1883 10.9307 17.2032 12.5691C17.2169 13.8452 17.6841 14.9071 18.6022 15.7503C19.0183 16.1417 19.483 16.4441 20 16.6589C19.8879 16.9811 19.7695 17.2898 19.6437 17.5861ZM15.7494 2.40011C15.7494 3.40034 15.3806 4.33425 14.6456 5.19867C13.7586 6.22629 12.6857 6.8201 11.5223 6.7264C11.5075 6.6064 11.4989 6.48011 11.4989 6.3474C11.4989 5.38718 11.9207 4.35956 12.6698 3.51934C13.0438 3.09392 13.5194 2.74019 14.0962 2.45801C14.6718 2.18004 15.2162 2.02632 15.7282 2C15.7431 2.13371 15.7494 2.26744 15.7494 2.4001V2.40011Z">
                                                </path>
                                            </svg>
                                            Continue with Apple
                                        </a> --}}
                                    </div>
                                </div>
                                <div class="modal-account-wrapper mt-20">
                                    <h6 class="title">@lang('OR USE') @lang('YOUR') @lang('EMAIL')</h6>

                                    <div class="modal-account-btn">
                                        <a href="#0" class="btn--base w-100 email" data-bs-toggle="modal"
                                            data-bs-target="#emailModal" data-bs-dismiss="modal">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                                <path
                                                    d="M12,24 C5.37258301,24 0,18.627417 0,12 C0,5.37258301 5.37258301,0 12,0 C18.627417,0 24,5.37258301  24,12 C24,18.627417 18.627417,24 12,24 Z M6,10.3 L6,15.725 C6,16.1528 6.3472,16.5 6.775,16.5 L17.625,16.5  C18.0528,16.5 18.4,16.1528 18.4,15.725 L18.4,10.3 L12.9885562,13.0057219 C12.4921486,13.2539258 11.9078514,13.2539258  11.4114438,13.0057219 L6,10.3 Z M17.625,7.20000001 L6.775,7.20000001 C6.3472,7.20000001 6,7.57034667 6,8.02666667  L6,8.85333334 L11.3702281,11.717455 C11.8888356,11.9940456 12.5111644,11.9940456 13.0297719,11.717455 L18.4,8.85333334  L18.4,8.02666667 C18.4,7.57034667 18.0528,7.20000001 17.625,7.20000001 Z"
                                                    fill="#FFF" fill-rule="evenodd"></path>
                                            </svg>
                                            @lang('Continue with email')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p>@lang('By signing up or logging in, you agree to our Terms & Conditions and Privacy Policy')</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--~~~~~~~Login Emain Input Modal~~~~~~~~-->
    <form action="{{ route('frontend.user.login') }}" method="post">
        @csrf
        <div class="modal account-modal" data-bs-backdrop="static" id="emailModal" tabindex="-1"
            aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="account-area">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title"><a href="{{ route('frontend.helps') }}"> @lang('Help') </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body-wrapper">
                                <div class="modal-logo">
                                    <a href="{{ url('/') }}">
                                        <img width="150" height="100"
                                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                            alt="Logo" class="">
                                    </a>
                                </div>
                                <div class="modal-wrapper-content">
                                    <h3 class="title email_field">@lang('enter your e-mail address')</h3>
                                    <h4 class="title loader d-none">@lang('Please wait.. We check your account access.')</h4>
                                </div>
                                <div class="modal-account-wrapper">
                                    <div class="form-group email_field">
                                        <input type="email" value="{{ old('email') }}" class="form--control"
                                            placeholder="E-mail address" id="emailField" name="email"
                                            placeholder="@lang('Enter email address')" required>
                                    </div>
                                    <div class="form-group loader d-none" id="">
                                        <img src="{{ asset('assets/images/loader.gif') }}" width="100" />
                                    </div>
                                    <div class="form-group email_field">
                                        {{-- <button type="text" class="btn--base w-100" data-bs-toggle="modal"
                                            id="emailButton" data-bs-target="#passModal"
                                            data-bs-dismiss="modal">@lang('Go on')</button> --}}
                                        <button type="text" class="btn--base w-100"
                                            id="emailButton">@lang('Go on')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <p>@lang('We will not share your e-mail address with anyone')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--~~~~~~~Start Modal~~~~~~~~-->
        <div class="modal account-modal" data-bs-backdrop="static" id="passModal" tabindex="-1"
            aria-labelledby="passModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="account-area">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title"><a href="{{ route('frontend.helps') }}"> @lang('Help') </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body-wrapper">
                                <div class="modal-logo">
                                    <a href="{{ url('/') }}">
                                        <img width="150" height="100"
                                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                            alt="Logo" class="">
                                    </a>
                                </div>
                                <div class="modal-wrapper-content">
                                    <h3 class="title">@lang('enter your password')</h3>
                                    <p id="login_email">@lang('Welome') <span class="fw-bold"></span></p>
                                    <p class="message"></p>
                                </div>
                                <div class="modal-account-wrapper">
                                    <div class="form-group password_field" id="show_hide_password">
                                        <input type="password" class="form--control" placeholder="Password"
                                            name="password">
                                        <a href="#" class="show-pass"><i class="fa fa-eye-slash"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn--base w-100">@lang('Login')</button>
                                    </div>
                                    <div class="form-group">
                                        <div class="forgot-item">
                                            <label><a href="#0" class="text--base" data-bs-toggle="modal"
                                                    data-bs-target="#forget_pwd_email_modal"
                                                    data-bs-dismiss="modal">@lang('Did you forget                                                                                                                                                                                                                                                                                                                                                                                                                                    your password')?</a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--~~~~~~~Start Modal~~~~~~~~-->
        <div class="modal account-modal" data-bs-backdrop="static" id="varModal" tabindex="-1"
            aria-labelledby="passModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="account-area">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title"><a href="{{ route('frontend.helps') }}"> @lang('Help') </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body-wrapper">
                                <div class="modal-logo">
                                    <a href="{{ url('/') }}">
                                        <img width="150" height="100"
                                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                            alt="Logo" class="">
                                    </a>
                                </div>
                                <div class="modal-wrapper-content">
                                    <h3 class="title">@lang('Verify your email address')</h3>
                                    <p id="var_email">@lang('Welome') <span class="fw-bold"></span></p>
                                    <p>@lang("Check your email and you'll get a verification code.")</p>
                                </div>
                                <div class="modal-account-wrapper">
                                    <div class="form-group code_field">
                                        <input type="test" class="form--control" id="varCode"
                                            placeholder="Verification Code" name="var_code">
                                    </div>
                                    <div class="form-group loader d-none" id="">
                                        <img src="{{ asset('assets/images/loader.gif') }}" width="100" />
                                    </div>
                                    <div class="form-group">
                                        <button type="text" class="btn--base w-100"
                                            id="varButton">@lang('Go on')</button>
                                        <button type="text" class="btn--base w-100"
                                            id="varButton">@lang('Go on')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!----Login Emain Input Modal end----->
    <!--~~~~~~~Start Modal~~~~~~~~~-->
    <form action="" method="POST">
        @csrf
        <div class="modal account-modal" data-bs-backdrop="static" id="forget_pwd_email_modal" tabindex="-1"
            aria-labelledby="forget_pwd_email_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form class="account-form">
                        <div class="account-area">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <h5 class="modal-title"><a href="{{ route('frontend.helps') }}"> @lang('Help')
                                    </a></h5>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body-wrapper">
                                    <div class="modal-logo">
                                        <a href="index.html">
                                            <img width="65" height="42"
                                                src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                                alt="Logo" class="">
                                        </a>
                                    </div>
                                    <div class="modal-wrapper-content">
                                        <h3 class="title">@lang('Please enter email')</h3>
                                        <p>@lang('Enter your registered')</p>
                                    </div>
                                    <div class="modal-account-wrapper">
                                        <div class="form-group loader d-none" id="">
                                            <img src="{{ asset('assets/images/loader.gif') }}" width="100" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="pwd_recovery_email" class="email_field"
                                                id="pwd_recovery_email" placeholder="@lang('Enter Email')" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn--base w-100 email_field"
                                                id="forPassButton">@lang('Send Password Reset Code')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>

    <!--~~~~~~~~~~~~~Start Modal~~~~~~~~~~~~-->
    <div class="modal account-modal" data-bs-backdrop="static" id="pwdResetModal" tabindex="-1"
        aria-labelledby="pwdResetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="account-form">
                    <div class="account-area">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title"><a href="{{ route('frontend.helps') }}"> @lang('Help') </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body-wrapper">
                                <div class="modal-logo">
                                    <a href="index.html">
                                        <img width="65" height="42"
                                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                            alt="Logo" class="">
                                    </a>
                                </div>
                                <div class="modal-wrapper-content">
                                    <h3 class="title">@lang('Create a password to log in faster next time')</h3>
                                    <p>@lang('You create a password for') <span class="fw-bold">demo@gmail.com.</span>
                                        @lang('This will help you log in faster next time').</p>
                                </div>
                                <div class="modal-account-wrapper">
                                    <div class="form-group" id="show_hide_password">
                                        <input type="password" class="form--control" placeholder="Password">
                                        <a href="" class="show-pass"><i class="fa fa-eye-slash"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="form-group" id="show_hide_password">
                                        <input type="password" class="form--control" placeholder="Confirm Password">
                                        <a href="" class="show-pass"><i class="fa fa-eye-slash"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn--base w-100">Create password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--~~~~~~~~End modal~~~~~~~~~~~-->
    <!-- jquery -->
    <script src="{{ URL::asset('assets/frontend') }}/js/jquery-3.6.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ URL::asset('assets/frontend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('assets/frontend') }}/js/swiper-bundle.min.js"></script>
    <script src="{{ URL::asset('assets/frontend') }}/js/TweenMax.min.js"></script>
    <!-- nice-select js file -->

    <script src="{{ URL::asset('assets/frontend') }}/js/jquery.nice-select.js"></script>
    <!-- lightcase js file -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js"></script>
    <!-- multi-image-picker js file -->
    <script src="{{ URL::asset('assets/frontend') }}/js/multi-image-picker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/NicEdit/0.93/nicEdit.min.js"></script>
    <script src="{{ URL::asset('assets/frontend') }}/js/jquery-ui.min.js"></script>
    {{-- <script src="{{ URL::asset('assets/frontend') }}/js/jquery.lazyload.min.js"></script> --}}
    <!-- main -->
    <script src="{{ URL::asset('assets/frontend') }}/js/jquery.scheletrone.js"></script>
    <script src="{{ URL::asset('assets/frontend') }}/js/main.js"></script>
    {{-- <script src="{{ URL::asset('core/public') }}/js/app.js"></script> --}}
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);
    </script>
    <script>
        $(function() {
            data_src = "{{ route('frontend.ads.auto.search') }}";
            $("#search_text").autocomplete({
                source: function(request, response) {
                    console.log(response)
                    $.ajax({
                        url: data_src,
                        data: {
                            term: request.term
                        },
                        dataType: 'json',
                        success: function(data) {
                            response(data)
                        }
                    })
                },
                minLength: 1
            });
            $(document).on('click', '.ui-menu-item', function() {
                $('#search-form').submit();
            })

        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#description").keyup(function(event) {
                $("#text-count").text($(this).val().length);
                var x = $(this).val().length;

                if (x > 1450) {
                    $(this).css({
                        "border-color": "red"
                    });
                } else {
                    $(this).css({
                        "border-color": "#ccc"
                    });
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#titleLenth").keyup(function(event) {
                $("#text-count").text($(this).val().length);
                var x = $(this).val().length;

                if (x > 100) {
                    $(this).css({
                        "border-color": "red"
                    });
                } else {
                    $(this).css({
                        "border-color": "#ccc"
                    });
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(document).on("click", ".fav-select", function() {
            var id = $(this).data('ad_id');
            var elem = $(this).find('.fav-icon');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                type: 'post',
                url: "{{ url('user/favourite') }}" + '/' + id,
                data: {
                    id: id
                },
                success: function(resp) {
                    if (resp.status == true) {
                        elem.attr('style', 'fill:red');
                    } else if (resp.status == false) {
                        elem.attr('style', 'fill:');
                    } else {
                        notify('success', resp.message);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // console.log('ready');
            $("#emailButton").click(function(e) {
                let checkingEmail = $('#emailField').val();
                // console.log(checkingEmail);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ url('check/email') }}",
                    data: {
                        checkingEmail: checkingEmail,
                    },
                    beforeSend: function() {
                        $('.email_field').addClass('d-none');
                        $('.loader').removeClass('d-none');
                    },
                    success: function(resp) {
                        console.log(resp);
                        $('.email_field').removeClass('d-none');
                        $('.loader').addClass('d-none');
                        if (resp.status == true) {
                            $('#emailModal').modal('hide');
                            $('#passModal').modal('show');
                            $('#login_email').text("{{ session()->get('user_email') }}");
                            notify('success', resp.message);
                        } else if (resp.status == false) {
                            $('#emailModal').modal('hide');
                            $('#varModal').modal('show');
                            $('#var_email').text("{{ session()->get('user_email') }}");
                            notify('success', resp.message);
                        } else if (resp.status == 1) {
                            $('#emailModal').modal('show');
                            notify('error', resp.message.checkingEmail);
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // console.log('ready');
            $("#varButton").click(function(e) {
                let varCode = $('#varCode').val();
                // console.log(varCode);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ url('check/code') }}",
                    data: {
                        varCode: varCode,
                    },
                    beforeSend: function() {
                        $('.code_field').addClass('d-none');
                        $('.loader').removeClass('d-none');
                    },
                    success: function(resp) {
                        $('.code_field').removeClass('d-none');
                        $('.loader').addClass('d-none');
                        if (resp.status == true) {
                            $('#varModal').modal('hide');
                            $('#passModal').modal('show');
                            $('#login_email').text("{{ session()->get('user_email') }}");
                        } else if (resp.status == false) {
                            $('#emailModal').modal('show');
                            $('#varModal').modal('hide');
                            $('#var_email').text("{{ session()->get('user_email') }}");
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // console.log('ready');
            $("#forPassButton").click(function(e) {
                let checkingEmail = $('#pwd_recovery_email').val();
                // console.log(checkingEmail);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ url('forgot/password') }}",
                    data: {
                        checkingEmail: checkingEmail,
                    },
                    beforeSend: function() {
                        $('.email_field').addClass('d-none');
                        $('.loader').removeClass('d-none');
                    },
                    success: function(resp) {
                        $('.email_field').removeClass('d-none');
                        $('.loader').addClass('d-none');
                        if (resp.status == true) {
                            $('#forget_pwd_email_modal').modal('hide');
                            $('#passModal').modal('show');
                            notify('success', resp.message);
                            // $('#login_email').text("{{ session()->get('user_email') }}");
                        } else if (resp.status == false) {
                            $('#passModal').modal('hide');
                            $('#forget_pwd_email_modal').modal('show');
                            notify('success', resp.message);
                            // $('#var_email').text("{{ session()->get('user_email') }}");
                        }
                    }
                });
            });
        });
    </script>


    <script>
        (function($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "{{ route('frontend.home') }}/change/" + $(this).val();
            });
        })(jQuery)
    </script>
    <script>
        let digitValidate = function(ele) {
            ele.value = ele.value.replace(/[^0-9]/g, '');
        }
        let tabChange = function(val) {
            let ele = document.querySelectorAll('.otp');
            if (ele[val - 1].value != '') {
                ele[val].focus()
            } else if (ele[val - 1].value == '') {
                ele[val - 2].focus()
            }
        }
    </script>

    <script>
        var instance = $('.skeletone').scheletrone({
            // if you have to pass data on querystring
            ajaxData: {},
            debug: {
                log: true,
                latency: 0
            },
            maskText: false,
            skelParentText: false,
            removeIframe: false,
            // contain background images
            backgroundImage: true,
            replaceImageWith: '',
            incache: false,
            selector: false,
            // callback
            onComplete: function() {
                // console.log($('.pending_el'));
            }
        });
    </script>
    <script>
        var $swiperSelector = $('.swiper-container');
        $swiperSelector.each(function(index) {
            var $this = $(this);
            $this.addClass('swiper-slider-' + index);
            var dragSize = $this.data('drag-size') ? $this.data('drag-size') : 50;
            var freeMode = $this.data('free-mode') ? $this.data('free-mode') : false;
            var loop = $this.data('loop') ? $this.data('loop') : false;
            var slidesDesktop = $this.data('slides-desktop') ? $this.data('slides-desktop') : 8;
            var slidesTablet = $this.data('slides-tablet') ? $this.data('slides-tablet') : 6;
            var slidesMobile = $this.data('slides-mobile') ? $this.data('slides-mobile') : 5;
            var spaceBetween = $this.data('space-between') ? $this.data('space-between') : 20;
            var swiper = new Swiper('.swiper-slider-' + index, {
                direction: 'horizontal',
                loop: loop,
                freeMode: freeMode,
                spaceBetween: spaceBetween,
                breakpoints: {
                    1920: {
                        slidesPerView: slidesDesktop
                    },
                    992: {
                        slidesPerView: slidesTablet
                    },
                    320: {
                        slidesPerView: slidesMobile
                    }
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
            });
        });
    </script>
    @include('admin.partials.notify')
    <script src="{{ URL::asset('assets/frontend') }}/js/pusher.min.js"></script>
    {{-- <script src="{{ URL::asset('assets/frontend') }}/js/frontend.js"></script> --}}
    @yield('scripts')
    @stack('script')
</body>

</html>
