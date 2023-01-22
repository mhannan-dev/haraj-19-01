@extends('admin.layout.master')
@section('title')
    @lang('Update category')
@endsection
@section('page-name')
    @lang('Update category')
@endsection
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
            @if (hasAccessAbility('view_category', $roles))
                <a href="{{ route('admin.category.index') }}">
                    <span class="active-path g-color">@lang('Categories')</span>
                </a>
            @endif
        </div>
        <div class="view-prodact">
            @if (hasAccessAbility('create_category', $roles))
                <a href="{{ route('admin.category.create') }}">
                    <i class="las la-plus"></i>
                    <span>@lang('Add Category')</span>
                </a>
            @endif
        </div>
    </div>
    <form action="{{ route('admin.category.update', $row['id']) }}" method="post" enctype="multipart/form-data">
        @include('admin.category._form', ['buttonText' => 'Update'])
    </form>
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
