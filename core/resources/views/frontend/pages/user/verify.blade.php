@extends('frontend.layout.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2 mb-2">
                <div class="card-header">{{ __('Registration code') }}</div>
                <div class="card-body">
                    <form action="{{ route('frontend.verify') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Enter Registration Code') }}</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('registration_code') is-invalid @enderror" name="registration_code" value="{{ old('registration_code') }}" required autofocus>
                                @error('registration_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn--base w-100">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
