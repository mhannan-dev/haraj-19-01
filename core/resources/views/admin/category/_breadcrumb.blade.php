<div class="dashboard-title-part">
    <h5 class="title">Dashboard</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">Dashboards</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="{{ route('admin.category.index') }}">
            <span class="active-path g-color">@lang('Categories')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="{{ route('admin.category.create') }}">
            <i class="las la-plus"></i>
            <span>@lang('Add Category')</span>
        </a>
    </div>
</div>
