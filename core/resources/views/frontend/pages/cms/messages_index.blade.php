@php
    $self = Auth::guard('advertiser')->user();
    $advert = \App\Models\UserContact::where('message_sender_id', '=', Auth::guard('advertiser')->user()->id)
        ->orderBy('id', 'desc')
        ->first();
    $is_block = \App\Models\MessageUser::where('from', $user->id)
        ->where('to', Auth::guard('advertiser')->user()->id)
        ->orWhere('to', $user->id)
        ->where('from', Auth::guard('advertiser')->user()->id)
        ->first();
@endphp

<div class="chat-right-wrapper">


    <div class="chat-right-area-hader">
        <div class="chat-right-user-area">
            <div class="chat-right-user-thumb">
                <img src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif" alt="product">
                <div class="chat-right-user-thumb-profile">
                    <img src="@if ($self->image) {{ URL::asset('core/storage/app/public/user/' . $self->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                        alt="seller-profile">
                </div>
            </div>
            <div class="chat-right-user-content">
                <h4 class="title">{{ $user ? $user->first_name . ' ' . $user->last_name : '' }} </h4>
            </div>
        </div>
        <div class="chat-right-user-action-area">
            <button type="button" data-bs-toggle="modal" data-bs-target="#reportModal"><i
                    class="las la-flag"></i></button>
            <button type="button" class="chat-right-user-opsition-btn"><i class="las la-ellipsis-v"></i></button>
            <button type="button" class="chat-right-cross-btn">
                <i class="las la-times" id="deleteAllSelectedMsg"></i>
            </button>
            {{-- <button type="button" class="chat-right-cross-btn"><i class="las la-times"></i></button> --}}
            <ul class="chat-right-user-dropdown-list">
                <li>
                    <button type="button" class="deleteConversation" data-recever_id="{{ $user->id }}">Delete
                        Chat</button>
                </li>
                <li>
                    @if ($is_block->is_block == 0)
                        <button type="button" class="blockUser" data-recever_id="{{ $user->id }}">Block User
                            Chat</button>
                    @else
                        <button type="button" class="unblockUser" data-recever_id="{{ $user->id }}">Unblock User
                            Chat</button>
                    @endif
                </li>
            </ul>
        </div>
    </div>

    <div class="pin-product-name-area">
        <a href="product-details.html" class="d-block">
            <h4 class="pin-product-title">

                @if (isset($advert->advertisement_title))
                    <span>{{ $advert->advertisement_title ?? '' }}<span> USD
                            {{ $advert->advertisement_price ?? '' }}</span>
                @endif
            </h4>
        </a>
    </div>

    <div class="support-chat-area">
        <div class="ps-container chat-history">
            @foreach ($messages as $message)
                @if ($message->to == Auth::guard('advertiser')->user()->id)
                    <div class="media media-chat">
                        <img class="avatar"
                            src="@if ($user->image) {{ URL::asset('core/storage/app/public/user/' . $user->image) }} @else {{ asset('assets/images/default.png') }} @endif"
                            alt="client">
                        <div class="media-body">
                            <p>{{ $message->message }}
                                <span>{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span><i
                                    class="las la-check-double"></i>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="media media-chat media-chat-reverse">

                        <div class="media-body message">
                            {{-- <input type="checkbox" class="msg_checkbox_class" data-id="{{ $message->id }}"> --}}
                            {{-- <i class="fas fa-map-pin" aria-hidden="true"></i> --}}

                            <p id="msg_id">{{ $message->message }}
                                <span>{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span><i
                                    class="las la-check-double"></i>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        @if ($is_block->is_block == 0)
            <div class="chat-right-footer-wrapper" style="position: relative">
                <div class="chat-form">
                    <div class="publisher">
                        <button type="button" class="publisher-btn file-group me-3" data-bs-toggle="modal"
                            data-bs-target="#mapModal2">
                            <i class="la la-paperclip"></i>
                        </button>
                        <div class="chatbox-message-part">
                            <input class="publisher-input write_message" type="text" name="message"
                                placeholder="Write something....." autocomplete="off">
                        </div>
                        <div class="chatbox-send-part d-flex flex-wrap align-items-center">
                            <button type="button" class="clickForSendMessage"><svg width="28px" height="28px"
                                    viewBox="0 0 1024 1024" data-aut-id="icon" class="" fill-rule="evenodd">
                                    <path class="rui-4K4Y7"
                                        d="M512 0c281.6 0 512 230.4 512 512s-230.4 512-512 512-512-230.4-512-512 230.4-512 512-512zM284.444 256l93.867 256-93.867 256 568.889-256-568.889-256zM386.844 366.933l290.133 130.844h-241.778l-48.356-130.844zM435.2 526.222h241.778l-290.133 130.844 48.356-130.844z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center ">
                <p class="text-danger  text-center">You Can't Make Conversation With This Person!</p>
            </div>
        @endif

    </div>
</div>
<div class="empty-chat-area">
    <div class="empty-chat-thumb">
        <img src="{{ URL::asset('assets/frontend') }}/images/emptyChat.webp" alt="empty">
    </div>
    <div class="empty-chat-content">
        <p>Select a chat to view the conversation</p>
    </div>
</div>


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                Start Modal
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal account-modal fade" id="reportModal" tabindex="-1" aria-labelledby="accountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog two modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header two justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body two">
                <h1 class="report-title">User complaint</h1>
                <form class="report-form-area">
                    <div class="radio-wrapper">
                        <div class="radio-item">
                            <input type="radio" id="test1" name="radio-group">
                            <label for="test1">Suspicious or potentially fraudulent behavior</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="test2" name="radio-group">
                            <label for="test2">Inappropriate profile photo or username</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="test3" name="radio-group">
                            <label for="test3">Hate speech or bullying behavior</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="test4" name="radio-group">
                            <label for="test4">Sexual harassment</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="test5" name="radio-group">
                            <label for="test5">violent behavior</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="test6" name="radio-group">
                            <label for="test6">Unrealistic price or offer</label>
                        </div>
                    </div>
                    <textarea class="report-text-area" placeholder="If you have any other notes to help us fix this issue, add"></textarea>
                    <div class="report-btn mt-4">
                        <button type="submit" class="btn--base w-100">Submit complaint</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                    End modal
                ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                    Start Modal
                ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal account-modal fade" id="mapModal2" tabindex="-1" aria-labelledby="accountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog three modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-header-title-three" id="exampleModalLabel">Select Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body three">
                <div class="modal-map-area">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.1899657893728!2d90.42380431666383!3d23.779746865573756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7499f257eab%3A0xe6b4b9eacea70f4a!2sManama+Tower!5e0!3m2!1sen!2sbd!4v1561542597668!5m2!1sen!2sbd"
                        style="border:0" allowfullscreen></iframe>
                </div>
                <div class="share-location-btn">
                    <button class="btn--base">Share Location</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                    End modal
                ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
