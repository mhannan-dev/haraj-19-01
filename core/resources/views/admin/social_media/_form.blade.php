@csrf
<div class="row">
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
    <div class="col-6 mb-2">
        <label for="icon">@lang('Social Icon')<span class="text-danger">*</span></label>
        <input type="text" name="icon"
            class="form-control form--control {{ $errors->has('icon') ? 'is-invalid' : '' }}"
            placeholder="@lang('Icon')" value="{{ @old('icon', $row['icon']) }}">
        @if ($errors->has('icon'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('icon') }}</strong>
            </div>
        @endif
    </div>
    <div class="col-12 mb-2">
        <label for="icon">@lang('Social link')<span class="text-danger">*</span></label>
        <input type="text" name="social_link"
            class="form-control form--control {{ $errors->has('social_link') ? 'is-invalid' : '' }}"
            placeholder="@lang('Social Link')" value="{{ @old('social_link', $row['social_link']) }}">
        @if ($errors->has('social_link'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('social_link') }}</strong>
            </div>
        @endif
    </div>

</div>
<a href="{{ route('admin.setting.social.media.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
