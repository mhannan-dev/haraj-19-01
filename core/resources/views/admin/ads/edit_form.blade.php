@extends('admin.layout.master')
@section('title')
    @lang('Advertisements')
@endsection
@section('page-name')
    @lang('Advertisements')
@endsection
@push('custom_css')
    <style>
        .form-control:disabled,
        .form-control[readonly] {
            background-color: #36383c;
            opacity: 1;
        }
    </style>
@endpush
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
                <span class="active-path g-color">@lang('Advertisement')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.advertiser.index') }}">
                <i class="las la-list"></i>
                <span>@lang('Advertisement')</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-form-area">
                <div class="card-body">
                    {!! Form::open(['url' => ['posted/ad/update', $item->id], 'method' => 'post']) !!}
                    <div class="form-body">
                        <h4 class="form-section"></i>@lang('Advertisement Information')</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Category')</label>
                                    <input title="Read only" type="text" value="{{ $item->category->title }}"
                                        name="category_id" class="form-control form--control" readonly>
                                    <input type="hidden" value="{{ $item->category_id }}" name="category_id"
                                        class="form-control form--control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Brand')<span class="text-danger">*</span></label>
                                    <select name="brand" class="form--control">
                                        @foreach ($brands as $br)
                                            <option value="{{ $br->id }}"
                                                @if (isset($item) && $br->id == $item->brand_id) selected @endif>{{ $br->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('brand'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Model') <span class="text-danger">*</span></label>
                                    <input type="text" name="model" value="{{ $item->model }}"
                                        class="form-control form--control" placeholder="Model" required>
                                </div>
                                @if ($errors->has('model'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Year') <span class="text-danger">*</span></label>
                                    <input type="text" name="year_of_manufacture"
                                        value="{{ $item->year_of_manufacture }}" class="form-control form--control"
                                        placeholder="Year" required>
                                </div>
                                @if ($errors->has('model'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('year_of_manufacture') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Color') <span class="text-danger">*</span></label>
                                    <input type="text" name="color" value="{{ $item->color }}"
                                        class="form-control form--control" placeholder="Color" required>
                                </div>
                                @if ($errors->has('model'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Edition') <span class="text-danger">*</span></label>
                                    <input type="text" name="edition" value="{{ $item->edition }}"
                                        class="form-control form--control" placeholder="Edition" required>
                                </div>
                                @if ($errors->has('model'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Condition') <span class="text-danger">*</span></label>
                                    <input type="text" name="condition" value="{{ $item->condition }}"
                                        class="form-control form--control" placeholder="Condition" required>
                                </div>
                                @if ($errors->has('model'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('condition') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Price') <span class="text-danger">*</span></label>
                                    <input type="text" name="price" value="{{ $item->price }}"
                                        class="form-control form--control" placeholder="Price" required>
                                </div>
                                @if ($errors->has('model'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn--base">
                        @lang('Update')
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
