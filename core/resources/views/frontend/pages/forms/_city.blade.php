<select class="form--control" name="city_id" id="city_id">
    <option value="">@lang('Select')</option>
    @foreach (\DB::table('cities')->where('status', 1)->get() as $city)
        <option value="{{ $city->id }}" >
            {{ $city->title }}
        </option>
    @endforeach
</select>
