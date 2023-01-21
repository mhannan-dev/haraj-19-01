@extends('admin.layout.master')
@section('title')
    @lang('Support Ticket')
@endsection
@section('page-name')
    @lang('Support Ticket')
@endsection
@php
 ;
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.tickets.index') }}">
                <span class="active-path g-color">@lang('Support Tickets')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.tickets.index') }}">
                <i class="las la-list"></i>
                <span>@lang('Support Tickets')</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th>@lang('Subject')</th>
                            <th>@lang('Submitted By')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Last Reply')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td data-label="@lang('Subject')">
                                    <a href="{{ route('admin.tickets.view', $item->id) }}" class="font-weight-bold text-warning">
                                        [@lang('Ticket')#{{ $item->ticket }}] {{ $item->subject }} </a>
                                </td>

                                <td data-label="@lang('Submitted By')">
                                    @if ($item->user_id)
                                        <a href="{{ route('admin.users.detail', $item->user_id) }}">
                                            {{ $item->user->first_name }}</a>
                                    @else
                                        <p class="font-weight-bold"> {{ $item->name }}</p>
                                    @endif
                                </td>
                                <td data-label="@lang('Status')">
                                    @if ($item->status == 0)
                                        <span class="badge badge--success">@lang('Open')</span>
                                    @elseif($item->status == 1)
                                        <span class="badge  badge--primary">@lang('Answered')</span>
                                    @elseif($item->status == 2)
                                        <span class="badge badge--warning">@lang('Customer Reply')</span>
                                    @elseif($item->status == 3)
                                        <span class="badge badge--dark">@lang('Closed')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Priority')">
                                    @if ($item->priority == 1)
                                        <span class="badge badge--dark">@lang('Low')</span>
                                    @elseif($item->priority == 2)
                                        <span class="badge  badge--warning">@lang('Medium')</span>
                                    @elseif($item->priority == 3)
                                        <span class="badge badge--danger">@lang('High')</span>
                                    @endif
                                </td>

                                <td data-label="@lang('Last Reply')">
                                    {{ diffForHumans($item->last_reply) }}
                                </td>

                                <td data-label="@lang('Action')">
                                    <a href="{{ route('admin.tickets.view', $item->id) }}" class="icon-btn  ml-1"
                                        data-toggle="tooltip" title="" data-original-title="@lang('Details')">
                                        <i class="las la-desktop text-success"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
