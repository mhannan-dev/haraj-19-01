@extends('frontend.layout.main')
@push('custom_css')
    <style>

    </style>
@endpush
@section('content')
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Breadcrumb
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <ul class="breadcrumb-list">
                    <li>
                        <a href="{{ route('frontend.home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.helps') }}"><i class="las la-angle-right"></i>help</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.cms.section', $cms->slug) }}"><i class="las la-angle-right"></i> about
                            us</a>
                    </li>
                </ul>
                <div class="breadcrumb-search-area">
                    <form action="{{ route('frontend.search.help') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Help" name="search" class="form--control">
                        <button type="submit" class="breadcrumb-search-icon"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            End Breadcrumb
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start about
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="about-section pt-50 pb-80">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-30">
                    <h3 class="about-left-title">Articles in this section</h3>
                    <div class="about-left-btn">
                        <a href="{{ route('frontend.cms.section', $cms->slug) }}"
                            class="btn--base w-100">{{ $cms->title }}</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8 col-md-9 col-sm-9 mb-30">
                    <div class="about-right-wrapper">
                        <h1 class="about-right-title">{{ $cms->title }}</h1>
                        <h4 class="about-right-sub-title">{{ $cms->created_at->diffForHumans() }} - <span>Update</span></h4>
                        {!! $cms->description !!}
                        <p class="text-align-justify">&nbsp;</p>
                        <div class="about-right-review-area">
                            <h3 class="about-right-review-title">Was this article helpful?</h3>
                            <div class="about-right-review-btn">
                                <button class="btn--base active">Yes</button>
                                <button class="btn--base active">No</button>
                            </div>
                        </div>
                        <div class="about-right-quick-action">
                            <h3 class="about-right-quick-action-title">Related articles</h3>
                            <ul class="about-right-quick-action-list">
                                @foreach ($related_cms as $cms)
                                    <li><a href="{{ route('frontend.cms.section', $cms->slug) }}">{{ $cms->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            End about
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection
@section('scripts')
@endsection
