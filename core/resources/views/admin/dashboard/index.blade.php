@extends('admin.layout.master')
@section('Dashboard', 'active')
@section('title')
    @lang('Dashboard')
@endsection
@section('page-name')
@endsection
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <a href="{{ route('admin.dashboard') }}" class="dashboard-path">
            <span class="main-path">@lang('Dashboards')</span>
            <i class="las la-angle-right"></i>
            <span class="active-path g-color">@lang('Dashboard')</span>
        </a>
        {{-- <div class="view-prodact">
            <a href="#">
                <i class="las la-eye align-middle me-1"></i>
                <span>@lang('View Product')</span>
            </a>
        </div> --}}
    </div>
    <!-- body-wrapper-start -->
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="row justify-content-center mb-30-none">
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-30">
                    <div class="dashbord-user style-two">
                        <div class="dashboard-content">
                            <div class="title">
                                <span>@lang('Total Seller')</span>
                            </div>
                            <div class="user-count d-flex">
                                <span>{{ $userCount }}</span>
                            </div>
                            <div class="view-all-btn">
                                <a href="{{ route('admin.advertiser.index') }}">@lang('View All')</a>
                            </div>
                        </div>
                        <div class="dashboard-icon-area">
                            <div class="user-last">
                                <p>Last week <span class="g-color">+{{ $lastWeekUserCount }}</span></p>
                            </div>
                            <div class="dashboard-icon base-color">
                                <i class="las la-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-30">
                    <div class="dashbord-user style-two">
                        <div class="dashboard-content">
                            <div class="title">
                                <span>@lang('Total ads')</span>
                            </div>
                            <div class="user-count d-flex">
                                <span>{{ $adCount }}</span>
                            </div>
                            <div class="view-all-btn">
                                <a href="{{ route('admin.all.ads') }}">@lang('View All')</a>
                            </div>
                        </div>
                        <div class="dashboard-icon-area">
                            <div class="user-last">
                                <p>Last week <span class="g-color">+{{ $lastWeekadCount }}</span></p>
                            </div>
                            <div class="dashboard-icon base-color">
                                <i class="las la-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-30">
                    <div class="dashbord-user style-two">
                        <div class="dashboard-content">
                            <div class="title">
                                <span>@lang('Total Category')</span>
                            </div>
                            <div class="user-count d-flex">
                                <span>{{ $categoryCount }}</span>
                            </div>
                            <div class="view-all-btn">
                                <a href="{{ route('admin.all.ads') }}">@lang('View All')</a>
                            </div>
                        </div>
                        <div class="dashboard-icon-area">
                            <div class="user-last">
                                <p>Last week <span class="g-color">+{{ $lastWeekCategoryCount }}</span></p>
                            </div>
                            <div class="dashboard-icon base-color">
                                <i class="las la-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-30">
                    <div class="dashbord-user style-two">
                        <div class="dashboard-content">
                            <div class="title">
                                <span>@lang('Ad Reports')</span>
                            </div>
                            <div class="user-count d-flex">
                                <span>{{ $reportCount }}</span>
                            </div>
                            <div class="view-all-btn">
                                <a href="{{ route('admin.all.report') }}">@lang('View All')</a>
                            </div>
                        </div>
                        <div class="dashboard-icon-area">
                            <div class="user-last">
                                <p>Last week <span class="g-color">+{{ $lastWeekReportCount }}</span></p>
                            </div>
                            <div class="dashboard-icon base-color">
                                <i class="las la-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
