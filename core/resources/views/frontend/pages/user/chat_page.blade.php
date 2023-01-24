@extends('frontend.layout.main')
@section('content')
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                                                                                                                                                Start Chat sectio                                                                                               ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="chat-section pt-30 pb-60">
        <div class="container">
            <div class="chat-main-wrapper">
                <div class="chat-left-area">
                    <div class="chat-left-header">
                        <h1 class="title">@lang('INBOX')</h1>
                        <div class="action-area">
                            <button class="inbox-search-btn"><i class="fas fa-search"></i></button>
                            <button class="inbox-opsition-btn"><i class="fas fa-ellipsis-v"></i></button>
                            <ul class="inbox-opsition-dropdown-list">
                                <li>
                                    <a href="{{  url('user/delete-all-chat')  }}" type="button">@lang('Delete All Chat')</a>
                                </li>
                            </ul>
                        </div>
                        <div class="inbox-search-area">
                            <input type="text" name="message_search" id="message_search" placeholder="Search area"
                                class="form--control" autocomplete="off">
                            <button class="cross-btn"><i class="las la-times-circle"></i></button>
                        </div>
                    </div>
                    <div class="chat-left-body">
                        <span class="left-body-title">@lang('Quick Filters')</span>
                        <div class="quick-filter-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                        data-bs-target="#all" type="button" role="tab" aria-controls="all"
                                        aria-selected="true">@lang('All')</button>

                                    <button class="nav-link" id="unread-tab"
                                        data-bs_id="{{ Auth::guard('advertiser')->user()->id }}" data-bs-toggle="tab"
                                        data-bs-target="#unread" type="button" role="tab" aria-controls="unread"
                                        aria-selected="false">@lang('Unread')</button>

                                    <button class="nav-link" id="important-tab"
                                        data-bs_id="{{ Auth::guard('advertiser')->user()->id }}" data-bs-toggle="tab"
                                        data-bs-target="#important" type="button" role="tab" aria-controls="important"
                                        aria-selected="false">@lang('Important')</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel"
                                    aria-labelledby="all-tab">
                                    @foreach ($message_users as $message_user)
                                        @php
                                            $my_id = Auth::guard('advertiser')->user()->id;
                                        @endphp
                                        @if ($my_id == $message_user->from)
                                            @php
                                                $self = Auth::guard('advertiser')->user();
                                                $user = App\Models\Advertiser::findOrFail($message_user->to);
                                                $user_id = $user->id;
                                                $messageData = App\Models\Message::where(function ($query) use ($user_id, $my_id) {
                                                    $query
                                                        ->where('from', $user_id)
                                                        ->where('to', $my_id)
                                                        ->where('is_read', 0);
                                                })
                                                    ->orWhere(function ($query) use ($user_id, $my_id) {
                                                        $query
                                                            ->where('from', $my_id)
                                                            ->where('to', $user_id)
                                                            ->where('is_read', 0);
                                                    })
                                                    ->count();
                                            @endphp
                                            <div class="chat-item user" id="{{ $user->id }}">
                                                <div class="chat-user-area">
                                                    <div class="chat-user-thumb">
                                                        <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                            alt="product">
                                                        <div class="chat-user-thumb-profile">
                                                            <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                alt="seller-profile">
                                                        </div>
                                                    </div>
                                                    <div class="chat-user-content">
                                                        <h4 class="title">
                                                            {{ $user->first_name ? $user->first_name : '' }}
                                                            {{ $user->last_name ? $user->last_name : '' }}
                                                        </h4>

                                                        @if ($user->isOnline())
                                                            <span class="sub-title text-success">@lang('Active Now')</span>
                                                        @else
                                                            <span class="sub-title text-warning">@lang('left')
                                                                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="chat-user-action-area">
                                                    <span>
                                                        <button class="chat-user-action-opsition-btn">
                                                            <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                                                data-aut-id="icon" fill="#002f34a3" fill-rule="evenodd">
                                                                <path class="rui-10_kq"
                                                                    d="M512 725.333c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 440.889c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 156.444c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <ul class="custom-dropdown-list">
                                                            <li>
                                                                <button type="button" class="markAsImportent"
                                                                    data-recever_id="{{ $user_id }}">@lang('Mark as important')</button>
                                                            </li>
                                                        </ul>
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            @php
                                                $self = Auth::guard('advertiser')->user();
                                                $user = App\Models\Advertiser::findOrFail($message_user->from);
                                                $user_id = $user->id;
                                                $messageData = App\Models\Message::where(function ($query) use ($user_id, $my_id) {
                                                    $query
                                                        ->where('from', $user_id)
                                                        ->where('to', $my_id)
                                                        ->where('is_read', 0);
                                                })
                                                    ->orWhere(function ($query) use ($user_id, $my_id) {
                                                        $query
                                                            ->where('from', $my_id)
                                                            ->where('to', $user_id)
                                                            ->where('is_read', 0);
                                                    })
                                                    ->count();

                                            @endphp
                                            <div class="chat-item user" id="{{ $user->id }}">
                                                <div class="chat-user-area">
                                                    <div class="chat-user-thumb">
                                                        <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                            alt="product">
                                                        <div class="chat-user-thumb-profile">
                                                            <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                alt="seller-profile">
                                                        </div>
                                                    </div>
                                                    <div class="chat-user-content">
                                                        <h4 class="title">
                                                            {{ $user->first_name ? $user->first_name : '' }}
                                                            {{ $user->last_name ? $user->last_name : '' }}
                                                        </h4>

                                                        @if ($user->isOnline())
                                                            <span class="sub-title text-success">@lang('Active Now')</span>
                                                        @else
                                                            <span class="sub-title text-warning">left
                                                                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="chat-user-action-area">
                                                    <button class="chat-user-action-opsition-btn">
                                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                                            data-aut-id="icon" fill="#002f34a3" fill-rule="evenodd">
                                                            <path class="rui-10_kq"
                                                                d="M512 725.333c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 440.889c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 156.444c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <ul class="custom-dropdown-list">
                                                        <li>
                                                            <div>
                                                                <button type="button" class="deleteConversation"
                                                                    data-recever_id="{{ $user_id }}">@lang('Delete Chat')</button>
                                                            </div>

                                                        </li>

                                                        <li>
                                                            <button type="button" class="markAsImportent"
                                                                data-recever_id="{{ $user_id }}">@lang('Mark as important')</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="tab-pane fade" id="unread" role="tabpanel" aria-labelledby="unread-tab">
                                    @foreach ($message_users as $message_user)
                                        @php
                                            $my_id = Auth::guard('advertiser')->user()->id;
                                        @endphp
                                        @if ($my_id == $message_user->from)
                                            @php
                                                $self = Auth::guard('advertiser')->user();
                                                $user = App\Models\Advertiser::findOrFail($message_user->to);
                                                $user_id = $user->id;
                                                $messageData = App\Models\Message::where(function ($query) use ($user_id, $my_id) {
                                                    $query
                                                        ->where('from', $user_id)
                                                        ->where('to', $my_id)
                                                        ->where('is_read', 0);
                                                })
                                                    ->orWhere(function ($query) use ($user_id, $my_id) {
                                                        $query
                                                            ->where('from', $my_id)
                                                            ->where('to', $user_id)
                                                            ->where('is_read', 0);
                                                    })->first();

                                            @endphp
                                            @if ($messageData != null)

                                            <div class="chat-item user" id="{{ $user->id }}">
                                                <div class="chat-user-area">
                                                    <div class="chat-user-thumb">
                                                        <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                            alt="product">
                                                        <div class="chat-user-thumb-profile">
                                                            <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                alt="seller-profile">
                                                        </div>
                                                    </div>
                                                    <div class="chat-user-content">
                                                        <h4 class="title">
                                                            {{ $user->first_name ? $user->first_name : '' }}
                                                            {{ $user->last_name ? $user->last_name : '' }}
                                                        </h4>

                                                        @if ($user->isOnline())
                                                            <span class="sub-title text-success">Active Now</span>
                                                        @else
                                                            <span class="sub-title text-warning">left
                                                                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="chat-user-action-area">
                                                    <span>
                                                        <button class="chat-user-action-opsition-btn">
                                                            <svg width="24px" height="24px"
                                                                viewBox="0 0 1024 1024" data-aut-id="icon"
                                                                fill="#002f34a3" fill-rule="evenodd">
                                                                <path class="rui-10_kq"
                                                                    d="M512 725.333c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 440.889c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 156.444c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <ul class="custom-dropdown-list">
                                                            <li>
                                                                <button type="button" class="markAsImportent"
                                                                    data-recever_id="{{ $user_id }}">@lang('Mark as important')</button>
                                                            </li>
                                                        </ul>
                                                    </span>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            @php
                                                $self = Auth::guard('advertiser')->user();
                                                $user = App\Models\Advertiser::findOrFail($message_user->from);
                                                $user_id = $user->id;
                                                $messageData = App\Models\Message::where(function ($query) use ($user_id, $my_id) {
                                                    $query
                                                        ->where('from', $user_id)
                                                        ->where('to', $my_id)
                                                        ->where('is_read', 0);
                                                })
                                                    ->orWhere(function ($query) use ($user_id, $my_id) {
                                                        $query
                                                            ->where('from', $my_id)
                                                            ->where('to', $user_id)
                                                            ->where('is_read', 0);
                                                    })
                                                    ->first();

                                            @endphp
                                            @if ($messageData != null)

                                            <div class="chat-item user" id="{{ $user->id }}">
                                                <div class="chat-user-area">
                                                    <div class="chat-user-thumb">
                                                        <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                            alt="product">
                                                        <div class="chat-user-thumb-profile">
                                                            <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                alt="seller-profile">
                                                        </div>
                                                    </div>
                                                    <div class="chat-user-content">
                                                        <h4 class="title">
                                                            {{ $user->first_name ? $user->first_name : '' }}
                                                            {{ $user->last_name ? $user->last_name : '' }}
                                                        </h4>

                                                        @if ($user->isOnline())
                                                            <span
                                                                class="sub-title text-success">@lang('Active Now')</span>
                                                        @else
                                                            <span class="sub-title text-warning">@lang('left')
                                                                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="chat-user-action-area">
                                                    <button class="chat-user-action-opsition-btn">
                                                        <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                                            data-aut-id="icon" fill="#002f34a3" fill-rule="evenodd">
                                                            <path class="rui-10_kq"
                                                                d="M512 725.333c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 440.889c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 156.444c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <ul class="custom-dropdown-list">
                                                        <li>
                                                            <div>
                                                                <button type="button" class="deleteConversation"
                                                                    data-recever_id="{{ $user_id }}">@lang('Delete Chat')</button>
                                                            </div>

                                                        </li>

                                                        <li>
                                                            <button type="button" class="markAsImportent"
                                                                data-recever_id="{{ $user_id }}">@lang('Mark as important')</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                        {{-- <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <p class="nav-link">@lang('Not found')</p>
                                        </div> --}}
                                @endforeach
                                </div>

                                <div class="tab-pane fade" id="important" role="tabpanel"
                                    aria-labelledby="important-tab">
                                    @foreach ($message_users as $message_user)
                                            @php
                                                $my_id = Auth::guard('advertiser')->user()->id;
                                            @endphp
                                            @if ($my_id == $message_user->from)
                                                @php
                                                    $self = Auth::guard('advertiser')->user();
                                                    $user = App\Models\Advertiser::findOrFail($message_user->to);
                                                    $user_id = $user->id;
                                                    $messageData = App\Models\Message::where(function ($query) use ($user_id, $my_id) {
                                                        $query
                                                            ->where('from', $user_id)
                                                            ->where('to', $my_id)
                                                            ->where('is_read', 0);
                                                    })
                                                        ->orWhere(function ($query) use ($user_id, $my_id) {
                                                            $query
                                                                ->where('from', $my_id)
                                                                ->where('to', $user_id)
                                                                ->where('is_read', 0);
                                                        })
                                                        ->count();
                                                @endphp
                                                <div class="chat-item user" id="{{ $user->id }}">
                                                    <div class="chat-user-area">
                                                        <div class="chat-user-thumb">
                                                            <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                alt="product">
                                                            <div class="chat-user-thumb-profile">
                                                                <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                    alt="seller-profile">
                                                            </div>
                                                        </div>
                                                        <div class="chat-user-content">
                                                            <h4 class="title">
                                                                {{ $user->first_name ? $user->first_name : '' }}
                                                                {{ $user->last_name ? $user->last_name : '' }}
                                                            </h4>
                                                            
                                                            @if ($user->isOnline())
                                                                <span class="sub-title text-success">Active Now</span>
                                                            @else
                                                                <span class="sub-title text-warning">left
                                                                    {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="chat-user-action-area">
                                                        <span>
                                                            <button class="chat-user-action-opsition-btn">
                                                                <svg width="24px" height="24px"
                                                                    viewBox="0 0 1024 1024" data-aut-id="icon"
                                                                    fill="#002f34a3" fill-rule="evenodd">
                                                                    <path class="rui-10_kq"
                                                                        d="M512 725.333c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 440.889c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 156.444c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                            <ul class="custom-dropdown-list">
                                                                <li>
                                                                    <button type="button" class="markAsImportent"
                                                                        data-recever_id="{{ $user_id }}">@lang('Mark as important')</button>
                                                                </li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                </div>
                                            @else
                                                @php
                                                    $self = Auth::guard('advertiser')->user();
                                                    $user = App\Models\Advertiser::findOrFail($message_user->from);
                                                    $user_id = $user->id;
                                                    $messageData = App\Models\Message::where(function ($query) use ($user_id, $my_id) {
                                                        $query
                                                            ->where('from', $user_id)
                                                            ->where('to', $my_id)
                                                            ->where('is_read', 0);
                                                    })
                                                        ->orWhere(function ($query) use ($user_id, $my_id) {
                                                            $query
                                                                ->where('from', $my_id)
                                                                ->where('to', $user_id)
                                                                ->where('is_read', 0);
                                                        })
                                                        ->count();

                                                @endphp
                                                <div class="chat-item user" id="{{ $user->id }}">
                                                    <div class="chat-user-area">
                                                        <div class="chat-user-thumb">
                                                            <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                alt="product">
                                                            <div class="chat-user-thumb-profile">
                                                                <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                                                                    alt="seller-profile">
                                                            </div>
                                                        </div>
                                                        <div class="chat-user-content">
                                                            <h4 class="title">
                                                                {{ $user->first_name ? $user->first_name : '' }}
                                                                {{ $user->last_name ? $user->last_name : '' }}
                                                            </h4>

                                                            @if ($user->isOnline())
                                                                <span
                                                                    class="sub-title text-success">@lang('Active Now')</span>
                                                            @else
                                                                <span class="sub-title text-warning">@lang('left')
                                                                    {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="chat-user-action-area">
                                                        <button class="chat-user-action-opsition-btn">
                                                            <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                                                                data-aut-id="icon" fill="#002f34a3" fill-rule="evenodd">
                                                                <path class="rui-10_kq"
                                                                    d="M512 725.333c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 440.889c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111zM512 156.444c39.111 0 71.111 32 71.111 71.111s-32 71.111-71.111 71.111c-39.111 0-71.111-32-71.111-71.111s32-71.111 71.111-71.111z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <ul class="custom-dropdown-list">
                                                            <li>
                                                                <div>
                                                                    <button type="button" class="deleteConversation"
                                                                        data-recever_id="{{ $user_id }}">@lang('Delete Chat')</button>
                                                                </div>

                                                            </li>

                                                            <li>
                                                                <button type="button" class="markAsImportent"
                                                                    data-recever_id="{{ $user_id }}">@lang('Mark as important')</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-right-area">
                    <div id="messages">

                        <div class="empty-chat-area">
                            <div class="empty-chat-thumb">
                                <img src="{{ URL::asset('assets/frontend') }}/images/emptyChat.webp" alt="empty">
                            </div>
                            <div class="empty-chat-content">
                                <p>@lang('Select a chat to view the conversation')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~ End Chat section~~~~~~~~~~~~~~~~~-->
@endsection
@section('scripts')
    <script>
        var recever_id = '';
        var my_id = '{{ Auth::guard('advertiser')->user()->id }}';
        $(document).ready(function() {
            $(document).on("click",'.user', function(e) {
                e.preventDefault();
                $('.user').removeClass('active');
                $(this).addClass('active');
                recever_id = $(this).attr('id');

                $.ajax({
                    type: "GET",
                    url: "{{ url('message') }}/" + recever_id,
                    data: "",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // Coversation Area
                    success: function(response) {
                        $('#messages').html(response);
                        scrollToBottom();
                        $('.pending').html(0);
                    }
                });
            });


            window.Echo.channel('chat').listen('.message', function(e) {
                if (my_id == e.from) {
                    $('#' + e.to).click();
                } else if (my_id == e.to) {
                    if (recever_id == e.from) {
                        $('#' + e.from).click();
                        $("#nav-tabContent").load(location.href + " #nav-tabContent");
                    } else {
                        // if receiver is not seleted, add notification for that user
                        var pending = parseInt($('#' + e.from).find('.pending').html());
                        if (pending) {
                            $('#' + e.from).find('.pending').html(pending + 1);
                        } else {
                            $('#' + e.from).find('.pending').html(pending + 1);
                            // $('#' + e.from).append('<span class="pending">1</span>');
                        }
                    }
                }
            });


            //send message start
            $(document).on('keyup', '.write_message', function(e) {
                var message = $(this).val();
                if (e.keyCode == 13 && message != '' && recever_id != '') {
                    sendMessagehere(message)
                }
            });


            $(document).on('click', '.clickForSendMessage', function(e) {
                e.preventDefault();
                var message = $('.write_message').val();

                if (message != '' && recever_id != '') {
                    sendMessagehere(message)
                }
            });

            function sendMessagehere(message) {
                $(this).val('');
                $.ajax({
                    type: "post",
                    url: "{{ url('message') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recever_id: recever_id,
                        message: message
                    },
                    success: function(response) {},
                    error: function(error) {},
                    complete: function(done) {
                        scrollToBottom();
                    }
                });
            }

            //send message end


            //delete conversation
            $(document).on('click', '.deleteConversation', function(e) {
                e.preventDefault();
                var recever_id = $(this).data('recever_id');

                $.ajax({
                    type: "post",
                    url: "{{ url('delete-conversation-ajax') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recever_id: recever_id
                    },
                    success: function(response) {},
                    error: function(error) {},
                    complete: function(done) {
                        window.location.reload();
                    }
                });
            });

            //delete only message
            $(document).on('click', '.onlyDeleteMessage', function(e) {
                e.preventDefault();
                var recever_id = $(this).data('recever_id');

                $.ajax({
                    type: "post",
                    url: "{{ url('delete-only-conversation-ajax') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recever_id: recever_id
                    },
                    success: function(response) {},
                    error: function(error) {},
                    complete: function(done) {
                        window.location.reload();
                    }
                });
            });

            //block User
            $(document).on('click', '.blockUser', function(e) {
                e.preventDefault();
                var recever_id = $(this).data('recever_id');

                $.ajax({
                    type: "post",
                    url: "{{ url('block-user-ajax') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recever_id: recever_id
                    },
                    success: function(response) {},
                    error: function(error) {},
                    complete: function(done) {
                        window.location.reload();
                    }
                });
            });

            //unblock User
            $(document).on('click', '.unblockUser', function(e) {
                e.preventDefault();
                var recever_id = $(this).data('recever_id');

                $.ajax({
                    type: "post",
                    url: "{{ url('unblock-user-ajax') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recever_id: recever_id
                    },
                    success: function(response) {},
                    error: function(error) {},
                    complete: function(done) {
                        window.location.reload();
                    }
                });
            });

            //prebuild sms
            $(document).on('click', '.prebuildSms', function(e) {
                e.preventDefault();
                var sms = $(this).text();
                $('.write_message').val(sms);
            });


            //mark as important
            $(document).on('click', '.markAsImportent', function(e) {
                e.preventDefault();
                var recever_id = $(this).data('recever_id');

                $.ajax({
                    type: "post",
                    url: "{{ url('mark-as-important-ajax') }}",
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recever_id: recever_id
                    },
                    success: function(response) {},
                    error: function(error) {},
                    complete: function(done) {
                        window.location.reload();
                    }
                });
            });
        });

        function scrollToBottom() {
            $('.chat-history').animate({
                scrollTop: $('.chat-history').get(0).scrollHeight
            }, 50)
        }

        function sendMessage() {
            let user_id = $('#user_id').val();
            let messeges = $('#messeges').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let url = '{{ url('/send-message') }}';
            let data = {
                user_id: user_id,
                messeges: messeges
            }
            axios.post(url, data)
                .then(function(success) {})
                .catch(function(error) {});
        }
    </script>
    <script>
        $(document).on("click", "#selectAll", function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });
        $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });
        $(document).on("click", "#deleteAllSelectedMsg", function() {
            var allids = [];
            $("input:checkbox:checked").each(function() {
                allids.push($(this).attr('data-id'));
            })
            if (allids.length < 0) {
                alert('Please select at least one message to delete');
            } else {
                if (confirm('Are you sure, you want to delete this selected message')) {
                    var strIds = allids;
                    // var strIds = allids.join(",");
                    console.log(strIds);
                }
            }
            $.ajax({
                url: '{{ route('frontend.user.all.chat.delete') }}',
                type: 'delete',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'ids=' + strIds,
                success: function(resp) {}
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#message_search').keyup(function() {
                $(".search-message-result").remove();
                var search_msg = $('#message_search').val();
                if (search_msg.length > 0) {
                    $(".chat-left-body").addClass("d-none")
                } else {
                    $(".chat-left-body").removeClass("d-none")
                    return false;
                }
                console.log(search_msg);
                $(".chat-left-body").parent().append("<div class='search-message-result'></div>")
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '{{ url('search_message') }}',
                    data: {
                        search_msg: search_msg
                    },
                    success: function(response) {
                        console.log(response)
                        $(".search-message-result").html("");
                        $(".search-message-result").html(response);
                    }
                });
            });
            $('.cross-btn').click(function() {
                $(".chat-left-body").removeClass("d-none")
            });
        });
    </script>
@endsection
