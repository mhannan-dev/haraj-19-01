@extends('frontend.layout.main')
@section('content')
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <ul class="breadcrumb-list">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href=""><i class="las la-angle-right"></i> Pages</a>
                    </li>
                    <li>
                        <a href="#"><i class="las la-angle-right"></i> about us</a>
                    </li>
                </ul>
                <div class="breadcrumb-search-area">
                    <input type="text" placeholder="Call" class="form--control" autocomplete="off">
                    <span class="breadcrumb-search-icon"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <section class="about-section pt-50 pb-80">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-30">
                    <h3 class="about-left-title">Article in this section</h3>
                    <div class="about-left-btn">
                        <a href="#" class="btn--base w-100">{!! $cmsPageDetails['title'] !!}</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8 col-md-9 col-sm-9 mb-30">
                    <div class="about-right-wrapper">
                        <h1 class="about-right-title">{!! $cmsPageDetails['title'] !!}</h1>
                        <h4 class="about-right-sub-title">{{ diffForHumans($cmsPageDetails['updated_at']) }}-
                            <span>Update</span>
                        </h4>
                        <p>{!! $cmsPageDetails['description'] ? $cmsPageDetails['description'] : 'Please Update' !!}</p>
                        <p class="text-align-justify">&nbsp;</p>
                        <div class="about-right-review-area">
                            <h3 class="about-right-review-title">Was this article helpful?</h3>
                            <div class="about-right-review-btn">
                                <input type="hidden" value="{!! $cmsPageDetails['id'] !!}" id="page_id">
                                <button class="btn--base active" name="yes" id="yes" data-id="1">Yes</button>
                                <button class="btn--base active" name="no" id="no" data-id="0">No</button>
                            </div>
                        </div>
                        <div class="about-right-quick-action">
                            <h3 class="about-right-quick-action-title">Related articles</h3>
                            <ul class="about-right-quick-action-list">
                                @foreach ($related_page as $item)
                                    <li><a href="{{ $general->domain_name }}/{{ $item->slug }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('button').click(function() {
            var increment_value = $(this).data('id');
            var page_id = $('#page_id').val();

            $.ajax({
                type: 'post',
                url: '{{ route('frontend.vote') }}',
                data: {
                    increment_value: increment_value,
                    page_id: page_id,
                },
                success: function(resp) {}
            });
        });
    </script>
@endsection
