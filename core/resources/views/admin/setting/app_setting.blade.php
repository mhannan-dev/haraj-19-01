@extends('admin.layout.master')
@section('title')
    General Settings
@endsection
@section('page-name')
    General Settings Page
@endsection
@php
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboard</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.admin-user') }}">
                <span class="active-path g-color">General Setting</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="#">

                <span>General Setting</span>
            </a>
        </div>
    </div>

    <div class="user-detail-area">
        <div class="user-info-header two">
            <h5 class="title">Site Settings</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-form-area two mt-10">
                    @php $app_settings = json_decode($general->apps_settings, true); @endphp
                    {{-- @dd($app_settings) --}}
                    <form class="dashboard-form" action="{{ url('setting/apps/index') }}" method="POST">
                        @csrf
                        <div class="dashboard-form">
                            <div class="row text-center pt-30 mb-10-none">
                                <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <label>@lang('Play store Status')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-toggle="toggle" data-on="Activated"
                                        data-off="Deactivated" name="google_play_status"
                                        @if ($app_settings["google_play_status"]) checked @endif>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <label>@lang('Play store app link')</label>
                                    <input name="play_store_app_link" value="{{ old('play_store_app_link', $app_settings['play_store_app_link'] ?? '' ) }}" class="form--control" placeholder="@lang('Play store app link')">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <label>@lang('iOS Status')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-toggle="toggle" data-on="Activated"
                                        data-off="Deactivated" name="ios_status"
                                        @if ($app_settings['ios_status']) checked @endif>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <label>@lang('iOS app link')</label>
                                    <input name="ios_app_link" value="{{ old('ios_app_link', $app_settings['ios_app_link'] ?? '' ) }}" class="form--control" placeholder="@lang('iOS app link')">
                                </div>

                            </div>
                        </div>
                        <div class="info-two-btn mt-30">
                            <button type="submit" class="btn btn--base w-100"><i class="las la-cloud-upload-alt"></i>
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function(color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });
            $('.colorCode').on('input', function() {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });
            $('.select2-basic').select2({
                dropdownParent: $('.card-body')
            });
            $('select[name=timezone]').val();
        })(jQuery);
    </script>
@endsection
