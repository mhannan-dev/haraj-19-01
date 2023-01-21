<section class="category-section pt-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 text-center">
                <div class="section-header">
                    <h2 class="section-title">@lang('Buy and sell secondhand and find great deals')!</h2>
                </div>
            </div>
        </div>
        <div class="slider category-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($main_category as $item)
                        <div class="swiper-slide">
                            <div class="category-item">
                                <a href="{{ route('frontend.ads.categorywise', $item->id) }}">
                                    <div class="icon"
                                        style="background-color:{{ $item ? $item->bg_color : '' }}!important";>
                                        {!! $item->icon !!}
                                    </div>
                                    <div class="content">
                                        <span>{!! $item->title !!}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev">
                    <i class="las la-angle-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="las la-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>
