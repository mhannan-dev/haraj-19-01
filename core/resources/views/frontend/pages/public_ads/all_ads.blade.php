@extends('frontend.layout.main')
@push('custom_css')
    <style>
        .product-single-item .product-wishlist {
            position: absolute;
            top: 8px;
            right: -210px;
            z-index: 9;
        }
    </style>
@endpush
@section('content')
    <section class="product-section overflow-hidden pt-30">
        <div class="container">
            <div class="short-by-top-area">
                <div class="nice-filter-item">
                    <div class="icon-area">
                        <a href="{{ url('/') }}"><i class="fas fa-sliders-h"></i></a>
                    </div>
                    <div class="nice-filter-item-select-area two me-2">
                        <select name="category" id="category">
                            <option value="">@lang('Select Category')</option>
                            @foreach (\DB::table('categories')->select('id', 'title')->where('parent_id', 0)->get() as $item)
                                <option value="{{ $item->id }}" @if (isset($_GET['category']) && $_GET['category'] != null) selected="" @endif>
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="nice-filter-item-select-area me-2">
                        <select class="form--control" name="city_id" id="city_id">
                            <option value="">@lang('Select')</option>
                            @foreach (\DB::table('cities')->where('status', 1)->get() as $city)
                                <option value="{{ $city->id }}" @if (isset($_GET['city_id']) && $_GET['city_id'] != null) selected="" @endif>
                                    {{ $city->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nice-filter-item-select-area">
                        <select name="sort_by" id="sort">
                            <option value="">Sort</option>
                            <option value="highest_price_wise_ads" @if (isset($_GET['sort']) && $_GET['sort'] == 'highest_price_wise_ads') selected="" @endif>
                                Price: High to Low</option>
                            <option value="lowest_price_wise_ads" @if (isset($_GET['sort']) && $_GET['sort'] == 'lowest_price_wise_ads') selected="" @endif>
                                Price: Low to High</option>
                            <option value="latest_ads" @if (isset($_GET['sort']) && $_GET['sort'] == 'latest_ads') selected="" @endif>Latest</option>
                            <option value="oldest_ads" @if (isset($_GET['sort']) && $_GET['sort'] == 'oldest_ads') selected="" @endif>Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-30-none">
                <div class="col-xl-12 mb-30">
                    <div class="row justify-content-center" id="ajax_prd_listing">
                        @forelse ($all_ads as $item)
                            <input type="hidden" id="item_id" value="{{ $item->id }}">
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20">
                                <div class="product-single-item">
                                    {{-- @guest
                                        <a class="product-wishlist float-end"
                                            href="{{ route('frontend.user.favourite', $item->id) }}">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                                    <path
                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    @endguest
                                        <a class="product-wishlist float-end"
                                            href="{{ route('frontend.user.favourite', $item->id) }}">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                                    <path
                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                            @endif --}}

                            {{-- @endif --}}

                            <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                <div class="thumb">
                                    <img src="{{ URL::asset('core/public/storage/image/' . $item->image) }}" alt="product">
                                </div>
                                <div class="content">
                                    <span class="sub-title">{{ $item->city->title }}</span>
                                    <h5 class="title">{{ $item->title }}</h5>
                                    <span class="inner-sub-title">{{ $item->category->title }}</span>
                                    <h5 class="inner-title">{{ $item->price }} TL</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    @lang('No ad found')
                    @endforelse
                    <div class="d-flex justify-content-center">
                        <?php echo e(paginateLinks($all_ads)); ?>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
        <div class="brand-section pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-header">
                            <h3 class="section-title">@lang('Browse by city')</h3>
                        </div>
                    </div>
                </div>
                <ul class="brand-wrapper two">
                    @foreach ($all_city as $item)
                        <li>
                            <a href="{{ route('frontend.ads.cityWise', $item->id) }}">
                                <div class="brand-item">
                                    <span>{{ $item->title }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endsection
@section('scripts')
    <script>
        $('#category').on('change', function() {
            let category = $(this).val();
            let city_id = $(this).val();
            let item_id = $(this).val();
            $.ajax({
                url: "{{ route('frontend.sort') }}",
                type: "GET",
                data: {
                    'category': category,
                    'city_id': city_id
                },
                success: function(data) {
                    var item = data.all_ads;
                    var html = '';
                    if (item.length > 0) {
                        for (let i = 0; i < item.length; i++) {
                            var id = item[i]['id'];
                            var slug = item[i]['slug'];
                            openPage = function() {
                                location.href = "{{ url('ads/details') }}/" + slug + "/" + id;
                            }
                            html +=
                                '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20">\
                                                                                        <div class="product-single-item">\
                                                                                            <a href="javascript:openPage()">\
                                                                                                <div class="product-wishlist">\
                                                                                                    <span>\
                                                                                                        <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">\
                                                                                                            <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z"></path>\</svg>\
                                                                                                    </span>\
                                                                                                </div>\
                                                                                                <div class="thumb">\
                                                                                                    <img src="core/public/storage/image/' +
                                item[i]['image'] +
                                ' " alt="product">\
                                                                                                </div>\
                                                                                                <div class="content">\
                                                                                                    <span class="sub-title">' +
                                item[i]
                                [
                                    'city'
                                ]
                                [
                                    'title'
                                ] + '</span>\
                                                                                                    <h5 class="title">' +
                                item[
                                    i][
                                    'title'
                                ] +
                                '</h5>\
                                                                                                    <span class="inner-sub-title">' +
                                item[
                                    i][
                                    'category'
                                ][
                                    'title'
                                ] +
                                '</span>\
                                                                                                    <h5 class="inner-title">' +
                                item[i]
                                [
                                    'price'
                                ] + ' TL</h5>\
                                                                                                </div>\
                                                                                            </a>\
                                                                                        </div>\
                                                                                    </div>';
                        }
                    } else {
                        html +=
                            '<div id="load_more" class="load-more-btn text-center mt-60"><button type="button" name="load_more_button" class="btn--base">No Data Found</button></div>';
                    }
                    $('#ajax_prd_listing').html(html);
                }
            });
        });
    </script>
    <script>
        $('#city_id').on('change', function() {
            let city_id = $(this).val();
            $.ajax({
                url: "{{ route('frontend.sort') }}",
                type: "GET",
                data: {
                    'city_id': city_id
                },
                success: function(data) {
                    var item = data.all_ads;
                    var html = '';
                    if (item.length > 0) {
                        for (let i = 0; i < item.length; i++) {
                            var id = item[i]['id'];
                            var slug = item[i]['slug'];
                            openPage = function() {
                                location.href = "{{ url('ads/details') }}/" + slug + "/" + id;
                            }
                            html +=
                                '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20">\
                                                                                        <div class="product-single-item">\
                                                                                            <a href="javascript:openPage()">\
                                                                                                <div class="product-wishlist">\
                                                                                                    <span>\
                                                                                                        <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">\
                                                                                                            <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z"></path>\</svg>\
                                                                                                    </span>\
                                                                                                </div>\
                                                                                                <div class="thumb">\
                                                                                                    <img src="core/public/storage/image/' +
                                item[i]
                                [
                                    'image'
                                ] +
                                ' " alt="product">\
                                                                                                </div>\
                                                                                                <div class="content">\
                                                                                                    <span class="sub-title">' +
                                item[i]
                                [
                                    'city'
                                ]
                                [
                                    'title'
                                ] + '</span>\
                                                                                                    <h5 class="title">' +
                                item[
                                    i][
                                    'title'
                                ] +
                                '</h5>\
                                                                                                    <span class="inner-sub-title">' +
                                item[
                                    i][
                                    'category'
                                ][
                                    'title'
                                ] +
                                '</span>\
                                                                                                    <h5 class="inner-title">' +
                                item[i]
                                [
                                    'price'
                                ] + ' TL</h5>\
                                                                                                </div>\
                                                                                            </a>\
                                                                                        </div>\
                                                                                    </div>';
                        }
                    } else {
                        html +=
                            '<div id="load_more" class="load-more-btn text-center mt-60"><button type="button" name="load_more_button" class="btn--base">No Data Found</button></div>';
                    }
                    $('#ajax_prd_listing').html(html);
                }
            });
        });
    </script>
    <script>
        $('#sort').on('change', function() {
            let sort = $(this).val();
            $.ajax({
                url: "{{ route('frontend.sort') }}",
                type: "GET",
                data: {
                    'sort': sort
                },
                success: function(data) {
                    var item = data.all_ads;
                    var html = '';
                    if (item.length > 0) {
                        for (let i = 0; i < item.length; i++) {
                            var id = item[i]['id'];
                            var slug = item[i]['slug'];
                            openPage = function() {
                                location.href = "{{ url('ads/details') }}/" + slug + "/" + id;
                            }
                            html +=
                                '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20">\
                                                                                        <div class="product-single-item">\
                                                                                            <a href="javascript:openPage()">\
                                                                                                <div class="product-wishlist">\
                                                                                                    <span>\
                                                                                                        <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">\
                                                                                                            <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z"></path>\</svg>\
                                                                                                    </span>\
                                                                                                </div>\
                                                                                                <div class="thumb">\
                                                                                                    <img src="core/public/storage/image/' +
                                item[i]
                                [
                                    'image'
                                ] +
                                ' " alt="product">\
                                                                                                </div>\
                                                                                                <div class="content">\
                                                                                                    <span class="sub-title">' +
                                item[i]
                                [
                                    'city'
                                ]
                                [
                                    'title'
                                ] + '</span>\
                                                                                                    <h5 class="title">' +
                                item[
                                    i][
                                    'title'
                                ] +
                                '</h5>\
                                                                                                    <span class="inner-sub-title">' +
                                item[
                                    i][
                                    'category'
                                ][
                                    'title'
                                ] +
                                '</span>\
                                                                                                    <h5 class="inner-title">' +
                                item[i]
                                [
                                    'price'
                                ] + ' TL</h5>\
                                                                                                </div>\
                                                                                            </a>\
                                                                                        </div>\
                                                                                    </div>';
                        }
                    } else {
                        html +=
                            '<div id="load_more" class="load-more-btn text-center mt-60"><button type="button" name="load_more_button" class="btn--base">No Data Found</button></div>';
                    }
                    $('#ajax_prd_listing').html(html);
                }
            });
        });
    </script>
@endsection
