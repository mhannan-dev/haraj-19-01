@extends('admin.layout.master')
@section('title')
    Language
@endsection
@section('page-name')
    Language
@endsection
@php
 ;
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
                <span class="active-path g-color">@lang('Language')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="#">
                <i class="las la-edit"></i>
                @lang('Update Language')
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <div class="dashboard-form-area">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.language.manage.update', $language->id) }}"
                            method="POST">
                            @csrf
                            <div class="form-row form-group">
                                <label class="font-weight-bold ">@lang('Language Name') <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form--control" id="code" name="name"
                                        placeholder="@lang('e.g. Japaneese, Portuguese')" value="{{ old('name', $language->name) }}" required>
                                </div>
                            </div>
                            <div class="form-row form-group">
                                <div class="col-md-12">
                                    <label for="inputName" class="">@lang('Default Language') <span
                                            class="text-danger">*</span></label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                        data-offstyle="-danger" data-toggle="toggle" data-on="@lang('SET')"
                                        data-off="@lang('UNSET')" name="is_default"
                                        {{ $language->is_default == 1 ? 'checked' : ' ' }}>
                                </div>
                            </div>
                            <a href="{{ route('admin.language.index') }}" class="btn btn-secondary">@lang('Close')</a>
                            <button type="submit" class="btn btn-success">@lang('Update')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
