<div class="dashboard-title-part">
    <h5 class="title">@lang('Dashboard')</h5>
    <div href="" class="dashboard-path">
        <a href="{{ route('admin.dashboard') }}">
            <span class="main-path">@lang('Dashboard')</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="{{ route('admin.brand.index') }}">
            <span class="active-path g-color">@lang('Brand List')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="{{ route('admin.brand.create') }}">
            <i class="las la-plus"></i>
            <span>@lang('Add Brand')</span>
        </a>
    </div>
</div>
