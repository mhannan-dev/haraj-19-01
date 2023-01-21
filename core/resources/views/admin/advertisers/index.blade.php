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

    <form class="row" action="{{ url()->current() }}" method="GET">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control form--control" placeholder="@lang('Searh for advertiser.........')">
        </div>
        <div class="col-md-4">
            <select class="form--control form-control" name="status">
                <option value="" selected>--@lang('Select')--</option>
                <option value="0">
                    @lang('Registered')</option>
                <option value="1">
                    @lang('Active')</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn--base w-100">@lang('Apply')</button>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-area">
                <div class="table-wrapper table-responsive">
                    <table class="custom-table small">
                        <thead>
                            <tr>
                                <th>@lang('Full Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Phone')</th>
                                <th>@lang('City')</th>
                                <th>@lang('Joined At')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Posted Ads')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($advertisers as $user)
                                <tr>
                                    <td>

                                        {{  $user ? $user->fullname : $user->first_name  }}
                                    </td>
                                    <td>{{ $user ? $user->email : '' }}</td>
                                    <td>{{ $user ? $user->mobile_no : '' }}</td>
                                    <td>{{ $user ? $user->city->title : '' }}</td>
                                    <td>{{ date('d-M-y', strtotime($user->created_at)) }}</td>
                                    <td>{{ $user->status == 1 ? 'Active' : 'Registered' }}</td>
                                    <td><a href="{{ route('admin.advertiser.profile', $user->id) }}" class="text-success"
                                            title="@lang('View Ads')">{{ $user ? $user->ads_count : 0 }}</a></td>
                                    <td><a title="@lang('Edit')"
                                            href="{{ route('admin.advertiser.edit', $user['id']) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                    </td>
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
