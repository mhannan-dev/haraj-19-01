<style>
    #wheels {
        display: none;
    }
</style>
<style>
    .kyc-form .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .kyc-form select {
        padding: 10px 14px;
    }

    .kyc-form .kyc-cross-btn {
        background-color: #ea5455;
        color: #ffffff !important;
        padding: 13px 20px;
    }
</style>
@csrf
<div class="row">
    <div class="col-4 mb-2">
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
    <div class="col-4 mb-2">
        <label for="parent_id">@lang('Category Level')</label>
        <select name="parent_id" class="form-control form--control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}">
            <option value="0">@lang('Main Category')</option>
            @foreach (\App\Models\Category::active()->parent()->get() as $category)
                <option value="{{ $category->id }}" @if (isset($row->parent_id) && $row->parent_id == $category->id) selected="" @endif>
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-4 mb-2">
        <label for="parent_id">@lang('Background Color')</label>
        <input type="color" name="bg_color" value="{{ @old('bg_color', $row['bg_color']) }}"
            class="form-control form--control">
    </div>
    <div class="col-4 mb-2">
        <label for="icon">@lang('Icon')</label>
        <input type="input" name="icon" value="{{ @old('icon', $row['icon']) }}" class="form-control form--control"
            placeholder="@lang('E.g. las la-asterisk')">
    </div>
    <div class="col-4 mb-2">
        <label for="category_type">@lang('Category Type') <span class="text-danger">*</span></label>
        <select id="graph_select" name="category_type"
            class="form-control form--control {{ $errors->has('category_type') ? 'is-invalid' : '' }}">
            <option value="">--@lang('Select')--</option>
            @foreach ($category_type as $c_type)
                <option value="{{ $c_type->id }}" @if (isset($row->category_type_id) && $row->category_type_id == $c_type->id) selected="" @endif>
                    {{ $c_type->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4 mb-2" id="wheels">
        <label for="wheels">@lang('Wheels') <span class="text-primary">Select it for Child</span></label>
        <select name="wheels" class="form-control form--control">
            <option value="">--@lang('Select')--</option>
            <option value="1" @if (isset($row->wheels) && $row->wheels == 1) selected="" @endif>One</option>
            <option value="2" @if (isset($row->wheels) && $row->wheels == 2) selected="" @endif>Two</option>
            <option value="3" @if (isset($row->wheels) && $row->wheels == 3) selected="" @endif>Three + </option>
            <option value="4" @if (isset($row->wheels) && $row->wheels == 4) selected="" @endif>Four or More</option>
        </select>
    </div>
    <div class="col-4 mb-2">
        <label for="image">@lang('Image') <span class="text-primary">@lang('Select it for Child cateogry')</span></label>
        <input type="file" name="image" class="form--control" accept="image/*">
    </div>
</div>
<hr>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
<a href="{{ route('admin.category.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
