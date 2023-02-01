@extends('admin.layout.master')
@section('Dashboard', 'active')
@section('Dashboard', 'open')
@section('title')
    @lang('admin_action.list_page_title')
@endsection
@section('page-name')
    @lang('admin_action.list_page_sub_title')
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
            <a href="{{ route('admin.admin-user') }}">
                <span class="active-path g-color">@lang('Admin Users')</span>
            </a>
        </div>
    </div>
    <!-- body-wrapper-start -->
    <div class="user-detail-area">
        <div class="user-info-header two">
            <h5 class="title">@lang('Create Admin User')</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-form-area two mt-10">
                    <form method="POST" action="{{ route('admin.admin-user.store') }}" enctype="multipart/form-data"
                        class="dashboard-form">
                        @csrf
                        <div class="row mb-30-none">
                            <div class="col-lg-12 mb-30">
                                <div class="row justify-content-center mb-10-none">
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('First name') @include('admin.partials._utils') </label>
                                        <input type="text" name="first_name" class="form--control"
                                            placeholder="First name">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('Last name') @include('admin.partials._utils') </label>
                                        <input type="text" name="last_name" class="form--control"
                                            placeholder="Last name">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>@lang('Designation')</label>
                                        <input type="text" name="designation" class="form--control"
                                            placeholder="Designation">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>@lang('Status')*</label>
                                        <select class="form-control form--control" name="status">
                                            <option value="1">
                                                @lang('Yes')
                                            </option>
                                            <option value="0">
                                                @lang('No')
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>@lang('form.admin_user_form_field_group_name')</label>
                                        <div class="controls">
                                            {!! Form::select('user_group', $userGroup, null, [
                                                'class' => 'form--control mb-1',
                                                'placeholder' => 'Select user group',
                                            ]) !!}
                                        </div>
                                        @if ($errors->has('user_group'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('user_group') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('Username')</label>
                                        <input type="text" name="username" class="form-control form--control"
                                            placeholder="Username">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>@lang('Email') @include('admin.partials._utils') </label>
                                        <input type="text" name="email" class="form-control form--control"
                                            placeholder="Enter valid email">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>@lang('Phone No') </label>
                                        <input type="text" name="mobile_no" class="form-control form--control"
                                            placeholder="Phone No">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>@lang('Password') @include('admin.partials._utils') </label>
                                        <input type="password" name="password" class="form-control form--control"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>@lang('Confirm password') @include('admin.partials._utils') </label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control form--control" placeholder="Password confirmation">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>@lang('Can login') @include('admin.partials._utils') </label>
                                        <select class="form-control form--control" name="can_login">
                                            <option selected="selected" value="">@lang('Select who can login')</option>
                                            <option value="1">
                                                @lang('Yes')
                                            </option>
                                            <option value="0">
                                                @lang('No')
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>@lang('Gender') @include('admin.partials._utils') </label>
                                        <select class="form-control form--control" name="gender">
                                            <option selected="selected" value="">@lang('Select')</option>
                                            <option value="1">
                                                @lang('Male')
                                            </option>
                                            <option value="0">
                                                @lang('Female')
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('Photo') </label>
                                        <input type="file" name="profile_pic">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pro-btn-area mt-30">
                            <button type="submit" class="btn btn--base w-100">@lang('Save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
