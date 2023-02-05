@extends('frontend.layout.main')
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">@lang('Home')</a>
                </li>
                <li>
                    <a href="{{ url('user/view') }}"><i class="las la-angle-right"></i>@lang('My ADS')</a>
                </li>

            </ul>
        </div>
    </div>
    <!--~~~~~~~~~~~~Start My ADS~~~~~~~~~~~~~-->
    <section class="my-ads-section pb-60 pt-30">
        <div class="container">
            <div class="product-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="category-tab" data-bs-toggle="tab" data-bs-target="#category"
                            type="button" role="tab" aria-controls="category"
                            aria-selected="true">@lang('Ads')</button>
                        <button class="nav-link" id="apps-tab" data-bs-toggle="tab" data-bs-target="#apps" type="button"
                            role="tab" aria-controls="apps" aria-selected="false">@lang('Favorites')</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="category-tab">
                        <div class="my-ads-card-item-wrapper pt-30">
                            <div class="row mb-20-none">
                                @forelse($my_ads as $item)
                                    @if ($item->sub_category_id == null)
                                        <div class="col-xxl-4 col-xl-6 col-lg-6 mb-20">
                                            <div class="my-ads-card-item">
                                                <div class="my-ads-card-wrapper">
                                                    <div class="my-ads-card-header">
                                                        <h3 class="my-ads-card-header-title">@lang('From '): <span>
                                                                {{ $item->created_at->format('d M y') }}
                                                            </span></h3>
                                                        <div class="my-ads-card-action-btn">
                                                            <button class="opsition-btn">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </button>

                                                            <div class="opsition-list">
                                                                <a href="{{ url('user/others/ad/update', ['c_id' => $item->category_id, 'id' => $item->id]) }}"
                                                                    class="opsition-link">
                                                                    <span>@lang('Edit now')</span>
                                                                </a>
                                                                <form
                                                                    action="{{ route('frontend.user.delete.ad', $item->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="opsition-link">
                                                                        <span>@lang('Remove')</span>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-ads-thumb-main-wrapper">
                                                        <div class="my-ads-thumb-wrapper">
                                                            <div class="thumb">
                                                                <img src="{{ asset('core/storage/app/public/advertisement_images/' . $item->image) }}"
                                                                    alt="product">
                                                            </div>
                                                            <div class="title-area">
                                                                <a
                                                                    href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                                                    <h3>{{ $item->title }}</h3>
                                                                </a><br>
                                                                {{-- @dd($item->details_informations)
                                                                @if (!empty($item->details_informations) && $item->details_informations != null)
                                                                    @foreach ($item->details_informations as $key => $details_info)
                                                                        <span>{{ $details_info->label }} :
                                                                            {{ ucfirst($details_info->value) }}</span> <br>
                                                                    @endforeach
                                                                @endif --}}
                                                                {{ $item->authenticity }} <br>
                                                                {{ $item->condition }} <br>
                                                                {{ $item->category->title }} <br>
                                                            </div>
                                                        </div>
                                                        <div class="badge-area">

                                                            @if ($item->status == 0)
                                                                @lang('Pending')
                                                            @elseif($item->status == 1)
                                                                <span class="badge badge--success">
                                                                    @lang('Active')
                                                                </span>
                                                            @else
                                                                <span class="badge badge--danger">
                                                                    @lang('Sold')
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <ul class="my-ads-status-list">
                                                        <li><i class="las la-eye"></i> @lang('Views'):
                                                            {{ $item->view_count }}</li>
                                                        <li><i class="las la-phone"></i> @lang('Tel'): 0</li>
                                                        <li><i class="las la-heart"></i> @lang('Likes'):
                                                            {{ $item->favourites_count ?? '0' }}
                                                        </li>
                                                        <li><i class="las la-comment"></i> @lang('Chats'):
                                                            {{ $item->ad_message_count }}</li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Non child category ads -->
                                    @else
                                        <div class="col-xxl-4 col-xl-6 col-lg-6 mb-20">
                                            <div class="my-ads-card-item">
                                                <div class="my-ads-card-wrapper">
                                                    <div class="my-ads-card-header">
                                                        <h3 class="my-ads-card-header-title">@lang('From '): <span>
                                                                {{ $item->created_at->format('d M y') }}
                                                            </span></h3>
                                                        <div class="my-ads-card-action-btn">
                                                            <button class="opsition-btn">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </button>
                                                            <div class="opsition-list">
                                                                <a href="{{ url('user/ad/edit', ['ad_id' => $item->id, 'category_id' => $item->category_id]) }}"
                                                                    class="opsition-link">
                                                                    <span>@lang('Edit now')</span>
                                                                </a>
                                                                <form
                                                                    action="{{ route('frontend.user.delete.ad', $item->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="opsition-link">
                                                                        <span>@lang('Remove')</span>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-ads-thumb-main-wrapper">
                                                        <div class="my-ads-thumb-wrapper">
                                                            <div class="thumb">
                                                                <img src="{{ asset('core/storage/app/public/advertisement_images/' . $item->image) }}"
                                                                    alt="product">
                                                            </div>
                                                            <div class="title-area">
                                                                <a
                                                                    href="{{ route('frontend.ads.details', [$item->slug, $item->id]) }}">
                                                                    <h3>{{ $item->title }}</h3>
                                                                </a><br>
                                                                {{ $item->authenticity }} <br>
                                                                {{ $item->condition }} <br>
                                                                {{ $item->category->title }} <br>
                                                            </div>
                                                        </div>
                                                        <div class="badge-area">

                                                            @if ($item->status == 0)
                                                                @lang('Pending')
                                                            @elseif($item->status == 1)
                                                                <span class="badge badge--success">
                                                                    @lang('Active')
                                                                </span>
                                                            @else
                                                                <span class="badge badge--danger">
                                                                    @lang('Sold')
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <ul class="my-ads-status-list">
                                                        <li><i class="las la-eye"></i> @lang('Views'):
                                                            {{ $item->view_count }}</li>
                                                        <li><i class="las la-phone"></i> @lang('Tel'): 0</li>
                                                        <li><i class="las la-heart"></i> @lang('Likes'):
                                                            {{ $item->favourites_count ?? '0' }}
                                                        </li>
                                                        <li><i class="las la-comment"></i> @lang('Chats'):
                                                            {{ $item->ad_message_count }}</li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    @lang('No Active Ad')
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="apps" role="tabpanel" aria-labelledby="apps-tab">
                        <div class="my-ads-card-item-wrapper pt-30">
                            <div class="row mb-20-none">
                                @forelse ($favourite_ads as $fav)
                                    <div class="col-xxl-4 col-xl-6 col-lg-6 mb-20">
                                        <div class="my-ads-card-item">
                                            <div class="my-ads-card-wrapper">
                                                <div class="my-ads-card-header">
                                                    <h3 class="my-ads-card-header-title">@lang('From '): <span>
                                                            {{ $fav->created_at->format('d M y') }}
                                                        </span></h3>
                                                </div>
                                                @if ($fav->ads)
                                                    <div class="my-ads-thumb-main-wrapper">
                                                        <div class="my-ads-thumb-wrapper">
                                                            <div class="thumb">
                                                                <img src="{{ asset('core/storage/app/public/advertisement_images/' . $fav->ads->image) }}"
                                                                    alt="product">
                                                            </div>
                                                            <div class="title-area">
                                                                <a
                                                                    href="{{ route('frontend.ads.details', [$fav->ads->slug, $fav->ads->id]) }}">
                                                                    <h3>{{ $fav->ads->title }}</h3>
                                                                </a>
                                                                <span>
                                                                    @if (!empty($fav->ads->details_informations) && $fav->ads->details_informations != null)
                                                                        @foreach (json_decode($fav->ads->details_informations) as $key => $details_info)
                                                                            <span>{{ str_replace('_', ' ', ucfirst($key)) }}
                                                                                :
                                                                                {!! $details_info !!}</span> <br>
                                                                        @endforeach
                                                                    @else
                                                                        {{ $fav->description }}
                                                                    @endif

                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="badge-area">
                                                            <span class="badge badge--success">
                                                                @if ($fav->ads->status == 0)
                                                                    @lang('Pending')
                                                                @elseif($fav->ads->status == 1)
                                                                    @lang('Active')
                                                                @else
                                                                    @lang('Sold')
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <ul class="my-ads-status-list">
                                                        <li><i class="las la-eye"></i> @lang('Views'):
                                                            {{ $fav->ads->view_count }}</li>
                                                        <li><i class="las la-heart"></i> @lang('Likes'):
                                                            {{ $item->favourites_count ?? '0' }}
                                                        <li><i class="las la-phone"></i> @lang('Tel'): 0</li>
                                                        <li><i class="las la-comment"></i> @lang('Chats'):
                                                            {{ $fav->ad_message_count }}</li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    @lang('No favourite ads')
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".item_status", function() {
            var item_id = $(this).attr("item_id");
            $.ajax({
                type: 'post',
                url: '{{ route('frontend.user.makeSold') }}',
                data: {
                    item_id: item_id
                },
                success: function(resp) {
                    if (resp.success == 200) {
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });
    </script>
@endsection
