@extends('frontend.layout.main')
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <h3> {{ $categoryDetails['catDetails']['description'] }} <small class="pull-right text-success">
                    {{ count($all_ads) }} @lang('ad available') </small></h3>
        </div>
    </div>
    <section class="product-section overflow-hidden pt-30">
        <div class="container">
            <div class="row mb-30-none mb-2">
                <div class="col-xl-12 mb-30">
                    <div class="row justify-content-center mb-20-none">

                        @forelse ($all_ads as $item)
                            @php
                                $advertiser = Auth::guard('advertiser')->user();
                                if ($advertiser) {
                                    $checkFavourite = DB::table('advertisement_advertiser')
                                        ->where('advertiser_id', $advertiser->id)
                                        ->where('advertisement_id', $item->id)
                                        ->first();
                                    // dd($checkFavourite);
                                    if ($checkFavourite != null) {
                                        $color = 'red';
                                    } else {
                                        $color = '';
                                    }
                                } else {
                                    $color = '';
                                }
                            @endphp
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20">
                                <div class="product-single-item">
                                    <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                        <div class="product-wishlist">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    class="sc-AxjAm dJbVhz" style="fill:{{ $color }}">
                                                    <path
                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="thumb">
                                            <img src="{{ URL::asset('core/public/storage/image/' . $item->image) }}"
                                                alt="product">
                                        </div>
                                        <div class="content">
                                            <span class="sub-title">{{ $item->city->title }}</span>
                                            <h5 class="title">{{ $item->title }}</h5>
                                            <span class="inner-sub-title">{{ $item->category->title }}</span>
                                            <h5 class="inner-title">{{ $item->price }} {{ $currency->currency_code }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            @lang('No ad found')
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center">
                        {{-- {{ paginateLinks($all_ads) }} --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
