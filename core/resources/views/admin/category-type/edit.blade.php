@extends('admin.layout.master')
@section('title')
    @lang('Update category type')
@endsection
@push('custom_css')
    <style>
        .kyc-form .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .kyc-form select {
            padding: 10px 14px;
        }
        .kyc-form .row-cross-btn {
            background-color: #ea5455;
            color: #ffffff !important;
            padding: 13px 20px;
        }
    </style>
@endpush
@section('page-name')
    @lang('Update category type')
@endsection
@php
    $roles = userRolePermissionArray();
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href="#">
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            @if (hasAccessAbility('view_category_type', $roles))
                <a href="{{ route('admin.category.type.index') }}">
                    <span class="active-path g-color">@lang('Category type')</span>
                </a>
            @endif
        </div>
        <div class="view-prodact">
            @if (hasAccessAbility('create_category_type', $roles))
                <a href="{{ route('admin.category.type.create') }}">
                    <i class="las la-plus"></i>
                    <span>@lang('Add Type')</span>
                </a>
            @endif
        </div>
    </div>
    <form action="{{ route('admin.category.type.update', $row['id']) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 mb-2">
                <label for="title">@lang('Name')<span class="text-danger">*</span></label>
                <input type="text" name="title"
                    class="form-control form--control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    placeholder="@lang('Name')" value="{{ @old('title', $row['title']) }}">
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="custom-card kyc-form input-field-generator" data-source="manual_gateway_input_fields">
            <div class="custom-inner-card mt-2">
                <div class="card-inner-body">
                    <div class="results">
                        @foreach ($row->fields ?? [] as $key => $item)
                            <div class="row add-row-wrapper align-items-end">
                                <div class="col-xl-3 col-lg-3 form-group">
                                    {{-- @include('admin.components.form.input', [
                                        'label' => 'Field Name*',
                                        'name' => 'label[]',
                                        'attribute' => 'required',
                                        'value' => old('label[]', $item->label),
                                    ]) --}}
                                    <input type="text" name="label[]" value="{{ old('label[]', $item->label) }}" class="form--control" @if ($item->editable == 1) readonly @else '' @endif>
                                </div>
                                <div class="col-xl-2 col-lg-2 form-group">
                                    @php
                                        $selectOptions = ['text' => 'Input Text', 'file' => 'File', 'textarea' => 'Textarea', 'select' => 'Select'];
                                    @endphp
                                    <label>{{ __('Field Types*') }}</label>
                                    <select class="form--control nice-select field-input-type" name="input_type[]"
                                        data-old="{{ $item->type }}" data-show-db="true">
                                        @foreach ($selectOptions as $key => $value)
                                            <option value="{{ $key }}" {{ $key == $item->type ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="field_type_input col-lg-4 col-xl-4">
                                    @if ($item->type == 'file')
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => 'Max File Size (mb)',
                                                    'name' => 'file_max_size[]',
                                                    'type' => 'number',
                                                    'attribute' => 'required',
                                                    'value' => old('file_max_size[]', $item->validation->max),
                                                    'placeholder' => 'ex: 10',
                                                ])
                                            </div>
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => 'File Extension*',
                                                    'name' => 'file_extensions[]',
                                                    'attribute' => 'required',
                                                    'value' => old(
                                                        'file_extensions[]',
                                                        implode(',', $item->validation->mimes)),
                                                    'placeholder' => 'ex: jpg, png, pdf',
                                                ])
                                            </div>
                                        </div>
                                    @elseif ($item->type == 'select')
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => 'Options*',
                                                    'name' => 'select_options[]',
                                                    'attribute' => 'required=true',
                                                    'value' => old(
                                                        'select_options[]',
                                                        implode(',', $item->validation->options)),
                                                ])
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => 'Min Character*',
                                                    'name' => 'min_char[]',
                                                    'type' => 'number',
                                                    'attribute' => 'required',
                                                    'value' => old('min_char[]', $item->validation->min),
                                                    'placeholder' => 'ex: 6',
                                                ])
                                            </div>
                                            <div class="col-xl-6 col-lg-6 form-group">
                                                @include('admin.components.form.input', [
                                                    'label' => 'Max Character*',
                                                    'name' => 'max_char[]',
                                                    'type' => 'number',
                                                    'attribute' => 'required',
                                                    'value' => old('max_char[]', $item->validation->max),
                                                    'placeholder' => 'ex: 16',
                                                ])
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($item->editable == 1)
                                    <div class="col-xl-2 col-lg-2 form-group">
                                        <label>@lang('Field Necessity')</label>
                                        <select name="field_necessity[]" class="form--control">
                                            <option value="yes" selected>Yes</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>
                                @else
                                    <div class="col-xl-2 col-lg-2 form-group">
                                        <label>@lang('Field Necessity')</label>
                                        <select name="field_necessity[]" class="form--control">
                                            <option value="yes" selected>Yes</option>
                                        </select>
                                    </div>
                                @endif
                                @if ($item->editable == 1)
                                    <div class="col-xl-1 col-lg-1 form-group">
                                        <button type="button"
                                            class="custom-btn btn--base btn--danger row-cross-btn w-100"><i
                                                class="las la-times"></i></button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn--base">{{ $buttonText }}</button>
        <a href="{{ url("category-type/index") }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
    </form>
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
