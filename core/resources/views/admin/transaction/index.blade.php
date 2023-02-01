@extends('admin.layout.master')
@section('title')
    @lang('Transactions')
@endsection
@section('page-name')
    @lang('Transactions')
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
            <a href="#">
                <span class="active-path g-color">@lang('Transactions')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="#">
                <i class="las la-list"></i>
                <span>@lang('Transactions')</span>
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
                                <th>@lang('SL')</th>
                                <th>@lang('Payment ID')</th>
                                <th>@lang('Payer ID')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Status')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $key => $node)
                                <tr>
                                    <td> {{ ++$key }} </td>
                                    <td>{{ $node->payment_id }}</td>
                                    <td>{{ $node->payer_id }}</td>
                                    <td>{{ $node->payer_email }}</td>
                                    <td>{{ $node->amount }}</td>
                                    <td>{{ $node->payment_status }}</td>
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
