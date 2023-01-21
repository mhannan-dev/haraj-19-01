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
                                                <label>Explanation <span class="text--danger">*</span></label>
                                                <textarea class="form--control nicEdit" name="description" placeholder="@lang('Description')">{{ $item->description }}</textarea>
                                                <div class="text-limit-area">
                                                    <span>Add information such as status, feature and reason for sale</span>
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
                                                        <div class="col-4 spartan_item_wrapper" data-spartanindexrow="0"
                                                            style="margin-bottom : 20px; ">
                                                            <div style="position: relative;">
                                                                <div class="spartan_item_loader" data-spartanindexloader="0"
                                                                    style=" position: absolute; width: 100%; height: auto; background: rgba(255,255,255, 0.7); z-index: 22; text-align: center; align-items: center; margin: auto; justify-content: center; flex-direction: column; display : none; font-size : 1.7em; color: #CECECE">
                                                                    <i class="fas fa-sync fa-spin"></i>
                                                                </div><label class="file_upload"
                                                                    style="width: 100%; height: auto; border: 2px dashed #ddd; border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; padding: 5px; margin-top: 5px; margin-bottom : 5px; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;"><a
                                                                        href="javascript:void(0)"
                                                                        data-spartanindexremove="0"
                                                                        style="position: absolute !important; right : 3px; top: 3px; display : none; background : transparent; border-radius: 3px; width: 30px; height: 30px; line-height : 30px; text-align: center; text-decoration : none; color : #ff0700;"
                                                                        class="spartan_remove_row"><i
                                                                            class="las la-trash"></i></a><img
                                                                        style="width: 100%; margin: 0 auto; vertical-align: middle;"
                                                                        data-spartanindexi="0"
                                                                        src="assets/images/gallery.jpg"
                                                                        class="spartan_image_placeholder">
                                                                    <p data-spartanlbldropfile="0"
                                                                        style="color : #5FAAE1; display: none; width : auto; ">
                                                                        Drop Here</p><img
                                                                        style="width: 100%; vertical-align: middle; display:none;"
                                                                        class="img_" data-spartanindeximage="0"><input
                                                                        class="form-control spartan_image_input"
                                                                        accept="image/*" data-spartanindexinput="0"
                                                                        style="display : none" name="images[]"
                                                                        type="file">
                                                                </label>
                                                            </div>
                                                        </div>
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
                                        <label>Authenticity</label>
                                        <select name="authenticity" class="form--control">
                                            <option value="">@lang('Select')</option>
                                            <option value="original"
                                                {{ $item->authenticity == 'original' ? 'selected' : '' }}>Original</option>
                                            <option value="refurbished"
                                                {{ $item->authenticity == 'refurbished' ? 'selected' : '' }}>Refurbished
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-8">
                                        <label>Edition (optional)</label>
                                        <input type="text" name="edition" class="form--control"
                                            placeholder="@lang('Edition ')" value="{{ $item->edition }}">
                                    </div>
                                    <div class="form-group col-8">
                                        <label>Brand (optional)</label>
                                        <input type="text" name="brand" class="form--control"
                                            placeholder="@lang('Brand ')" value="{{ $item->brand }}">
                                    </div>

                                    <div class="form-group col-8">
                                        <label>Color</label>
                                        <select class="form--control" name="color">
                                            <option value="">@lang('Select Color')</option>
                                            <option value="light-grey">Light grey</option>
                                            <option value="light-blue">Light blue</option>
                                            <option value="light-green">Light green</option>
                                            <option value="beige">Beige</option>
                                            <option value="white">White</option>
                                            <option value="burgundy">burgundy</option>
                                            <option value="brown">Brown</option>
                                            <option value="red">Red</option>
                                            <option value="dark-grey">Dark grey</option>
                                            <option value="dark-blue">Dark blue</option>
                                            <option value="dark-green">Dark green</option>
                                            <option value="yellow">Yellow</option>
                                            <option value="black">Black</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
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
                                </div>

                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">REVİEW YOUR İNFORMATİON</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group">
                                                <label>First name</label>
                                                <input type="text" name="first_name" class="form--control"
                                                    value="{{ Auth::guard('advertiser')->user()->first_name }}">
                                                <div class="text-limit-area">
                                                    <span>text limite</span>
                                                    <span>5 / 30</span>
                                                </div>
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
                                                                <option value="Demo-1">Demo-1</option>
                                                                <option value="Demo-2">Demo-2</option>

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
