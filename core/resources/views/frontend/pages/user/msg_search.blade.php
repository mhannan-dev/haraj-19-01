@foreach ($messages as $message)
    @php
        $self = Auth::guard('advertiser')->user();
        $user = App\Models\Advertiser::findOrFail($message_user->to);
        $user_id = $user->id;
    @endphp
    <div class="chat-left-body">
        <div class="chat-item user" id="{{ $user->id ?? '' }}">
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
                        <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon" fill="#002f34a3"
                            fill-rule="evenodd">
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
    </div>
@endforeach
