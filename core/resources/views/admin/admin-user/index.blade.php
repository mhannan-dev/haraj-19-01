@extends('admin.layout.master')
@section('admin-user', 'active')
@section('title')
    @lang('Admin User')
@endsection
@section('page-name')
    @lang('Admin User')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a>
    </li>
    <li class="breadcrumb-item active">@lang('Admin User')
    </li>
@endsection
@php
    $roles = userRolePermissionArray();
@endphp

@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboards')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.admin-user') }}">
                <span class="active-path g-color">@lang('Admin User')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.admin-user.new') }}">
                <i class="las la-plus align-middle me-1"></i>
                <span>@lang('Create Admin User')</span>
            </a>
        </div>
    </div>

    <div class="table-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-wrapper table-responsive">
                    <table class="custom-table small">
                        <thead>
                            <tr>
                                <th>@lang('Sl.')</th>
                                <th>@lang('Image')</th>
                                <th>@lang('Full Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Mobile no')</th>
                                <th>@lang('Group')</th>
                                <th>@lang('Role')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img align="middle" width="50" height="50"
                                            src="{{ URL::asset('core/public/profile/' . $row->profile_pic) }}"
                                            alt="No image">
                                    </td>
                                    <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->mobile_no }}</td>
                                    <td>{{ $row->group_name }}</td>
                                    <td>{{ $row->role_name }}</td>
                                    <td>
                                            @if (hasAccessAbility('edit_admin_user', $roles))
                                                <a href="{{ route('admin.admin-user.edit', [$row->auth_id]) }}">
                                                    <button type="button" class="btn btn-sm btn-outline-primary mr-1"><i
                                                            class="la la-edit"></i>
                                                    </button>
                                                </a>
                                            @endif
                                            @if (hasAccessAbility('delete_admin_user', $roles))
                                                @if ($row->auth_id != 1)
                                                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.admin-user.delete', [$row->auth_id]) }}">
                                                        <button type="button" class="btn btn-sm btn-outline-danger mr-1"><i
                                                                class="la la-trash"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ Alternative pagination table -->
@endsection
