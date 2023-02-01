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
@push('script')
<script>
    var $swiperSelector = $('.swiper-container');

    $swiperSelector.each(function (index) {
        var $this = $(this);
        $this.addClass('swiper-slider-' + index);

        var dragSize = $this.data('drag-size') ? $this.data('drag-size') : 50;
        var freeMode = $this.data('free-mode') ? $this.data('free-mode') : false;
        var loop = $this.data('loop') ? $this.data('loop') : false;
        var slidesDesktop = $this.data('slides-desktop') ? $this.data('slides-desktop') : 8;
        var slidesTablet = $this.data('slides-tablet') ? $this.data('slides-tablet') : 6;
        var slidesMobile = $this.data('slides-mobile') ? $this.data('slides-mobile') : 5;
        var spaceBetween = $this.data('space-between') ? $this.data('space-between') : 20;

        var swiper = new Swiper('.swiper-slider-' + index, {
            direction: 'horizontal',
            loop: loop,
            freeMode: freeMode,
            spaceBetween: spaceBetween,
            breakpoints: {
                1920: {
                    slidesPerView: slidesDesktop
                },
                992: {
                    slidesPerView: slidesTablet
                },
                575: {
                    slidesPerView: slidesMobile
                }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
        });
    });
</script>
@endpush
