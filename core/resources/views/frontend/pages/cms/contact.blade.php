@extends('frontend.layout.main')
@push('custom_css')
    <style>

    </style>
@endpush
@section('content')
<div class="breadcrumb-section pt-20">
    <div class="container">
        <div class="breadcrumb-wrapper">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li>
                    <a href="#0"><i class="las la-angle-right"></i> submit a request</a>
                </li>
            </ul>
            <div class="breadcrumb-search-area">
                <input type="text" placeholder="Call" class="form--control" autocomplete="off">
                <span class="breadcrumb-search-icon"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>
</div>
<section class="contact-section pb-60 pt-40">
    <div class="container">
        <div class="row mb-30-none">
            <div class="col-lg-7 mb-30">
                <div class="contact-wrapper">
                    <h1 class="contact-title">@lang('Submit a request')</h1>
                    <form class="contact-form-area" action="{{ url('contact') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input type="text" name="name" class="form--control {{ $errors->has('name') ? 'is-invalid' : '' }}"  autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('E-mail address')</label>
                            <input type="email" name="email" class="form--control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Subject')</label>
                            <input type="text" name="subject" class="form--control {{ $errors->has('subject') ? 'is-invalid' : '' }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Message')</label>
                            <textarea class="form--control {{ $errors->has('user_message') ? 'is-invalid' : '' }}" name="user_message"></textarea>
                            <small>Please write your question. A support staff will respond to you as soon as possible.</small>
                        </div>
                        <div class="form-group">
                            <label>Attachments <small>(optional)</small></label>
                            <input type="file" name="attached_file" class="form--control file" autocomplete="off">
                        </div>
                        <div class="contact-send-btn pt-40">
                            <button type="submit" class="btn--base">@lang('Send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection
