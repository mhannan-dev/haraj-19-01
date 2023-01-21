@extends('admin.layout.master')
@section('title')
    @lang('Create Page')
@endsection
@section('page-name')
    @lang('Create Page')
@endsection

@section('content')
    @include('admin.category._breadcrumb')
    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.category._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')

@endsection
