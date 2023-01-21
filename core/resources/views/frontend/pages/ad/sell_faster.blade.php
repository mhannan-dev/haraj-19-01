@extends('frontend.layout.main')
@section('content')
<section class="success-view-section pt-30">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-8 mb-30">
                <div class="success-view-card-area">
                    <div class="success-view-thumb">
                        <img src="{{ URL::asset('assets/frontend/images/icon/success.png') }}" alt="thumb">
                    </div>
                    <div class="success-view-title-area">
                        <h3 class="title">@lang('Your Ad has been uploaded successfully!')</h3>
                        <span class="sub-title">@lang('Your Ad will soon be reachable to ')<b>@lang('milions')</b> @lang('of buyers')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sell-faster-section pt-20 pb-30">
    <div class="container">
        <div class="sell-faster-card-wrapper">
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-8 mb-30">
                    <form action="{{ route('frontend.user.sellFaster') }}" method="post">
                        @csrf
                        <div class="sell-faster-card">
                            <div class="sell-faster-card-header-area">
                                <h3 class="title">@lang('FEATURE AD')</h3>
                            </div>
                            <div class="sell-faster-card-item-area">
                                @foreach ($feature_ad_types as $item)
                                <div class="sell-faster-card-item-radio-wrapper">
                                    <input type="hidden" name="advertisement_id" value="{{ $advertisement_id }}">
                                    <div class="radio-item">
                                        <input type="radio" id="ad_type_id_{{$item->id}}" name="ad_type_id" value="{{ $item->id}}">
                                        <label for="ad_type_id_{{$item->id}}">
                                            <h4 class="title">{{ $item->title }}</h4>
                                            <span class="price-area">{{ $currency->currency_code }} {{ $item->price }}</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="sell-faster-card-btn-area pt-20">
                                <a class="title" href="{{ url('/') }}">@lang('Skip, View Your Ad')</a>
                                <button class="btn--base" type="submit">@lang('Proceed to Pay')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
