@extends('frontend.layout.main')
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
                                    @lang('Please check the form below for errors')
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
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">@lang('ADD SOME INFO')</h3>

                                            @foreach ($category->type->fields as $field)
                                                <div class="form-group">
                                                    <label for="label">
                                                        {{ str_replace('_', ' ', ucfirst($field->label)) }}
                                                        @if ($field->required == true)
                                                            <span class="text-danger">*</span>
                                                        @endif
                                                    </label>

                                                    @if ($field->type == 'text')
                                                        <input type="text" name="{{ $field->label }}"
                                                            class="form--control" min="{{ $field->validation->min }}"
                                                            max="{{ $field->validation->max }}"
                                                            required="{{ $field->validation->required }}">
                                                    @elseif ($field->type == 'file' && $field->name == 'thumbnail')
                                                        <input type="{{ $field->type }}" name="{{ $field->label }}"
                                                            class="form--control"
                                                            required="{{ $field->validation->required }}">
                                                    @elseif ($field->type == 'number')
                                                        <input type="{{ $field->type }}" name="{{ $field->label }}"
                                                            class="form--control"
                                                            required="{{ $field->validation->required }}">
                                                    @elseif ($field->type == 'select' && $field->name == 'brand')
                                                        <select name="{{ $field->label }}" class="form--control">
                                                            <option value="">@lang('Select Brand')</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @elseif ($field->type == 'select')
                                                        <select name="{{ $field->label }}" class="form--control">
                                                            <option value="">@lang('Select')</option>
                                                            @foreach ($field->validation->options as $op)
                                                                <option value="">{{ ucfirst($op) }}</option>
                                                            @endforeach
                                                        </select>
                                                    @elseif ($field->type == 'textarea')
                                                        <textarea name="{{ $field->label }}" class="form--control"></textarea>
                                                    @endif
                                                </div>

                                                @if ($field->type == 'file' && $field->name == 'images')
                                                    <h3 class="sell-add-info-price-title two">YOU CAN UPLOAD UP TO 10
                                                        PHOTOS</h3>
                                                    <span class="image-up-alart-text pb-10">(Alart: Heigh 1000x800 px /
                                                        size 2MB)</span>
                                                    <div class="row mb-30-none">
                                                        <div class="col-xl-8 mb-30">
                                                            <div class="add-more-details-thumb-wrapper">
                                                                <div class="add-more-details-thumb-area">
                                                                    <div class="row" id="coba"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">CONFIRM YOUR LOCATION</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="location-tab">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="category-tab"
                                                            data-bs-toggle="tab" data-bs-target="#category" type="button"
                                                            role="tab" aria-controls="category"
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
