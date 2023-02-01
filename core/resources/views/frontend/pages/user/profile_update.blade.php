@extends('frontend.layout.main')
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="#"><i class="las la-angle-right"></i> User profile</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="user-profile-section pb-60 pt-30">
        <div class="container">
            <div class="row mb-30-none">
                @include('frontend.pages.user._profile_sidebar')
                <div class="col-xl-9 col-lg-8 col-md-7 mb-30">
                    <form action="{{ route('frontend.user.update.profile', $userData->id) }}" method="post">
                        @csrf
                        <div class="setting-content-area">
                            <div class="setting-content-header">
                                <h3 class="title">Edit profile</h3>
                            </div>
                            <div class="setting-content">
                                <div class="row mb-30-none">
                                    <div class="col-xl-6 col-lg-5 mb-30">
                                        <div class="ad-pass-input-area">
                                            <div class="ad-pass-input two form-group">
                                                <label>@lang('First name')</label>
                                                <input type="text" class="form--control" name="first_name"
                                                    placeholder="@lang('First name')" value="{{ $userData->first_name }}"
                                                    autocomplete="off">
                                                <div class="sub-text text-end">
                                                    <small class="text--dark">5/30</small>
                                                </div>
                                            </div>
                                            <div class="ad-pass-input two form-group">
                                                <label>@lang('Last name')</label>
                                                <input type="text" class="form--control" name="last_name"
                                                    placeholder="@lang('Last name')" value="{{ $userData->last_name }}"
                                                    autocomplete="off">
                                                <div class="sub-text text-end">
                                                    <small class="text--dark">5/30</small>
                                                </div>
                                            </div>
                                            <div class="ad-pass-input two form-group">
                                                <label>@lang('Province') <span class="text-danger">*</span></label>
                                                <select class="form--control" name="city_id" id="city_id">
                                                    <option value="">@lang('Select')</option>
                                                    @foreach (\DB::table('cities')->where('status', 1)->get() as $city)
                                                        <option value="{{ $city->id }}"
                                                            @if ($userData->city_id == $city->id) selected
                                                            @else
                                                            '' @endif>
                                                            {{ $city->title }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="ad-pass-input two text-end">
                                                <textarea placeholder="@lang('About me (optional)')" name="about" class="form--control">{{ $userData->about }}</textarea>
                                                <small class="text--dark">0/200</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-7 mb-30">
                                        <div class="edit-profile-text-wrapper">
                                            <h4 class="edit-profile-text"><svg width="25px" height="25px"
                                                    viewBox="0 0 1024 1024" data-aut-id="icon" class=""
                                                    fill-rule="evenodd">
                                                    <path class="rui-2Xn3A"
                                                        d="M318.061 279.272h-54.847l-61.517-61.517v-54.847h54.847l61.517 61.517v54.847zM512 240.485l-38.789-38.789v-77.575l38.789-38.789 38.789 38.789v77.575l-38.789 38.789zM938.667 473.211l-38.789 38.789h-77.575l-38.789-38.789 38.789-38.789h77.575l38.789 38.789zM201.697 434.425l38.789 38.789-38.789 38.789h-77.575l-38.789-38.789 38.789-38.789h77.575zM822.303 217.755l-61.517 61.517h-54.847v-54.847l61.517-61.517h54.847v54.847zM621.73 621.73c-13.848 13.809-29.867 24.747-47.67 32.505l-23.272 35.569v54.924h-77.575v-54.924l-23.272-35.53c-17.804-7.757-33.823-18.734-47.67-32.582-60.47-60.47-60.47-158.913 0-219.385 60.51-60.51 158.952-60.51 219.462 0 60.47 60.47 60.47 158.913 0 219.385zM473.211 861.091h77.575v-38.789h-77.575v38.789zM512 279.272c-62.177 0-120.63 24.204-164.538 68.19-90.764 90.725-90.764 238.351 0 329.115 14.507 14.469 30.643 26.919 48.174 37.043v186.259l38.789 38.789h155.151l38.789-38.789v-186.259c17.57-10.163 33.669-22.574 48.174-37.081 90.764-90.725 90.764-238.391 0-329.115-43.909-43.909-102.323-68.15-164.538-68.15z">
                                                    </path>
                                                </svg> Why is this important?</h4>
                                            <span>HARAJ alyawm is built on trust. Help others get to know you. Tell them
                                                what you like. Share your favorite brands, books, movies, shows, music,
                                                food. And see what happens...</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="setting-content">

                                <div class="row mb-30-none">
                                    <div class="col-lg-6 mb-30">
                                        <div class="ad-pass-input-area">
                                            <div class="ad-pass-input two form-group user-profile-number-input">
                                                <label>@lang('Contact information') <span class="text-danger">*</span></label>
                                                <input type="number" name="mobile_no" value="{{ $userData->mobile_no }}"
                                                    class="form--control" placeholder="Phone number" data-bs-toggle="modal"
                                                    data-bs-target="#accountModalstep" autocomplete="off">
                                                <span class="user-profile-number-badge">+90</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <span class="user-profile-info-text">This number is for recipient contact
                                            information, reminders, and other notifications.</span>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <div class="ad-pass-input-area">
                                            <div class="ad-pass-input two">
                                                <input type="email" class="form--control" placeholder="Enter"
                                                    value="{{ $userData->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <span class="user-profile-info-text two">We will not share your e-mail address with
                                            anyone.</span>
                                    </div>
                                </div>

                            </div>
                            <div class="setting-content two">
                                <div class="user-profile-optional-information">
                                    <h3 class="optional-information-title">Optional information</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-lg-6 mb-30">
                                            <div class="profile-optional-information-item">
                                                <h4 class="title">Facebook</h4>
                                                <span class="sub-title">Sign in with Facebook and discover your secure
                                                    connection with buyers</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <div class="optional-information-item-btn">
                                                <button class="btn--base active w-100">connect to facebook</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <div class="profile-optional-information-item">
                                                <h4 class="title">Google</h4>
                                                <span class="sub-title">Link your Google account to your LETGO
                                                    account</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <div class="optional-information-item-btn">
                                                <button class="btn--base active w-100">disconnect</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="save-change-btn-area">
                                <a href="{{ url('/') }}">Give up</a>
                                <button type="submit" class="btn--base">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
