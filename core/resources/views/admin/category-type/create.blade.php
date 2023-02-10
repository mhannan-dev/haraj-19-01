@extends('admin.layout.master')
@section('title')
    @lang('Add Category Type')
@endsection
@section('page-name')
    @lang('Add Category Type')
@endsection
@push('custom_css')
    <style>
        .kyc-form .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .kyc-form select {
            padding: 10px 14px;
        }

        .kyc-form .row-cross-btn {
            background-color: #ea5455;
            color: #ffffff !important;
            padding: 13px 20px;
        }
    </style>
@endpush
@php
    $roles = userRolePermissionArray();
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href="#">
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            @if (hasAccessAbility('view_category_type', $roles))
                <a href="{{ route('admin.category.index') }}">
                    <span class="active-path g-color">@lang('Category Type')</span>
                </a>
            @endif
        </div>
        <div class="view-prodact">
            @if (hasAccessAbility('create_category_type', $roles))
                <a href="{{ route('admin.category.type.create') }}">
                    <i class="las la-plus"></i>
                    <span>@lang('Add Type')</span>
                </a>
            @endif
        </div>
    </div>
    <form action="{{ route('admin.category.type.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 mb-2">
                <label for="title">@lang('Name')<span class="text-danger">*</span></label>
                <input type="text" name="title"
                    class="form-control form--control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    placeholder="@lang('Name')" value="{{ @old('title', $row['title']) }}">
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="custom-card kyc-form input-field-generator" data-source="manual_gateway_input_fields">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i>
                    @lang('Add')</button>
            </div>
            <div class="custom-inner-card mt-2">
                <div class="card-inner-body">
                    <div class="results">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn--base">{{ $buttonText }}</button>
        <a href="{{ url('category-type/index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
    </form>
@endsection
@section('scripts')
@endsection
