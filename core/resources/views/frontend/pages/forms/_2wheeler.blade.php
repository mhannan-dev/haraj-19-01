<div class="sell-add-info-body-wrapper">
    <div class="form-group col-8">
        <label>@lang('Condition ')</label>
        <select class="form--control" name="condition">
            <option value="">@lang('Select')</option>
            <option value="new">@lang('New')</option>
            <option value="used">@lang('Used')</option>
            <option value="like new">@lang('Like new')</option>
            <option value="reconditon">@lang('Reconditioned')</option>
        </select>
    </div>

    <div class="form-group col-8">
        <label>@lang('Authenticity')</label>
        <select name="authenticity" class="form--control">
            <option value="">@lang('Select')</option>
            <option value="Original">@lang('Original')</option>
            <option value="Refurbished">@lang('Refurbished')</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Edition ')</label>
        <input type="text" name="edition" class="form--control" placeholder="@lang('Edition ')"
            value="{{ old('edition') }}">
    </div>
    <div class="form-group col-8">
        <label>@lang('Color ')</label>
        <select class="form--control" name="color">
            <option value="">@lang('Color ')</option>
            <option value="light-grey">@lang('Light grey')</option>
            <option value="light-blue">@lang('Light blue')</option>
            <option value="light-green">@lang('Light green')</option>
            <option value="beige">@lang('Beige')</option>
            <option value="white">@lang('White')</option>
            <option value="burgundy">@lang('Burgundy')</option>
            <option value="brown">@lang('Brown')</option>
            <option value="red">@lang('Red')</option>
            <option value="dark-grey">@lang('Dark grey')</option>
            <option value="dark-blue">@lang('Dark blue')</option>
            <option value="dark-green">@lang('Dark green')</option>
            <option value="yellow">@lang('Yellow')</option>
            <option value="black">@lang('Black')</option>
            <option value="other">@lang('Other')</option>
        </select>
    </div>
</div>
