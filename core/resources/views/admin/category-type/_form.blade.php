<style>
    #wheels {
        display: none;
    }
</style>
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
    <div class="card-header">
        <h6 class="title">@lang('Necessary Fields')</h6>
        <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i>
            @lang('Add')</button>
    </div>
    <div class="custom-inner-card mt-2">
        <div class="card-inner-body">
            <div class="results">
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label for="title">@lang('Label')</label>
                        <input type="text" name="label[]" class="form--control" readonly value="Ad title">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="text" selected>@lang('Input Text')</option>
                        </select>
                    </div>

                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Min character*') }}</label>
                        <input type="text" class="form--control" value="10" name="min_char[]">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max character*') }}</label>
                        <input type="text" class="form--control" value="200" name="max_char[]">
                    </div>

                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>@lang('Yes')</option>
                        </select>
                    </div>
                </div>
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>@lang('Label')</label>
                        <input type="text" name="label[]" value="condition" class="form--control">
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="select" selected>@lang('Select')</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Options*') }} (@lang('Comma seperated'))</label>
                        <input type="text" placeholder="Type Here..." name="select_options[]" class="form--control"
                            value="used, new, like new" required>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>@lang('Label')</label>
                        <input type="text" name="label[]" value="brand" class="form--control" readonly>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="select" selected>@lang('Select')</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>{{ __('Options*') }} (@lang('Comma seperated'))</label>
                        <input type="text" placeholder="Type Here..." name="select_options[]" class="form--control"
                            value="used, new, like new" required>
                    </div>
                    <div class="col-xl-3 col-lg-3 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>Yes</option>
                        </select>
                    </div>

                </div>
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>@lang('Label')</label>
                        <input type="text" name="label[]" class="form--control" value="description">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Min character*') }}</label>
                        <input type="text" class="form--control" value="100" name="min_char[]">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max character*') }}</label>
                        <input type="text" class="form--control" value="1000" name="max_char[]">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="textarea" selected>@lang('Textarea')</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>@lang('Label')</label>
                        <input type="text" class="form--control" name="label[]" value="thumbnail" readonly
                            required>
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max File Size *') }}/MB</label>
                        <input type="number" name="file_max_size[]" class="form--control" value="3">
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-2 col-lg-2 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Label*',
                            'name' => 'label[]',
                            'value' => 'price',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="number" selected>@lang('Number')</option>
                        </select>
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Min character*') }}</label>
                        <input type="text" class="form--control" value="2" name="min_char[]">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max character*') }}</label>
                        <input type="text" class="form--control" value="10" name="max_char[]">
                    </div>

                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>@lang('Yes')</option>
                        </select>
                    </div>
                </div>
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
                        <input type="text" class="form--control" value="10" name="min_char[]">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max character*') }}</label>
                        <input type="text" class="form--control" value="100" name="max_char[]">
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>@lang('Yes')</option>
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
                        <input type="text" class="form--control" value="10" name="min_char[]">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max character*') }}</label>
                        <input type="text" class="form--control" value="200" name="max_char[]">
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>@lang('Yes')</option>
                        </select>
                    </div>
                </div>
                <div class="row add-row-wrapper align-items-end">
                    <input type="hidden" name="editable[]" value="0">
                    <div class="col-xl-2 col-lg-2 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Label',
                            'name' => 'label[]',
                            'value' => 'images',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Max File Size *') }}</label>
                        <input type="text" name="file_max_size[]" class="form--control" value="3">
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>@lang('Yes')</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
