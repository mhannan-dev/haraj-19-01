@extends('admin.layout.master')
@section('title')
    @lang('Logo Icon and Favicon Setting')
@endsection
@section('page-name')
    @lang('Logo Icon and Favicon Settings Page')
@endsection
@php

@endphp
@section('content')
<div class="dashboard-title-part">
    <h5 class="title">@lang('Dashboard')</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">@lang('Dashboard')</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="#">
            <span class="active-path g-color">@lang('Logo & Favicon')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="#">
            <i class="las la-edit align-middle me-1"></i>
            <span>@lang('Logo & Favicon')</span>
        </a>
    </div>
</div>

    <div class="user-detail-area">
        <div class="user-info-header two">
            <h5 class="title">@lang('Logo & Favicon')</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-form-area two mt-10">

                    <form class="dashboard-form" action="{{ route('admin.setting.logo.icon.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-10-none">
                            <div class="col-lg-12">
                                <div class="logo-fab-content">
                                    <span>@lang('If the logo and favicon are not changed after you update from this page, please
                                        clear the cache from your browser. As we keep the filename the same after the
                                        update, it may show the old image for the cache. usually, it works after clear the
                                        cache but if you still see the old logo or favicon, it may be caused by server level
                                        or network level caching. Please clear them too.')</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label>@lang('Site Logo')</label>
                                <div class="image-upload style-three">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview bg_img"
                                                data-background="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}">
                                                <button type="button" class="remove-image"><i
                                                        class="fa fa-upload"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type='file' class="profilePicUpload" name="logo" id="logo"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="logo"><i class="las la-upload"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label>@lang('Site Logo White')</label>
                                <div class="image-upload style-three">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview bg_img"
                                                data-background="{{ getImage(imagePath()['logoIcon']['path'] . '/whiteLogo.png', '?' . time()) }}">
                                                <button type="button" class="remove-image"><i
                                                        class="fa fa-upload"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type='file' class="profilePicUpload" name="whiteLogo" id="whiteLogo"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="whiteLogo"><i class="las la-upload"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label>@lang('Site Favicon')</label>
                                <div class="image-upload style-three">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview bg_img"
                                                data-background="{{ getImage(imagePath()['logoIcon']['path'] . '/favicon.png', '?' . time()) }}">
                                                <button type="button" class="remove-image"><i
                                                        class="fa fa-upload"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type='file' class="profilePicUpload" name="favicon" id="favicon"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="favicon"><i class="las la-upload"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-two-btn">
                            <button type="submit" class="btn btn--base w-100 mt-50"><i class="las la-cloud-upload-alt"></i>
                                @lang('Update')</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function proPicURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = $(input).parents('.thumb').find('.profilePicPreview');
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
            $(this).parents(".profilePicPreview").css('background-image', 'none');
            $(this).parents(".profilePicPreview").removeClass('has-image');
            $(this).parents(".thumb").find('input[type=file]').val('');
        });
    </script>
@endsection
