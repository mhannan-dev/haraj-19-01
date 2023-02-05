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
            <h1 class="sell-header-title pb-10 text-uppercase">@lang('Update your advertisement')</h1>
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
                                                {{-- <div class="text-limit-area">
                                                    <span>Mention key features of your product (e.g. make, model, age,
                                                        type)</span>
                                                    <span>0 / 70</span>
                                                </div> --}}
                                            </div>
                                            <div class="form-group2">
                                                <label>@lang('Description')<span class="text--danger">*</span></label>
                                                <textarea class="form--control" name="description" placeholder="@lang('Description')">{{ $item->description }}</textarea>
                                                {{-- <div class="text-limit-area">
                                                    <span>@lang('Add information such as status, feature and reason for sale')</span>
                                                    <span>0 / 1450</span>
                                                </div> --}}
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
                                    @if (isset($item->images))
                                        <table class="table table-striped">
                                            <tbody>
                                                @foreach ($item->images as $multiImage)
                                                    <tr>
                                                        <td>

                                                            <img width="100px"
                                                                src="{{ asset('core/storage/app/public/advertisement_images/' . $multiImage->images) }}"
                                                                alt="">
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ url('user/remove/multi/img', ['image_id' => $multiImage->id, 'ad_id' => $item->id]) }}">
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
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title text-uppercase">@lang('review your information')</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <input type="hidden" name="advertiser_id" value="{{ Auth::guard('advertiser')->user()->id }}">
                                            <div class="form-group">
                                                <label>@lang('First name')</label>
                                                <input id="first_name" type="text" name="first_name" class="form--control"
                                                    value="{{ Auth::guard('advertiser')->user()->first_name }}" maxlength="30">

                                            </div>
                                            @if (isset(Auth::guard('advertiser')->user()->last_name))
                                                <div class="form-group">
                                                    <label>@lang('Last name')</label>
                                                    <input type="text" name="last_name" class="form--control"
                                                        value="{{ Auth::guard('advertiser')->user()->last_name }}">
                                                    {{-- <div class="text-limit-area">
                                                        <span id="text-count">1</span>/ 30
                                                    </div> --}}
                                                </div>
                                            @endif
                                            <div class="form-group price-input-badge two">
                                                <label>phone number</label>
                                                <input type="number" name="mobile_no" class="form--control"
                                                    value="{{ Auth::guard('advertiser')->user()->mobile_no }}">
                                                <span>+93</span>
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
