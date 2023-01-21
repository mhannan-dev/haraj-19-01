@csrf
<div class="row">
    <div class="col-6 mb-2">
        <label>@lang('Select Category') @include('admin.partials._utils')</label>
        <select name="category_id"
            class="form-control form--control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
            <option value="">@lang('Select Category')</option>
            @foreach (\App\Models\Category::active()->where('parent_id', 0)->get() as $category)
                <option value="{{ $category->id }}" @if (isset($row->category_id) && $row->category_id == $category->id) selected="" @endif>
                    {{ $category->title }}
                </option>
                @if (!empty($category['subCategories']))
                    @foreach ($category['subCategories'] as $sub_category)
                        <option value="{{ $sub_category['id'] }}" {{ $sub_category['id'] == $category['id'] ? selected : '' }}>
                            &nbsp; &#8594;{{ $sub_category['title'] }}
                        </option>
                    @endforeach
                @endif
            @endforeach
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
<a href="{{ route('admin.category-item.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
