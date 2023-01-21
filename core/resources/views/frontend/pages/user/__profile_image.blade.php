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
                            <h3 class="title">@lang('Profile picture')</h3>
                        </div>
                        <div class="setting-content three">
                            <div class="profile-picture-thumb-area">
                                <div class="image-upload-wrapper">
                                    <div class="image-upload">
                                        <form id="upload-image"
                                            action="{{ route('frontend.user.update.photo', $userData->id) }}"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="thumb">
                                                <div class="avater-preview-area">
                                                    <div class="avatar-preview">
                                                        {{-- <div class="profilePicPreview bg_img"
                                                            data-background="{{ URL::asset('assets/frontend') }}/images/profile/avatar_2.png"
                                                            style="background-image: url(&quot;assets/images/profile/avatar_2.png&quot;);">
                                                            <button type="button" class="remove-image"><i
                                                                    class="la la-trash"></i></button>
                                                        </div> --}}

                                                        @if (isset($userData->image))
                                                            <img class="profilePicPreview bg_img"
                                                                id="preview-image-before-upload"
                                                                src="{{ public_path('user/', $userData->image)}}"
                                                                alt="preview image" style="max-height: 250px;">
                                                        @else
                                                            <img class="profilePicPreview bg_img"
                                                                id="preview-image-before-upload"
                                                                src="https://via.placeholder.com/300/09f.png/fff"
                                                                alt="preview image" style="max-height: 250px;">
                                                        @endif


                                                    </div>
                                                </div>
                                                <div class="avater-edit-area">
                                                    <p>Clear photos are important for buyers and sellers to know about each
                                                        other. Make sure it doesn't contain any personal or sensitive
                                                        information that you don't want others to see.</p>
                                                    <span class="title">Chatting with a landscape isn't much fun!</span>
                                                    <div class="avater-edit-btn-area">
                                                        <div class="avatar-edit">
                                                            <input type="file" class="mb-2" name="image"
                                                                placeholder="Choose image" id="image"
                                                                accept=".png, .jpg, .jpeg" required=""
                                                                autocomplete="off">
                                                            @error('image')
                                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                                </div>
                                                            @enderror
                                                            {{-- <input type="file" class="profilePicUpload" name="image"
                                                                id="profilePicUpload2" accept=".png, .jpg, .jpeg"
                                                                required="" autocomplete="off"> --}}
                                                            {{-- <label for="profilePicUpload2" class="text-light">Image</label> --}}
                                                        </div>

                                                        <div class="divaidor-text text-center">
                                                            <small>Or</small>
                                                        </div>
                                                        <button type="button" class="btn--base active w-100">import from
                                                            facebook</button>
                                                        <button type="button" class="btn--base active w-100">import from
                                                            google</button>
                                                        <button type="submit" class="btn btn--base w-100">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
