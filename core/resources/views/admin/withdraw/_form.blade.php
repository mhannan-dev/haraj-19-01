@csrf
<div class="card-body">
    <div class="payment-method-item">
        <div class="payment-method-header">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-upload style-three">
                        <div class="thumb">
                            <div class="avatar-preview">
                                <div class="profilePicPreview bg_img"
                                    data-background="{{ getImage(imagePath()['withdraw']['method']['path'] . '/' . $method->image ?? ' ') }}">
                                    <button type="button" class="remove-image"><i class="fa fa-upload"></i></button>
                                </div>

                            </div>
                            <div class="avatar-edit">
                                <input type='file' class="profilePicUpload" name="image" id="whiteLogo"
                                    accept=".png, .jpg, .jpeg" />
                                <label for="whiteLogo"><i class="las la-upload"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control form--control" placeholder="@lang('Method Name')"
                            name="name" value="{{ @old('name', $method->name) }}" />
                    </div>

                </div>
            </div>
            <div class="content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="w-100">@lang('Currency') <span class="text-danger">*</span></label>
                            <select name="currencies[]" class="selectpicker" multiple data-selected-text-format
                                title='Choose one...' required>

                                @if (is_null($method->currencies))
                                    @foreach ($currencies as $curr)
                                        <option value="{{ $curr->id }}">
                                            {{ __($curr->currency_code) }}</option>
                                    @endforeach
                                @else
                                    @foreach ($currencies as $curr)
                                        <option value="{{ $curr->id }}"
                                            {{ in_array($curr->id, $method->currencies) ? 'selected' : ' ' }}>
                                            {{ __($curr->currency_code) }}</option>
                                    @endforeach
                                @endif


                            </select>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="w-100">@lang('Enable For') <span class="text-danger">*</span></label>
                            <select name="user_guards[]" class="selectpicker" multiple data-selected-text-format
                                title='Choose one...' required>
                                @if ($method->user_guards != null)
                                    <option value="1"
                                        {{ in_array(1, $method->user_guards) ? 'selected="true"' : '' }}>
                                        @lang('USER')</option>
                                    <option value="2"
                                        {{ in_array(2, $method->user_guards) ? 'selected="true"' : '' }}>
                                        @lang('AGENT')</option>
                                    <option value="3"
                                        {{ in_array(3, $method->user_guards) ? 'selected="true"' : '' }}>
                                        @lang('MERCHANT')</option>
                                @else
                                    <option value="1">
                                        @lang('USER')</option>
                                    <option value="2">
                                        @lang('AGENT')</option>
                                    <option value="3">
                                        @lang('MERCHANT')</option>
                                @endif
                            </select>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="payment-method-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card bg-info bg-gradient">
                        <div class="card-header">
                            @lang('Rage')
                        </div>
                        <div class="card-body bg--dark">
                            <label>@lang('Minimum Amount') <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form--control" name="min_limit"
                                    placeholder="0" value="{{ @old('name', $method->min_limit) }}">
                                <span class="input-group-text" id="basic-addon2">{{ __($general->cur_text) }}</span>
                            </div>
                            <label>@lang('Maximum Amount') <span class="text-danger">*</span></label>
                            <div class="input-group has_append">
                                <input type="text" class="form-control form--control" placeholder="0"
                                    name="max_limit" value="{{ @old('name', $method->max_limit) }}" />
                                <div class="input-group-text"> {{ __($general->cur_text) }} </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-info bg-gradient">
                        <div class="card-header">
                            @lang('Charge')
                        </div>
                        <div class="card-body bg--dark">
                            <label>@lang('Fixed charge') <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form--control" placeholder="0"
                                    name="fixed_charge" value="{{ @old('name', $method->fixed_charge) }}" />
                                <span class="input-group-text" id="basic-addon2">{{ __($general->cur_text) }}</span>
                            </div>
                            <label>@lang('Percent charge') <span class="text-danger">*</span></label>
                            <div class="input-group has_append">
                                <input type="text" class="form-control form--control" placeholder="0"
                                    name="percent_charge" value="{{ @old('name', $method->percent_charge) }}">
                                <div class="input-group-text"> {{ __($general->cur_text) }} </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card border--dark mt-4 mb-4">
                        <h5 class="card-header bg--dark text-white">@lang('Withdraw Instruction') </h5>
                        <div class="card-body bg--dark">
                            <textarea rows="5" class="form-control border-radius-5 nicEdit" name="instruction">{{ @old('name', $method->description) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('User data')
                            <div class="float-end">
                                <button type="button" class="btn btn-sm btn btn-info addUserData">
                                    <i class="la la-fw la-plus"></i>@lang('Add New')
                                </button>
                            </div>
                        </h5>
                        <div class="card-body">
                            <div class="row addedField">

                                @if ($method->user_data != null)
                                    @foreach ($method->user_data as $k => $v)
                                        <div class="col-md-12 user-data">
                                            <div class="form-group">
                                                <div class="input-group mb-md-0 mb-4">
                                                    <div class="col-md-4">
                                                        <input name="field_name[]" class="form-control"
                                                            type="text" value="{{ $v->field_level }}" required
                                                            placeholder="@lang('Field Name')">
                                                    </div>
                                                    <div class="col-md-3 mt-md-0 mt-2">
                                                        <select name="type[]" class="form-control">
                                                            <option value="text"
                                                                @if ($v->type == 'text') selected @endif>
                                                                @lang('Input Text')
                                                            </option>
                                                            <option value="textarea"
                                                                @if ($v->type == 'textarea') selected @endif>
                                                                @lang('Textarea')
                                                            </option>
                                                            <option value="file"
                                                                @if ($v->type == 'file') selected @endif>
                                                                @lang('File')
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mt-md-0 mt-2">
                                                        <select name="validation[]" class="form-control">
                                                            <option value="required"
                                                                @if ($v->validation == 'required') selected @endif>
                                                                @lang('Required') </option>
                                                            <option value="nullable"
                                                                @if ($v->validation == 'nullable') selected @endif>
                                                                @lang('Optional') </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 mt-md-0 mt-2 text-right">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn--danger btn-lg removeBtn w-100"
                                                                type="button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn--primary btn-block">{{ $buttonText }}</button>
</div>
