<div class="dashboard-title-part">
    <h5 class="title">@lang('Dashboard')</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">@lang('Dashboard')</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="{{ route('admin.contact.index') }}">
            <span class="active-path g-color">@lang('Messages')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="#">
            <span>@lang('Message Box')</span>
        </a>
    </div>
</div>
