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
                <span class="active-path g-color">@lang('Advertiser')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.advertiser.index') }}">
                <i class="las la-list"></i>
                <span>@lang('Advertiser')</span>
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
                                <th>@lang('Advertisement Title')</th>
                                <th>@lang('Complain')</th>
                                <th>@lang('Details')</th>
                                <th>@lang('Submitted At')</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($ads) --}}
                            @forelse($ad_reports as $advert_report)
                                <tr>
                                    <td>{{ $advert_report->ad->title ?? 'ad deleted' }}</td>
                                    <td>{{ $advert_report->complain }}</td>
                                    <td>{{ $advert_report->details ? $advert_report->details : ''  }}</td>
                                    <td>{{ date('d-M-y', strtotime($advert_report->created_at)) }}</td>
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
    <div class="">
    {{ paginateLinks($ad_reports) }}
    </div>
@endsection
