@extends('admin.layout.master')
@section('title')
    @lang('Pending Deposits Search')
@endsection
@section('page-name')
    @lang('Pending Deposits Search')
@endsection
@push('custom_css')
    <style>
        .search-btn {
            background-color: #38cab3 !important
        }
    </style>
@endpush
@php

@endphp
@section('content')
    <div class="row">

        @if (!request()->routeIs('admin.users.deposits') && !request()->routeIs('admin.users.deposits.method'))
            <div class="col-md-6">
                <form
                    action="{{ route('admin.deposit.search',$scope ??str_replace('admin.deposit.','',request()->route()->getName())) }}"
                    method="GET" class="form-inline float-sm-right bg--white mb-2 ml-0 ml-xl-2 ml-lg-0">
                    <div class="input-group has_append  ">
                        <input type="text" name="search" class="form-control form--control" placeholder="@lang('Trx number/Username')"
                            value="{{ $search ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn--success search-btn" type="submit"><i
                                    class="fa fa-search text-white"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form
                    action="{{ route('admin.deposit.dateSearch',$scope ??str_replace('admin.deposit.','',request()->route()->getName())) }}"
                    method="GET" class="form-inline float-sm-right bg--white">
                    <div class="input-group has_append ">
                        <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - "
                            data-language="en" class="datepicker-here form-control form--control"
                            data-position='bottom right' placeholder="@lang('Min date - Max date')" autocomplete="off"
                            value="{{ @$dateSearch }}">
                        <input type="hidden" name="method" value="{{ @$methodAlias }}">
                        <div class="input-group-append">
                            <button class="btn btn--success search-btn" type="submit"><i
                                    class="fa fa-search text-white"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th>@lang('Gateway | Trx')</th>
                            <th>@lang('Initiated')</th>
                            <th>@lang('User Type')</th>
                            <th>@lang('User')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deposits as $deposit)
                            @php
                                $details = $deposit->detail ? json_encode($deposit->detail) : null;
                            @endphp
                            <tr>
                                <td data-label="@lang('Gateway | Trx')">
                                    <span class="font-weight-bold"> <a href="#">{{ __($deposit->gateway->name ? $deposit->gateway->name : ' ' ) }}</a>
                                    </span>
                                    <br>
                                    <small> {{ $deposit->trx }} </small>
                                </td>

                                <td data-label="@lang('Initiated')">
                                    {{ showDateTime($deposit->created_at) }}<br>{{ diffForHumans($deposit->created_at) }}
                                </td>
                                <td data-label="@lang('User Type')">
                                    <span class="font-weight-bold">{{ $deposit->user_type }}</span>
                                </td>
                                <td data-label="@lang('User')">
                                    <span
                                        class="font-weight-bold">{{ $deposit->user->fullname ?? $deposit->agent->fullname }}</span>
                                    <br>

                                    <a href="#"
                                        class="text--base">{{ $deposit->user->first_name ? $deposit->user->first_name : '' }}
                                        {{ $deposit->user->last_name ? $deposit->user->last_name : '' }}</a>

                                </td>

                                <td data-label="@lang('Amount')">
                                    {{ showAmount($deposit->amount, $general->currency) }}{{ __($deposit->method_currency) }}
                                    + <span class="text-danger" data-toggle="tooltip"
                                        data-original-title="@lang('charge')">{{ showAmount($deposit->charge, $general->currency) }}
                                    </span>
                                    <br>
                                    <strong data-toggle="tooltip" data-original-title="@lang('Amount with charge')">
                                        {{ showAmount($deposit->amount + $deposit->charge, $general->currency) }}
                                        {{ __($deposit->method_currency) }}
                                    </strong>
                                </td>
                                <td data-label="@lang('Status')">
                                    @if ($deposit->status == 2)
                                        <span class="badge badge--warning">@lang('Pending')</span>
                                    @elseif($deposit->status == 1)
                                        <span class="badge badge--success">@lang('Approved')</span>
                                        <br>{{ diffForHumans($deposit->updated_at) }}
                                    @elseif($deposit->status == 3)
                                        <span class="badge badge--danger">@lang('Rejected')</span>
                                        <br>{{ diffForHumans($deposit->updated_at) }}
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <a href="{{ route('admin.deposit.details', $deposit->id) }}" class="icon-btn ml-1"
                                        data-toggle="tooltip" data-original-title="@lang('Detail')">
                                        <i class="la la-desktop text--base"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table><!-- table end -->
            </div>
        </div>
    </div><!-- card end -->
    <nav>
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item">
                <a class="page-link" href="#" rel="next" aria-label="Next »">›</a>
            </li>
        </ul>
    </nav>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
    <script>
        (function($) {
            "use strict";
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endsection
