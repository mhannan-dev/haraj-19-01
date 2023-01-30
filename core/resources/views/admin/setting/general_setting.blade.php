@extends('admin.layout.master')
@section('title')
    @lang('General Settings')
@endsection
@section('page-name')
    @lang('General Settings')
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
            <h5 class="title">@lang('Site Settings')</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-form-area two mt-10">
                    <form class="dashboard-form" action="{{ route('admin.setting.update') }}" method="POST">
                        @csrf
                        <div class="dashboard-form">
                            <div class="row justify-content-center mb-10-none ps-3 pe-3">
                                <div class="col-md-6 form-group">
                                    <label>@lang('Site Title') <span class="text-danger">*</span> </label>
                                    <input type="text" name="sitename" class="form--control" placeholder="0"
                                        value="{{ $general->sitename ?? '' }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>@lang('Site subtitle') <span class="text-danger">*</span></label>
                                    <input type="text" name="site_sub_title" class="form--control" placeholder="0"
                                        value="{{ $general->site_sub_title ?? '' }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>@lang('Timezone')</label>
                                    <select class="form--control" name='timezone'>
                                        @foreach ($timezones as $timezone)
                                            <option value="'{{ @$timezone }}'"
                                                @if (config('app.timezone') == $timezone) selected @endif>{{ __($timezone) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    @php(
    $currency_code = DB::table('general_settings')->select('cur_text')->first()
)
                                    <label>@lang('Select Currency')</label>
                                    <select class="form--control" name='cur_text'>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->currency_code }}"
                                                {{ $currency_code ? ($currency_code->cur_text == $currency->currency_code ? 'selected' : '') : '' }}>
                                                {{ $currency->currency_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row text-center pt-30 mb-10-none">
                                <div class="col-md-4 form-group">
                                    <label>@lang('User Registration')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-toggle="toggle" data-on="Activated"
                                        data-off="Deactivated" name="registration"
                                        @if ($general->registration) checked @endif>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>@lang('Email Verification')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-toggle="toggle" data-on="Activated"
                                        data-off="Deactivated" name="ev"
                                        @if ($general->ev) checked @endif>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>@lang('Email Notification')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-toggle="toggle" data-on="Activated"
                                        data-off="Deactivated" name="ev"
                                        @if ($general->ev) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="info-two-btn mt-30">
                            <button type="submit" class="btn btn--base w-100"><i class="las la-cloud-upload-alt"></i>
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
