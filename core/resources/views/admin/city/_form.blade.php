@csrf
<div class="row">
    <div class="col-6 mb-2">
        <label for="country_id">@lang('Default Country')</label>
        <select name="country_id" class="form-control form--control {{ $errors->has('country_id') ? 'is-invalid' : '' }}">
            <option value="1" selected>
                @lang('Afghanistan')
            </option>
        </select>
    </div>
    <div class="col-6 mb-2">
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
<a href="{{ route('admin.city.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
