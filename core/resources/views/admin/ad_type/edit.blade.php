@extends('admin.layout.master')
@section('title')
    @lang('Update')
@endsection
@section('page-name')
    @lang('Update')
@endsection
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.type.index') }}">
                <span class="active-path g-color">@lang('Type')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.type.create') }}">
                <i class="las la-plus"></i>
                <span>@lang('Ad Package')</span>
            </a>
        </div>
    </div>
    <form action="{{ route('admin.type.update', $row['id']) }}" method="post">
        @include('admin.ad_type._form', ['buttonText' => 'Update'])
    </form>
@endsection
@section('scripts')
@endsection
