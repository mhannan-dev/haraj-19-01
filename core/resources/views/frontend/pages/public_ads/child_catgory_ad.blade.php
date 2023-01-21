@extends('frontend.layout.main')
@section('content')
    <section class="product-section pt-30 pb-80">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-section pt-30">
                    <div class="container">
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="#"><i class="las la-angle-right"></i> <span class="category-title">All Category</span> </a>
                            </li>
                        </ul>
                        <div class="product-filter-btn-wrapper">
                            <h3 class="title category-title">All Category</h3>
                            <button class="product-filter-btn-r"><i class="las la-filter"></i></button>

                        </div>
                    </div>
                </div>
            </div>
            <section class="product-section overflow-hidden pt-30">
                <div class="container">
                    <div class="short-by-top-area">
                        <div class="nice-filter-item">
                            <div class="icon-area">
                                <a href="index.html"><i class="fas fa-sliders-h"></i></a>
                            </div>
                            <div class="nice-filter-item-select-area two me-2">
                                <input type="hidden" name="latitude">
                                <input type="hidden" name="longitude">
                                <select class="category" name="category">
                                    <option value="all_category">All Category</option>
                                    @foreach($category as $key => $cat)
                                    <option value="{{ $cat->id }}"  data-category_title="{{ $cat->title }}">{{ $cat->title }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="nice-filter-item-select-area1 two me-2">

                                <i class="fas fa-mobile-alt"></i>

                                <select class="active sub-category" name="sub_category">
                                    <option value="">No Sub Category Available</option>
                                </select>

                            </div>
                            <div class="nice-filter-item-select-area two me-2">
                                <select class="brand" name="brand">
                                    <option value="1">No Brand Aviliable</option>

                                </select>
                            </div>
                            {{-- <div class="nice-filter-item-select-area">
                                <select>
                                    <option value="1">Model</option>
                                    <option value="2">1 Demo</option>
                                    <option value="3">2 Demo</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row mb-30-none">
                        <div class="col-xl-12 mb-30">
                            <div class="short-by-area">
                                <div class="short-by-wrapper">
                                   @php
                                    $info = json_decode(json_encode(getIpInfo()), true);
                                     $country = @implode(',', $info['country']);
                                    @endphp
                                    <div class="title"><span class="total">0</span> ads in <b><span>{{ $country != "" ? $country: "Demo Country" }}</span></b></div>

                                    <div class="short-by-select-area">
                                        <div class="title overflow-hidden"><b>SORT</b> by : </div>
                                        <select class="nice-select sort_by"  name="sort_by">
                                            <option value="releace_date">Release Date</option>
                                            <option value="low_price">Price: Low to High</option>
                                            <option value="high_price">Price: High to Low</option>
                                            <option value="location_distance">by distance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="location-area">
                                <div class="location-wrapper">
                                    <div class="left">
                                        <div class="icon-area">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="title-area">
                                            <h5 class="title">See deals near you</h5>
                                            <p>Do you want to see listings near you?</p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="allow-btn">
                                            @php
                                                $allowType = session()->get('allow_type');

                                            @endphp
                                            @if($allowType == "allow")
                                            <a href="javascript:void(0)" class="btn--base active allow"><span class="allowType">Disallow</span></a>
                                            @else
                                            <a href="javascript:void(0)" class="btn--base active allow"><span class="allowType">Allow</span></a>
                                            @endif



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-20-none ads">
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



                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20 ads">
                                            <div class="product-single-item active">

                                                    <div class="product-wishlist">
                                                        <a class="fav-select" data-ad_id="{{ $item->id }}"
                                                            href="javascript:void(0)">
                                                            <span>
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    class="sc-AxjAm dJbVhz fav-icon"
                                                                    style="fill:{{ $color }}">
                                                                    <path
                                                                        d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <a href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                                    <div class="product-thumb-slider">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <div class="thumb">
                                                                    <img src="{{ asset('core/storage/app/public/advertisement_images/' . $item->image) }}" alt="product">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="swiper-pagination"></div>
                                                        <div class="slider-nav-area">
                                                            <div class="slider-prev slider-nav">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z"></path></svg>
                                                            </div>
                                                            <div class="slider-next slider-nav">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z"></path></svg>
                                                            </div>
                                                        </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <div class="d-flex justify-content-center paginate pagination">
                {{  $ads->links() }}
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

    @auth('advertiser')
     @php
      $advertiser = Auth::guard('advertiser')->user()->id;
     @endphp
     @else
       @php
           $advertiser = null;
       @endphp

    @endauth



    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Brand
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection

@push('script')
<script>
     var glovalAdvertiser = "{{ $advertiser }}"

    $(document).ready(function () {

        getSubcategory();
        categoryTitle();
        getBrand();
        if(glovalAdvertiser !='' ||  glovalAdvertiser != null){
            getFavRecord();
        }
        getLocation();
        showPosition();



    });
    $('.category').on('change', function () {
         $(document).on('click', '.pagination  a', function(event){
	        event.preventDefault();
	        var page = $(this).attr('href').split('page=')[1];
	        getAdsByCategory(page);

	    });
        getSubcategory();
        categoryTitle();
        getBrand();
        getAdsByCategory();

    });
    $('.sub-category').on('change', function () {
        $(document).on('click', '.pagination  a', function(event){
	        event.preventDefault();
	        var page = $(this).attr('href').split('page=')[1];
            getAdsBySubCategory(page);
	    });
        categoryTitle();
        getBrand();
        getAdsBySubCategory();
    });
    $('.brand').on('change', function () {
        $(document).on('click', '.pagination  a', function(event){
	        event.preventDefault();
	        var page = $(this).attr('href').split('page=')[1];
            getAdsByBrands(page);
	    });
        categoryTitle();
        getAdsByBrands();
    });
    $('.sort_by').on('change', function () {
        categoryTitle();
        sortBy();

    });
    $('.allow').on('click', function () {

        allow();

    });

    function categoryTitle(){
        var categoryTitle = acceptVar().categoryTitle;
        $('.category-title').text(categoryTitle);
    }

    function getSubcategory(){
            var categoryId = acceptVar().categorySelect;
            $(".sub-category").html('');
            $.ajax({
                url: "{{route('frontend.ads.fetch.subcategory')}}",
                type: "POST",
                data: {
                    category_id: categoryId,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    var subCategories = res.subCategories;
                    if( subCategories == ''){
                        $('.sub-category').html('<option value="">No Sub Category Available</option>');
                    }
                    else{
                        $('.sub-category').html('<option value="">Select Sub Category</option>');

                    }
                    $.each(subCategories, function (key, value) {
                        $(".sub-category").append('<option value="' + value
                            .id + '">' + value.title + '</option>');
                    });
                }
            });

    }
    function getBrand(){
            var brandId = acceptVar().brandSelect;
            $(".brand").html('');
            $.ajax({
                url: "{{route('frontend.ads.fetch.brand')}}",
                type: "POST",
                data: {
                    brand_id: brandId,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    var brands = res.brands;

                    if( brands == ''){
                        $('.brand').html('<option value="">No Brand Available</option>');
                    }else{
                        $('.brand').html('<option value="">Select Brand </option>');

                    }
                    $.each(res.brands, function (key, value) {

                        $(".brand").append('<option value="' + value
                            .id + '" data-brand_title="'+ value.title +'">' + value.title + '</option>');
                    });
                }
            });

    }

    function getAdsByCategory(page){
        var categoryId = acceptVar().categorySelect;
        var html = '';
        var paginate = '';
        var routes = "{{route('frontend.ads.filter.result.category')}}?page="+page;


        $.ajax({
            url: routes,
            type: "POST",
            data: {
                category_id: categoryId,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                console.log(res);

                var ads = res.results.data;
                var total = ads.length;
                $('.total').text(total)
                var color = '';
                paginate += '<div class="d-flex justify-content-center paginate"> '+res.pagination+' </div>';
                $(".paginate").html(paginate);


                if( ads == '' || ads =='[]'){
                    html +=
                        ' <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12 mb-20">\
                                    <div class="alert alert-secondary product-single-item" role="alert">\
                                      <h5 class="text-center text-dark pt-2">No Products Available</h5>\
                                    </div>\
                                </div>';
                     $(".ads").html(html);
                }
                $.each(ads, function (key, value) {

                    var advertiser = "{{ $advertiser }}"
                    if(advertiser !='' ||  advertiser != null){
                        var advertiser_id = "{{  $advertiser }}";
                        var advertisement_id = value.id;
                        getFavRecord(advertiser_id, advertisement_id);

                    }

                    var route_url = "{{ url('ads/details') }}/" + value.slug + "/" + value.id;

                    html +=
                        ' <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">\
                                    <div class="product-single-item active">\
                                            <div class="product-wishlist">\
                                                    <a class="fav-select" data-ad_id="' + value.id + '" href="javascript:void(0)">\
                                                        <span>\
                                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz fav-icon fav-icon'+value.id+'" style="fill:'+color+'">\
                                                                <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">\
                                                                </path>\
                                                            </svg>\
                                                        </span>\
                                                    </a>\
                                                </div>\
                                            <a href="'+route_url+'">\
                                            <div class="product-thumb-slider">\
                                                        <div class="swiper-wrapper">\
                                                            <div class="swiper-slide">\
                                                                <div class="thumb">\
                                                                    <img src="{{ asset('core/storage/app/public/advertisement_images/') }}/' +value.image + '" alt="product">\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="swiper-pagination"></div>\
                                                        <div class="slider-nav-area">\
                                                            <div class="slider-prev slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z"></path></svg>\
                                                            </div>\
                                                            <div class="slider-next slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z"></path></svg>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                            <div class="content">\
                                                <span class="sub-title">' + value.city.title + '</span>\
                                                <h5 class="title">' + value.title + '</h5>\
                                                <span class="inner-sub-title">' + value.category.title + '</span>\
                                                <h5 class="inner-title">' + value.price + ' &nbsp;TL</h5>\
                                            </div>\
                                        </a>\
                                    </div>\
                                </div>';

                     $(".ads").html(html);


                });

            }
        });



    }
    function getAdsBySubCategory(page){
        var categoryId = acceptVar().categorySelect;
        var subCategoryId = acceptVar().subCategorySelect;
        var html = '';
        var paginate = '';
        var routes = "{{route('frontend.ads.filter.result.subcategory')}}?page="+page;
        $.ajax({
            url:routes,
            type: "POST",
            data: {
                category_id: categoryId,
                sub_category: subCategoryId,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                console.log(res);
                var ads = res.results.data;
                var total = ads.length;
                $('.total').text(total)
                paginate += '<div class="d-flex justify-content-center paginate"> '+res.pagination+' </div>';
                $(".paginate").html(paginate);
                if( ads == '' || ads =='[]'){
                    html +=
                        ' <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12 mb-20">\
                                    <div class="alert alert-secondary product-single-item" role="alert">\
                                    <h5 class="text-center text-dark pt-2">No Products Available</h5>\
                                    </div>\
                                </div>';
                    $(".ads").html(html);
                }
                $.each(ads, function (key, value) {
                    var advertiser = "{{ $advertiser }}"
                    if(advertiser !='' ||  advertiser != null){
                        var advertiser_id = "{{  $advertiser }}";
                        var advertisement_id = value.id;
                        getFavRecord(advertiser_id, advertisement_id);

                    }

                    var route_url = "{{ url('ads/details') }}/" + value.slug + "/" + value.id;

                    html +=
                    ' <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">\
                                    <div class="product-single-item active">\
                                            <div class="product-wishlist">\
                                                    <a class="fav-select" data-ad_id="' + value.id + '" href="javascript:void(0)">\
                                                        <span>\
                                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz fav-icon fav-icon'+value.id+'" style="fill:">\
                                                                <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">\
                                                                </path>\
                                                            </svg>\
                                                        </span>\
                                                    </a>\
                                                </div>\
                                            <a href="'+route_url+'">\
                                                <div class="product-thumb-slider">\
                                                        <div class="swiper-wrapper">\
                                                            <div class="swiper-slide">\
                                                                <div class="thumb">\
                                                                    <img src="{{ asset('core/storage/app/public/advertisement_images/') }}/' +value.image + '" alt="product">\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="swiper-pagination"></div>\
                                                        <div class="slider-nav-area">\
                                                            <div class="slider-prev slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z"></path></svg>\
                                                            </div>\
                                                            <div class="slider-next slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z"></path></svg>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                            <div class="content">\
                                                <span class="sub-title">' + value.city.title + '</span>\
                                                <h5 class="title">' + value.title + '</h5>\
                                                <span class="inner-sub-title">' + value.category.title + '</span>\
                                                <h5 class="inner-title">' + value.price + ' &nbsp;TL</h5>\
                                            </div>\
                                        </a>\
                                    </div>\
                                </div>';

                    $(".ads").html(html);

                });


            }
        });

    }
    function getAdsByBrands(page){
        var categoryId = acceptVar().categorySelect;
        var brandId = acceptVar().getBrand;
        var html = '';
        var paginate = '';
        var routes = "{{route('frontend.ads.filter.result.brand')}}?page="+page;
        $.ajax({
            url: routes,
            type: "POST",
            data: {
                category_id: categoryId,
                brand_id: brandId,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                var ads = res.results.data;
                var total = ads.length;
                $('.total').text(total)
                paginate += '<div class="d-flex justify-content-center paginate"> '+res.pagination+' </div>';
                $(".paginate").html(paginate);
                if( ads == '' || ads =='[]'){
                    html +=
                        ' <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12 mb-20">\
                                    <div class="alert alert-secondary product-single-item" role="alert">\
                                    <h5 class="text-center text-dark pt-2">No Products Available</h5>\
                                    </div>\
                                </div>';
                    $(".ads").html(html);
                }
                $.each(ads, function (key, value) {
                    var advertiser = "{{ $advertiser }}"
                    if(advertiser !='' ||  advertiser != null){
                        var advertiser_id = "{{  $advertiser }}";
                        var advertisement_id = value.id;
                        getFavRecord(advertiser_id, advertisement_id);

                    }
                    var route_url = "{{ url('ads/details') }}/" + value.slug + "/" + value.id;

                    html +=
                    ' <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">\
                                    <div class="product-single-item active">\
                                            <div class="product-wishlist">\
                                                    <a class="fav-select" data-ad_id="' + value.id + '" href="javascript:void(0)">\
                                                        <span>\
                                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz fav-icon fav-icon'+value.id+'" style="fill:">\
                                                                <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">\
                                                                </path>\
                                                            </svg>\
                                                        </span>\
                                                    </a>\
                                                </div>\
                                            <a href="'+route_url+'">\
                                                <div class="product-thumb-slider">\
                                                        <div class="swiper-wrapper">\
                                                            <div class="swiper-slide">\
                                                                <div class="thumb">\
                                                                    <img src="{{ asset('core/storage/app/public/advertisement_images/') }}/' +value.image + '" alt="product">\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="swiper-pagination"></div>\
                                                        <div class="slider-nav-area">\
                                                            <div class="slider-prev slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z"></path></svg>\
                                                            </div>\
                                                            <div class="slider-next slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z"></path></svg>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                            <div class="content">\
                                                <span class="sub-title">' + value.city.title + '</span>\
                                                <h5 class="title">' + value.title + '</h5>\
                                                <span class="inner-sub-title">' + value.category.title + '</span>\
                                                <h5 class="inner-title">' + value.price + ' &nbsp;TL</h5>\
                                            </div>\
                                        </a>\
                                    </div>\
                                </div>';

                    $(".ads").html(html);

                });


            }
        });

    }
    function sortBy(){
        var categoryId = acceptVar().categorySelect;
        var subCategoryID = acceptVar().subCategorySelect;
        var brandId = acceptVar().getBrand;
        var sortBy = acceptVar().sortBy;
        var latitude = acceptVar().latitude;

        var longitude = acceptVar().longitude;
        var html = '';
        var paginate = '';
        $.ajax({
            url: "{{route('frontend.ads.filter.result.sort')}}",
            type: "POST",
            data: {
                category_id: categoryId,
                sub_category_id: subCategoryID,
                brand_id: brandId,
                sort_type: sortBy,
                latitude: latitude,
                longitude: longitude,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {

                var ads = res.results;
                  var total = ads.length;
                $('.total').text(total)

                $('.total').text(total)
                paginate += '<div class="d-flex justify-content-center paginate">  </div>';
                $(".paginate").html(paginate);
                if( ads == '' || ads =='[]'){
                    html +=
                        ' <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12 mb-20">\
                                    <div class="alert alert-secondary product-single-item" role="alert">\
                                    <h5 class="text-center text-dark pt-2">No Products Available</h5>\
                                    </div>\
                                </div>';
                    $(".ads").html(html);
                }
                $.each(ads, function (key, value) {

                    var advertiser = "{{ $advertiser }}"
                    if(advertiser !='' ||  advertiser != null){
                        var advertiser_id = "{{  $advertiser }}";
                        var advertisement_id = value.id;
                        getFavRecord(advertiser_id, advertisement_id);

                    }

                    var route_url = "{{ url('ads/details') }}/" + value.slug + "/" + value.id;

                    html +=
                    ' <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">\
                                    <div class="product-single-item active">\
                                            <div class="product-wishlist">\
                                                    <a class="fav-select" data-ad_id="' + value.id + '" href="javascript:void(0)">\
                                                        <span>\
                                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz fav-icon fav-icon'+value.id+'" style="fill:">\
                                                                <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">\
                                                                </path>\
                                                            </svg>\
                                                        </span>\
                                                    </a>\
                                                </div>\
                                            <a href="'+route_url+'">\
                                                <div class="product-thumb-slider">\
                                                        <div class="swiper-wrapper">\
                                                            <div class="swiper-slide">\
                                                                <div class="thumb">\
                                                                    <img src="{{ asset('core/storage/app/public/advertisement_images/') }}/' +value.image + '" alt="product">\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="swiper-pagination"></div>\
                                                        <div class="slider-nav-area">\
                                                            <div class="slider-prev slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z"></path></svg>\
                                                            </div>\
                                                            <div class="slider-next slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z"></path></svg>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                            <div class="content">\
                                                <span class="sub-title">' + value.city.title + '</span>\
                                                <h5 class="title">' + value.title + '</h5>\
                                                <span class="inner-sub-title">' + value.category.title + '</span>\
                                                <h5 class="inner-title">' + value.price + ' &nbsp;TL</h5>\
                                            </div>\
                                        </a>\
                                    </div>\
                                </div>';

                    $(".ads").html(html);

                });


            }
        });

    }
    function allow(){
        var categoryId = acceptVar().categorySelect;
        var subCategoryID = acceptVar().subCategorySelect;
        var brandId = acceptVar().getBrand;
        var latitude = acceptVar().latitude;
        var longitude = acceptVar().longitude;

        var html = '';
        var paginate = '';
        $.ajax({
            url: "{{route('frontend.ads.allow.location')}}",
            type: "POST",
            data: {
                category_id: categoryId,
                sub_category_id: subCategoryID,
                brand_id: brandId,
                latitude: latitude,
                longitude: longitude,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (res) {
                var ads = res.results;

                var type = res.type;
                if(type == 'allow'){
                    var total = ads.length;
                    $('.total').text(total)
                    $('.allowType').text("Disallow")
                }else{

                    window.location.reload();
                }
                 paginate += '<div class="d-flex justify-content-center paginate"> </div>';
                $(".paginate").html(paginate);
                if( ads == '' || ads =='[]'){
                    html +=
                        ' <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12 mb-20">\
                                    <div class="alert alert-secondary product-single-item" role="alert">\
                                    <h5 class="text-center text-dark pt-2">No Products Available</h5>\
                                    </div>\
                                </div>';
                    $(".ads").html(html);
                }
                $.each(ads, function (key, value) {
                    var advertiser = "{{ $advertiser }}"
                    if(advertiser !='' ||  advertiser != null){
                        var advertiser_id = "{{  $advertiser }}";
                        var advertisement_id = value.id;
                        getFavRecord(advertiser_id, advertisement_id);

                    }

                    var route_url = "{{ url('ads/details') }}/" + value.slug + "/" + value.id;

                    html +=
                    ' <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">\
                                    <div class="product-single-item active">\
                                            <div class="product-wishlist">\
                                                    <a class="fav-select" data-ad_id="' + value.id + '" href="javascript:void(0)">\
                                                        <span>\
                                                            <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz fav-icon fav-icon'+value.id+'" style="fill:">\
                                                                <path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z">\
                                                                </path>\
                                                            </svg>\
                                                        </span>\
                                                    </a>\
                                                </div>\
                                            <a href="'+route_url+'">\
                                                <div class="product-thumb-slider">\
                                                        <div class="swiper-wrapper">\
                                                            <div class="swiper-slide">\
                                                                <div class="thumb">\
                                                                    <img src="{{ asset('core/storage/app/public/advertisement_images/') }}/' +value.image + '" alt="product">\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="swiper-pagination"></div>\
                                                        <div class="slider-nav-area">\
                                                            <div class="slider-prev slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M8.218 12.01l5.792 5.793a1.56 1.56 0 1 1-2.209 2.208l-6.896-6.896a1.557 1.557 0 0 1-.457-1.104c0-.4.152-.8.457-1.104l6.897-6.898a1.563 1.563 0 0 1 2.208 2.209L8.218 12.01z"></path></svg>\
                                                            </div>\
                                                            <div class="slider-next slider-nav">\
                                                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M14.698 12.01l-5.792 5.793a1.56 1.56 0 1 0 2.208 2.208l6.897-6.896a1.56 1.56 0 0 0 0-2.208l-6.897-6.898a1.564 1.564 0 0 0-2.209 0 1.564 1.564 0 0 0 0 2.209l5.793 5.793z"></path></svg>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                            <div class="content">\
                                                <span class="sub-title">' + value.city.title + '</span>\
                                                <h5 class="title">' + value.title + '</h5>\
                                                <span class="inner-sub-title">' + value.category.title + '</span>\
                                                <h5 class="inner-title">' + value.price + ' &nbsp;TL</h5>\
                                            </div>\
                                        </a>\
                                    </div>\
                                </div>';

                    $(".ads").html(html);

                });

            }
        });

    }
      // Outside foreach
      if(glovalAdvertiser !='' ||  glovalAdvertiser != null){
        function getFavRecord(advertiser_id, advertisement_id)
        {
            var advertiser_id = advertiser_id;
            var advertisement_id = advertisement_id;
            var elem =".fav-icon"+advertisement_id;
            var ads = $('.fav-select').data('ad_id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{route('frontend.ads.check.fav')}}",
                data: {
                    advertiser_id: advertiser_id,
                    advertisement_id: advertisement_id,
                },
                success: function(resp) {
                    if (resp.status != null) {
                        if(resp.status.advertisement_id == advertisement_id){
                            $(elem).attr('style', 'fill:red');
                        }
                    }
                }
            });


        }
        }


    function acceptVar() {

            var categorySelect = $("select[name=category] :selected").val();
            var categoryTitle = $("select[name=category] :selected").data('category_title');
            var brandSelect = $("select[name=category] :selected").val();
            var subCategorySelect = $("select[name=sub_category] :selected").val();
            var getBrand = $("select[name=brand] :selected").val();
            var sortBy = $("select[name=sort_by] :selected").val();
            var latitude = $("input[name=latitude]").val();
            var longitude = $("input[name=longitude]").val();
            return {
                categorySelect:categorySelect,
                categoryTitle:categoryTitle,
                brandSelect:brandSelect,
                subCategorySelect:subCategorySelect,
                getBrand:getBrand,
                sortBy:sortBy,
                latitude:latitude,
                longitude:longitude,
            };
    }
    var x = document.getElementById("demo");
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    }

    function showPosition(position) {
        $("input[name=latitude]").val(position.coords.latitude);
        $("input[name=longitude]").val(position.coords.longitude);
    }

</script>

@endpush
