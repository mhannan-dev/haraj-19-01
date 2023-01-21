@extends('frontend.layout.main')
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="#"><i class="las la-angle-right"></i>@lang('Profile picture')</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="user-profile-section pb-60 pt-30">
        <div class="container">
            <div class="row mb-30-none">
                @include('frontend.pages.user._profile_sidebar')
                <div class="col-lg-9 mb-30">
                    <div class="setting-content-area">
                        <div class="setting-content-header">
                            <h3 class="title">Profile picture</h3>
                        </div>

                        <div class="setting-content three">
                            <div class="profile-picture-thumb-area">
                                <div class="image-upload-wrapper">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avater-preview-area">
                                                <div class="avatar-preview">
                                                    {{-- @dd($user->image); --}}
                                                    @if (isset($user->image))
                                                        <div class="profilePicPreview bg_img"
                                                            data-background="{{ asset('core/storage/app/public/user/' . $user->image) }}">
                                                        </div>
                                                    @endif
                                                    <img id="pic" class="profilePicPreview bg_img mt-2"/>
                                                </div>
                                            </div>
                                            <div class="avater-edit-area">
                                                <p>Clear photos are important for buyers and sellers to know about each
                                                    other. Make sure it doesn't contain any personal or sensitive
                                                    information that you don't want others to see.</p>
                                                <span class="title">Chatting with a landscape isn't much fun!</span>
                                                <div class="avater-edit-btn-area">
                                                    <form action="{{ route('frontend.user.update.photo', $user->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="avatar-edit">
                                                            <input name="image" type=file
                                                                oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                                                class="" name="image" id="profilePicUpload2"
                                                                accept=".png, .jpg, .jpeg" required=""
                                                                autocomplete="off">
                                                            {{-- <label for="profilePicUpload2" class="text-light">Image</label> --}}
                                                            <button type="submit"
                                                                class="btn--base w-100 mt-2">Update</button>
                                                        </div>
                                                    </form>
                                                    <div class="divaidor-text text-center">
                                                        <small>Or</small>
                                                    </div>

                                                    <a href="https://photos.google.com/" class="btn--base active w-100">import from
                                                        google</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function proPicURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
                    $(preview).css('background-image', 'url(' + e.target.result + ')');
                    $(preview).addClass('has-image');
                    $(preview).hide();
                    $(preview).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".profilePicUpload").on('change', function() {
            proPicURL(this);
        });

        $(".remove-image").on('click', function() {
            $(".profilePicPreview").css('background-image', 'none');
            $(".profilePicPreview").removeClass('has-image');
        })
    </script>
@endsection
