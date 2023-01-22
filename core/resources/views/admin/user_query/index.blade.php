@extends('admin.layout.master')
@section('title')
    @lang('Received Messages')
@endsection
@section('page-name')
    @lang('Received Messages')
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
            <a href="{{ route('admin.contact.index') }}">
                <span class="active-path g-color">@lang('Messages')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.contact.index') }}">
                <span>@lang('Message Box')</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Email')</th>
                            <th scope="col">@lang('Subject')</th>
                            <th scope="col">@lang('Message')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->user_message }}</td>
                                <td>
                                    @if (hasAccessAbility('contact_reply', $roles))
                                        <a href="{{ url('contact/reply', $item->id) }}" class="text-success">Reply</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">{{ $emptyMessage }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
