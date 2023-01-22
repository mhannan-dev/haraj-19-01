@extends('admin.layout.master')
@section('title')
    @lang('Contact Messages')
@endsection
@section('page-name')
    @lang('Contact Messages')
@endsection
@php
    $roles = userRolePermissionArray();
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.contact.index') }}">
                <span class="active-path g-color">@lang('Messages')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.contact.index') }}">
                <span>@lang('Message Box')</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <form class="modal-form" action="{{ url('contact/reply', $item->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-10-none">
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>Subject <span class="text-danger">*</span></label>
                                <input type="text" class="form--control" placeholder="Write Here..." name="mail_body">
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>Message <span class="text-danger">*</span></label>
                                <textarea class="form--control" name="subject" id="div_editor1" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn--base bg--danger" href="{{ route('admin.contact.index') }}">Cancel</a>
                    <button type="submit" class="btn btn--base">Send</button>
                </form>
            </div>
        </div>
    </div><!-- card end -->
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
