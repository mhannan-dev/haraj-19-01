@extends('admin.layout.master')
@section('title')
    @lang('Update Page')
@endsection
@section('page-name')
    @lang('Update Page')
@endsection
@php
 ;
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboards</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.cms.index') }}">
                <span class="active-path g-color">@lang('Pages')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.cms.create') }}">
                <i class="las la-plus"></i>
                <span>@lang('Add Page')</span>
            </a>
        </div>
    </div>

    <form action="{{ route('admin.cms.update', $cms['id']) }}" method="post">
        @include('admin.pages.cms._form', ['buttonText' => 'Update'])
    </form>
@endsection
