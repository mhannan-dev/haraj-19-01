@extends('admin.layout.master')
@section('title')
    @lang('Update Advertiser')
@endsection
@section('page-name')
    @lang('Update Advertiser')
@endsection
@section('content')
    @include('admin.advertisers._breadcrumb')
    <form action="{{ route('admin.advertiser.update', $row['id']) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-4 mb-2">
                <label for="first_name">@lang('First Name')<span class="text-danger">*</span></label>
                <input type="text" name="first_name"
                    class="form-control form--control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                    placeholder="@lang('Name')" value="{{ @old('first_name', $row['first_name']) }}">
                @if ($errors->has('first_name'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-4 mb-2">
                <label for="title">@lang('First Name')<span class="text-danger">*</span></label>
                <input type="text" name="last_name"
                    class="form-control form--control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                    placeholder="@lang('Name')" value="{{ @old('last_name', $row['last_name']) }}">
                @if ($errors->has('last_name'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-4 mb-2">
                <label for="mobile_no">@lang('Mobile no')<span class="text-danger">*</span></label>
                <input type="text" name="mobile_no"
                    class="form-control form--control {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}"
                    placeholder="@lang('Name')" value="{{ @old('mobile_no', $row['mobile_no']) }}">
                @if ($errors->has('mobile_no'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('mobile_no') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-4 mb-2">
                <label for="title">@lang('Designation')</label>
                <input type="text" name="designation"
                    class="form-control form--control {{ $errors->has('designation') ? 'is-invalid' : '' }}"
                    placeholder="Designation" value="{{ @old('designation', $row['designation']) }}">
                @if ($errors->has('designation'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('designation') }}</strong>
                    </div>
                @endif
            </div>

        </div>
        <a href="{{ route('admin.advertiser.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
        <button type="submit" class="btn btn--base">{{ $buttonText }}</button>
    </form>
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
