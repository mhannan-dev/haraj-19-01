@csrf
<div class="row">
    <div class="col-6 mb-2">
        <label for="category_id">Category<span class="text-danger">*</span></label>
        <select name="category_id"
            class="form-control form--control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
            <option value="">--Select--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if (isset($row) && $row->brand_id == $row['brand_id']) selected @endif>
                    {{ $category->title }}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('category_id') }}</strong>
            </div>
        @endif
    </div>

    <div class="col-6 mb-2">
        <label for="title">Brand Name<span class="text-danger">*</span></label>
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
<a href="{{ route('admin.brand.index') }}" class="btn btn--base bg--danger">Cancel</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
