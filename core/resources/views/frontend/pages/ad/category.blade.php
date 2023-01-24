@extends('frontend.layout.main')
@push('custom_css')
    <style>
        .sell-cetagory-left-list li a img,
        .sell-cetagory-right-list li a img {
            border-radius: 50%;
        }
    </style>
@endpush
@section('content')
    <section class="sell-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10">@lang('POST AN AD')</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-cetagory-main-wrapper">
                        <h3 class="sell-cetagory-main-title">@lang('CHOOSE A CATEGORY')</h3>
                        <div class="sell-cetagory-wrapper">
                            <div class="sell-category-wrapper-list">
                                <ul class="sell-cetagory-left-list">
                                    @foreach ($categories as $item)
                                        <li @if ($item->sub_categories_count !== 0) class="has-child" @endif>
                                            @if ($item->sub_categories_count == 0)
                                                <a href="{{ url('user/others/ad', ['c_id' => $item->id]) }}"
                                                    class="sell-cetagory-left-list-thumb-wrapper">
                                                    <img src="{{ asset('core/storage/app/public/category/' . $item->image) }}"
                                                        alt="category">
                                                    <span>{{ $item->title }}</span>
                                                </a>
                                            @else
                                                <a href="#" class="sell-cetagory-left-list-thumb-wrapper">
                                                    <img src="{{ asset('core/storage/app/public/category/' . $item->image) }}"
                                                        alt="category">
                                                    <span>{{ $item->title }}</span>
                                                </a>
                                            @endif
                                            <ul class="sell-cetagory-right-list">
                                                @if (!empty($item['subCategories']))
                                                    @foreach ($item['subCategories'] as $sub_category)
                                                        <li><a href="#"
                                                                onclick="openPage('{{ route('frontend.user.ad.form', [$item->id, $sub_category->id]) }}')">{{ $sub_category->title }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function openPage(page) {
            window.location.href = page
        }
    </script>
@endsection
