@extends('admin.layout.master')
@section('title')
    @lang('Add Category Type')
@endsection
@section('page-name')
    @lang('Add Category Type')
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
    <form action="{{ route('admin.category.type.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.category-type._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')
    <script>
        $('.kyc-form').on('click', '.add-row-btn', function() {
            $('.add-row-btn').closest('.kyc-form').find('.add-row-wrapper').last().clone().show().appendTo(
                '.results');
        });

        $(document).on('click', '.kyc-cross-btn', function(e) {
            e.preventDefault();
            $(this).parent().parent().hide(300);
        });
    </script>
@endsection
