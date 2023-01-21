<div class="dashboard-title-part">
    <h5 class="title">@lang('Dashboard')</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">@lang('Dashboard')</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="{{ route('admin.category-item.index') }}">
            <span class="active-path g-color">@lang('Items')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="{{ route('admin.category-item.create') }}">
            <i class="las la-plus"></i>
            <span>@lang('Add Category Item')</span>
        </a>
    </div>
</div>
