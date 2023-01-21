@extends('admin.layout.master')
@section('title')
    @lang('Advertisements')
@endsection
@section('page-name')
    @lang('Advertisements')
@endsection
@php
    $roles = userRolePermissionArray();
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.advertiser.index') }}">
                <span class="active-path g-color">@lang('Advertiser')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.advertiser.index') }}">
                <i class="las la-list"></i>
                <span>@lang('Advertiser')</span>
            </a>
        </div>
    </div>
    @if (Session::has('success'))
        <div class="flash_alert alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('success') }}
        </div>
    @endif
    <form class="row" action="{{ url()->current() }}" method="GET">
        <div class="col-md-6 mb-3">
            <input type="text" name="search" class="form-control form--control" placeholder="@lang('Searh for ad ......')">
        </div>
        <div class="col-md-6 mb-3">
            <select class="form--control form-control" name="advertiser_id">
                <option value="" selected>--@lang('Select advertiser')--</option>
                @foreach (\DB::table('advertisers')->select('id', 'email')->get() as $item)
                    <option value="{{ $item->id }}">{{ $item->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <select class="form--control form-control" name="city_id">
                <option value="" selected>--@lang('Select city')--</option>
                @foreach (\DB::table('cities')->select('id', 'title')->get() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <select class="form--control form-control" name="category_id">
                <option value="" selected>--@lang('Select category')--</option>
                @foreach (\DB::table('categories')->select('id', 'title')->get() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <select class="form--control form-control" name="status">
                <option value="" selected>--@lang('Status')--</option>
                <option value="1">Active</option>
                <option value="2">Sold</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <div class="row mb-10-none">
                <div class="check-feature">
                    <input type="checkbox" class="w-auto" name="is_featured" autocomplete="off" value="1">
                    <span>Is Featured</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn--base">@lang('Apply')</button>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn--base float-end">Total ad {{ $ads->count() }} </button>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-area">
                <div class="table-wrapper table-responsive">
                    <table class="custom-table small">
                        <thead>
                            <tr>
                                <th>@lang('Heading')</th>
                                <th>@lang('Advertiser mail')</th>
                                <th>@lang('Ad Category')</th>
                                <th>@lang('City')</th>
                                <th>@lang('Image')</th>
                                <th>@lang('Action')</th>
                                <th>@lang('View')</th>
                                <th>@lang('Published At')</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($ads) --}}
                            @forelse($ads as $advert)
                                <tr>
                                    <td>{{ $advert->title }}</td>
                                    <td>{{ $advert->advertiser ? $advert->advertiser->email : '' }}</td>
                                    <td>{{ $advert->category->title }}</td>
                                    <td>{{ $advert->city->title }}</td>
                                    <td><img style="width: 40px; height: 40px;"
                                            src="{{ URL::asset('core/public/storage/image/' . $advert->image) }}"
                                            alt="Thumbnail"></td>
                                    <td><a title="Edit" href="{{ url('posted/ad/edit', $advert->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a></td>
                                    <td>{{ $advert->view_count }}</td>
                                    <td>{{ date('d-M-y', strtotime($advert->created_at)) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $ads->links() }}
    </div>
@endsection
