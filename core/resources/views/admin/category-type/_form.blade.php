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

    .kyc-form .kyc-cross-btn {
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
<div class="custom-card kyc-form">
    <div class="card-header">
        <h6 class="title">Necessary Fields</h6>
        <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i>
            @lang('Add')</button>
    </div>
    <div class="custom-inner-card input-field-generator mt-2" data-source="manual_gateway_input_fields">
        <div class="card-inner-body">
            <div class="results">
                <div class="row add-row-wrapper align-items-end">
                    <div class="col-xl-3 col-lg-3 form-group">
                        @include('admin.components.form.input', [
                            'label' => 'Advertisement title*',
                            'name' => 'form_title[]',
                            'attribute' => 'required',
                        ])
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>{{ __('Field Types*') }}</label>
                        <select class="form--control nice-select field-input-type" name="input_type[]">
                            <option value="text" selected>Input Text</option>
                            <option value="file">File</option>
                            <option value="textarea">Textarea</option>
                        </select>
                    </div>
                    <div class="field_type_input col-lg-4 col-xl-4">
                    </div>
                    <div class="col-xl-2 col-lg-2 form-group">
                        <label>Field Necessity</label>
                        <select name="field_necessity" class="form--control">
                            <option value="">Select option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-xl-1 col-lg-1 form-group">
                        <button type="button" class="custom-btn btn--base btn--danger kyc-cross-btn w-100">
                            <i class="las la-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('admin.category.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
