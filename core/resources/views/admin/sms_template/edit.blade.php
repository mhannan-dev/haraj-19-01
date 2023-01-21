@extends('admin.layout.master')
@section('title')
    SMS Template Edit
@endsection
@section('page-name')
    SMS Template Edit Page
@endsection
@push('custom_css')
    <style>

    </style>
@endpush
@section('content')
<div class="table-area">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table">
                    <thead>
                    <tr class="custom-table-row">
                        <th>Short Code</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                         @forelse($sms_template->shortcodes as $shortcode => $key)
                                <tr>
                                    <td >@php echo "{{". $shortcode ."}}"  @endphp</td>
                                    <td >{{ __($key) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-muted text-center">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="user-detail-area mt-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="user-info-header two">
                <h5 class="title">Password Reset</h5>
            </div>
            <div class="dashboard-form-area two mt-10">
                <form class="dashboard-form" action="{{ route('admin.sms.templates.update', $sms_template->id) }}" method="POST">
                    @csrf

                    <div class="row mb-10-none">
                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-8 form-group">
                            <label>Subject *</label>
                            <input type="text"  class="form--control"  placeholder="@lang('Email subject')" name="subject" value="{{ $sms_template->subj }}">
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 form-group">
                            <label>Status</label>
                            <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Send Email')" data-off="@lang("Don't Send")" name="sms_status"
                            @if($sms_template->sms_status) checked @endif>
                        </div>
                        <div class="col-lg-12 form-group">
                            <textarea class="form--control nicEdit"  placeholder="@lang('Your message using shortcodes')" name="sms_body">{{ $sms_template->sms_body }}</textarea>
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn btn--base w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.sms.templates.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="fa fa-fw fa-backward"></i> @lang('Go Back') </a>
@endpush
