<div class="dashboard-title-part">
    <h5 class="title">@lang('Dashboard')</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">@lang('Dashboard')</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="{{ route('admin.setting.social.media.index') }}">
            <span class="active-path g-color">@lang('List')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="{{ route('admin.setting.social.media.create') }}">
            <i class="las la-plus"></i>
            <span>@lang('Add New')</span>
        </a>
    </div>
</div>
