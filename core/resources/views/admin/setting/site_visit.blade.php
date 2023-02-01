@extends('admin.layout.master')
@section('title')
    @lang('Site Visiting History')
@endsection
@section('category-name')
    @lang('Site Visiting History')
@endsection

@section('content')
<div class="dashboard-title-part">
    <h5 class="title">Dashboard</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">Dashboards</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="#">
            <span class="active-path g-color">@lang('Visit history')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="#">
            <i class="las la-plus"></i>
            <span>@lang('Visit history')</span>
        </a>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('IP')</th>
                            <th scope="col">@lang('Physical Address')</th>
                            <th scope="col">@lang('Country')</th>
                            <th scope="col">@lang('City')</th>
                            <th scope="col">@lang('State name')</th>
                            <th scope="col">@lang('Views')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visitingHistory as $key => $item)
                        {{-- @dd($item) --}}
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->ip_address }}</td>
                            <td>{{ $item->mac_address }}</td>
                            <td>{{ $item->country }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->state_name }}</td>
                            <td>{{ $item->user_ip_view_count }}</td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
@endsection

@section('scripts')

@endsection
