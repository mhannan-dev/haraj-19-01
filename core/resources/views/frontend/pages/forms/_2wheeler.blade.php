<div class="sell-add-info-body-wrapper">
    <div class="form-group col-8">
        <label>Condition</label>
        <select name="condition" class="form--control">
            <option value="">@lang('Select')</option>
            <option value="used">Used</option>
            <option value="new">New</option>
            <option value="like new">Like New</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>Authenticity</label>
        <select name="authenticity" class="form--control">
            <option value="">@lang('Select')</option>
            <option value="Original">Original</option>
            <option value="Refurbished">Refurbished</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>@lang('Edition ')</label>
       <input type="text" name="edition" class="form--control" placeholder="@lang('Edition ')" value="{{ old('edition') }}">
    </div>
    <div class="form-group col-8">
        <label>@lang("Color ")</label>
        <select class="form--control" name="color">
            <option value="">@lang('Color ')</option>
            <option value="light-grey">Light grey</option>
            <option value="light-blue">Light blue</option>
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
</div>
