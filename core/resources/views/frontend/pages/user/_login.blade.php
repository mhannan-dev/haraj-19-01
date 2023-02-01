@extends('frontend.layout.main')
@section('content')
<section class="sell-section pt-30">
    <div class="container">
        <h1 class="sell-header-title pb-10">@lang('Login')</h1>
        <div class="row justify-content-center mb-30">
            <div class="col-xl-6 mb-30">
                    <form action="{{ route('frontend.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">@lang('Email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="@lang('Email ID')">
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">@lang('Password')</label>
                            <input type="password" name="password" class="form-control" placeholder="@lang('Password')">
                          </div>
                          <button type="submit" class="btn--base">@lang('Login')</button>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
