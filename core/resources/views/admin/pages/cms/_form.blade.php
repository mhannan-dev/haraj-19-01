@csrf
<div class="row">
    <div class="col-4 mb-2">
        <label for="title">Page title <span class="text-danger">*</span></label>
        <input type="text" name="title"
            class="form-control form--control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Page name"
            value="{{ $cms['title'] }}">
        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>

    <div class="col-4 mb-2">
        <label for="meta_title">Meta title <small>For SEO</small> @include('admin.partials._utils')</label>
        <input type="text" value="{{ @old('meta_title', $cms['meta_title']) }}" name="meta_title"
            class="form-control form--control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}"
            placeholder="Page meta title">
        @if ($errors->has('meta_title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('meta_title') }}</strong>
            </div>
        @endif
    </div>
    <div class="col-4 mb-2">
        <label for="meta_title">Position  @include('admin.partials._utils')</label>
        <select class="form--control" name="position">
            <option value="">@lang('Select Position')</option>
            <option value="1">@lang('Main Footer Column One')</option>
            <option value="2">@lang('Main Footer Column Two')</option>
            <option value="3">@lang('Small Footer')</option>
            <option value="4">@lang('Help')</option>
        </select>
    </div>
</div>

<div class="col mb-2">
    <label for="description">Description  @include('admin.partials._utils')</label>
    <textarea id="description" rows="" class="form-control form--control nicEdit {{ $errors->has('description') ? 'is-invalid' : '' }}"
        name="description">{{ @old('description', $cms['description']) }}</textarea>
    @if ($errors->has('description'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </div>
    @endif
</div>
<div class="col mb-2">
    <label for="meta_description">Meta Description</label>
    <textarea id="postBody" class="form-control form--control nicEdit {{ $errors->has('meta_description') ? 'is-invalid' : '' }}"
        name="meta_description">{{ @old('meta_description', $cms['meta_description']) }}</textarea>
    @if ($errors->has('meta_description'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('meta_description') }}</strong>
        </div>
    @endif
</div>
<a href="{{ route('admin.cms.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
