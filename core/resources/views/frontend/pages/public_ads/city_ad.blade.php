@extends('frontend.layout.main')
@section('content')
    <section class="product-section pt-30 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-header-wrapper">
                        <div class="section-header">
                            <h3 class="section-title">@lang('Selected for you')</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-20-none">
                @forelse ($ads as $item)
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
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                        <div class="product-single-item">
                            <div class="product-wishlist">
                                <a class="fav-select" data-ad_id="{{ $item->id }}" href="javascript:void(0)">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                            class="sc-AxjAm dJbVhz fav-icon" style="fill:{{ $color }}">
                                            <path
                                                d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                <div class="thumb">
                                    <img src="{{ asset('core/storage/app/public/advertisement_images/' . $item->image) }}"
                                        alt="product">
                                </div>
                                <div class="content">
                                    <span class="sub-title">{{ $item->city->title }}</span>
                                    <h5 class="title">{{ $item->title }}</h5>
                                    <span class="inner-sub-title">{{ $item->category->title }}</span>
                                    <h5 class="inner-title">{{ $item->price }} &nbsp;TL</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <p>@lang('No product found')</p>
                @endforelse
                <div class="d-flex justify-content-center">
                    <?php echo e(paginateLinks($ads)); ?>
                </div>
            </div>
        </div>
    </section>

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Brand
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    @if (count($cities) != 0)
        <div class="brand-section pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-header">
                            <h3 class="section-title">Browse by city</h3>
                        </div>
                    </div>
                </div>
                <ul class="brand-wrapper two">
                    @foreach ($cities as $city)
                        <li>
                            <a href="{{ route('frontend.ads.cityWise', $city->id) }}">
                                <div class="brand-item">
                                    <span>{{ $city->title }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            End Brand
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection
