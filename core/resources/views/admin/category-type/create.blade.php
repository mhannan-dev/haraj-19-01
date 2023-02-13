@extends('admin.layout.master')
@section('title')
    @lang('Add Category Type')
@endsection
@section('page-name')
    @lang('Add Category Type')
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
                <a href="{{ route('admin.category.index') }}">
                    <span class="active-path g-color">@lang('Category Type')</span>
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
    <form action="{{ route('admin.category.type.store') }}" method="post">
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
        <p>
            <button class="btn btn--base" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse"
                aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">@lang('Default Inputs')</button>
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label for="title">@lang('Label')</label>
                                <input type="text" name="label[]" class="form--control" value="ad_title" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="text" selected>@lang('Input Text')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Min character*') }}</label>
                                <input type="text" class="form--control" value="10" name="min_char[]" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Max character*') }}</label>
                                <input type="text" class="form--control" value="200" name="max_char[]" readonly>
                            </div>
                            <div class="col-xl-3 col-lg-4 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>

                            <div class="col-xl-1 col-lg-1 form-group">
                                <button type="button" class="btn btn--base bg--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                            </div>
                        </div>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-3 form-group">
                                <label>@lang('Label')</label>
                                <input type="text" name="label[]" value="condition" class="form--control" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-3 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="select" selected>@lang('Select')</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 form-group">
                                <label>{{ __('Options') }}</label>
                                <input type="text" placeholder="Type Here..." name="select_options[]"
                                    class="form--control" value="used, new, like new" required readonly>
                            </div>
                            <div class="col-xl-3 col-lg-3 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <button type="button" class="btn btn--base bg--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-3 col-lg-3 form-group">
                                <label>@lang('Label')</label>
                                <input type="text" name="label[]" value="authenticity" class="form--control" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="select" selected>@lang('Select')</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 form-group">
                                <label>{{ __('Options*') }} (@lang('Comma seperated'))</label>
                                <input type="text" placeholder="Type Here..." name="select_options[]"
                                    class="form--control" value="original, refubrished, reconditioned" required readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <button type="button" class="btn btn--base bg--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                            </div>
                        </div>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-3 col-lg-3 form-group">
                                <label>@lang('Label')</label>
                                <input type="text" name="label[]" value="brand" class="form--control" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="select" selected>@lang('Select')</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>{{ __('Options*') }} (@lang('Comma seperated'))</label>
                                <input type="text" placeholder="Type Here..." name="select_options[]"
                                    class="form--control" value="used, new, like new" required readonly>
                            </div>
                            <div class="col-xl-3 col-lg-3 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>
                        </div>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>@lang('Label')</label>
                                <input type="text" name="label[]" class="form--control" value="description" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Min character*') }}</label>
                                <input type="text" class="form--control" value="100" name="min_char[]" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Max character*') }}</label>
                                <input type="text" class="form--control" value="1000" name="max_char[]" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="textarea" selected>@lang('Textarea')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>Yes</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <button type="button" class="btn btn--base bg--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>@lang('Label')</label>
                                <input type="text" class="form--control" name="label[]" value="image" readonly
                                    required>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Max File Size *') }}/@lang('MB')</label>
                                <input type="number" name="file_max_size[]" class="form--control" value="3"
                                    readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="file" selected>@lang('File')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                @include('admin.components.form.input', [
                                    'label' => 'File Extension*',
                                    'name' => 'file_extensions[]',
                                    'attribute' => 'required',
                                    'placeholder' => 'ex: jpg, png',
                                    'value' => 'jpg',
                                ])
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>Yes</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <button type="button" class="btn btn--base bg--danger row-cross-btn w-100"><i class="las la-times"></i></button>
                            </div>
                        </div>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                {{-- @include('admin.components.form.input', [
                                    'label' => 'Label * ',
                                    'name' => 'label[]',
                                    'value' => 'price',
                                    'attribute' => 'required readonly',
                                ]) --}}
                                <label for="price">@lang('Price') <span class="text-danger">*</span></label>
                                <input type="text" name='label[]' value="price" readonly required>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="number" selected>@lang('Number')</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>{{ __('Max digits') }}</label>
                                <input type="text" class="form--control" value="10" name="max_digit[]" readonly>
                            </div>

                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                @include('admin.components.form.input', [
                                    'label' => 'Label',
                                    'name' => 'label[]',
                                    'value' => 'meta_tags',
                                    'attribute' => 'required readonly',
                                ])
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="text" selected>@lang('Text')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Min character*') }}</label>
                                <input type="text" class="form--control" value="10" name="min_char[]" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Max character*') }}</label>
                                <input type="text" class="form--control" value="100" name="max_char[]">
                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>
                        </div>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                @include('admin.components.form.input', [
                                    'label' => 'Label',
                                    'name' => 'label[]',
                                    'value' => 'meta_title',
                                    'attribute' => 'required readonly',
                                ])
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="text" selected>@lang('Text')</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Min character') }}</label>
                                <input type="text" class="form--control" value="10" name="min_char[]" readonly>
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Max character*') }}</label>
                                <input type="text" class="form--control" value="200" name="max_char[]" readonly>
                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="1" selected>@lang('Yes')</option>
                                </select>
                            </div>
                        </div>
                        <div class="row add-row-wrapper align-items-end">
                            <input type="hidden" name="editable[]" value="0">
                            <div class="col-xl-2 col-lg-2 form-group">
                                {{-- @include('admin.components.form.input', [
                                    'label' => 'Label',
                                    'name' => 'label[]',
                                    'value' => 'images',
                                    'attribute' => 'readonly',
                                ]) --}}
                                <label for="label">Image</label>
                                <input type="text" name="label[]" value="images" class="form--control">
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Field Types*') }}</label>
                                <select class="form--control nice-select field-input-type" name="input_type[]">
                                    <option value="file" selected>@lang('File')</option>
                                </select>
                            </div>

                            <div class="col-xl-2 col-lg-2 form-group">
                                <label>{{ __('Max File Size *') }}</label>
                                <input type="text" name="file_max_size[]" class="form--control" value="3"
                                    readonly>
                            </div>

                            <div class="col-xl-2 col-lg-2 form-group">
                                @include('admin.components.form.input', [
                                    'label' => 'File Extension*',
                                    'name' => 'file_extensions[]',
                                    'attribute' => 'required',
                                    'placeholder' => 'ex: jpg, png',
                                    'value' => 'jpg',
                                ])
                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>@lang('Field Necessity')</label>
                                <select name="field_necessity[]" class="form--control">
                                    <option value="0" selected>@lang('No')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-card kyc-form input-field-generator" data-source="manual_gateway_input_fields">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i>
                    @lang('Add')</button>
            </div>
            <div class="custom-inner-card mt-2">
                <div class="card-inner-body">
                    <div class="results">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn--base">{{ $buttonText }}</button>
        <a href="{{ url('category-type/index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
    </form>
@endsection
@section('scripts')
@endsection
