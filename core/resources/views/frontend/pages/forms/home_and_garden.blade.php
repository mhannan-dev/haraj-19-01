<div class="sell-add-info-body-wrapper">
    <div class="form-group col-8">
        <label>Condition<span class="text--danger">*</span></label>
        <select name="condition" class="form--control {{ $errors->has('condition') ? 'is-invalid' : '' }}">
            <option value="">@lang('Select')</option>
            <option value="used">Used</option>
            <option value="new">New</option>
            <option value="like new">Like New</option>
        </select>
    </div>

    <div class="form-group col-8">
        <label>Furnitue Type</label>
        <select class="form--control" name="color">
            <option value="">@lang('Select Type')</option>
            <option value="light-grey">@lang('Sofa & Divan')</option>
            <option value="TV Stands">@lang('TV Stands')</option>
            <option value="light-green">Light green</option>
            <option value="beige">Beige</option>
            <option value="white">White</option>
            <option value="burgundy">burgundy</option>
            <option value="brown">Brown</option>
            <option value="red">Red</option>
            <option value="dark-grey">Dark grey</option>
            <option value="dark-blue">Dark blue</option>
            <option value="dark-green">Dark green</option>
            <option value="yellow">Yellow</option>
            <option value="black">Black</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Model')</label>
        <input type="text" name="model" placeholder="@lang('Model')" value="{{ old('model') }}" class="form--control">
    </div>
</div>
