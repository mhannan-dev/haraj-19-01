@extends('frontend.layout.main')
@push('page_meta')
    <meta name="keywords" content="{{ $adv->meta_tags }}">
    <meta name="title" Content="{{ $adv->meta_title }}">
@endpush
@section('title')
    @lang('Update your advertisement')
@endsection
@push('custom_css')
@endpush
@section('content')
    <section class="sell-car-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10 text-uppercase">@lang('Update your advertisement')</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-add-info-area">
                        <div class="sell-add-info-header">
                            <h3 class="sell-add-info-title">@lang('SELECTED CATEGORY')</h3>
                            <div class="change-cetagory-wrapper">
                                <ul class="breadcrumb-list">
                                    <li>
                                        <a href=""> {{ $adv->category->title }}</a>
                                    </li>
                                    <li>
                                        <a href="">/ {{ $sub_category->title }}</a>
                                    </li>
                                </ul>
                                <a href="{{ route('frontend.user.post.ad') }}"
                                    class="change-cetagory-link">@lang('Change')</a>
                            </div>

                            <form class="sell-add-info-form"
                                action="{{ route('frontend.user.update.ad', ['ad_id' => $adv->id, 'category_id' => $adv->category_id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
                                <input type="hidden" name="category_id" value="{{ $adv->category->id }}">

                                <div class="row mb-30-none">
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">@lang('ADD SOME INFO')</h3>
                                            <div class="form-group">
                                                <label for="label">@lang('Ad title')</label>
                                                <input type="text" name="ad_title" class="form--control"
                                                    value="{{ $adv->title }}">
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Condition')</label>
                                                <select name="condition" class="form--control">
                                                    <option>@lang('Select')</option>
                                                    <option value="used"
                                                        @if ($adv->condition == 'used') selected @endif>@lang('Used')
                                                    </option>
                                                    <option value="new"
                                                        @if ($adv->condition == 'new') selected @endif>@lang('New')
                                                    </option>
                                                    <option value="like new"
                                                        @if ($adv->condition == 'like new') selected @endif>@lang('Like new')
                                                    </option>
                                                </select>
                                                <input type="hidden" name="editable" value="0">
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('Authenticity')</label>
                                                <select name="authenticity" class="form--control">
                                                    <option value="">@lang('Select')</option>
                                                        <option value="original">@lang('Original')</option>
                                                        <option value="refubrished">@lang('Refubrished')</option>
                                                        <option value="reconditioned">@lang('Reconditioned')</option>
                                                </select>
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Brand ')</label>
                                                <select name="brand" class="form--control">
                                                    <option>@lang('Select')</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            @if ($brand->id == $adv->brand_id) selected @endif>
                                                            {{ $brand->title }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Image ')</label>
                                                <input type="file" name="image" class="form--control">
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Price')</label>
                                                <input type="number" name="price" class="form--control"
                                                    value="{{ $adv->price ?? '' }}">
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Meta Tags')</label>
                                                <input type="text" class="form--control"
                                                    value="{{ $adv->meta_tags ?? '' }}" name="meta_tags">
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Meta title')</label>
                                                <input type="text" class="form--control"
                                                    value="{{ $adv->meta_title ?? '' }}" name="meta_title">
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="label">@lang('Description') </label>
                                                <textarea name="description" class="form--control">{{ $adv->description }}</textarea>
                                                <input type="hidden" name="editable" value="0">
                                            </div>
                                            @foreach (json_decode($adv->details_informations) as $key => $details_info)
                                                <div class="form-group">
                                                    <h5 class="title">{{ $details_info->label }}</h5>
                                                    @if ($details_info->type == 'text')
                                                        <input type="text" class="form--control"
                                                            value="{{ str_replace('_', ' ', $details_info->value) }}">
                                                        <input type="hidden" name="editable" value="1">
                                                    @endif
                                                    @if ($details_info->type == 'number')
                                                        <input type="number" class="form--control"
                                                            value="{{ str_replace('_', ' ', $details_info->value) }}">
                                                        <input type="hidden" name="editable" value="1">
                                                    @endif
                                                    @if ($details_info->type == 'textarea')
                                                        <textarea class="form--control" name="{{ $details_info->name }}">{{ str_replace('_', ' ', $details_info->value) }}</textarea>
                                                        <input type="hidden" name="editable" value="1">
                                                    @endif
                                                    @if ($details_info->type == 'checkbox')
                                                        {{-- @dd($details_info); --}}
                                                        @foreach ($details_info->value as $detail_data)
                                                            <input type="checkbox" class="w-auto"
                                                                name="{{ $details_info->name }}[]"
                                                                value="{{ $detail_data }}" checked>{{ $detail_data }}
                                                            <input type="hidden" name="editable" value="1">
                                                        @endforeach
                                                    @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="sell-add-info-price-wrapper">
                                        <h3 class="sell-add-info-price-title two">PHOTOS</h3>
                                        @if (isset($adv->images))
                                            <table class="table table-striped">
                                                <tbody>
                                                    @foreach ($adv->images as $multiImage)
                                                        <tr>
                                                            <td>

                                                                <img width="100px"
                                                                    src="{{ asset('core/storage/app/public/advertisement_images/' . $multiImage->images) }}"
                                                                    alt="">
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ url('user/remove/multi/img', ['image_id' => $multiImage->id, 'ad_id' => $adv->id]) }}">
                                                                    <i class="las la-trash-alt text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                        <span class="image-up-alart-text pb-10">(Alart: Heigh 1000x800 px / size 2MB)</span>
                                        <div class="row mb-30-none">
                                            <div class="col-xl-8 mb-30">
                                                <div class="add-more-details-thumb-wrapper">
                                                    <div class="add-more-details-thumb-area">
                                                        <div class="row" id="coba">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-8">
                                            <div class="sell-add-info-switcher pt-20">
                                                <div class="title-area">
                                                    <span class="title">@lang('Show my phone number in ads')</span>
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
                                </div>
                        </div>
                        <div class="sell-add-info-price-wrapper">
                            <h3 class="sell-add-info-price-title">@lang('CONFIRM YOUR LOCATION')</h3>
                            <div class="row mb-30-none">
                                <div class="col-xl-8 mb-30">
                                    <div class="location-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="category-tab" data-bs-toggle="tab"
                                                    data-bs-target="#category" type="button" role="tab"
                                                    aria-controls="category"
                                                    aria-selected="true">@lang('CHOOSE FROM LIST')</button>
                                                <button class="nav-link" id="apps-tab" data-bs-toggle="tab"
                                                    data-bs-target="#apps" type="button" role="tab"
                                                    aria-controls="apps" aria-selected="false">@lang('CURRENT LOCATION')</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="category" role="tabpanel"
                                                aria-labelledby="category-tab">
                                                <div class="form-group pt-60">
                                                    <label>@lang('Province')</label>
                                                    <select class="form--control" name="city_id" id="city_id">
                                                        <option value="">@lang('Select')</option>
                                                        @foreach (\DB::table('cities')->where('status', 1)->get() as $city)
                                                            <option value="{{ $city->id }}"
                                                                @if (isset($adv) && $adv->city_id == $city->id) selected @endif>
                                                                {{ $city->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade currenct_location" id="apps" role="tabpanel"
                                                aria-labelledby="apps-tab">
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
                                        <button type="submit" class="btn--base">@lang('Update')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
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
