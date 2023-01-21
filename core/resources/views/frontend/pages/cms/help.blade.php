@extends('frontend.layout.main')
@push('custom_css')
    <style>

    </style>
@endpush
@section('content')
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Help banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="help-banner bg_img" data-background="{{ asset('assets/frontend/images/banner/help-banner.svg') }}">
        <div class="container">
            <div class="help-banner-search-area">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="{{ route('frontend.search.help') }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Help" name="search" class="form--control">
                            <button type="submit" class="search-icon"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Help banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <section class="help-btn-section pt-60 mb-30">
        <div class="container">
            <div class="row mb-30-none">
                @forelse ($cms as $page)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                        <div class="help-btn-item">
                            <a href="{{ route('frontend.cms.section', $page->slug) }}"
                                class="btn--base active w-100">{{ $page->title }}</a>
                        </div>
                    </div>
                @empty
                    @lang('No Pages found')
                @endforelse
            </div>
        </div>
    </section>


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Help contact section
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="help-contact-section pb-60 pt-60">
        <div class="container">
            <div class="help-contact-wrapper text-center">
                <h1 class="help-contact-title">If you have any question, you can contact us.</h1>
                <div class="help-contact-btn">
                    <a href="{{ route('frontend.contact') }}" class="btn--base">Communication</a>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Help contact section
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection
@section('scripts')
@endsection
