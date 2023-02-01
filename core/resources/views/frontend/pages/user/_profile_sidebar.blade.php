<div class="col-xl-3 col-lg-4 col-md-5 mb-30">
    <div class="setting-side-nav">
        @if (!empty(Auth::guard('advertiser')->user()->id))
            <ul class="setting-nav-list">
                @if(Route::currentRouteName() == 'frontend.user.setting')
                <li><a href="{{ route('frontend.user.setting', Auth::guard('advertiser')->user()->id) }}"
                        @if (Route::currentRouteName() == 'frontend.user.setting') class="active" @endif>@lang('Security')</a></li>
                <li><a href="#0" data-bs-toggle="modal" data-bs-target="#accountModal2">Sign out from all devices</a>
                </li>
                <li><a href="#0" data-bs-toggle="modal" data-bs-target="#accountModal3">Delete my account and forget
                        me</a></li>
                <li><a href="{{ route('frontend.cms.section', 'chat-security-tips') }}"
                    @if (Route::currentRouteName() == 'frontend.cms.section') class="active" @endif>Chat security tips</a></li>
                @endif
                @if(Route::currentRouteName() == 'frontend.user.update.profile' || Route::currentRouteName() == 'frontend.user.update.photo')
                <li><a href="{{ route('frontend.user.update.profile', Auth::guard('advertiser')->user()->id) }}"
                    @if (Route::currentRouteName() == 'frontend.user.update.profile') class="active" @endif>@lang('Profile')</a></li>
                <li><a href="{{ route('frontend.user.update.photo', Auth::guard('advertiser')->user()->id) }}"
                    @if (Route::currentRouteName() == 'frontend.user.update.photo') class="active" @endif>@lang('Profile Picture')</a></li>
                <div class="view-profile-btn mt-30">
                    <a href="{{ route('frontend.user.view.profile', Auth::guard('advertiser')->user()->id) }}"
                        class="btn--base w-100">View
                        profile</a>
                </div>
                @endif
            </ul>
        @endif
    </div>
</div>
