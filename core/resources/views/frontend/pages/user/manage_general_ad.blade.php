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
                                <ul class="breadcrumb-list">
                                    <li>
                                        <a href="">{{ $category->title ?? null }}</a>
                                    </li>
                                </ul>

                                <a href="{{ route('frontend.user.post.ad') }}" class="change-cetagory-link">Change</a>

                            </div>
                            <form class="sell-add-info-form"
                                action="{{ url('user/others/ad', ['c_id' => $category->id, 'id' => $adv->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id ?? null }}">
                                <input type="hidden" name="latitude" id="latitude"
                                    value="{{ $category->latitude ?? null }}">
                                <input type="hidden" name="longitude" id="longitude"
                                    value="{{ $category->longitude ?? null }}">
                                <div class="row mb-30-none">
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">ADD SOME INFO</h3>
                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                            <input type="hidden" name="category_type"
                                                value="{{ $category->category_type }}">
                                            <div class="form-group">
                                                <label>Advert title <span class="text--danger">*</span></label>
                                                <input type="text" id="titleLenth" name="title"
                                                    class="form--control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                                    placeholder="@lang('Advert title')" value="{{ old('title', $adv->title) }}">
                                                <div class="text-limit-area">
                                                    <span>Mention key features of your product (e.g. make, model, age,
                                                        type)</span>
                                                    <span id="text-count">1 </span>/ 100
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Brand <span class="text--danger">*</span></label>
                                                <select class="form--control" name="brand_id">
                                                    <option value="">Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" @if (isset($adv) && $adv->brand_id == $brand->id) selected @endif>{{ $brand->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group2">
                                                <label>Explanation <span class="text--danger">*</span></label>
                                                <textarea cols="30" rows="10" id="description"
                                                    class="form--control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                                                    value="{{ @old('description', $adv->description) }}" placeholder="@lang('Description')">{{ old('description', $adv->description) }}</textarea>
                                                <div class="text-limit-area">
                                                    <span>Add information such as status, feature and reason for sale</span>
                                                    <span id="text-count">1</span>/1450
                                                </div>
                                            </div>

                                            <div class="form-group2">
                                                <label>@lang('Google Map Location') <a target="_blank" class="text-primary"
                                                        href="https://support.google.com/maps/answer/144361?hl=en&co=GENIE.Platform%3DDesktop#:~:text=Embed%20a%20map%20or%20directions&text=Click%20Share%20or%20embed%20map,Click%20Embed%20map.&text=Copy%20the%20text%20in%20the,of%20your%20website%20or%20blog.">@lang('Instruction')</a></label>
                                                <textarea class="form--control" name="location_embeded_map" placeholder="@lang('Google Map Location')">{{ old('location_embeded_map', $adv->location_embeded_map) }}</textarea>

                                            </div>
                                            <div class="form-group2 mt-2">
                                                <label>@lang('Thumbnail')<span class="text--danger">*</span></label>
                                                <input type="file"
                                                    class="form--control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                                    name="image" placeholder="@lang('Thumbnail')" accept="image/*">
                                            </div>
                                            <div class="form-group2 mt-2">
                                                @if (!empty($adv->image))
                                                    <label for="Image">@lang('Preview Image')</label>
                                                    <img src="{{ URL::asset('core/storage/app/public/advertisement_images/' . $adv->image) }}"
                                                        alt="Image" style="height: 100px; width:100px;">
                                                    <a href="{{ route('frontend.user.remove.image', $adv->id) }}"
                                                        class="text-danger">@lang('Delete')</a>
                                                @endif
                                            </div>
                                            <div class="form-group2 mt-2">
                                                <label>@lang('Condition')<span class="text--danger">*</span></label>
                                                <select name="condition" class="form--control">
                                                    <option value="new">New</option>
                                                    <option value="used">Used</option>
                                                    <option value="like new">Like new</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">@lang('Price')</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group price-input-badge">
                                                <label>@lang('Price')<span class="text--danger">*</span></label>
                                                <input type="number" name="price" class="form--control"
                                                    value="{{ old('price', $adv->price) }}"
                                                    placeholder="@lang('Price')">
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
                                                <input type="text" name="meta_tags" value="{{ old('meta_tags', $adv->meta_tags) }}"
                                                    class="form--control" placeholder="@lang('Meta Tags')" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group">
                                                <label>@lang('Meta Title') <span class="text--danger">*</span></label>
                                                <input type="text" name="meta_title" value="{{ old('meta_title', $adv->meta_title) }}"
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
                                </div>

                                @if ($category->category_type == 'vehicles' && ($category->wheels = 2))
                                    @include('frontend.pages.forms._4wheeler')
                                @elseif ($category->category_type == 'vehicles' && ($category->wheels = 4))
                                    {{-- @dd('ok mobile form working and ad posting successfull'); --}}
                                    @include('frontend.pages.forms._4wheeler')
                                @elseif($category->category_type == 'mobiles')
                                    {{-- @dd('ok mobile form working and ad posting successfull'); --}}
                                    @include('frontend.pages.forms.mobiles')
                                @elseif($category->category_type == 'electronics')
                                    @include('frontend.pages.forms.electronics')
                                @elseif($category->category_type == 'home_and_garden')
                                    @include('frontend.pages.forms.home_and_garden')
                                @elseif($category->category_type == 'fashion_beauty')
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
                                                            <label>Province</label>
                                                            <select class="form--control" name="city_id" id="city_id">
                                                                <option value="">@lang('Select')</option>
                                                                @foreach (\DB::table('cities')->where('status', 1)->get() as $city)
                                                                    <option value="{{ $city->id }}" @if (isset($adv) && $adv->city_id == $city->id ) selected @endif>
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
                                                <button type="submit" class="btn--base">{{ $buttonText }}</button>
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
    <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
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
