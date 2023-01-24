@extends('frontend.layout.main')
@push('page_meta')
    <meta name="keywords" content="{{ $item->meta_tags }}">
    <meta name="title" Content="{{ $item->meta_title }}">
@endpush
@section('title')
    @lang('Update your advertisement')
@endsection
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
                                        <a href=""> {{ $item->category->title }}</a>
                                    </li>
                                    <li>
                                        <a href="">/ {{ $sub_category->title }}</a>
                                    </li>
                                </ul>
                                <a href="{{ route('frontend.user.post.ad') }}"
                                    class="change-cetagory-link">@lang('Change')</a>
                            </div>

                            <form class="sell-add-info-form" action="{{ route('frontend.user.update.ad', $item->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
                                <input type="hidden" name="category_id" value="{{ $item->category->id }}">

                                <div class="row mb-30-none">
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">@lang('ADD SOME INFO')</h3>
                                            <div class="form-group">
                                                <label>@lang('Advert title') <span class="text--danger">*</span></label>
                                                <input type="text" name="title" class="form--control"
                                                    placeholder="@lang('Advert title')" value="{{ $item->title }}">
                                                <div class="text-limit-area">
                                                    <span>Mention key features of your product (e.g. make, model, age,
                                                        type)</span>
                                                    <span>0 / 70</span>
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>@lang('Description')<span class="text--danger">*</span></label>
                                                <textarea class="form--control" name="description" placeholder="@lang('Description')">{{ $item->description }}</textarea>
                                                <div class="text-limit-area">
                                                    <span>@lang('Add information such as status, feature and reason for sale')</span>
                                                    <span>0 / 1450</span>
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>@lang('Google Map Location') <a target="_blank" class="text-primary"
                                                        href="https://support.google.com/maps/answer/144361?hl=en&co=GENIE.Platform%3DDesktop#:~:text=Embed%20a%20map%20or%20directions&text=Click%20Share%20or%20embed%20map,Click%20Embed%20map.&text=Copy%20the%20text%20in%20the,of%20your%20website%20or%20blog.">@lang('Instruction')</a></label>
                                                <textarea class="form--control" name="location_embeded_map" placeholder="@lang('Google Map Location')">{{ $item->location_embeded_map }}</textarea>

                                            </div>
                                            <div class="form-group2 mt-2">
                                                <label>@lang('Thumbnail')<span class="text--danger">*</span></label>
                                                <input type="file" class="form--control" name="image"
                                                    placeholder="@lang('Thumbnail')" accept="image/*">
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
                                                    placeholder="@lang('Price')" value="{{ $item->price }}">
                                                <span>₺</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title two">PHOTOS</h3>
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
                                <div class="sell-add-info-body-wrapper">
                                    <div class="form-group col-8">
                                        <label>Condition</label>
                                        <select name="condition" class="form--control">
                                            <option value="">@lang('Select')</option>
                                            <option value="used" {{ $item->condition == 'used' ? 'selected' : '' }}>Used
                                            </option>
                                            <option value="new" {{ $item->condition == 'new' ? 'selected' : '' }}>New
                                            </option>
                                            <option value="like new"
                                                {{ $item->condition == 'like new' ? 'selected' : '' }}>Like New</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-8">
                                        <label>Edition (optional)</label>
                                        <input type="text" name="edition" class="form--control"
                                            placeholder="@lang('Edition ')" value="{{ $item->edition }}">
                                    </div>
                                    <div class="form-group col-8">
                                        <label>Brand (optional)</label>
                                        <select name="brand_id" class="form--control">
                                            <option value="">@lang('Select')</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    @if ($brand->id == $item->brand_id) selected @endif>{{ $brand->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-8">
                                        <label>Color</label>
                                        <select class="form--control" name="color">
                                            <option value="">@lang('Select Color')</option>

                                            <option value="light-grey" @if ($item->color == 'light-grey') selected @endif>
                                                Light grey</option>
                                            <option value="light-blue"@if ($item->color == 'light-blue') selected @endif>
                                                Light blue</option>
                                            <option value="light-green"@if ($item->color == 'light-green') selected @endif>
                                                Light green</option>
                                            <option value="beige"@if ($item->color == 'beige') selected @endif>Beige
                                            </option>
                                            <option value="white"@if ($item->color == 'white') selected @endif>White
                                            </option>
                                            <option value="burgundy"@if ($item->color == 'burgundy') selected @endif>
                                                burgundy</option>
                                            <option value="brown"@if ($item->color == 'brown') selected @endif>Brown
                                            </option>
                                            <option value="red"@if ($item->color == 'red') selected @endif>Red
                                            </option>
                                            <option value="dark-grey"@if ($item->color == 'dark-grey') selected @endif>Dark
                                                grey</option>
                                            <option value="dark-blue"@if ($item->color == 'dark-blue') selected @endif>
                                                Dark
                                                blue</option>
                                            <option value="dark-green"@if ($item->color == 'dark-green') selected @endif>
                                                Dark green</option>
                                            <option value="yellow"@if ($item->color == 'yellow') selected @endif>
                                                Yellow</option>
                                            <option value="black"@if ($item->color == 'black') selected @endif>Black
                                            </option>
                                            <option value="other"@if ($item->color == 'other') selected @endif>Other
                                            </option>
                                        </select>
                                    </div>

                                    @if ($item->category->category_type == 'mobiles')
                                        <div class="form-group col-8">
                                            @php
                                                $details = json_decode($item->details_informations);
                                            @endphp
                                            <label>@lang('NETWORK')</label>
                                            <input type="text" name="NETWORK" placeholder="@lang('Network')"
                                                class="form--control" value="{{ $details->NETWORK ?? null }}">
                                        </div>
                                        <div class="form-group col-8">
                                            <label>@lang('Display')</label>
                                            <input type="text" name="Display" placeholder="@lang('Display')"
                                                value="{{ $details->Display ?? null }}" class="form--control">
                                        </div>
                                        <div class="form-group col-8">
                                            <label>@lang('Memory')</label>
                                            <input type="text" name="Memory" placeholder="@lang('MEMORY')"
                                                value="{{ $details->Memory ?? null }}" class="form--control">
                                        </div>
                                        <div class="form-group col-8">
                                            <label>@lang('Battery')</label>
                                            <input type="text" name="Battery" placeholder="@lang('BATTERY')"
                                                value="{{ $details->Battery ?? null }}" class="form--control">
                                        </div>
                                    @endif
                                    @if ($item->category->category_type == 'electronics')
                                        Show other form for electronics
                                    @endif
                                    @if ($item->category->category_type == 'sports')
                                        Show other form for sports
                                    @endif
                                    @if ($item->category->category_type == 'vehicles')
                                        <div class="form-group col-8">
                                            <label>Model<span class="text-danger">*</span></label>
                                            <input type="text" name="model" class="form--control"
                                                placeholder="Model" value="{{ old('model', $item->model) }}">
                                        </div>
                                        <div class="form-group col-8">
                                            <label>Year</label>
                                            <input type="text" name="year_of_manufacture" class="form--control"
                                                placeholder="Year of Manufacture"
                                                value="{{ old('year_of_manufacture', $item->year_of_manufacture) }}">
                                        </div>

                                        <div class="form-group col-8">
                                            <label>Condition </label>
                                            <select class="form--control" name="condition">
                                                <option value="">Select</option>
                                                <option value="new" @if ($item->condition == 'new') selected @endif>
                                                    @lang('New')</option>
                                                <option value="used" @if ($item->condition == 'used') selected @endif>
                                                    @lang('Used')</option>
                                                <option value="like new"
                                                    @if ($item->condition == 'like new') selected @endif>@lang('Like new')
                                                </option>
                                                <option value="reconditon"
                                                    @if ($item->condition == 'reconditon') selected @endif>@lang('Reconditioned')
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-8">
                                            <label>Authenticity</label>
                                            <select class="form--control" name="authenticity">
                                                <option value="">Select</option>
                                                <option value="original"
                                                    @if ($item->authenticity == 'original') selected @endif>Original</option>
                                                <option value="refubrished"
                                                    @if ($item->authenticity == 'refubrished') selected @endif>Refubrished</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-8">
                                            <label>Body Type</label>
                                            <select class="form--control" name="body_type">
                                                <option value="">Select</option>
                                                <option value="saloon"@if ($item->body_type == 'saloon') selected @endif>
                                                    Saloon</option>
                                                <option
                                                    value="hatchback"@if ($item->body_type == 'hatchback') selected @endif>
                                                    Hatchback</option>
                                                <option value="estate"@if ($item->body_type == 'estate') selected @endif>
                                                    Estate</option>
                                                <option
                                                    value="convertible"@if ($item->body_type == 'convertible') selected @endif>
                                                    Convertible</option>
                                                <option
                                                    value="coupe/Sports"@if ($item->body_type == 'coupe/Sports') selected @endif>
                                                    Coupe/Sports</option>
                                                <option value="suv4x4"@if ($item->body_type == 'suv4x4') selected @endif>
                                                    SUV/4X4</option>
                                                <option value="mpv"@if ($item->body_type == 'mpv') selected @endif>
                                                    MPV</option>
                                                <option value="pick-up"@if ($item->body_type == 'pick-up') selected @endif>
                                                    pick-up</option>
                                                <option
                                                    value="roadster"@if ($item->body_type == 'roadster') selected @endif>
                                                    roadster</option>
                                                <option value="sedan"@if ($item->body_type == 'sedan') selected @endif>
                                                    Sedan</option>
                                                <option value="suv"@if ($item->body_type == 'suv') selected @endif>
                                                    SUV</option>
                                                <option
                                                    value="suv-cabriolet"@if ($item->body_type == 'suv-cabriolet') selected @endif>
                                                    SUV Cabriolet</option>
                                                <option value="other"@if ($item->body_type == 'other') selected @endif>
                                                    Other</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-8">
                                            <label>Edition (Optional)</label>
                                            <input type="text" name="edition" class="form--control"
                                                placeholder="Edition" value="{{ old('edition', $item->edition )}}">
                                        </div>
                                        <div class="form-group col-8">
                                            <label>Number of seats</label>
                                            <input type="text" value="1" name="seat_qty" min="1"
                                                placeholder="Number of seat" class="form--control" autocomplete="off">
                                        </div>
                                        
                                    @endif
                                    @if ($item->category->category_type == 'home_and_garden')
                                        Show other form for home_and_garden
                                    @endif
                                    @if ($item->category->category_type == 'fashion_beauty')
                                        Show other form for fashion_beauty
                                    @endif
                                    @if ($item->category->category_type == 'baby_and_child')
                                        Show other form for baby_and_child
                                    @endif
                                    @if ($item->category->category_type == 'soft_products')
                                        Show other form for soft_products
                                    @endif
                                    @if ($item->category->category_type == 'pet')
                                        Show other form for pet
                                    @endif
                                    @if ($item->category->category_type == 'general')
                                        Show other form for general
                                    @endif

                                </div>

                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">REVİEW YOUR İNFORMATİON</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group">
                                                <label>First name</label>
                                                <input type="text" name="first_name" class="form--control"
                                                    value="{{ Auth::guard('advertiser')->user()->first_name }}">

                                            </div>
                                            @if (isset(Auth::guard('advertiser')->user()->last_name))
                                                <div class="form-group">
                                                    <label>Last name</label>
                                                    <input type="text" name="last_name" class="form--control"
                                                        value="{{ Auth::guard('advertiser')->user()->last_name }}">
                                                    <div class="text-limit-area">
                                                        <span>text limite</span>
                                                        <span>5 / 30</span>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group price-input-badge two">
                                                <label>phone number</label>
                                                <input type="number" name="mobile_no" class="form--control"
                                                    value="{{ Auth::guard('advertiser')->user()->mobile_no }}">
                                                <span>+90</span>
                                            </div>

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
                                                            <select class="form--control">
                                                                <option value=""></option>
                                                                @foreach ($allCity as $city)
                                                                    <option value="{{ $city['id'] }}"
                                                                        @if (isset($item) && $item->city_id == $city['id']) selected @endif>
                                                                        {{ $city['title'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="apps" role="tabpanel"
                                                        aria-labelledby="apps-tab">
                                                        <ul class="current-location-list">
                                                            <li>District <span>Hakkari</span></li>
                                                        </ul>
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
@endsection
