@csrf
<div class="row">
    <div class="col-12 mb-2">
        <label for="title">@lang('Name') @include('admin.partials._utils')</label>
        <input id="category_name" type="text" name="title"
            class="form-control form--control {{ $errors->has('title') ? 'is-invalid' : '' }}"
            placeholder="@lang('Name')" value="{{ @old('title', $row['title']) }}">
        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>
    <div class="col-6 mb-2">
        <label for="price">@lang('Amount') @include('admin.partials._utils')</label>
        <input id="price" type="text" name="price"
            class="form-control form--control {{ $errors->has('price') ? 'is-invalid' : '' }}"
            placeholder="@lang('Amount')" value="{{ @old('price', $row['price']) }}">
        @if ($errors->has('price'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('price') }}</strong>
            </div>
        @endif
    </div>

    <div class="col-6 mb-2">
        <label for="duration_hours">@lang('Hours') @include('admin.partials._utils')</label>
        <input id="duration_hours" name="duration_hours" class="form-control form--control" type="number"
            value="{{ @old('duration_hours', $row['duration_hours']) }}" />
        @if ($errors->has('duration_hours'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('duration_hours') }}</strong>
            </div>
        @endif
    </div>
</div>
<a href="{{ route('admin.type.index') }}" class="btn btn--base bg--danger">Cancel</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
