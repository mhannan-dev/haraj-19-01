@php
    if(isset($label)) {
        $for_id = preg_replace('/[^A-Za-z0-9\-]/', '', Str::lower($label));
    }
@endphp

<label for="{{ $for_id ?? "" }}">{{ $label ?? "" }}</label>

@if ($options)
    <div class="toggle-container">
        @php
            $first_item = array_values($options)[0];
        @endphp
        <div data-clickable="@if (isset($clickable) && $clickable == false){{ "false" }}@else {{ "true" }} @endif" class="switch-toggles {{ (isset($onload) && $onload == true) ? "btn-load" : "default" }} two
            @if (isset($value) && $value == $first_item)
                {{ "active" }}
            @endif
        ">
            <input type="hidden" name="{{ $name ?? "" }}" value="{{ $value ?? "" }}" {{ $attribute ?? "" }}
                @if (isset($data_target))
                    data-target="{{ $data_target }}"
                @endif
            >
            @foreach ($options as $item => $value)
                <span class="switch {{ (isset($onload) && $onload == true) ? "btn-loading event-ready" : "" }}" data-value="{{ $value }}">{{ $item }}</span>
            @endforeach
        </div>
    </div>
@endif
