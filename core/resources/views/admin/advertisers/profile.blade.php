@extends('admin.layout.master')
@section('title')
    @lang('Advertisers')
@endsection
@section('page-name')
    @lang('Advertisers')
@endsection
@php
$roles = userRolePermissionArray();
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.advertiser.index') }}">
                <span class="active-path g-color">@lang('Advertisers')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="#">
                <i class="las la-list"></i>
                <span>@lang('Advertiser Profile')</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-area">
                <div class="table-wrapper table-responsive">
                    <table class="custom-table small">
                        <thead>
                            <tr>
                                <th>@lang('Ad Name')</th>
                                <th>@lang('City')</th>
                                <th>@lang('Thumbnail')</th>
                                <th>@lang('Posted At')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posted_ads as $advert)
                                <tr>
                                    <td>{{ $advert->title }}</td>
                                    <td>{{ $advert->city->title }}</td>
                                    <td><img style="width: 40px; height: 40px;" src="{{ URL::asset('core/public/storage/image/' . $advert->image ) }}" alt="Thumbnail"></td>
                                    <td>{{ date('d-M-y', strtotime($advert->created_at)) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
