@extends('admin.layout.master')
@section('title')
    @lang('Create brand')
@endsection
@section('page-name')
    @lang('Create brand')
@endsection

@section('content')
    @include('admin.brand._breadcam')
    <form action="{{ route('admin.brand.store') }}" method="post">
        @include('admin.brand._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
