<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ getImage(imagePath()['logoIcon']['path'] .'/favicon.png', '?'.time()) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">
    <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">
    @include('admin.layout.includes.css')
    <style>
        .icon-size {
            font-size: 20px;
        }
    </style>
</head>
<!-- END: Head-->
<body>
    @php
        $roles = userRolePermissionArray();
    @endphp
    <!-- BEGIN: Header---->
    <div class="page-wrapper">
        <div class="sidebar">
            <button class="res-sidebar-close-btn">
                <i class="las la-times"></i>
            </button>
            <div class="sidebar__inner">
                <div class="sidebar__logo">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar__main-logo">
                        <img src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                            white-img="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                            dark-img="{{ getImage(imagePath()['logoIcon']['path'] . '/whiteLogo.png', '?' . time()) }}" alt="logo">
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar__logo-shape">
                        <img src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}" alt="logo">
                    </a>
                </div>
                @include('admin.layout.left_sidebar')
            </div>
        </div>
        <div class="main-wrapper">
            <div class="main-body-wrapper">
                <!-- navbar-wrapper-start -->
                @include('admin.layout.top_nav')
                <!-- body-wrapper-start -->
                <div class="body-wrapper">
                    @include('admin.layout.flash')
                    @yield('content')
                </div>
            </div>
            <!-- copyright-wrapper-start -->
            @include('admin.layout.footer')

        </div>
    </div>

    <!-- BEGIN: Footer-->

    <!-- END: Footer-->
    @include('admin.partials.notify')
    @include('admin.layout.includes.js')
    {{-- @include('admin.layout.includes.home_js') --}}
    @yield('scripts')

</body>
<!-- END: Body-->
</html>
