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

    /* .kyc-form .kyc-cross-btn {
        background-color: #ea5455;
        color: #ffffff !important;
        padding: 13px 20px;
    } */
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
        <h6 class="title">Necessary Fields</h6>
        <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i>
            @lang('Add')</button>
    </div>
    <div class="custom-inner-card mt-2">
        <div class="card-inner-body">
            <div class="results">
                <div class="row add-row-wrapper align-items-end">
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Advertisement title*',
                            'name' => 'title[]',
                            'value' => 'title',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="text" selected>Input Text</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Condition*',
                            'name' => 'condition[]',
                            'value' => 'condition',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="select" selected>@lang('Select')</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Brand*',
                            'name' => 'brand_id[]',
                            'value' => 'brand_id',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="text" selected>@lang('Text')</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Explation*',
                            'name' => 'description[]',
                            'value' => 'description',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="textarea" selected>Textarea</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Thumbnail*',
                            'name' => 'image[]',
                            'value' => 'image',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="file" selected>@lang('File')</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Price*',
                            'name' => 'price[]',
                            'value' => 'price',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="number" selected>@lang('Number')</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Meta tags*',
                            'name' => 'meta_tags[]',
                            'value' => 'meta_tags',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="text" selected>@lang('Text')</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Meta Title*',
                            'name' => 'meta_title[]',
                            'value' => 'meta_title',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="text" selected>@lang('Text')</option>
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
                    <div class="col-xl-4 col-lg-4 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Multiple Images*',
                            'name' => 'images[]',
                            'value' => 'images',
                            'attribute' => 'required readonly',
                        ])
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="file" selected>@lang('File')</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <label>@lang('Field Necessity')</label>
                        <select name="field_necessity[]" class="form--control">
                            <option value="yes" selected>Yes</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
