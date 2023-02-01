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
    <div class="row">
        <div class="col-lg-12">
            <div class="table-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-wrapper table-responsive">
                            <table class="custom-table small">
                                <thead>
                                    <tr>
                                        <th>@lang('Full Name')</th>
                                        <th>@lang('Username')</th>
                                        <th>@lang('Email')</th>
                                        <th>@lang('Phone')</th>
                                        <th>@lang('Country')</th>
                                        <th>@lang('Joined At')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Posted Ads')</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td data-label="@lang('User')">
                                                {{ $user->first_name ? $user->first_name : '' }}
                                                {{ $user->middle_name ? $user->middle_name : '' }}
                                                {{ $user->last_name ? $user->last_name : '' }}
                                            </td>
                                            <td data-label="@lang('User')">

                                                {{ $user->username ? $user->username : '' }}
                                            </td>

                                            <td data-label="@lang('User')">
                                                <a class="text-muted" href="{{ route('admin.users.detail', $user->id) }}">
                                                    {{ $user->email ? $user->email : '' }}
                                                </a>
                                            </td>


                                            <td data-label="@lang('Email-Phone')">
                                                {{ $user->alt_mobile_no }}
                                            </td>
                                            <td data-label="@lang('Country')">
                                                @php($address = json_decode($user->address, true))
                                                {{ isset($address['country']) ? $address['country'] : '' }}<br>
                                            </td>

                                            <td data-label="@lang('Joined At')">

                                                {{ date('d-M-y', strtotime($user->created_at)) }}

                                            </td>

                                            <td>
                                                @if ($user->status == 1)
                                                    <span class="badge badge--base">@lang('Verified')</span>
                                                @else
                                                    <span class="badge badge--warning">@lang('Not Verified')</span>
                                                @endif
                                            </td>
                                            <td><a href="#" class="badge bg-success text-wrap">{{ $user->advertisements ? $user->advertisements_count : '' }}</a></td>
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

            </div>
        </div>
    </div>
@endsection
