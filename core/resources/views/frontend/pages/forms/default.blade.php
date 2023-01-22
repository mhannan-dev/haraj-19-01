@extends('frontend.layout.main')
@push('custom_css')
@endpush
@section('content')
    <section class="sell-car-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10">@lang('POST AN AD')</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-add-info-area">
                        <div class="sell-add-info-header">
                            <h3 class="sell-add-info-title">@lang('SELECTED CATEGORY')</h3>
                            <div class="change-cetagory-wrapper">
                                @include('frontend.pages.forms.breadcrumb')
                            </div>
                            @if ($errors->any())
                                <div id="msgDiv" class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    Please check the form below for errors
                                </div>
                            @endif
                            <form class="sell-add-info-form" action="{{ route('frontend.user.adStore') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <input type="hidden" name="category_type" value="{{ $category->category_type }}">
                                <input type="hidden" name="latitude" id="latitude"
                                    value="{{ $category->latitude ?? null }}">
                                <input type="hidden" name="longitude" id="longitude"
                                    value="{{ $category->longitude ?? null }}">
                                <div class="row mb-30-none">
                                    <div class="col-xl-12 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">@lang('ADD SOME INFO')</h3>
                                            @if ($category->category_type != 'vehicles')
                                                <div class="form-group">
                                                    <label>Advert title <span class="text--danger">*</span></label>
                                                    <input type="text" name="title" class="form--control"
                                                        placeholder="@lang('Advert title')" value="{{ old('title') }}">
                                                    <div class="text-limit-area">
                                                        <span>Mention key features of your product (e.g. make, model, age,
                                                            type)</span>
                                                        <span>0 / 70</span>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label>@lang('Brand ') <span class="text--danger">*</span></label>
                                                <select class="form--control" name="brand_id">
                                                    <option value="">Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group2">
                                                <label>Explanation <span class="text--danger">*</span></label>
                                                <textarea id="description" class="form--control" name="description" placeholder="@lang('Description')" required>{{ old('description') }}</textarea>
                                                <div class="text-limit-area">
                                                    <span>Add information such as status, feature and reason for sale</span>
                                                    <span id="text-count">1</span>/ 1450
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>@lang('Google Map Location') <a target="_blank" class="text-primary"
                                                        href="https://support.google.com/maps/answer/144361?hl=en&co=GENIE.Platform%3DDesktop#:~:text=Embed%20a%20map%20or%20directions&text=Click%20Share%20or%20embed%20map,Click%20Embed%20map.&text=Copy%20the%20text%20in%20the,of%20your%20website%20or%20blog.">@lang('Instruction')</a></label>
                                                <textarea class="form--control" name="location_embeded_map" placeholder="@lang('Google Map Location')"></textarea>

                                            </div>
                                            <div class="form-group2 mt-2">
                                                <label>@lang('Thumbnail')<span class="text--danger">*</span></label>
                                                <input type="file" class="form--control" name="image"
                                                    placeholder="@lang('Thumbnail')" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">@lang('Price')</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group price-input-badge">
                                                <label>@lang('Price') <span class="text--danger">*</span></label>
                                                <input type="number" name="price" class="form--control"
                                                    placeholder="@lang('Price')" required>
                                                <span>₺</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">@lang('SEO Content')</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group">
                                                <label>@lang('Meta Tags') <span class="text--danger">* Tag1,
                                                        Tag2</span></label>
                                                <input type="text" name="meta_tags" value="{{ old('meta_tags') }}"
                                                    class="form--control" placeholder="@lang('Meta Tags')" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group">
                                                <label>@lang('Meta Title') <span class="text--danger">*</span></label>
                                                <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                                    class="form--control" placeholder="@lang('Meta Title')" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title two">YOU CAN UPLOAD UP TO 10 PHOTOS</h3>
                                    <span class="image-up-alart-text pb-10">(Alart: Heigh 1000x800 px / size 2MB)</span>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="add-more-details-thumb-wrapper">
                                                <div class="add-more-details-thumb-area">
                                                    <div class="row" id="coba"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <input type="file" name="images[]" multiple> --}}

                                    <div class="form-group col-8">
                                        <div class="sell-add-info-switcher pt-20">
                                            <div class="title-area">
                                                <span class="title">Show my phone number in ads</span>
                                            </div>
                                            <div class="setting-tab">
                                                <span
                                                    class="setting-tab-switcher {{ Auth::guard('advertiser')->user()->show_mobile_no == 1 ? 'active' : ' ' }}">
                                                    <input
                                                        onclick="location.href='{{ route('frontend.user.mobile.status', [Auth::guard('advertiser')->user()->id, Auth::guard('advertiser')->user()->show_mobile_no ? 0 : 1]) }}'"
                                                        type="checkbox"
                                                        data-id="{{ Auth::guard('advertiser')->user()->id }}"
                                                        name="show_mobile_no" class="dropzone toggle-class"
                                                        autocomplete="off">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($sub_category->category_type == 'vehicles' && ($sub_category->wheels = 2))
                                    @include('frontend.pages.forms._4wheeler')
                                @elseif ($sub_category->category_type == 'vehicles' && ($sub_category->wheels = 4))
                                    {{-- @dd('ok mobile form working and ad posting successfull'); --}}
                                    @include('frontend.pages.forms._4wheeler')
                                @elseif($sub_category->category_type == 'mobiles')
                                    {{-- @dd('ok mobile form working and ad posting successfull'); --}}
                                    @include('frontend.pages.forms.mobiles')
                                @elseif($sub_category->category_type == 'sports')
                                    @include('frontend.pages.forms._sports')
                                @elseif($sub_category->category_type == 'electronics')
                                    @include('frontend.pages.forms.electronics')
                                @elseif($sub_category->category_type == 'home_and_garden')
                                    @include('frontend.pages.forms.home_and_garden')
                                @elseif($sub_category->category_type == 'fashion_beauty')
                                    @include('frontend.pages.forms.fashion_beauty')
                                @else
                                    @include('frontend.pages.forms._basic')
                                @endif

                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">CONFIRM YOUR LOCATION</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="location-tab">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="category-tab"
                                                            data-bs-toggle="tab" data-bs-target="#category"
                                                            type="button" role="tab" aria-controls="category"
                                                            aria-selected="true">CHOOSE FROM LIST</button>
                                                        <button class="nav-link" id="apps-tab" data-bs-toggle="tab"
                                                            data-bs-target="#apps" type="button" role="tab"
                                                            aria-controls="apps" aria-selected="false">CURRENT
                                                            LOCATION</button>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="category" role="tabpanel"
                                                        aria-labelledby="category-tab">
                                                        <div class="form-group pt-60">
                                                            <label>Province <span class="text--danger">*</span></label>
                                                            <select class="form--control" name="city_id" id="city_id">
                                                                <option value="">@lang('Select')</option>
                                                                @foreach (\DB::table('cities')->where('status', 1)->get() as $city)
                                                                    <option value="{{ $city->id }}">
                                                                        {{ $city->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade currenct_location" id="apps"
                                                        role="tabpanel" aria-labelledby="apps-tab">
                                                        <div id="mapHolder"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sell-add-info-price-wrapper">
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="sell-add-btn-area">
                                                <button type="submit" class="btn--base">@lang('Advertise now')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            getLocation();

            $('currenct_location').on('click', function() {
                getLocation();
            });


            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }

            function showPosition(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                document.getElementById('latitude').value = lat
                document.getElementById('longitude').value = lon

                var latlon = new google.maps.LatLng(lat, lon)
                var mapholder = document.getElementById('mapHolder')
                mapholder.style.height = '250px';
                mapholder.style.width = '100%';
                var myOptions = {
                    center: latlon,
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.SMALL
                    }
                };
                var map = new google.maps.Map(document.getElementById("mapHolder"), myOptions);
                var marker = new google.maps.Marker({
                    position: latlon,
                    map: map,
                    title: "You are here!"
                });

            }
        });
    </script>
@endsection
